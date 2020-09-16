<?php

namespace App\Http\Controllers;

use App\Category;
use App\Charts\Daily;
use App\Charts\Monthly;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use App\Temproder;
use App\Product;
use Jenssegers\Date\Date;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $tempr_orders = Temproder::all();

        if (Auth::user()->hasRole('kasir')) {
            return view('dashboard', compact('tempr_orders'));
        }

        // if (Auth::user()->hasRole('owner')) {
        //     return view('dashboard');
        // }

        $categories = Category::all();
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime("-1 days"));
        $income_today = Order::where('created_at', 'LIKE', "$today%")->sum('total');
        $income_yesterday = Order::where('created_at', 'LIKE', "$yesterday%")->sum('total');
        $product = Product::count();

        //create date
        $startDate = date('Y-m-d', mktime(0, 0, 0, date('m'), 1, date('Y')));

        $date = array();
        $income = array();

        for ($i = $startDate; $i <= $today; $i++) {
            $date[] = substr($i, 8, 2);
            $paid = Order::where('created_at', 'LIKE', "$i%")->sum('total');
            $income[] = $paid;
        }


        //create chart harian
        $chart_daily = new Daily;
        $chart_daily->labels($date);
        $chart_daily->dataset('Grafik Penjualan Bulan Ini', 'line', $income);

        //create month
        $month = array();
        $income_monthly = array();
        for ($i = 1; $i <= 12; $i++) {
            $month[] = Date::parse(mktime(0, 0, 0, $i, 1, date('Y')))->format('F');
            $paid_monthly = Order::select('created_at')->whereBetween('created_at', array(date('Y-m-d', mktime(0, 0, 0, $i, 1, date('Y'))), date('Y-m-d', mktime(0, 0, 0, $i, 32, date('Y')))))->sum('total');

            $income_monthly[] = $paid_monthly;
        }

        //create chart monthly
        $chart_monthly = new Monthly;
        $chart_monthly->labels($month);
        $chart_monthly->dataset('Grafik Penjualan Perbulan', 'line', $income_monthly);


        return view('dashboard', compact('categories', 'income_today', 'income_yesterday', 'product', 'chart_daily', 'chart_monthly'));
    }

    public function search(Request $request)
    {
        $search = $request->term;
        $data = Product::where('name', 'LIKE', '%' . $search . '%')->take(10)->get();

        $result = array();
        foreach ($data as $key => $value) {
            $result[] = ['price' => $value->price, 'id' => $value->id, 'value' => $value->name];
        }
        return response()->json($result);
    }
}
