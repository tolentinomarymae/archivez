<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Research Outputs</h2>
                <p class="card-text">Refer to these research papers that was uploaded by your schoolmates. Be responsible in viewing these researches! </p>

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
                                            <?php foreach ($bookmark as $book) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <label class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td><?= $book['researchtitle'] ?></td>
                                                    <td><?= $book['submittedto'] ?></td>
                                                    <td><?= $book['subject'] ?></td>
                                                    <td><?= $book['author'] ?></td>
                                                    <td><?= $book['idnumber'] ?></td>
                                                    <td><?= $book['gradelevel'] ?></td>
                                                    <td><?= $book['section'] ?></td>
                                                    <td><?= $book['uploaddate'] ?></td>
                                                    <td><?= $book['abstract'] ?></td>
                                                    <td><?= $book['keywords'] ?></td>
                                                    <td><?= $book['citation'] ?></td>
                                                    <td><?= $book['status'] ?></td>
                                                    <td><?= $book['file'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('bookmarkdetails/' . $book['bookmark_id']) ?>" class="eyebtn"><i class="fe fe-eye"></i></a>
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
            background-color: #ff0000;
            transform: translateY(2px);
            color: white;
        }
    </style>