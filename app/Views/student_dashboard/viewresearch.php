<main role="main" class="main-content">
    <nav aria-label="breadcrumb" class="custom-breadcrumb">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="/researchpapers">Research Papers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Research Details</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <ul class="nav nav-pills" id="pills-tab2" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link px-3 active" id="pills-home-tab2" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home2" aria-selected="true"><span class="fe fe-user"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" id="pills-profile-tab2" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile2" aria-selected="false"><span class="fe fe-file-text"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" id="pills-contact-tab2" data-toggle="pill" href="#pills-contact2" role="tab" aria-controls="pills-contact" aria-selected="false"><span class="fe fe-16 fe-bar-chart"></span></a>
                    </li>
                </ul>
                <div class="tab-content mb-2" id="pills-tabContent2">
                    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="card-body p-1">
                                    <div class="row mb-5">
                                        <div class="col-12 text-center mt-5 mb-4">
                                            <h1 class="mb-2 text-uppercase"><?= $output['researchtitle'] ?></h1>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-muted text-uppercase mb-2">About the Author/s</h4>
                                            <p class="mb-4">
                                                Author/s: <strong><?= $output['author'] ?></strong><br /> ID Number:<strong> <?= $output['idnumber'] ?></strong><br /> Year and Section: <strong><?= $output['gradelevel'] ?> <?= $output['section'] ?></strong><br />
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="text-muted text-uppercase mb-2">About the Research</h4>
                                            <p class="mb-4">
                                                Upload Date: <strong><?= $output['uploaddate'] ?></strong><br /> Status:<strong> <?= $output['status'] ?></strong><br /> Subject: <strong><?= $output['subject'] ?></strong><br />Submitted to: <strong><?= $output['submittedto'] ?></strong><br />
                                            </p>
                                        </div>
                                    </div> <!-- /.row -->
                                    <div class="row mb-5">
                                        <div class="col-md-12">
                                            <p>Keywords: <strong><i><?= $output['keywords'] ?></i></strong></p>
                                            <p class="mb-4">Citation: <strong><i><?= $output['citation'] ?></i></strong></p>
                                            <p class="mb-4">Abstract: <strong><?= $output['abstract'] ?></strong></p><?= $output['file'] ?>
                                        </div>
                                    </div> <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-profile2" role="tabpanel" aria-labelledby="pills-home-tab2">
                        <div class="card mb-0">
                            <div class="card-body"> <iframe src="<?= base_url('uploads/' . $output['file']) ?>" width="100%" height="600px"></iframe></div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="pills-contact2" role="tabpanel" aria-labelledby="pills-home-tab2">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="col-12 text-center mt-5 mb-4">
                                    <h1 class="mb-2 text-uppercase"><?= $output['researchtitle'] ?></h1>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-muted text-uppercase mb-2">Upvotes </h4>
                                    <p class="mb-4" style="font-size: larger;"> <i class="fe fe-heart" style="color: red;"></i> <strong><?= $upvoteCount ?></strong></p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="text-muted text-uppercase mb-2">Comments </h4>
                                    <p class="mb-4" style="font-size: larger;"> <i class="fe fe-message-square" style="color: yellow;"></i> <strong><?= $commentsCount ?></strong></p>
                                </div>
                                <?php foreach ($comments as $comment) : ?>
                                    <p class="mb-4">
                                        Commented by: <?= $comment['commentedby'] ?><br>
                                        Comment: <?= $comment['comment'] ?>
                                    </p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<style>
    .breadcrumb {
        background-color: transparent;
    }

    .breadcrumb-item {
        text-decoration: none;
    }
</style>