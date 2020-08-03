<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;


use Illuminate\Validation\Rule;

class ProfileController extends Controller
{


    public function index () {

        $user = Auth::user();

        return view ('pages.profile', compact('user'));
    }


    public function store (Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id)
            ],
            'avatar' => 'nullable|image'
        ]);

//        dd($request->all());

        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('logout', 'данные профиля успшено обновлены');

    }

}
