@extends('template.default')

@section('breadcrumb')
    {{Breadcrumbs::render('product.edit', $category, $product)}}
@endsection

@section('content')

@if($errors->any())

    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit data produk <b>{{$product->name}} </b> Kategori <b>{{$category->name}}</b></h3>
                </div>

                <form role="form" action="{{route('product.edit', [$category, $product])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group {{$errors->has('name') ? 'invalid' : ''}}">
                            <label>Nama Produk</label>
                            <input class="form-control" type="text" name="name" value="{{$product->name}}" placeholder="Masukan harga produk">

                            @if ($errors->has('name'))
                                <span class="text-red">
                                    {{$errors->first('name')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('price') ? 'invalid' : ''}}">
                            <label>Harga Produk</label>
                            <input class="form-control" type="text" name="price" value="{{$product->price}}" placeholder="Masukan harga produk">

                            @if ($errors->has('price'))
                                <span class="text-red">
                                    {{$errors->first('price')}}
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('gambar') ? 'invalid' : ''}}">
                            <label>Gambar Produk</label>
                            <input class="form-control" type="file" name="gambar" value="{{$product->gambar}}">
    
                            @if ($errors->has('gambar'))
                                <span class="text-red">
                                    {{$errors->first('gambar')}}
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
