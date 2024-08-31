<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UsersRead()  {
        $users = User::all()->sortByDesc("id");
        //return $users;
        return view('userview', compact('users'));
    }
    public function UsersAdd() {
        return view('adduser');
    }
    public function UsersSave() {
        $name = request('name');
        $email = request('email');
        $password = request('password');

        User::create ([
            'name' =>$name,
            'email'=>$email,
            'password' => $password,
            'status' => '1'
        ]);
        return redirect()->route('homepage.viewuser')->with('message', 'User Created...');
    }
    public function UsersDelete($userId) {
        $user = User::find(decrypt($userId));
        $user->delete();
        return redirect()->route('homepage.viewuser')->with('delmessage', 'User Deleted...');
    }
    public function UsersEdit($userId) {
        $user = User::find(decrypt($userId));
        return view('edituser', compact('user'));
    }

    public function UsersUpdate() {
        //return (decrypt(request('id')));
        $user = User::find(decrypt(request('id')))->update ([
            'name' =>request('name'),
            'email'=>request('email'),
            'password' => request('password'),
            'status' => '1'
        ]);
        return redirect()->route('homepage.viewuser')->with('message', 'User updated...');
    }
}
