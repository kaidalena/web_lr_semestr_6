<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    
    public function auth(){
        $data = [
            'controller' => $this,
        ];
        return view('login')->with($data);
    }

    public function login(){
        if (($_POST['login']=='adminadmin@gmail.com') && (md5($_POST['password'])=='21232f297a57a5a743894a0e4a801fc3')) { //admin
            $_SESSION['isAdmin']=1;
            return $this->redir();
        }
        $user = User::where([
            ['login', '=', $_POST['login']],
            ['password', '=', $_POST['password']]
        ])->first();
        if ($user !== null) {
            $_SESSION['isAdmin'] = 0;
            $_SESSION['fio'] = $user->name;
            $_SESSION['id_user'] = $user->id;
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('status', 'Неверный логин или пароль');
        }
    }

    public function redir(){
        return redirect()->route('index');
    }
}
