<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

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
                'price' => 'required'
            ],
            [
                'name.required' => 'Nama produk harus di isi !!',
                'price.required' => 'Harga produk harus di isi !!'
            ]
        );

        Product::create([
            'category_id' => $request->id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price

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
                'price' => 'required'
            ],
            [
                'name.required' => 'Nama produk harus di isi !',
                'price.required' => 'Harga produk harus di isi !'
            ]
        );

        $product->update([
            'name' => $request->name,
            'price' => $request->price
        ]);

        Alert::success('Data produk berhasil di update');
        return redirect()->route('product.index', $category);
    }

    public function destroy(Category $category, Product $product) //$id
    {
        $product->delete();
        return redirect()->route('product.index', $category);

        // $category = \App\Category::findOrFail($id);
        // $category->delete();
        // return redirect()->route('category.index');
    }
}
