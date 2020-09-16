@extends('template.default')

@section('breadcrumb')
    {{Breadcrumbs::render('category')}}
@endsection

@section('content')

    @include('sweetalert::alert')

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Data Kategori</h3>
                    <div class="float-right">
                        <a href="{{route('category.create')}}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus">Tambah Data</i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=0;
                            @endphp

                            @foreach ($categories as $category)
                                @php
                                    $no++;
                                @endphp

                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category )}}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"> Edit</i>
                                        </a>

                                        {{-- <form action="{{route('category.destroy', [$category->id])}}" method="POST" class="d-inline" onsubmit="return confirm('Move category ?')">
                                            @csrf

                                            <input type="hidden" value="DELETE" name="_method">
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form> --}}

                                        <button id="delete" data-title="{{$category->name}}" href="{{route('category.destroy', $category)}}" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <form action="" id="deleteForm" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="" style="display: none">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('button#delete').on('click', function(){
            var href= $(this).attr('href');
            var title= $(this).data('title')

            swal({
                title : "Apakah kamu yakin akan menghapus kategori " +title+ "?",
                text: "Data yang terhapus tidak bisa di kembalikan !",
                icon : "warning",
                buttons: true,
                dangerMode : true,
            })
            .then((willDelete) => {
                if(willDelete){
                    document.getElementById('deleteForm').action = href;
                    document.getElementById('deleteForm').submit();
                    swal("Data berhasil di hapus",{
                        icon: "success",
                    });
                }
            });
        });
    </script>

@endpush
