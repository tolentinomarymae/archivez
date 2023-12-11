<script>
    function openEditProfile(id, firstname, lastname, idnumber, email, department, gradelevel, section) {
        // Set the product ID and name in the modal
        document.getElementById('editid').value = id;
        document.getElementById('editfirstname').value = firstname;
        document.getElementById('editlastname').value = lastname;
        document.getElementById('editidnumber').value = idnumber;
        document.getElementById('editemail').value = email;
        document.getElementById('editdepartment').value = department;
        document.getElementById('editgradelevel').value = gradelevel;
        document.getElementById('editsection').value = section;

        // Open the modal
        $('#varymodal').modal('show');
    }

    function openEditResearchModal(id, researchtitle, submittedto, subject, author, idnumber, gradelevel, section, uploaddate, abstract, keywords, citation, status, file) {
        // Set the product ID and name in the modal
        document.getElementById('editresearchid').value = id;
        document.getElementById('editresearchtitle').value = researchtitle;
        document.getElementById('editsubmittedto').value = submittedto;
        document.getElementById('editsubject').value = subject;
        document.getElementById('editauthor').value = author;
        document.getElementById('editidnumber').value = idnumber;
        document.getElementById('editgradelevel').value = gradelevel;
        document.getElementById('editsection').value = section;
        document.getElementById('edituploaddate').value = uploaddate;
        document.getElementById('editabstract').value = abstract;
        document.getElementById('editkeywords').value = keywords;
        document.getElementById('editcitation').value = citation;
        document.getElementById('editstatus').value = status;
        document.getElementById('editfile').value = file;
        // Open the modal
        $('#editresearchmodal').modal('show');
    }
</script>

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