<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = User::findOrFail($id);

        return view('user.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $update_user = $request->all();

        $validasi = Validator::make($update_user, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:6',
            'gambar' => 'sometimes|nullable|image|mimes:png,jpeg,jpg'
        ]);

        if ($validasi->fails()) {
            return redirect()->route('user.edit', [$id])->withErrors($validasi);
        }

        if ($request->hasFile('gambar')) {
            if ($request->file('gambar')->isValid()) {
                Storage::disk('upload')->delete($user->gambar);

                $gambar = $request->file('gambar');
                $extention = $gambar->getClientOriginalExtension();

                $namaFoto = "user/" . date('YmdHis') . "." . $extention;
                $upload_path = 'uploads/user';
                $request->file('gambar')->move($upload_path, $namaFoto);

                $update_user['gambar'] = $namaFoto;
            }
        }

        if ($request->input('password')) {
            $update_user['password'] = bcrypt($update_user['password']);
        } else {
            $update_user = Arr::except($update_user, ['password']);
        }

        $user->update($update_user);

        Alert::success('Data profile berhasil di update');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
