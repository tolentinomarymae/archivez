<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SectionsModel;
use App\Models\SubjectModel;
use App\Models\TeacherModel;

class AdminController extends BaseController
{
    public $output;
    public $adminmanage;
    public $secti;
    public $subject;

    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
        $this->adminmanage = new \App\Models\TeacherModel();
        $this->secti = new \App\Models\SectionsModel();
        $this->subject = new \App\Models\SubjectModel();
    }
    public function admindashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            return view('admindashboardview/admindashboard');
        }
    }
    public function adminresearchpapers()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'output' => $this->output->findAll()
            ];
            return view('admindashboardview/researchpaperview', $data);
        }
    }
    public function manageteachers()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'adminmanage' => $this->adminmanage->findAll()
            ];
            return view('admindashboardview/manageteachers', $data);
        }
    }

    public function managesection()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'secti' => $this->secti->findAll()
            ];
            return view('admindashboardview/managesections', $data);
        }
    }
    public function managesubject()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        } else {
            $data = [
                'subject' => $this->subject->findAll()
            ];
            return view('admindashboardview/managesubjects', $data);
        }
    }

    public function addteacher()
    {


        // Validate the form data
        $validation = $this->validate([
            'teachers' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('admindashboardview/manageteachers', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->adminmanage->save([
            'teachers' => $this->request->getPost('teachers'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/manageteachers')->with('success', 'Field added successfully');
    }

    public function editteacher($id)
    {
        // Load the product to be edited from the database
        $model = new TeacherModel();
        $adminmanage = $model->find($id);

        // Load the edit view with the product data
        return view('field', ['field' => $adminmanage]);
    }
    public function updateteacher()
    {
        // Handle the form submission to update the product
        $model = new TeacherModel();

        // Retrieve the field_id from the form input
        $id = $this->request->getPost('id');

        // Define the data to be updated
        $dataToUpdate = [
            'teachers' => $this->request->getPost('teachers'),
        ];

        // Update the product in the database using the update() method
        $model->update($id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/manageteachers')->with('success', 'Field updated successfully');
    }
    public function deleteteacher($id)
    {
        // Load the model
        $model = new TeacherModel();

        // Check if the product with the given field_ID exists
        $field = $model->find($id);

        if ($field) {
            // Delete the field from the database
            $model->delete($id);

            // Redirect back to the field list with a success message
            return redirect()->to('/manageteachers')->with('success', 'field deleted successfully');
        } else {
            // Redirect back to the field list with an error message if the field doesn't exist
            return redirect()->to('/manageteachers')->with('error', 'field not found');
        }
    }

    public function addsection()
    {


        // Validate the form data
        $validation = $this->validate([
            'section' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('admindashboardview/managesections', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->secti->save([
            'section' => $this->request->getPost('section'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/managesections')->with('success', 'Field added successfully');
    }

    public function editsection($id)
    {
        // Load the product to be edited from the database
        $model = new SectionsModel();
        $secti = $model->find($id);

        // Load the edit view with the product data
        return view('field', ['field' => $secti]);
    }
    public function updatesection()
    {
        // Handle the form submission to update the product
        $model = new SectionsModel();

        // Retrieve the field_id from the form input
        $id = $this->request->getPost('id');

        // Define the data to be updated
        $dataToUpdate = [
            'section' => $this->request->getPost('section'),
        ];

        // Update the product in the database using the update() method
        $model->update($id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/managesections')->with('success', 'Field updated successfully');
    }
    public function deletesection($id)
    {
        // Load the model
        $model = new SectionsModel();

        // Check if the product with the given field_ID exists
        $secti = $model->find($id);

        if ($secti) {
            // Delete the field from the database
            $model->delete($id);

            // Redirect back to the field list with a success message
            return redirect()->to('/managesections')->with('success', 'field deleted successfully');
        } else {
            // Redirect back to the field list with an error message if the field doesn't exist
            return redirect()->to('/managesections')->with('error', 'field not found');
        }
    }

    public function addsubject()
    {


        // Validate the form data
        $validation = $this->validate([
            'subjects' => 'required',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('admindashboardview/managesubject', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->subject->save([
            'subjects' => $this->request->getPost('subjects'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/managesubject')->with('success', 'Field added successfully');
    }

    public function editsubject($id)
    {
        // Load the product to be edited from the database
        $model = new SubjectModel();
        $subject = $model->find($id);

        // Load the edit view with the product data
        return view('field', ['field' => $subject]);
    }
    public function updatesubject()
    {

        // Retrieve the field_id from the form input
        $id = $this->request->getPost('id');

        // Define the data to be updated
        $dataToUpdate = [
            'subjects' => $this->request->getPost('subjects'),
        ];

        // Update the product in the database using the update() method
        $this->subject->update($id, $dataToUpdate);

        // Redirect back to the product list or a success page
        return redirect()->to('/managesubject')->with('success', 'Field updated successfully');
    }
    public function deletesubject($id)
    {
        // Load the model
        $model = new SubjectModel();

        // Check if the product with the given field_ID exists
        $subject = $model->find($id);

        if ($subject) {
            // Delete the field from the database
            $model->delete($id);

            // Redirect back to the field list with a success message
            return redirect()->to('/managesubject')->with('success', 'field deleted successfully');
        } else {
            // Redirect back to the field list with an error message if the field doesn't exist
            return redirect()->to('/managesubject')->with('error', 'field not found');
        }
    }
}
