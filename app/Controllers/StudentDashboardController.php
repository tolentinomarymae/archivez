<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use App\Models\ResearchModel;

class StudentDashboardController extends BaseController
{

    public $output;
    public $prof;
    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
        $this->prof = new \App\Models\MyProfileModel();
    }
    public function studentdashboard()
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        }

        // Fetch all research papers uploaded per week this year
        $allResearchPerWeek = $this->output
            ->select('WEEK(uploaddate) as week, COUNT(*) as count')
            ->where('YEAR(uploaddate)', date('Y'))
            ->groupBy('WEEK(uploaddate)')
            ->findAll();

        // Get the currently logged-in user's ID
        $userId = session()->get('id');

        // Get the total number of research papers
        $totalResearch = $this->output->countAllResults();
        // ito naman ay kung ilan ang inupload ni user mismo
        $ownresearch = $this->output->where('user_id', $userId)->countAllResults();
        // Get the total number of upvotes for the user's research papers
        $ownResearchIds = $this->output->where('user_id', $userId)->findAll();
        $upvotesCount = 0;

        foreach ($ownResearchIds as $research) {
            $upvotesCount += $this->output->where('user_id', $research['id'])->countAllResults();
        }

        $data = [
            'totalResearch' => $totalResearch,
            'ownresearch' => $ownResearchIds,
            'ownresearch' => $ownresearch,
            'upvotesCount' => $upvotesCount,
            'allResearchPerWeek' => $allResearchPerWeek,
        ];

        return view('studentdashboardview/studentdashboard', $data);
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
        $userResearch = $this->output->where('user_id', $userId)->findAll();
        $prof = $this->prof->where('user_id', $userId)->findAll();


        // Count the total number of research papers uploaded by the user
        $totalUserResearch = count($userResearch);

        // Initialize counters for upvotes, comments, and bookmarks
        $totalUpvotes = 0;
        $totalComments = 0;
        $totalBookmarks = 0;

        // Iterate through each research paper to calculate totals
        foreach ($userResearch as $research) {
            $totalUpvotes += $this->output->where('user_id', $research['id'])->countAllResults();
            $totalComments += $this->output->where('user_id', $research['id'])->countAllResults();
            $totalBookmarks += $this->output->where('user_id', $research['id'])->countAllResults();
        }
        $weeklyCounts = [];

        $userResearch = $this->output->where('user_id', $userId)->findAll();

        $researchPerSubject = [];

        foreach ($userResearch as $research) {
            $subject = $research['subject'];
            $researchPerSubject[$subject] = isset($researchPerSubject[$subject]) ? $researchPerSubject[$subject] + 1 : 1;
        }

        foreach ($userResearch as $research) {
            $uploadDate = new \DateTime($research['uploaddate']);
            $weekNumber = $uploadDate->format('W');
            $weeklyCounts[$weekNumber] = isset($weeklyCounts[$weekNumber]) ? $weeklyCounts[$weekNumber] + 1 : 1;
        }
        // Prepare data for the view
        $data = [
            'totalUserResearch' => $totalUserResearch,
            'totalUpvotes' => $totalUpvotes,
            'totalComments' => $totalComments,
            'totalBookmarks' => $totalBookmarks,
            'userResearch' => $userResearch,
            'weeklyCounts' => $weeklyCounts,
            'prof' => $prof,
            'researchPerSubject' => $researchPerSubject,

        ];
        return view('studentdashboardview/myprofile', $data);
    }
    public function addprofile()
    {
        // Get the user ID from the session
        $userId = session()->get('id');

        // Validate the form data
        $validation = $this->validate([
            'fullname' => 'required',
            'idnumber' => 'required',
            'email' => 'required',
            'department' => 'required',
            'gradelevel' => 'required',
            'section' => 'required',
            'profile_picture' => 'uploaded[profile_picture]|max_size[profile_picture,1024]|is_image[profile_picture]',
        ]);

        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('studentdashboardview/myprofile', ['validation' => $this->validator]);
        }

        // Upload profile picture
        $profilePicture = $this->request->getFile('profile_picture');
        $newName = $profilePicture->getRandomName();
        $profilePicture->move(ROOTPATH . 'public/uploads/profile_pictures/', $newName);

        // If validation passes, insert the data into the database
        $this->prof->save([
            'user_id' => $userId,
            'fullname' => $this->request->getPost('fullname'),
            'idnumber' => $this->request->getPost('idnumber'),
            'email' => $this->request->getPost('email'),
            'department' => $this->request->getPost('department'),
            'gradelevel' => $this->request->getPost('gradelevel'),
            'section' => $this->request->getPost('section'),
            'profile_picture' => 'uploads/profile_pictures/' . $newName,
        ]);

        // Retrieve the newly added profile data
        $prof = $this->prof->where('user_id', $userId)->findAll();

        // Update the $prof variable in the session
        $this->prof = $prof;
        // Update the $prof variable in the session
        $session = session();
        $session->set('prof', $prof);

        // Redirect to the profile page with the profile data
        return redirect()->to('/studentprofile')->with('success', 'Profile added successfully');
    }
    public function myresearchedit($id)
    {
        $model = new ResearchModel();

        // Retrieve the logged-in user's ID
        $userId = session()->get('id');

        // Find the research entry with the given $id and belonging to the logged-in user
        $output = $model->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        // Check if the research entry exists and belongs to the logged-in user
        if (!$output) {
            // Redirect back or show an error indicating that the user cannot access this entry
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        // Load the edit view with the research data
        return view('output', ['output' => $output]);
    }

    public function myresearchupdate()
    {
        // Handle the form submission to update the product
        $model = new ResearchModel();

        // Retrieve the output_id from the form input
        $id = $this->request->getPost('id');

        // Check if the research entry belongs to the logged-in user
        $userId = session()->get('id');
        $research = $model->find($id);

        if (!$research || $research['user_id'] != $userId) {
            // Redirect back or show an error indicating that the user cannot update this entry
            return redirect()->back()->with('error', 'Unauthorized access');
        }

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
}
