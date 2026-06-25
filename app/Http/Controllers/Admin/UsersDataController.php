<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentManager;

class UsersDataController extends Controller
{
    public function index()
    {
        $users = User::whereNull('deleted_at')->get(); // hanya user yang tidak soft-delete
        return view('admin.users_data.index', compact('users'));
    }

    public function addUser()
    {
        return view('admin.users_data.add_user');
    }

    public function storeUser(Request $request)
    {
        $messages = [
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
        ];
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,manager',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',      // huruf kecil
                'regex:/[A-Z]/',      // huruf besar
                'regex:/[0-9]/',      // angka
                'regex:/[@$!%*#?&]/', // simbol
                'confirmed',
            ],
        ], $messages);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users-data.index')->with('success', 'User created successfully!');
    }

    public function editUser($id)
    {
        $user = \App\Models\User::findOrFail($id);
        return view('admin.users_data.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $messages = [
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id . ',id_user',
            'role' => 'required|in:admin,manager',
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/[a-z]/',      // huruf kecil
                'regex:/[A-Z]/',      // huruf besar
                'regex:/[0-9]/',      // angka
                'regex:/[@$!%*#?&]/', // simbol
                'confirmed',          // butuh field password_confirmation
            ],
        ], $messages);


        $user = \App\Models\User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users-data.index')->with('success', 'User updated successfully.');
    }


    public function addToManager($id)
    {
        $user = User::findOrFail($id);
        $departments = Department::all();

        $existingManager = $user->manager; // pastikan relasi ini ada di model User

        return view('admin.users_data.add_to_manager', compact('user', 'departments', 'existingManager'));
    }

    public function storeManager(Request $request)
    {
        
        $request->validate([
            'user_id' => 'required|exists:users,id_user',
            'position' => 'required|in:head,bph',
            'department_id' => 'required|exists:departments,id_department',
        ]);

        // Create or update manager record
        DepartmentManager::updateOrCreate(
            ['user_id' => $request->user_id],
            ['department_id' => $request->department_id, 'position' => $request->position]
        );

        return redirect()->route('admin.users-data.index')->with('success', 'User successfully assigned or updated as department manager.');
    }


}
