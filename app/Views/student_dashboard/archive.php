<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">My Archived Research Outputs</h2>

                <p class="card-text">These research papers are archive by you! </p>

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
                                            <?php foreach ($archive as $arc) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input">
                                                            <label class="custom-control-label"></label>
                                                        </div>
                                                    </td>
                                                    <td><?= $arc['researchtitle'] ?></td>
                                                    <td><?= $arc['submittedto'] ?></td>
                                                    <td><?= $arc['subject'] ?></td>
                                                    <td><?= $arc['author'] ?></td>
                                                    <td><?= $arc['idnumber'] ?></td>
                                                    <td><?= $arc['gradelevel'] ?></td>
                                                    <td><?= $arc['section'] ?></td>
                                                    <td><?= $arc['uploaddate'] ?></td>
                                                    <td><?= $arc['abstract'] ?></td>
                                                    <td><?= $arc['keywords'] ?></td>
                                                    <td><?= $arc['citation'] ?></td>
                                                    <td><?= $arc['status'] ?></td>
                                                    <td><?= $arc['file'] ?></td>
                                                    <td>

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