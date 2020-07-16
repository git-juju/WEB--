<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show', 'create', 'store']
        ]);
    }

    public function index()
    {
    $users = User::paginate(5);
    return View('users.index',compact('users'));
    }

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
        Auth::login($User);
        Session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$User]);
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'password' => 'required|confirmed|min:6|max:18'
        ]);
        $date = [];
        $date ['name'] = $request->name;
        if ($request->password) {
            $date['password'] = bcrypt($request->password);
        }
        $user->update($date);
        session()->flash('success', '更新成功');

//            $user->update([
//                'name' => $request->name,
//                'password' => bcrypt($request->password)
//            ]);

        return redirect()->route('users.show', $user);
    }
}
