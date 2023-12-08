<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="mb-2 page-title">Research Outputs</h2>
                <a href="/insertresearch" class="btn btn-primary">Add New</a>

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
                                                            <a class="dropdown-item" href="/">Edit</a>
                                                            <a class="dropdown-item" href="#">Remove</a>
                                                            <a class="dropdown-item" href="/viewresearch?id=<?= $res['id'] ?>"">View</a>
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