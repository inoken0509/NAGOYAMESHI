<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
    public function index(Request $request) {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $users = User::where('name', 'like', "%{$keyword}%")->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('dashboard.users.index', compact('users', 'keyword'));
    }

    public function show(User $user) {
        return view('dashboard.users.show', compact('user'));
    }
}
