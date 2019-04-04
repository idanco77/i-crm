<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\User;
use Session;

class LoginController extends Controller {

    static public $data = [];

    function __construct() {

        $this->middleware('signedguard', ['except' => ['logout']]);
    }

    public function home() {
        
        return redirect('user-admins');
    }

    public function login() {
        self::$data['title'] = 'Idan admin panel | Login page';
        return view('login', self::$data);
    }

    public function postLogin(LoginRequest $request) {

        if (User::verify_user($request['userName'], $request['password'])) {
            return redirect('user-admins');
        } else {
            self::$data['title'] = 'Idan admin panel | Login page';
            return view('login', self::$data)->withErrors(['wrong_login' => 'Wrong email or password']);
        }
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }

}
