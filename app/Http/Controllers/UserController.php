<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('index',compact('users'));
    }

    public function create()
    {
        return view('create');
    }

    public function add(Request $request)
    {   
       $request -> validate([
        'name' => 'required|max:255',
        'email'=> 'required|email|max:255|unique:users',
        'password'=> 'required'
       ]);
       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->save();
       return redirect()->route('users.index');
    }

    public function edit(Request $request)
    {
       $user = User::find($request -> id);
       return view('edit',compact('user'));
    }

    public function update(Request $request)
    {   
        $request -> validate([
            'name' => 'required|max:255',
            'email'=> 'required|email|max:255|unique:users',
            'password'=> 'required'
           ]);
        $user = User::findOrFail($request->id);
        $user -> update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('users.index');
    }

    public function delete(Request $request)
    {
        $user = User::findOrFail($request -> id);
        $user->delete();
        return redirect()->route('users.index');
    }
    
}
