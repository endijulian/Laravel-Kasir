@extends('template.default')

@section('breadcrumb')
    {{Breadcrumbs::render('penjualan')}}
@endsection

@section('content')

    @include('sweetalert::alert')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Penjualan</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>Customer</td>
                                <td>Total Item</td>
                                <td>Total Harga</td>
                                <td>Jumlah Bayar</td>
                                <td>Kasir</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=0;
                            @endphp
                            @foreach ($orders as $order)
                            @php
                                $no++;
                            @endphp
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ Date::parse($order->created_at)->format('j F Y') }}</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $items->item($order->id) }}</td>
                                <td>{{ number_format($order->total) }}</td>
                                <td>{{ number_format($order->pay) }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>
                                    <a href="{{route('order.show', $order)}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3">

                <div class="card-header">
                    <h3 class="card-title"><b> Data Penjualan Menu Makanan Dan Minuman </b></h3>
                </div>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Menu</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $nmor=0;
                                    $total=0;
                                @endphp
                                @foreach ($menu as $item)

                                    @php
                                        $nmor++;
                                        $total = $item->product_price * $item->qty;
                                    @endphp
                                <tr>
                                    <td>{{ $nmor }}</td>
                                    <td>{{Date::parse($item->created_at)->format('j F Y')}}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ number_format($item->product_price) }}</td>
                                    <td>{{ number_format($item->subtotal) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Total Keseluruhan</th>
                                    <td><b>{{ number_format($tt) }}</b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('adminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('adminLte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('adminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
        $(function(){
            $('#example1').DataTable();
            $('#example2').DataTable({
                "paging" : true,
                "lengthChange" : false,
                "searching" : false,
                "ordering" : true,
                "info" : true,
                "autoWidth": false,
            });
        });
    </script>

@endpush
