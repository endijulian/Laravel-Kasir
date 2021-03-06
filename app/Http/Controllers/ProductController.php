<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use File;

class ProductController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('product.category', compact('categories'));
    }

    public function index(Category $category)
    {
        $products = Product::where('category_id', $category->id)->get();
        return view('product.index', compact('products', 'category'));
    }

    public function create(Category $category)
    {
        return view('product.create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'price' => 'required',
                'gambar' => 'required|image|mimes:jpg,png,jpeg'
            ],
            [
                'name.required' => 'Nama produk harus di isi !!',
                'price.required' => 'Harga produk harus di isi !!',
                'gambar.required' => 'Gambar harus di isi !!'
            ]
        );

        $gambarProduk = time().$request->gambar->getClientOriginalName();
        $request->gambar->move('uploads/gambarProduk', $gambarProduk);


        Product::create([
            'category_id' => $category->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'gambar' => $gambarProduk,
        ]);

        Alert::success('Data produk berhasil ditambahkan');
        return redirect()->route('product.index', $category);
    }

    public function edit(Category $category, Product $product)
    {
        return view('product.edit', compact('category', 'product'));
    }

    public function update(Request $request, Category $category, Product $product)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'price' => 'required',
                'gambar' => 'sometimes|image|mimes:png,jpeg,jpg'
            ],
            [
                'name.required' => 'Nama produk harus di isi !',
                'price.required' => 'Harga produk harus di isi !',
                'gambar.required' => 'Harga produk harus di isi !'
            ]
        );

        $gambarProduk = time().$request->gambar->getClientOriginalName();
        $request->gambar->move('uploads/gambarProduk', $gambarProduk);

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'gambar' => $gambarProduk
        ]);

        Alert::success('Data produk berhasil di update');
        return redirect()->route('product.index', $category);
    }

    public function destroy(Category $category, Product $product) //$id
    {
        $product->delete();
        // dd($product);
        return redirect()->route('product.index', $category);

        // $category = \App\Category::findOrFail($id);
        // $category->delete();
        // return redirect()->route('category.index');
    }
}
