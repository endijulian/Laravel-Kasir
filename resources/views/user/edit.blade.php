@extends('template.default')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>

                <form action="{{ route('user.update', $edit) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="form-group {{$errors->has('name') ? 'invalid' : ''}}">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{$edit->name ?? old('name')}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('email') ? 'invalid' : ''}}">
                            <label for="">Email</label>
                            <input class="form-control" type="text" name="email" value="{{ $edit->email ?? old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    {{$errors->first('email')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('gambar') ? 'invalid' : ''}}">
                            <label>Gambar</label>
                            <input class="form-control" type="file" name="gambar" value="{{$edit->gambar}}">
    
                            @if ($errors->has('gambar'))
                                <span class="text-red">
                                    {{$errors->first('gambar')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('password') ? 'invalid' : ''}}">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" value="">

                            @if($errors->has('password'))
                                <span class="help-block">
                                    {{$errors->first('password')}}
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
