<script>
    // Function to open the edit modal and populate it with product data
    function openEditTeacherModal(id, teachers) {
        // Set the product ID and name in the modal
        document.getElementById('editid').value = id;
        document.getElementById('editteachers').value = teachers;

        // Open the modal
        $('#editteachermodal').modal('show');
    }


    // Function to delete a product
    function deleteteacher(id) {
        // Confirm with the user before proceeding
        if (confirm("Are you sure you want to delete this data?")) {
            // Send an AJAX request to delete the product
            $.ajax({
                type: 'POST',
                url: '/manageteachers/delete/' + id, // Update the URL as needed
                success: function(response) {
                    // Reload the page or update the table as needed
                    window.location.reload(); // Reload the page for simplicity
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle errors if needed
                }
            });
        }
    }

    $(document).ready(function() {
        $('#addteachermodal').on('show.bs.modal', function() {

            $('#teachers').val('');
        });
    });


    // section

    // Function to open the edit modal and populate it with product data
    function openEditSectionModal(id, section) {
        // Set the product ID and name in the modal
        document.getElementById('editid').value = id;
        document.getElementById('editsection').value = section;

        // Open the modal
        $('#editsectionmodal').modal('show');
    }


    // Function to delete a product
    function deletesection(id) {
        // Confirm with the user before proceeding
        if (confirm("Are you sure you want to delete this data?")) {
            // Send an AJAX request to delete the product
            $.ajax({
                type: 'POST',
                url: '/managesection/delete/' + id, // Update the URL as needed
                success: function(response) {
                    // Reload the page or update the table as needed
                    window.location.reload(); // Reload the page for simplicity
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle errors if needed
                }
            });
        }
    }

    $(document).ready(function() {
        $('#addsectionmodal').on('show.bs.modal', function() {

            $('#section').val('');
        });
    });

    // subject

    // Function to open the edit modal and populate it with product data
    function openEditsubjectModal(id, subjects) {
        // Set the product ID and name in the modal
        document.getElementById('editid').value = id;
        document.getElementById('editsubjects').value = subjects;

        // Open the modal
        $('#editsubjectmodal').modal('show');
    }


    // Function to delete a product
    function deletesubject(id) {
        // Confirm with the user before proceeding
        if (confirm("Are you sure you want to delete this data?")) {
            // Send an AJAX request to delete the product
            $.ajax({
                type: 'POST',
                url: '/managesubjects/delete/' + id, // Update the URL as needed
                success: function(response) {
                    // Reload the page or update the table as needed
                    window.location.reload(); // Reload the page for simplicity
                },
                error: function(error) {
                    console.error('Error:', error);
                    // Handle errors if needed
                }
            });
        }
    }

    $(document).ready(function() {
        $('#addsubjectmodal').on('show.bs.modal', function() {

            $('#subjects').val('');
        });
    });
</script>

<!-- Add this line to include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>dashboard/js/jquery.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/popper.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/moment.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/simplebar.min.js"></script>
<script src='<?= base_url() ?>js/daterangepicker.js'></script>
<script src='<?= base_url() ?>js/jquery.stickOnScroll.js'></script>
<script src="<?= base_url() ?>dashboard/js/tinycolor-min.js"></script>
<script src="<?= base_url() ?>dashboard/js/config.js"></script>
<script src="<?= base_url() ?>dashboard/js/d3.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/topojson.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/datamaps.all.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/datamaps-zoomto.js"></script>
<script src="<?= base_url() ?>dashboard/js/datamaps.custom.js"></script>
<script src="<?= base_url() ?>dashboard/js/Chart.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/apps.js"></script>
<script src="<?= base_url() ?>dashboard/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/dataTables.bootstrap4.min.js"></script>
<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        "lengthMenu": [
            [16, 32, 64, -1],
            [16, 32, 64, "All"]
        ]
    });
</script>
<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="<?= base_url() ?>dashboard/js/gauge.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/apexcharts.min.js"></script>
<script src="<?= base_url() ?>dashboard/js/apexcharts.custom.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>

</html>