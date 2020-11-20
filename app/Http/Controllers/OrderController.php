<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Profile;
use App\Orderdetail;
use App\Temproder;
use App\Order;
use Illuminate\Support\Facades\Auth;
use DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $items = new Orderdetail;

        $menu = Orderdetail::orderBy('id', 'desc')->get();
        $tt = DB::table("orderdetails")->get()->sum("subtotal");

        return view('order.index', compact('orders', 'items', 'menu','tt'));
    }

    public function process(Request $request)
    {
        $this->validate(
            $request,
            [
                'customer' => 'required'
            ],
            [
                'customer.required' => 'Nama customer belum di isi'
            ]
        );

        if ($request->pay < $request->total) {
            Alert::warning('Jumlah Pembayaran Kurang');
            return redirect()->back();
        }

        $latest = Order::orderBy('id', 'DESC')->first();
        if (!$latest) {
            $invoice = '0001';
        } else {
            $invoice = sprintf('%04d', $latest->invoice + 1);
        }

        $tempr_order = Temproder::all();
        $order = Order::create([
            'invoice' => $invoice,
            'customer_name' => $request->customer,
            'total' => $request->total,
            'pay' => $request->pay,
            'user_id' => Auth::user()->id,
            'note' => $request->note
        ]);

        foreach ($tempr_order as $item) {
            Orderdetail::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'product_price' => $item->product_price,
                'qty' => $item->qty,
                'subtotal' => $item->subtotal
            ]);
        }
        Temproder::query()->truncate();
        return redirect()->route('detailOrder');
    }

    public function show(Order $order)
    {
        $profile = Profile::first();
        return view('order.show', compact('profile', 'order'));
    }

    public function detailOrder()
    {
        $lastOrder = Order::latest()->first();
        return view('order.detail', compact('lastOrder'));
    }

    public function receipt(Order $order)
    {
        $profile = Profile::first();
        $lastOrder = Order::latest()->first();
        return view('order.receipt', compact('order', 'profile','lastOrder'));
    }
}
