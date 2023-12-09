<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ResearchModel;

class ResearchController extends BaseController
{
    public $output;
    public $bookmark;
    public $archive;

    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
        $this->bookmark = new \App\Models\BookmarkModel();
        $this->archive = new \App\Models\ArchiveModel();
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
            return view('studentdashboardview/addresearch', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->output->save([
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

    public function researchdetails($id)
    {
        $output = $this->output->find($id);
        if ($output) {
            $data = [
                'output' => $output
            ];
            return view('studentdashboardview/viewresearch', $data);
        } else {
            return redirect()->to('/researchpapers');
        }
    }

    public function bookmarkResearch($id)
    {
        // Get the research data based on the provided ID
        $researchData = $this->output->find($id);

        // Get the currently logged-in user's ID
        $userId = session()->get('id');


        // Check if the research data exists
        if ($researchData) {
            // Insert the research data into the bookmark table using BookmarkModel
            $this->bookmark->save([
                'user_id' => $userId,
                'researchtitle' => $researchData['researchtitle'],
                'submittedto' => $researchData['submittedto'],
                'subject' => $researchData['subject'],
                'author' => $researchData['author'],
                'idnumber' => $researchData['idnumber'],
                'gradelevel' => $researchData['gradelevel'],
                'section' => $researchData['section'],
                'uploaddate' => $researchData['uploaddate'],
                'abstract' => $researchData['abstract'],
                'keywords' => $researchData['keywords'],
                'citation' => $researchData['citation'],
                'status' => $researchData['status'],
                'file' => $researchData['file'],
            ]);

            // Redirect back to the research papers view or a success page
            return redirect()->to('/researchpapers')->with('success', 'Research bookmarked successfully');
        } else {
            // Redirect to the research papers view with an error message
            return redirect()->to('/researchpapers')->with('error', 'Research not found');
        }
    }
    public function bookmarks()
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        }

        // Get the currently logged-in user's ID
        $userId = session()->get('id');

        // Fetch research papers uploaded by the logged-in user
        $data = [
            'bookmark' => $this->bookmark->where('user_id', $userId)->findAll()
        ];

        return view('studentdashboardview/mybookmarks', $data);
    }
    public function bookmarkdetails($bookmark_id)
    {
        $bookmark = $this->bookmark->find($bookmark_id);
        if ($bookmark) {
            $data = [
                'bookmark' => $bookmark
            ];
            return view('studentdashboardview/bookmarkdetails', $data);
        } else {
            return redirect()->to('/bookmarks');
        }
    }
    public function archive($id)
    {
        // Get the research data based on the provided ID
        $researchData = $this->output->find($id);

        // Check if the research data exists
        if ($researchData) {
            // Insert the research data into the archives table using ArchiveModel
            $this->archive->save([
                'user_id' => $researchData['user_id'],
                'researchtitle' => $researchData['researchtitle'],
                'submittedto' => $researchData['submittedto'],
                'subject' => $researchData['subject'],
                'author' => $researchData['author'],
                'idnumber' => $researchData['idnumber'],
                'gradelevel' => $researchData['gradelevel'],
                'section' => $researchData['section'],
                'uploaddate' => $researchData['uploaddate'],
                'abstract' => $researchData['abstract'],
                'keywords' => $researchData['keywords'],
                'citation' => $researchData['citation'],
                'status' => $researchData['status'],
                'file' => $researchData['file'],
            ]);

            // Delete the research data from the research table
            $this->output->delete($id);

            // Redirect back to the student profile or a success page
            return redirect()->to('/studentprofile')->with('success', 'Research archived successfully');
        } else {
            // Redirect to the student profile with an error message
            return redirect()->to('/studentprofile')->with('error', 'Research not found');
        }
    }
    public function archives()
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        }

        // Get the currently logged-in user's ID
        $userId = session()->get('id');

        // Fetch research papers uploaded by the logged-in user
        $data = [
            'archive' => $this->archive->where('user_id', $userId)->findAll()
        ];

        return view('studentdashboardview/archive', $data);
    }

    public function edit($id)
    {
        $model = new ResearchModel();
        $output = $model->find($id);

        // Load the edit view with the product data
        return view('output', ['output' => $output]);
    }
    public function update()
    {
        // Handle the form submission to update the product
        $model = new ResearchModel();

        // Retrieve the output_id from the form input
        $id = $this->request->getPost('id');

        // Define the data to be updated
        $dataToUpdate = [
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

        ];

        // Update the product in the database using the update() method
        $model->update($id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/studentprofile')->with('success', 'Field updated successfully');
    }
    public function profileedit($id)
    {
        // Load the product to be edited from the database
        $model = new ResearchModel();
        $field = $model->find($id);

        // Load the edit view with the product data
        return view('field', ['field' => $field]);
    }
    public function profileupdate()
    {
        // Handle the form submission to update the product
        $model = new ResearchModel();

        // Retrieve the field_id from the form input
        $id = $this->request->getPost('id');

        // Define the data to be updated
        $dataToUpdate = [
            'firstname' => $this->request->getPost('firstname'),
            'lastname' => $this->request->getPost('lastname'),
            'idnumber' => $this->request->getPost('idnumber'),
            'email' => $this->request->getPost('email'),
            'department' => $this->request->getPost('department'),
            'gradelevel' => $this->request->getPost('gradelevel'),
            'section' => $this->request->getPost('section'),
        ];

        // Update the product in the database using the update() method
        $model->update($id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/studentprofile')->with('success', 'Field updated successfully');
    }
}
