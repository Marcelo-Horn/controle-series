<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = hash::make($data['password']);
        $user = User::create($data);
        
        Auth::login($user);

        return redirect()->route('series_list');
    }
}
