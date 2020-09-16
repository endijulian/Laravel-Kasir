<?php

namespace App\Http\Controllers;

use App\Temproder;
use Illuminate\Http\Request;

class TemproderController extends Controller
{
    public function addProduct(Request $request)
    {
        Temproder::create([
            'product_id' => $request->id,
            'product_name' => $request->menu,
            'product_price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->price * $request->qty,
        ]);
        return redirect()->back();
    }

    public function destroy(Temproder $temproder)
    {
        $temproder->delete();
        return redirect()->back();
    }
}
