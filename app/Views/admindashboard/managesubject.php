<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Manage subjects</h2>
                <p class="card-text">Add </p>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addsubjectmodal" class="btn_1">Add New</a>


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
                                                <th>ID</th>
                                                <th>Subjects</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($subject as $subj) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <label class="custom-control-label"></label>
                                                        </div>
                                                    </td>

                                                    <td><?= $subj['id'] ?></td>
                                                    <td><?= $subj['subjects'] ?></td>
                                                    <td>
                                                        <button type="button" class="bookmarkbtn" data-toggle="modal" data-target="#editsubjectmodal" onclick="openEditsubjectModal( 
                                                        <?= $subj['id']; ?>, 
                                                        '<?= $subj['subjects']; ?>' , 
                                                        )"><i class=" fe fe-edit"></i></button>

                                                        <a class="archive" onclick="deletesubject(<?= $subj['id']; ?>)"><i class=" fe fe-archive"></i></a>
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
    <div class="modal fade" id="addsubjectmodal" role="dialog" aria-labelledby="addsubjectmodalLabel" aria-hidden="true">
        <br>
        <div class="modal-dialog modal-dialog-centered" style="z-index: 10000;">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsubjectmodalLabel">Add New Subject</h5>
                </div>
                <div class="modal-body">
                    <form action="/addsubject" method="post">
                        <div class="mb-3">
                            <label for="subjects" class="form-label">Subject</label>
                            <input type="text" name="subjects" id="subjects" placeholder="Subject" class="form-control">
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

    <!-- edit_product_modal.php -->

    <div class="modal fade" id="editsubjectmodal" tabindex="-1" aria-labelledby="editsubjectmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editsubjectmodalLabel">Edit subject</h5>
                </div>
                <div class="modal-body">
                    <form action="/addsubject/update" method="post">
                        <input type="hidden" name="id" id="editid">
                        <div class="mb-3">
                            <label for="editsubjects" class="form-label">Subject:</label>
                            <input type="text" name="subjects" id="editsubjects" class="form-control">
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

        .eyebtn:hover {
            text-decoration: none !important;
        }

        .eyebtn {
            color: #b06dff;
            text-align: center;
            display: inline-block;
            font-size: 23px;
            border: none;
            margin-right: 10px;
            border-radius: 5px;
            background-color: transparent;
        }


        .eyebtn:active {
            background-color: #b06dff;
            transform: translateY(2px);
            color: white;
        }

        .bookmarkbtn {
            color: #ffd942;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 23px;
            border: none;
            border-radius: 5px;
            background-color: transparent;
        }


        .bookmarkbtn:active {
            background-color: #ffd942;
            transform: translateY(2px);
            color: white;
        }

        .bookmarkbtn:hover {
            text-decoration: none !important;
        }


        .archive {
            color: #ff0000;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 23px;
            border: none;
            border-radius: 5px;
            background-color: transparent;
        }


        .archive:active {
            transform: translateY(2px);
            color: white;

            color: #ff0000;
        }

        .archive:hover {
            text-decoration: none !important;
            color: #ff0000;
        }
    </style>