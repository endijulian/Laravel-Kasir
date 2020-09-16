@extends('template.default')

@section('breadcrumb')
    {{Breadcrumbs::render('category.create')}}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title "> Tambah data kategori</h3>
                </div>

                <form role="form" action="{{route('category.store')}}" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group {{$errors->has('name') ? 'invalid' : ''}}">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Masukan nama kategori">
                            @if ($errors->has('name'))
                                <span class="text-red">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('description') ? 'invalid' : ''}}">
                            <label for="">Deskripsi Kategori</label>
                            <input type="text" class="form-control" name="description" value="{{old('description')}}" placeholder="Masukan deskripsi kategori">
                            @if ($errors->has('description'))
                                <span class="text-red">
                                    {{$errors->first('description')}}
                                </span>
                            @endif
                        </div>

                        {{--  <div class="form-group {{$errors->has('slug') ? 'invalid' : ''}}">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{old('slug')}}" placeholder="Masukan slug">
                            @if ($errors->has('slug'))
                                <span class="text-red">
                                    {{$errors->first('slug')}}
                                </span>
                            @endif
                        </div>  --}}
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
