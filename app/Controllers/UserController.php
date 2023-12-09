<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $registermodel;
    public $session;
    public function __construct()
    {
        $registermodel = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('index');
    }
    public function registerview()
    {
        helper(['form']);
        $data = [];
        return view('signin-signup/register', $data);
    }

    public function register()
    {

        helper(['form']);

        $rules = [
            'fullname' => 'required|min_length[1]|max_length[100]',
            'email' => 'required|min_length[1]|max_length[100]|is_unique[users.email]',
            'department' => 'required|min_length[1]|max_length[100]',
            'idnumber' => 'required|min_length[1]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[100]',

        ];

        if ($this->validate($rules)) {
            $registermodel = new UserModel();

            $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'idnumber' => $this->request->getVar('idnumber'),
                'department' => $this->request->getVar('department'),
                'gradelevel' => $this->request->getVar('gradelevel'),
                'section' => $this->request->getVar('section'),
                'usertype' => $this->request->getVar('usertype'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'uniid' => $uniid,
                'activation_date' => date("Y-m-d h:i:s")
            ];


            dd($registermodel);

            dd($registermodel->save($data));

            return redirect()->to('/logins');
        } else {
            $this->session->setTempdata('error', 'Sorry', 'Unable to create your account right now, Try again', 3);
            $data['validation'] = $this->validator;
            return view('signin-signup/register', $data);
        }
    }

    public function loginauth()
    {
        $session = session();
        $registermodel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');


        $data = $registermodel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);

            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['id'],
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'idnumber' => $data['idnumber'],
                    'department' => $data['department'],
                    'gradelevel' => $data['gradelevel'],
                    'section' => $data['section'],
                    'isLoggedIn' => TRUE,
                    'usertype' => $data['usertype'],

                ];

                $session->set($ses_data);

                if ($data['usertype'] === 'student') {
                    return redirect()->to('/studentdashboard');
                } else if ($data['usertype'] === 'instructor') {
                    return redirect()->to('/instructordashboard');
                } else if ($data['usertype'] === 'admin') {
                    return redirect()->to('/admindashboard');
                }
            } else {
                $session->setFlashdata('msg', 'Name or Password is incorrect.');

                return redirect()->to('/logins');
            }
        }
    }
    public function login()
    {
        session()->remove(['id', 'fullname', 'email', 'isLoggedIn', 'usertype']);
        helper(['form']);
        return view('signin-signup/login');
    }
}
