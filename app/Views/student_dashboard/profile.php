     <main role="main" class="main-content">
         <div class="container-fluid">
             <div class="row justify-content-center">
                 <div class="col-12" style="background-color: white;">
                     <h2 class="h3 mb-1 mt-4 page-title">Profile</h2>
                     <div class="row mt-0 align-items-center">
                         <div class="col-md-3 text-center mb-2">
                             <div class="avatar avatar-xxl">
                                 <img src="<?= base_url() ?>dashboard/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
                             </div>
                         </div>
                         <div class="col">
                             <div class="row align-items-center"><!--php echo session()->get('firstname'); ?> php echo session()->get('lastname'); ?>-->
                                 <div class="col-lg-6">
                                     <h4 class="mb-1">Name: <?php echo session()->get('firstname'); ?> <?php echo session()->get('lastname'); ?> </h4>
                                     <p class="mb-1">ID Number: <?php echo session()->get('idnumber'); ?></p>
                                     <p class="mb-1">Email: <?php echo session()->get('email'); ?></p>
                                     <p class="mb-1">Department: <?php echo session()->get('department'); ?></p>
                                     <p class="mb-1">Grade Level and Section: <?php echo session()->get('gradelevel'); ?> <?php echo session()->get('section'); ?></p>
                                     <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Add Profile</button>
                                 </div>
                                 <div class="col-lg-6">
                                     <div class="card shadow mb-4">
                                         <div class="card-body">
                                             <p class="mb-0"><strong class="mb-0 text-uppercase text-muted">Contribution</strong></p>
                                             <h3 class="mb-0">$2,562.30</h3>
                                             <p class="text-muted">+18.9% Last week</p>
                                             <div class="chart-box mt-n5">
                                                 <div id="lineChartWidget"></div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-4 text-center mt-3">
                                                     <p class="mb-1 text-muted">Completions</p>
                                                     <h6 class="mb-0">26</h6>
                                                     <span class="small text-muted">+20%</span>
                                                     <span class="fe fe-arrow-up text-success fe-12"></span>
                                                 </div>
                                                 <div class="col-md-4 text-center mt-3">
                                                     <p class="mb-1 text-muted">Goal Value</p>
                                                     <h6 class="mb-0">$260</h6>
                                                     <span class="small text-muted">+6%</span>
                                                     <span class="fe fe-arrow-up text-success fe-12"></span>
                                                 </div>
                                                 <div class="col-md-4 text-center mt-3">
                                                     <p class="mb-1 text-muted">Conversion</p>
                                                     <h6 class="mb-0">6%</h6>
                                                     <span class="small text-muted">-2%</span>
                                                     <span class="fe fe-arrow-down text-danger fe-12"></span>
                                                 </div>
                                             </div>
                                         </div> <!-- .card-body -->
                                     </div> <!-- .card -->
                                 </div>
                                 <div class="col-lg-10">
                                     <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="varyModalLabel">Add Profile</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <form action="/addprofile" method="post">
                                                         <div class="form-group">
                                                             <label for="fullname" class="col-form-label">Full Name: </label>
                                                             <input type="text" class="form-control" id="fullname">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="idnumber" class="col-form-label">ID Number:</label>
                                                             <input type="text" class="form-control" id="idnumber">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="email" class="col-form-label">Email:</label>
                                                             <input type="text" class="form-control" id="email">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="department" class="col-form-label">Department:</label>
                                                             <input type="text" class="form-control" id="department">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="gradelevel" class="col-form-label">Grade Level:</label>
                                                             <input type="text" class="form-control" id="gradelevel">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="section" class="col-form-label">Section:</label>
                                                             <input type="text" class="form-control" id="section">
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="aboutme" class="col-form-label">About Me:</label>
                                                             <textarea class="form-control" id="aboutme"></textarea>
                                                         </div>
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                             <button type="submit" class="btn mb-2 btn-primary">Save</button>
                                                         </div>
                                                     </form>
                                                 </div>

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-12 mt-5">
                     <h2 class="mb-2 page-title">My Research Outputs</h2>
                     <p class="card-text">Research papers </p>
                 </div>

                 <div class="col-md-12 mt-4">
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
             </div>

         </div>
         </div>
         </div>
     </main>