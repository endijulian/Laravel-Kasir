@extends('template.default')

@section('breadcrumb')
    {{ Breadcrumbs::render('profile.edit', $profile) }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile Kedai</h3>
                </div>

                <form action="{{ route('profile.update', $profile) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-body">

                        <div class="form-group {{$errors->has('name') ? 'invalid' : ''}}">
                            <label for="">Nama Kedai</label>
                            <input type="text" class="form-control" name="name" value="{{$profile->name ?? old('name')}}">

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('address') ? 'invalid' : ''}}">
                            <label for="">Alamat Kedai</label>
                            <input class="form-control" type="text" name="address" value="{{ $profile->address ?? old('address') }}">

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    {{$errors->first('address')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('city') ? 'invalid' : ''}}">
                            <label for="">Kota Kedai</label>
                            <input type="text" name="city" class="form-control" value="{{$profile->city ?? old('city')}}">

                            @if($errors->has('city'))
                                <span class="help-block">
                                    {{$errors->first('city')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('phone') ? 'invalid' : ''}}">
                            <label for="">Nomor Telpon</label>
                            <input type="text" name="phone" class="form-control" value="{{$profile->phone ?? old('phone')}}">

                            @if($errors->has('phone'))
                                <span class="help-block">
                                    {{$errors->first('phone')}}
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
