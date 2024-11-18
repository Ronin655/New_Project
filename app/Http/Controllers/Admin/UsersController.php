<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'avatar' => ['nullable', 'image'],
        ]);

        $user = User::add($data);
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');

    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'avatar' => ['nullable', 'image'],
        ]);
        $user->edit($data); //Передача валидированных данных
        $user->uploadAvatar($request->file('avatar'));
        $user->generatePassword($request->get('password'));

        return redirect()->route('users.index', compact('user'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
