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
        if (session()->has('id')) {
            $id = session()->get('id');
                
            $user = DB::table('users')
            ->where('id', $id)
            ->get();

            return view('mypage', ['user' => $user,],);
        }

        return view('register');
    }
    
    public function login()
    {
        if (session()->has('id')) {
            $id = session()->get('id');
                
            $user = DB::table('users')
            ->where('id', $id)
            ->get();

            return view('mypage', ['user' => $user,],);
        }
        
        return view('login');
    }

    public function postRegister(Request $request)
    {
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
            'is_wanting' => false,
            'url' => '',
        ]);

        $users = DB::table('users')
        ->get();
        $id = count($users);

        $request->session()->put(['email' => $request->email, 'id' => $id]);
        $user = DB::table('users')
        ->where('id', $id)
        ->get();
        return view('/mypage', ['user' => $user]);
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
