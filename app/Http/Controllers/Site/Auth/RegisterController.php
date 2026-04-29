<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('site.auth.register.index');
    }

    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['role_id'] = 2;
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user = User::create($data);
        if ($user) {
            auth()->login($user);
            return redirect()->route('home')->with([
                'success' => 'You are now register in'
            ]);
        }
        return back()->withErrors([
            'error' => 'Something went wrong'
        ]);
    }

}
