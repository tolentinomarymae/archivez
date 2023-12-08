    <script>
        // Function to open the edit modal and populate it with product data
        function openEditresearchModal(research_id, research_name, research_owner, research_address, research_total_area) {
            // Set the product ID and name in the modal
            document.getElementById('editresearch_id').value = research_id;
            document.getElementById('editresearch_name').value = research_name;
            document.getElementById('editresearch_owner').value = research_owner;
            document.getElementById('editresearch_address').value = research_address;
            document.getElementById('editresearch_total_area').value = research_total_area;

            // Open the modal
            $('#editresearchmodal').modal('show');
        }


        // Function to delete a product
        function deleteProduct(research_id) {
            // Confirm with the user before proceeding
            if (confirm("Are you sure you want to delete this product?")) {
                // Send an AJAX request to delete the product
                $.ajax({
                    type: 'POST',
                    url: '/viewresearchs/delete/' + research_id, // Update the URL as needed
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
            $('#addresearchmodal').on('show.bs.modal', function() {

                $('#research_name').val('');
                $('#research_owner').val('');
                $('#research_address').val('');
                $('#research_total_area').val('');
            });
        });
    </script>


    <script src="<?= base_url() ?>dashboard/js/jquery.min.js">
    </script>
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