<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">My Research Outputs</h2>
                <p class="card-text">Research papers </p>

                <div class="row my-4">
                    <!-- Small table -->
                    <div class="col-md-12">
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
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button type="button" onclick="openEditResearchModal(
                                                                    <?= $res['id']; ?>,
                                                                    '<?= $res['researchtitle']; ?>',
                                                                    '<?= $res['submittedto']; ?>',
                                                                    '<?= $res['subject']; ?>',
                                                                    '<?= $res['author']; ?>',
                                                                    '<?= $res['idnumber']; ?>',
                                                                    '<?= $res['gradelevel']; ?>',
                                                                    '<?= $res['section']; ?>',
                                                                    '<?= $res['uploaddate']; ?>',
                                                                    '<?= $res['abstract']; ?>',
                                                                    '<?= $res['keywords']; ?>',
                                                                    '<?= $res['citation']; ?>',
                                                                    '<?= $res['status']; ?>',
                                                                    '<?= $res['file']; ?>',
                                                                    )">Edit</button>
                                                            <a class="dropdown-item" href="#">Remove</a>
                                                            <a class="dropdown-item" href="<?= base_url('researchdetails/' . $res['id']) ?>">View</a>
                                                        </div>
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

    <div class="modal fade" id="editresearchmodal" tabindex="-1" aria-labelledby="editresearchmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editresearchmodalLabel">Edit Research Paper</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/myresearchoutput/update" method="post">
                        <input type="hidden" name="id" id="editresearchid">
                        <div class="mb-3">
                            <label for="editresearchtitle" class="form-label">Research Title</label>
                            <input type="text" name="researchtitle" id="editresearchtitle" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editsubmittedto" class="form-label">Teacher</label>
                            <input type="text" name="submittedto" id="editsubmittedto" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editsubject" class="form-label">Subject</label>
                            <input type="text" name="subject" id="editsubject" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editauthor" class="form-label">Author</label>
                            <input type="text" name="author" id="editauthor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editidnumber" class="form-label">ID Number</label>
                            <input type="text" name="idnumber" id="editidnumber" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editgradelevel" class="form-label">Grade Level</label>
                            <input type="text" name="gradelevel" id="editgradelevel" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editsection" class="form-label">Section</label>
                            <input type="text" name="section" id="editsection" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="edituploaddate" class="form-label">Upload Date</label>
                            <input type="date" name="uploaddate" id="edituploaddate" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editidnumber" class="form-label">ID Number</label>
                            <input type="text" name="idnumber" id="editidnumber" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editabstract" class="form-label">Abstract</label>
                            <textarea name="abstract" id="editabstract" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editkeywords" class="form-label">Keywords</label>
                            <input type="text" name="keywords" id="editkeywords" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="editcitation" class="form-label">Citation</label>
                            <textarea name="citation" id="editcitation" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editstatus" class="form-label">Status</label>
                            <textarea name="status" id="editstatus" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editfile" class="form-label">file</label>
                            <input type="text" name="file" id="editfile" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Set a fixed height for the cells */
        .table.datatables td,
        .table.datatables th {
            max-height: 100px;
            /* Adjust the height as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Set a fixed height for the table body */
        .table.datatables tbody {
            max-height: 300px;
            /* Adjust the height as needed */
            overflow-y: auto;
        }

        .btn-primary {
            position: absolute;
            top: 0;
            right: 0;
            line-height: 2rem;
            border-radius: 7px;
            cursor: pointer;
        }
    </style>