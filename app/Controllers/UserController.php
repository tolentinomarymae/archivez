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
                if ($data['status'] == 'active') {
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
                        return redirect()->to('/instuctordashboard');
                    } else if ($data['usertype'] === 'admin') {
                        return redirect()->to('/admindashboard');
                    }
                } else {
                    $session->setFlashdata('msg', 'Account was not verified.');
                }
            } else {
                $session->setFlashdata('msg', 'Name or Password is incorrect.');
            }
        } else {
            $session->setFlashdata('msg', 'Email not found.'); // Flash message for email not found
        }

        return redirect()->to('/logins');
    }


    public function login()
    {
        session()->remove(['id', 'fullname', 'email', 'isLoggedIn', 'usertype']);
        helper(['form']);
        return view('signin-signup/login');
    }
    /* public function mail()
    {
        $this->sendMail();
    }*/

    public function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();
        $email->setMailType("html");
        $email->setTo($to);
        $email->setFrom('marymaetolentino03@gmail.com', $subject);
        $email->setMessage($message);

        if ($email->send()) {
            echo 'email sent successfully';
        } else {
            $data = $email->printDebugger(['headers']);
            print($data);
        }
    }

    public function token($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($str_result), 0, $length);
    }

    public function signupview()
    {
        helper('form');
        $data = [];
        return view('signin-signup/register', $data);
    }

    public function signups()
    {
        helper('form');
        $rules = [
            'fullname' => 'required|min_length[1]|max_length[100]',
            'email' => 'required|min_length[1]|max_length[100]|is_unique[users.email]',
            'department' => 'required|min_length[1]|max_length[100]',
            'idnumber' => 'required|min_length[1]|max_length[100]',
            'password' => 'required|min_length[8]|max_length[100]',
            'confirmpassword' => 'matches[password]',
        ];

        if ($this->validate($rules)) {
            $registermodel = new UserModel();
            $token = $this->token(100);
            $to = $this->request->getVar('email');

            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'idnumber' => $this->request->getVar('idnumber'),
                'department' => $this->request->getVar('department'),
                'gradelevel' => $this->request->getVar('gradelevel'),
                'section' => $this->request->getVar('section'),
                'usertype' => $this->request->getVar('usertype'),
                'email' => $to,
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'token' => $token,
                'status' => 'inactive'
            ];

            $registermodel->save($data);

            $subject = 'Please confirm your registration';
            $message = 'Hi, ' . $this->request->getVar('fullname') . '! Welcome to our website! To continue with your registration, please confirm your account by clicking this <a href="' . base_url('verify/' . $token) . '">link</a>';
            $this->sendMail($to, $subject, $message);

            return redirect()->to('logins');
        } else {
            $data['validation'] = $this->validator;
            return view('signin-signup/register', $data);
        }
    }

    public function verify($id = null)
    {
        $ac = new UserModel();
        $acc = $ac->where('token', $id)->first();

        if ($acc) {
            $data = [
                'token' => $this->token(100),
                'status' => 'active'
            ];

            $ac->set($data)->where('token', $id)->update();
            $session = session();
            $session->setFlashdata('msg', 'Account was verified');
        }

        return redirect()->to('logins');
    }
}
