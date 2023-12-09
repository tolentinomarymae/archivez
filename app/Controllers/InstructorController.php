<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InstructorController extends BaseController
{
    public $output;

    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
    }
    public function instructordashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            return view('instructordashboardview/instructordashboard');
        }
    }

    public function instructorresearchpapers()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'output' => $this->output->findAll()
            ];
            return view('instructordashboardview/researchpaperview', $data);
        }
    }

    public function researchdetails($id)
    {
        $output = $this->output->find($id);
        if ($output) {
            $data = [
                'output' => $output
            ];
            return view('instructordashboardview/viewresearch', $data);
        } else {
            return redirect()->to('/instructorresearchpapers');
        }
    }
}
