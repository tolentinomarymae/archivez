      <main role="main" class="main-content">
          <div class="container-fluid">
              <div class="row justify-content-center">
                  <div class="col-12">
                      <div class="row align-items-center mb-2">
                          <div class="col">

                              <h2 class="h5 page-title">Welcome, <?php echo session()->get('fullname'); ?>!</h2>

                          </div>
                      </div>
                      <div class="col-lg-12">
                          <div class="row my-4">
                              <div class="col-lg-4">

                                  <div class="card shadow mb-2">
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
                                  <div class="card shadow mb-2">
                                      <div class="card-body">
                                          <div class="row align-items-center">
                                              <div class="col">
                                                  <small class="text-muted mb-1">Number of Approved Research Papers</small>
                                                  <h3 class="card-title mb-0"><?= $approvedResearch ?></h3>
                                              </div>
                                              <div class="col-4 text-right">
                                                  <span class="fe fe-file-text text-danger fe-12" style="font-size: xx-large;"></span>
                                              </div>
                                          </div> <!-- /. row -->
                                      </div> <!-- /. card-body -->
                                  </div> <!-- /. card -->
                                  <div class="card shadow mb-2">
                                      <div class="card-body">
                                          <div class="row align-items-center">
                                              <div class="col">
                                                  <small class="text-muted mb-1">Total Number of Teachers</small>
                                                  <h3 class="card-title mb-0"><?= $totalTeachers ?></h3>
                                              </div>
                                              <div class="col-4 text-right">
                                                  <span class="fe fe-user-check text-warning fe-12" style="font-size: xx-large;"></span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                              <div class="col-lg-4">
                                  <div class="card shadow mb-4">
                                      <div class="card-body">
                                          <div class="row">
                                              <strong class="card-title ml-4">Grade Level with the Most Contribution</strong>
                                              <div class="my-2">
                                                  <canvas id="pieChart" width="400" height="205"></canvas>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="card shadow mb-4">
                                      <div class="card-body">
                                          <div class="row">
                                              <strong class="card-title ml-4">Number of Research Submitted to Each Teacher</strong>
                                              <div class="my-2">
                                                  <canvas id="doughnutChart" width="400" height="205"></canvas>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div> <!-- Add this in your HTML where you want the line chart to appear -->
                      <div class="my-4">
                          <!-- Add this where you want the line chart to appear -->
                          <canvas id="lineChart" width="400" height="200"></canvas>

                      </div>
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              var researchData = <?= json_encode($output) ?>;
                              var gradeLevels = {};
                              researchData.forEach(function(research) {
                                  var gradeLevel = research.gradelevel;
                                  if (gradeLevels[gradeLevel]) {
                                      gradeLevels[gradeLevel]++;
                                  } else {
                                      gradeLevels[gradeLevel] = 1;
                                  }
                              });

                              var labels = Object.keys(gradeLevels);
                              var data = Object.values(gradeLevels);

                              var ctx = document.getElementById('pieChart').getContext('2d');
                              var pieChart = new Chart(ctx, {
                                  type: 'pie',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          data: data,
                                          backgroundColor: [
                                              'rgb(176, 109, 255)',
                                              'rgba(255, 99, 132)',
                                              'rgba(54, 162, 235)',
                                              'rgba(255, 206, 86)',
                                              'rgba(75, 192, 192)',
                                              'rgba(153, 102, 255)',
                                              'rgba(255, 159, 64)',
                                          ],
                                          borderColor: [
                                              'rgba(255, 99, 132, 1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(255, 206, 86, 1)',
                                              'rgba(75, 192, 192, 1)',
                                              'rgba(153, 102, 255, 1)',
                                              'rgba(255, 159, 64, 1)',
                                          ],
                                          borderWidth: 0,
                                      }]
                                  },
                                  options: {
                                      responsive: true,
                                      maintainAspectRatio: false,
                                      legend: {
                                          position: 'top',
                                      },
                                  },
                              });
                          });
                      </script>
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              var researchData = <?= json_encode($output) ?>;
                              var sections = {};
                              researchData.forEach(function(research) {
                                  var section = research.section;
                                  if (sections[section]) {
                                      sections[section]++;
                                  } else {
                                      sections[section] = 1;
                                  }
                              });
                              var labels = Object.keys(sections);
                              var data = Object.values(sections);

                              var ctx = document.getElementById('barChart').getContext('2d');
                              var doughnutChart = new Chart(ctx, {
                                  type: 'doughnut',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          label: 'Total Research per Section',
                                          data: data,
                                          backgroundColor: [
                                              'rgb(0, 109, 176)',
                                              'rgba(255, 99, 132)',
                                              'rgba(54, 162, 235)',
                                              'rgba(255, 206, 86)',
                                              'rgba(75, 192, 192)',
                                              'rgba(153, 102, 255)',
                                              'rgba(255, 159, 64)',
                                          ],
                                          borderColor: [
                                              'rgba(255, 99, 132, 1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(255, 206, 86, 1)',
                                              'rgba(75, 192, 192, 1)',
                                              'rgba(153, 102, 255, 1)',
                                              'rgba(255, 159, 64, 1)',
                                          ],
                                          borderWidth: 0,
                                      }]
                                  },
                                  options: {
                                      responsive: true,
                                      maintainAspectRatio: false,
                                      plugins: {
                                          legend: {
                                              display: true,
                                              position: 'top',
                                          },
                                      },
                                  },
                              });
                          });
                      </script>

                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              var researchData = <?= json_encode($output) ?>;

                              var teachersData = {};
                              researchData.forEach(function(research) {
                                  var teacher = research.submittedto;
                                  if (teacher) {
                                      if (teachersData[teacher]) {
                                          teachersData[teacher]++;
                                      } else {
                                          teachersData[teacher] = 1;
                                      }
                                  }
                              });

                              var labels = Object.keys(teachersData);
                              var data = Object.values(teachersData);
                              var ctx = document.getElementById('doughnutChart').getContext('2d');
                              var doughnutChart = new Chart(ctx, {
                                  type: 'doughnut',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          data: data,
                                          backgroundColor: [
                                              'rgb(0, 84, 137)',
                                              'rgb(254, 143, 171)',
                                              'rgba(75, 192, 192)',
                                              'rgba(54, 162, 235)',
                                              'rgba(255, 206, 86)',
                                              'rgba(255, 99, 132)',
                                              'rgb(0, 109, 176)',
                                          ],
                                          borderColor: [
                                              'rgba(75, 192, 192, 1)',
                                              'rgba(54, 162, 235, 1)',
                                              'rgba(255, 206, 86, 1)',
                                              'rgba(255, 99, 132, 1)',
                                          ],
                                          borderWidth: 0,
                                      }]
                                  },
                                  options: {
                                      responsive: true,
                                      maintainAspectRatio: false,
                                      plugins: {
                                          legend: {
                                              display: true,
                                              position: 'top',
                                          },
                                      },
                                  },
                              });
                          });
                      </script>
                      <script>
                          document.addEventListener('DOMContentLoaded', function() {
                              var researchData = <?= $researchData ?>;

                              var months = {};
                              researchData.forEach(function(research) {
                                  var uploadDate = new Date(research.uploaddate);
                                  var monthYear = uploadDate.toLocaleString('en-us', {
                                      month: 'long',
                                      year: 'numeric'
                                  });

                                  if (months[monthYear]) {
                                      months[monthYear]++;
                                  } else {
                                      months[monthYear] = 1;
                                  }
                              });
                              var labels = Object.keys(months);
                              var data = Object.values(months);

                              var ctx = document.getElementById('lineChart').getContext('2d');
                              var lineChart = new Chart(ctx, {
                                  type: 'line',
                                  data: {
                                      labels: labels,
                                      datasets: [{
                                          label: 'Total Research per Month',
                                          data: data,
                                          fill: false,
                                          borderColor: 'rgba(75, 192, 192, 1)',
                                          borderWidth: 2,
                                          pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                                          pointRadius: 5,
                                          pointHoverRadius: 8,
                                      }]
                                  },
                                  options: {
                                      responsive: true,
                                      maintainAspectRatio: false,
                                      scales: {
                                          x: {
                                              grid: {
                                                  display: false
                                              }
                                          },
                                          y: {
                                              beginAtZero: true,
                                          },
                                      },
                                      plugins: {
                                          legend: {
                                              display: true,
                                              position: 'top',
                                          },
                                      },
                                  },
                              });
                          });
                      </script>