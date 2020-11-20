<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="info">
                <img src="{{asset('/uploads/'. Auth::user()->gambar)}}" class="img-circle" width="100" height="100">
                <a href="#" class="d-block"><h3>{{Auth::user()->name}}</h3></a>
    </div>

    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/')}}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

            @if(Auth::user()->hasRole('kasir'))
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>SignOut</p>
                    </a>
                    <form action="{{route('logout')}}" id="logout-form" method="post" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('product.category')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Product</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Penjualan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('report.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profile.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Edit Profile Kedai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-power-off"></i>
                    <p>SignOut</p>
                    </a>
                    <form action="{{route('logout')}}" id="logout-form" method="post" style="display: none;">
                        @csrf
                    </form>
                </li>

            @endif

            </ul>
        </nav>

    </div>
</aside>
