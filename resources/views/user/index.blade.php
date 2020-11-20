@extends('template.default')

{{--  @section('breadcrumb')
{{ Breadcrumbs::render('user') }}
@endsection  --}}

@section('content')
    @include('sweetalert::alert')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data User</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>email</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no=0;
                            @endphp
                            @foreach ($user as $us)

                            @php
                                $no++;
                            @endphp

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{ $us->name }}</td>
                                <td>{{ $us->email }}</td>
                                <td class="text-center"><img src="{{asset('/uploads/'.$us->gambar)}}" class="img-thumbnail" width="200" height="200"></td>
                                <td>
                                    <a href="{{ route('user.edit', $us) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
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

@endsection
