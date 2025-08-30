<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('phone')) {
            $phone = preg_replace('/\D/', '', $request->phone); // Limpiar dígitos
            $query->where('phone', 'like', '%' . $request->phone . '%');
        }

        $users = $query->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}