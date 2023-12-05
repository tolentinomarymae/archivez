<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function index()
    {
        return view('index');
    }
    public function register()
    {
        return view('signin-signup/register');
    }
    public function login()
    {
        return view('signin-signup/login');
    }
}
