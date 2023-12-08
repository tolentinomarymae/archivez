<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResearchModel;

class ResearchController extends BaseController
{
    public $output;
    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
    }
    public function insertresearch()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'output' => $this->output->findAll()
            ];
            return view('studentdashboardview/addresearch', $data);
        }
    }
    public function researchpapers()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'output' => $this->output->findAll()
            ];
            return view('studentdashboardview/researchpaperview', $data);
        }
    }
    public function addnewresearch()
    {

        // Create a new instance of your model
        $model = new ResearchModel();
        // Get the user ID from the session
        $userId = session()->get('id');

        // Validate the form data
        $validation = $this->validate([
            'researchtitle' => 'required',
            'submittedto' => 'required',
            'subject' => 'required',
            'author' => 'required',
            'idnumber' => 'required',
            'gradelevel' => 'required',
            'section' => 'required',
            'uploaddate' => 'required',
            'abstract' => 'required',
            'keywords' => 'required',
            'citation' => 'required',
            'status' => 'required',
            'file' => 'required'

        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('studentdashboardview/researchpaperview', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $model->save([
            'user_id' => $userId,
            'researchtitle' => $this->request->getPost('researchtitle'),
            'submittedto' => $this->request->getPost('submittedto'),
            'subject' => $this->request->getPost('subject'),
            'author' => $this->request->getPost('author'),
            'idnumber' => $this->request->getPost('idnumber'),
            'gradelevel' => $this->request->getPost('gradelevel'),
            'section' => $this->request->getPost('section'),
            'uploaddate' => $this->request->getPost('uploaddate'),
            'abstract' => $this->request->getPost('abstract'),
            'keywords' => $this->request->getPost('keywords'),
            'citation' => $this->request->getPost('citation'),
            'status' => $this->request->getPost('status'),
            'file' => $this->request->getPost('file'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/researchpapers')->with('success', 'Research added successfully');
    }
    public function viewresearchpaper()
    {

        $data = [
            'output' => $this->output->findAll()
        ];
        return view('studentdashboardview/viewresearch', $data);
    }
    public function myresearch()
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

        return view('studentdashboardview/myresearchoutput', $data);
    }
}
