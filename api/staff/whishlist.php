<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {

?>


<!DOCTYPE html>
<html lang="en">

<!-- //Jewellary Management system powered by JMS -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Whishlist &mdash; <?php echo $_SESSION['client_name']; ?> </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Libraries -->


    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Call to top navbar -->
        <?php include 'partials/top-navbar.php'; ?>

        <!-- Call to main left sidebar menu -->
        <?php include 'partials/left-sidebar.php'; ?>

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                 <div class="section-header">
                      <h1>Orders & Lists</h1>
                      <div class="section-header-breadcrumb">
                           <div class="breadcrumb-item">Whishlist</div>
                      </div>
                 </div>

                 <div class="section-body">
                     
                </div>
            </section>
        </div>

        

        <!-- Call to footer part -->
        <?php include 'partials/footer.php'; ?>
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/jms.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php
}
?>