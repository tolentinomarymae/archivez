<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

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
        // Initialize an array to store weekly counts
        $weeklyCounts = [];

        // Iterate through each research paper to calculate weekly counts
        foreach ($userResearch as $research) {
            $uploadDate = new \DateTime($research['uploaddate']);
            $weekNumber = $uploadDate->format('W'); // Get the ISO-8601 week number of year
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

        ]);


        if (!$validation) {
            // Validation failed, return to the form with errors
            return view('studentdashboardview/myprofile', ['validation' => $this->validator]);
        }

        // If validation passes, insert the data into the database
        $this->prof->save([
            'user_id' => $userId,
            'fullname' => $this->request->getPost('fullname'),
            'idnumber' => $this->request->getPost('idnumber'),
            'email' => $this->request->getPost('email'),
            'department' => $this->request->getPost('department'),
            'gradelevel' => $this->request->getPost('gradelevel'),
            'section' => $this->request->getPost('section'),
        ]);

        // Redirect to a success page or display a success message
        return redirect()->to('/studentprofile')->with('success', 'Research added successfully');
    }
}
