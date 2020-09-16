<!DOCTYPE html>
<html lang="en">
<head>
    @include('template.partials._head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('template.partials._sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="content-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">App Kasir</h1>
                        </div>

                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @yield('breadcrumb')
                            </ol>
                        </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>

    </div>

    @include('template.partials._footer')
    @include('template.partials._scripts')

</body>
</html>
