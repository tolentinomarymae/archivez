     <main role="main" class="main-content">
         <div class="container-fluid">
             <div class="row justify-content-center">
                 <div class="col-12">
                     <h2 class="h3 mb-1 mt-4 page-title">Profile</h2>
                     <div class="row mt-0 align-items-center">
                         <div class="col-md-3 mt-4 text-center mb-2">
                             <div class="avatar avatar-xxl">
                                 <?php foreach ($prof as $pro) : ?>
                                     <img src="<?= base_url($pro['profile_picture']) ?>" alt="Profile Picture" class="avatar-img rounded-circle" style="width: 250px; height: 250px;">
                                 <?php endforeach; ?>
                             </div>
                         </div>

                         <div class="col">
                             <div class="row align-items-center"><!--php echo session()->get('firstname'); ?> php echo session()->get('lastname'); ?>-->

                                 <div class="col-lg-5">
                                     <?php foreach ($prof as $pro) : ?>
                                         <h4 class="mb-1">Name: <?= $pro['fullname'] ?></h4>
                                         <p class="mb-1">ID Number: <?= $pro['idnumber'] ?></p>
                                         <p class="mb-1">Email: <?= $pro['email'] ?></p>
                                         <p class="mb-1">Department: <?= $pro['department'] ?></p>
                                         <p class="mb-1">Grade Level and Section: <?= $pro['gradelevel'] ?> <?= $pro['section'] ?> </p>
                                     <?php endforeach; ?>
                                     <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo">Add Profile</button>
                                     <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target="#editProfileModal" data-whatever="@mdo">Edit Profile</button>
                                 </div>
                                 <div class="col-lg-7">
                                     <div class="card shadow mb-4">
                                         <div class="card-body ">
                                             <div class="row align-items-center">
                                                 <strong class="card-title ml-4">My Research Per Subject</strong>
                                                 <div class="my-4">
                                                     <canvas id="pieChart" width="400" height="205"></canvas>
                                                 </div>
                                             </div>
                                         </div>

                                     </div>
                                 </div>
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
                                                 <form action="/addprofile" method="post" enctype="multipart/form-data">
                                                     <div class="form-group">
                                                         <label for="fullname" class="col-form-label">Full Name: </label>
                                                         <input type="text" class="form-control" id="fullname" name="fullname">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="idnumber" class="col-form-label">ID Number:</label>
                                                         <input type="text" class="form-control" id="idnumber" name="idnumber">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="email" class="col-form-label">Email:</label>
                                                         <input type="text" class="form-control" id="email" name="email">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="department" class="col-form-label">Department:</label>
                                                         <input type="text" class="form-control" id="department" name="department">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="gradelevel" class="col-form-label">Grade Level:</label>
                                                         <input type="text" class="form-control" id="gradelevel" name="gradelevel">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="section" class="col-form-label">Section:</label>
                                                         <input type="text" class="form-control" id="section" name="section">
                                                     </div>
                                                     <div class="form-group">
                                                         <label for="profile_picture" class="col-form-label">Profile Picture:</label>
                                                         <input type="file" name="profile_picture" id="profile_picture" class="form-control">
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
                             <!-- edit_product_modal.php -->

                             <div class="modal fade" id="editprofilemodal" tabindex="-1" aria-labelledby="editprofilemodalLabel" aria-hidden="true">
                                 <div class="modal-dialog modal-dialog-centered">
                                     <div class="modal-content">
                                         <div class="modal-header">
                                             <h5 class="modal-title" id="ediprofilemodalLabel">Edit profile</h5>
                                         </div>
                                         <div class="modal-body">
                                             <form action="/myprofile/update" method="post">
                                                 <input type="hidden" name="id" id="ediprofileid">
                                                 <div class="mb-3">
                                                     <label for="editprofiletitle" class="form-label">profile Title</label>
                                                     <input type="text" name="rsearchtitle" id="editprofiletitle" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editsubmittedto" class="form-label">Submitted to:</label>
                                                     <input type="text" name="submittedto" id="editsubmittedto" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editsubject" class="form-label">Subject:</label>
                                                     <input type="text" name="subject" id="editsubject" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editauthor" class="form-label">Author/s</label>
                                                     <input type="text" name="author" id="editauthor" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editidnumber" class="form-label">ID Number:</label>
                                                     <input type="text" name="idnumber" id="editidnumber" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editgradelevel" class="form-label">Grade Level:</label>
                                                     <input type="text" name="gradelevel" id="editgradelevel" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editsection" class="form-label">Section:</label>
                                                     <input type="text" name="section" id="editsection" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="edituploaddate" class="form-label">Upload Date:</label>
                                                     <input type="date" name="uploaddate" id="edituploaddate" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editabstract" class="form-label">Abstract:</label>
                                                     <textarea name="abstract" id="editabstract" class="form-control"></textarea>
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editkeywords" class="form-label">Keywords:</label>
                                                     <textarea name="keywords" id="editkeywords" class="form-control"></textarea>
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editcitation" class="form-label">Citation:</label>
                                                     <textarea name="citation" id="editcitation" class="form-control"></textarea>
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editstatus" class="form-label">Status:</label>
                                                     <input type="text" name="status" id="editstatus" class="form-control">
                                                 </div>
                                                 <div class="mb-3">
                                                     <label for="editfile" class="form-label">File:</label>
                                                     <input type="file" name="file" id="editfile" class="form-control">
                                                 </div>
                                                 <button type="submit" class="btn btn-primary">Save Changes</button>
                                                 <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                             </form>
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
                                     <?php foreach ($userResearch as $res) : ?>
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
                                                 <a href="<?= base_url('researchdetails/' . $res['id']) ?>" class="eyebtn"><i class="fe fe-eye"></i></a>
                                                 <button type="button" class="bookmarkbtn" data-toggle="modal" data-target="#editresearchmodal" onclick="openEditResearchModal( 
                                                        <?= $res['id']; ?>, 
                                                        '<?= $res['researchtitle']; ?>' , 
                                                        '<?= $res['submittedto']; ?>' , 
                                                        '<?= $res['subject']; ?>' , 
                                                        '<?= $res['author']; ?>' , 
                                                        '<?= $res['idnumber']; ?>' , 
                                                        '<?= $res['gradelevel']; ?>' , 
                                                        '<?= $res['section']; ?>' , 
                                                        '<?= $res['uploaddate']; ?>' , 
                                                        '<?= $res['abstract']; ?>' , 
                                                        '<?= $res['keywords']; ?>' , 
                                                        '<?= $res['citation']; ?>' , 
                                                        '<?= $res['status']; ?>' , 
                                                        '<?= $res['file']; ?>' 
                                                        )"><i class=" fe fe-edit"></i></button>

                                                 <a href="<?= base_url('archive/' . $res['id']) ?>" class="archive"><i class="fe fe-archive"></i></a>

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

         <!-- edit_product_modal.php -->

         <div class="modal fade" id="editresearchmodal" tabindex="-1" aria-labelledby="editresearchmodalLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="ediresearchmodalLabel">Edit Research</h5>
                     </div>
                     <div class="modal-body">
                         <form action="/myresearch/update" method="post">
                             <input type="hidden" name="id" id="editresearchid">
                             <div class="mb-3">
                                 <label for="editresearchtitle" class="form-label">Research Title</label>
                                 <input type="text" name="rsearchtitle" id="editresearchtitle" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editsubmittedto" class="form-label">Submitted to:</label>
                                 <input type="text" name="submittedto" id="editsubmittedto" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editsubject" class="form-label">Subject:</label>
                                 <input type="text" name="subject" id="editsubject" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editauthor" class="form-label">Author/s</label>
                                 <input type="text" name="author" id="editauthor" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editidnumber" class="form-label">ID Number:</label>
                                 <input type="text" name="idnumber" id="editidnumber" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editgradelevel" class="form-label">Grade Level:</label>
                                 <input type="text" name="gradelevel" id="editgradelevel" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editsection" class="form-label">Section:</label>
                                 <input type="text" name="section" id="editsection" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="edituploaddate" class="form-label">Upload Date:</label>
                                 <input type="date" name="uploaddate" id="edituploaddate" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editabstract" class="form-label">Abstract:</label>
                                 <textarea name="abstract" id="editabstract" class="form-control"></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="editkeywords" class="form-label">Keywords:</label>
                                 <textarea name="keywords" id="editkeywords" class="form-control"></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="editcitation" class="form-label">Citation:</label>
                                 <textarea name="citation" id="editcitation" class="form-control"></textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="editstatus" class="form-label">Status:</label>
                                 <input type="text" name="status" id="editstatus" class="form-control">
                             </div>
                             <div class="mb-3">
                                 <label for="editfile" class="form-label">File:</label>
                                 <input type="file" name="file" id="editfile" class="form-control">
                             </div>
                             <button type="submit" class="btn btn-primary">Save Changes</button>
                             <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </main>

     <style>
         .modal-dialog {
             max-width: 80% !important;
             /* The !important is used to override any other styles that might be applied */
         }

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
             margin-right: 10px;
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

         .archive:hover {
             text-decoration: none !important;
         }
     </style>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             // Get the data from PHP and convert it to JavaScript
             var researchPerSubject = <?php echo json_encode($researchPerSubject); ?>;

             // Get the canvas element
             var ctx = document.getElementById('pieChart').getContext('2d');

             // Create the pie chart
             var pieChart = new Chart(ctx, {
                 type: 'pie',
                 data: {
                     labels: Object.keys(researchPerSubject),
                     datasets: [{
                         data: Object.values(researchPerSubject),
                         backgroundColor: [
                             'rgba(255, 99, 132, 0.7)',
                             'rgba(54, 162, 235, 0.7)',
                             'rgba(255, 206, 86, 0.7)',
                             // Add more colors if needed
                         ],
                     }],
                 },
             });
         });
     </script>