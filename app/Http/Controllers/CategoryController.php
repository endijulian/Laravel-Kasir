<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Nama Kategori harus di isi!',
                'description.required' => 'Deskripsi kategori harus di isi'
            ]

        );

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => Str::slug($request->name)
        ]);

        Alert::success('Data Kategori Berhasil di Tambahlan');
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Nama Kategori Harus di isi !',
                'description.required' => 'Description Harus di isi !'
            ]
        );

        $category->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        Alert::success('Category Berhasil di Update');
        return redirect()->route('category.index');
    }

    public function destroy(Category $category) //$id
    {
        $category->delete();
        return redirect()->route('category.index');
        // $category = \App\Category::findOrFail($id);
        // $category->delete();
        // return redirect()->route('category.index');
    }
}
