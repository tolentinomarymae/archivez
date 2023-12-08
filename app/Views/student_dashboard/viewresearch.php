<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php foreach ($output as $res) : ?>
                    <h2 class="page-title"><?= $res['researchtitle'] ?></h2>
                    <div class="col-lg-6=12 mb-4">
                        <div class="d-flex flex-row tab-icon">
                            <div class="nav flex-column nav-pills" id="v-pills-tab3" role="tablist" aria-orientation="vertical">
                                <a class="nav-link py-3 active" id="v-pills-home-tab3" data-toggle="pill" href="#v-pills-home3" role="tab" aria-controls="v-pills-home3" aria-selected="true"><span class="fe fe-16 fe-box"></span></a>
                                <a class="nav-link py-3" id="v-pills-profile-tab3" data-toggle="pill" href="#v-pills-profile3" role="tab" aria-controls="v-pills-profile3" aria-selected="false"><span class="fe fe-16 fe-archive"></span></a>
                                <a class="nav-link py-3" id="v-pills-messages-tab3" data-toggle="pill" href="#v-pills-messages3" role="tab" aria-controls="v-pills-messages3" aria-selected="false"><span class="fe fe-16 fe-coffee"></span></a>
                            </div>
                            <div class="tab-content w-100" id="v-pills-tabContent3">
                                <div class="tab-pane fade show active" id="v-pills-home3" role="tabpanel" aria-labelledby="v-pills-home-tab3">
                                    <div class="card mb-0">
                                        <div class="card-body"> submitted to</div>
                                        <img src="<?= $res['file']; ?>">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile3" role="tabpanel" aria-labelledby="v-pills-profile-tab3">
                                        <div class="card mb-0">
                                            <div class="card-body"> sdfsfsd </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages3" role="tabpanel" aria-labelledby="v-pills-messages-tab3">
                                        <div class="card mb-0">
                                            <div class="card-body"> sdfsfsdf. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    </div>
            </div>
</main>