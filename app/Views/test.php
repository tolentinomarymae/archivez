                    <!-- Small table -->
                    <div class="col-md-12">
                        <a href="/inserttest" class="btn btn-primary">Add New</a>

                        <div class="card shadow">
                            <div class="card-body">
                                <!-- table -->
                                <div class="table-responsive">
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Research Title</th>
                                                <th>Submitted To</th>
                                                <th>Subject</th>
                                                <th>Author/s</th>
                                                <th>ID Number</th>
                                                <th>Grade Level</th>
                                                <th>Section</th>
                                                <th>Upload Date</th>
                                                <th>Abstract</th>
                                                <th>Keywords</th>
                                                <th>Citation/s</th>
                                                <th>Status</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($output as $res) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <label class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td><?= $res['researchtitle'] ?></td>
                                                    <td><?= $res['submittedto'] ?></td>
                                                    <td><?= $res['subject'] ?></td>
                                                    <td><?= $res['author'] ?></td>
                                                    <td><?= $res['idnumber'] ?></td>
                                                    <td><?= $res['gradelevel'] ?></td>
                                                    <td><?= $res['section'] ?></td>
                                                    <td><?= $res['uploaddate'] ?></td>
                                                    <td><?= $res['abstract'] ?></td>
                                                    <td><?= $res['keywords'] ?></td>
                                                    <td><?= $res['citation'] ?></td>
                                                    <td><?= $res['status'] ?></td>
                                                    <td><?= $res['file'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('instructorresearchdetails/' . $res['id']) ?>" class="eyebtn"><i class="fe fe-eye"></i></a>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#addcommentmodal" class="bookmarkbtn"><i class="fe fe-message-square"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                    </div> <!-- end section -->
                    </div> <!-- .col-12 -->
                    </div> <!-- .row -->
                    </div> <!-- .container-fluid -->
                    <!-- Add Product Modal -->
                    <div class="modal fade" id="addcommentmodal" role="dialog" aria-labelledby="addcommentmodalLabel" aria-hidden="true">
                        <br>
                        <div class="modal-dialog modal-dialog-centered" style="z-index: 10000;">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addcommentmodalLabel">Add Comment</h5>
                                </div>
                                <div class="modal-body">
                                    <form action="/addcomment" method="post">
                                        <div class="mb-3">
                                            <label for="commentedby" class="form-label">Commented By:</label>
                                            <input type="text" name="commentedby" id="commentedby" placeholder="Full Name" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="comment" class="form-label">Comment:</label>
                                            <textarea name="comment" id="comment" placeholder="Full Name" class="form-control"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>