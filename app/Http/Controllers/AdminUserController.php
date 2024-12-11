<?php
// app/Http/Controllers/AdminUserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crew;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $crews = Crew::all();
        return view('admin.users.create', compact('crews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'Bday' => 'required|date',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
            'crew_id' => 'nullable|exists:crews,id',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'Bday' => $request->Bday,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        if ($request->crew_id) {
            $user->crews()->attach($request->crew_id, ['year' => date('Y')]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $crews = Crew::all();
        return view('admin.users.edit', compact('user', 'crews'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'Bday' => 'required|date',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string',
            'crew_id' => 'nullable|exists:crews,id',
        ]);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->Bday = $request->Bday;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if ($request->crew_id) {
            $user->crews()->sync([$request->crew_id => ['year' => date('Y')]]);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}