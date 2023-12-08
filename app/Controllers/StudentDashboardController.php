<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StudentDashboardController extends BaseController
{
    public function studentdashboard()
    {
        return view('studentdashboardview/studentdashboard');
    }
    public function studentprofile()
    {
        return view('studentdashboardview/myprofile');
    }
}
