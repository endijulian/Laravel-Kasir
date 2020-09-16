<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .receipt{
            width: 250px;
        }
    </style>

</head>
<body>

    <div class="receipt">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h2>{{$profile->name}}</h2>
                    <h5>{{$profile->address}}</h5>
                    <h5>{{$profile->city}}</h5>
                </div>
            </div>

            <div class="card-body">
                <table width="100%">
                    <tr>
                        <td><h5>{{Date::parse($order->created_at)->format('d/m/y')}}</h5></td>
                        <td><h5>#.{{$order->invoice}}</h5></td>
                    </tr>
                    <tr>
                        <td><h5>{{Date::parse($order->created_at)->format('H:i')}}</h5></td>
                        <td><h5>{{$order->user->name}}</h5></td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td><h6>TOTAL</h6></td>
                        <td class="text-right"><h5>*{{number_format($order->total)}}</h5></td>
                    </tr>
                    <tr>
                        <td><h6>BAYAR</h6></td>
                        <td class="text-right"><h6>*{{number_format($order->pay)}}</h6></td>
                    </tr>
                    <tr>
                        <td><h6>KEMBALI</h6></td>
                        <td class="text-right"><h6>*{{number_format($order->pay - $order->total)}}</h6></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><h5>Terima Kasih Atas Kunjungan Anda</h5></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><h5>{{$profile->phone}}</h5></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
