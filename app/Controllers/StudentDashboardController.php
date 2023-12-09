<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class StudentDashboardController extends BaseController
{

    public $output;
    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
    }

    public function studentdashboard()
    {
        return view('studentdashboardview/studentdashboard');
    }
    public function studentprofile()
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        }

        // Get the currently logged-in user's ID
        $userId = session()->get('id');

        // Fetch research papers uploaded by the logged-in user
        $data = [
            'output' => $this->output->where('user_id', $userId)->findAll()
        ];

        return view('studentdashboardview/myprofile', $data);
    }
}
