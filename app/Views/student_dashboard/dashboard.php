      <main role="main" class="main-content">
          <div class="container-fluid">
              <div class="row justify-content-center">
                  <div class="col-12">
                      <div class="row align-items-center mb-2">
                          <div class="col">

                              <h2 class="h5 page-title">Welcome, <?php echo session()->get('fullname'); ?>!</h2>

                          </div>
                      </div>
                      <!-- widgets -->
                      <div class="row my-4">
                          <div class="col-md-4">
                              <div class="card shadow mb-4">
                                  <div class="card-body">
                                      <div class="row align-items-center">
                                          <div class="col">
                                              <small class="text-muted mb-1">Total Number of Research Papers</small>
                                              <h3 class="card-title mb-0"><?= $totalResearch ?></h3>
                                          </div>
                                          <div class="col-4 text-right">
                                              <span class="fe fe-database text-success fe-12" style="font-size: xx-large;"></span>
                                          </div>
                                      </div> <!-- /. row -->
                                  </div> <!-- /. card-body -->
                              </div> <!-- /. card -->
                          </div> <!-- /. col -->
                          <div class="col-md-4">
                              <div class="card shadow mb-4">
                                  <div class="card-body">
                                      <div class="row align-items-center">
                                          <div class="col">
                                              <small class="text-muted mb-1">My Research Papers</small>
                                              <h3 class="card-title mb-0"><?= $ownresearch ?></h3>
                                          </div>
                                          <div class="col-4 text-right">
                                              <span class="fe fe-file-text text-warning fe-12" style="font-size: xx-large;"></span>
                                          </div>
                                      </div> <!-- /. row -->
                                  </div> <!-- /. card-body fe-database-->
                              </div> <!-- /. card -->
                          </div> <!-- /. col -->
                          <div class="col-md-4">
                              <div class="card shadow mb-4">
                                  <div class="card-body">
                                      <div class="row align-items-center">
                                          <div class="col">
                                              <small class="text-muted mb-1">Upvotes Received</small>
                                              <h3 class="card-title mb-0"><?= $upvotesCount ?></h3>
                                          </div>
                                          <div class="col-4 text-right">
                                              <span class="fe fe-heart text-danger fe-12" style="font-size: xx-large;"></span>
                                          </div>
                                      </div> <!-- /. row -->
                                  </div> <!-- /. card-body -->
                              </div> <!-- /. card -->
                          </div> <!-- /. col -->
                      </div> <!-- end section -->
                      <!-- linechart -->

                      <!--<div class="my-4">
                          <div id="lineChart"></div>
                      </div>-->
                      <!-- Add this where you want the chart to appear -->
                      <div class="my-4">
                          <canvas id="lineChart" width="400" height="100"></canvas>
                      </div>

                      <!-- Add this in the script section of your HTML -->
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              // Get the data from your controller
                              var allResearchPerWeek = <?= json_encode($allResearchPerWeek) ?>;

                              // Extracting labels and data for the chart
                              var labels = allResearchPerWeek.map(function(item) {
                                  return 'Week ' + item.week;
                              });

                              var data = allResearchPerWeek.map(function(item) {
                                  return item.count;
                              });

                              // Create a line chart
                              var ctx = document.getElementById('lineChart').getContext('2d');
                              var lineChart = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          label: 'Research Statistics',
                                          data: data,
                                          borderColor: 'rgba(75, 192, 192, 1)',
                                          borderWidth: 2,
                                          pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                      }]
                                  },
                                  options: {
                                      scales: {
                                          y: {
                                              beginAtZero: true
                                          }
                                      }
                                  }
                              });
                          });
                      </script>