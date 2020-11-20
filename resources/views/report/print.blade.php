<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kasir</title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Font Awesome -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/fontawesome-free/css/all.min.css')}}">
            <!-- Ionicons -->
            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
            <!-- Tempusdominus Bbootstrap 4 -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
            <!-- iCheck -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
            <!-- JQVMap -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/jqvmap/jqvmap.min.css')}}">
            <!-- Theme style -->
            <link rel="stylesheet" href="{{asset('adminLte/dist/css/adminlte.min.css')}}">
            <!-- overlayScrollbars -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
            <!-- Daterange picker -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/daterangepicker/daterangepicker.css')}}">
            <!-- summernote -->
            <link rel="stylesheet" href="{{asset('adminLte/plugins/summernote/summernote-bs4.css')}}">
            <!-- Google Font: Source Sans Pro -->
            <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
            @stack('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center">Bangsa Kopi</h2>
                                <br><br>
                                <h3 class="card-title">Laporan Pendapatan <b>{{ Date::parse($startDate)->format('j F Y') }}</b> s/d <b>{{ Date::parse($endDate)->format('j F Y') }}</b></h3>
                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no=0;
                                            $total=0;
                                        @endphp
                                        @while(strtotime($startDate) <= strtotime($endDate))
            
                                        @php
                                            $no++;
                                            $date = $startDate;
                                            $startDate = date('Y-m-d', strtotime("+1 day", strtotime($startDate)));
                                            $subtotal = $income->income($date);
                                            $total = $total + $subtotal;
                                        @endphp
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ Date::parse($date)->format('l d F Y') }}</td>
                                            <td>{{ number_format($income->income($date)) }}</td>
                                        </tr>
                                        @endwhile
                                        <tr>
                                            <td></td>
                                            <td>Total Pendapatan</td>
                                            <td>{{ number_format($total) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

<script>
    window.print();
</script>

<script src="{{asset('adminLte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('adminLte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('adminLte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('adminLte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('adminLte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('adminLte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('adminLte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('adminLte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('adminLte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('adminLte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('adminLte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminLte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('adminLte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminLte/dist/js/demo.js')}}"></script>

@stack('scripts')

</body>
</html>
