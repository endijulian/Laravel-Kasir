<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $profile = Profile::first();
        return view('profile.index', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $profile->update([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'phone' => $request->phone
        ]);

        Alert::success('Data profile berhasil di update');
        return redirect()->route('profile.index');
    }
}
