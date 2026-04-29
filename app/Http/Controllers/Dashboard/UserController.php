<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\EditUserRequest;
use App\Http\Requests\Dashboard\UserRequest;
use App\Http\Requests\Site\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create(Role $roles)
    {
        $roles = Role::all();
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(UserRequest $request){
        $data = $request->validated();
        $data['role_id'] = 1;

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $user = User::create($data);
        return redirect()->route('users.create')->with('success', 'User created successfully');
    }

    public function edit(User $user, Role $roles)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(EditUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('avatar')) {

            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');

            $data['avatar'] = $path;
        }

        $user->update($data);
        return redirect()->route('users.edit', $user)->with('success', 'User updated successfully');
    }
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');
    }
}
