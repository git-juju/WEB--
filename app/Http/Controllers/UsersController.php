<?php

namespace App\Http\Controllers;

use Dotenv\Regex\Success;
use Illuminate\Http\Request;
use App\Models\User;
use Mockery\Matcher\Subset;
use MongoDB\Driver\Session;

class UsersController extends Controller
{
    public function create()
    {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users|min:3|max:50',
            'email' => 'required|email|unique:users|min:11|max:255',
            'password' => 'required|confirmed|min:6|max:18'
        ]);
        $User = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        Session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show',[$User]);
    }

}
