@extends('template.default')

@section('breadcrumb')

    {{Breadcrumbs::render('product.create', $category)}}

@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah data produk kategori {{$category->name}}</h3>
                </div>

                <form role="form" action="{{route('product.store', $category)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="form-group {{$errors->has('name') ? 'invalid' : ''}}">
                        <label>Nama Produk</label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Masukan nama produk">

                        @if ($errors->has('name'))
                            <span class="text-red">
                                {{$errors->first('name')}}
                            </span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('price') ? 'invalid' : ''}}">
                        <label>Harga Produk</label>
                        <input class="form-control" type="text" name="price" value="{{old('price')}}" placeholder="Masukan harga produk">

                        @if ($errors->has('price'))
                            <span class="text-red">
                                {{$errors->first('price')}}
                            </span>
                        @endif
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
