<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class InstructorController extends BaseController
{
    public $output;
    public $bookmark;
    public $archive;
    public $secti;
    public $adminmanage;
    public $subject;
    public $comments;
    public $upvote;


    public function __construct()
    {
        $this->output = new \App\Models\ResearchModel();
        $this->bookmark = new \App\Models\BookmarkModel();
        $this->archive = new \App\Models\ArchiveModel();
        $this->secti = new \App\Models\SectionsModel();
        $this->adminmanage = new \App\Models\TeacherModel();
        $this->subject = new \App\Models\SubjectModel();
        $this->comments = new \App\Models\CommentsModel();
        $this->upvote = new \App\Models\UpvoteModel();
    }
    public function instructordashboard()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/logins');
        }

        $allResearchPerWeek = $this->output
            ->select('WEEK(uploaddate) as week, COUNT(*) as count')
            ->where('YEAR(uploaddate)', date('Y'))
            ->groupBy('WEEK(uploaddate)')
            ->findAll();

        $userId = session()->get('id');
        $output = $this->output->findAll();
        $totalResearch = $this->output->countAllResults();
        $ownresearch = $this->output->where('user_id', $userId)->countAllResults();
        $approvedResearch = $this->output->where('status', 'approved')->countAllResults();
        $commentedResearch = $this->comments->where('commentedby', $userId)->countAllResults();
        $ownResearchIds = $this->output->where('user_id', $userId)->findAll();
        $upvotesCount = 0;

        foreach ($ownResearchIds as $research) {
            $upvotesCount += $this->output->where('user_id', $research['id'])->countAllResults();
        }

        $data = [
            'totalResearch' => $totalResearch,
            'ownResearchIds' => $ownResearchIds,
            'ownresearch' => $ownresearch,
            'upvotesCount' => $upvotesCount,
            'allResearchPerWeek' => $allResearchPerWeek,
            'output' => $output,
            'researchData' => json_encode($output), // Pass the research data to the view
            'approvedResearch' => $approvedResearch,
            'commentedResearch' => $commentedResearch,
        ];

        return view('instructordashboardview/instructordashboard', $data);
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
            // Get the total upvotes for the research
            $upvoteCount = $this->upvote->where('research_id', $id)->countAllResults();
            $comments = $this->comments->where('research_id', $id)->findAll();

            // Count the number of comments
            $commentsCount = count($comments);
            // Pass data to the view
            $data = [
                'output' => $output,
                'upvoteCount' => $upvoteCount,
                'comments' => $comments, // Pass the comments data
                'commentsCount' => $commentsCount,
            ];
            return view('instructordashboardview/viewresearch', $data);
        } else {
            return redirect()->to('/instructorresearchpapers');
        }
    }
}
