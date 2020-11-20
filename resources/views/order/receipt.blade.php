<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .receipt{
            width: 350px;
        }
    </style>

</head>
<body>

    <div class="receipt">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>{{$profile->name}}</h3>
                    <h6>{{$profile->address}}</h6>
                    <h6>{{$profile->city}}</h6>
                </div>
                <p>{{$profile->phone}}</p>
            </div>

            <div class="card-body">


                <div class="card-header bg-secondry color-palette">
                    <h6 class="card-title">Bukti Transaksi</h6>
                </div>

                <div class="card-body">
                    <table class="table table-condensed"  width="100%">
                        <tbody>
                            <tr>
                                <td>No. Invoice</td>
                                <td class="text-primary strong">{{$order->invoice}}</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td colspan="3">{{Date::parse($order->created_at)->format('d/m/y')}}, {{Date::parse($order->created_at)->format('H:i')}}</td>
                                
                            </tr>
                            <tr>
                                <td>Nama Customer</td>
                                <td colspan="2">{{$order->customer_name}}</td>
                                <td></td>
                            </tr>


                            @foreach ($lastOrder->orderDetail as $item)
                                <tr>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{number_format($item->product_price)}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{number_format($item->subtotal)}}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td><b> Total</b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($order->total)}} </b></td>
                            </tr>
                            <tr>
                                <td><b> Jumlah Bayar </b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($order->pay)}} </b></td>
                            </tr>
                            <tr>
                                <td><b> Kembalian</b></td>
                                <td></td>
                                <td></td>
                                <td><b> Rp. {{number_format($order->pay - $order->total)}} </b></td>
                            </tr>
                            
                            <tr>
                                <td colspan="2" class="text-center"><p>Terima Kasih Atas Kunjungan Anda</p></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
