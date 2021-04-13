<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function register()
    {
        return view('register');
    }
    
    public function login()
    {
        return view('login');
    }

    public function postRegister(Request $request)
    {
        $registerId = Str::random(8);

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        $users = User::all();
        
        foreach ($users as $user){
            if ($user->email === $email){
                return view('register_fail');
            }
        }

        $users= new User();
        $users->create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'register_id' => $registerId,
            'is_wanting' => false,
            'url' => '',
        ]);
        $request->session()->put(['name' => $request->name, 'email' => $request->email]);
        return view('mypage');
    }
    

    public function postLogin(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        
        $users = User::all();

        $userId = DB::table('users')
        ->where('users.email', $email)
        ->get();
        $id = $userId[0]->id;
        
        foreach ($users as $user){
            if ($user->email === $email && $user->password === $password){
                $request->session()->put(['email' => $request->email, 'id' => $id]);
                $email = session()->get('email');

                $user = DB::table('users')
                ->where('id', $id)
                ->get();
                return view('/mypage', ['user' => $user]);
            }elseif($user->name === $name && $user->email === $email && $user->password === $password){
                return view('login_fail');
            }
        }
    }
}
