<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['client_logid'] == 0)) {
    header('location:logout.php');
} else {

?>


<!DOCTYPE html>
<html lang="en">

<!-- index-0.html  Tue, 07 Jan 2020 03:35:33 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Dashboard &mdash; <?php echo $_SESSION['client_name']; ?></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
<link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
<link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">

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
                        <h1>Dashboard</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-primary">
                                    <i class="fa fa-first-order icon"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Order</h4>
                                    </div>
                                    <div class="card-body">
                                        10
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fa fa-newspaper"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Selling Amount</h4>
                                    </div>
                                    <div class="card-body">
                                        42
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-warning">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Exchange Reports</h4>
                                    </div>
                                    <div class="card-body">
                                        1,201
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-success">
                                    <i class="fa fa-circle"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Selling Histories</h4>
                                    </div>
                                    <div class="card-body">
                                        47
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Analysis</h4>
                                    <div class="card-header-action">
                                        <button class="btn btn-sm btn-outline-secondary mr-1" id="one_month">1M</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1"
                                            id="six_months">6M</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1" id="one_year"
                                            class="active">1Y</button>
                                        <button class="btn btn-sm btn-outline-secondary mr-1" id="ytd">YTD</button>
                                        <button class="btn btn-sm btn-outline-secondary" id="all">ALL</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="statistic-details mb-sm-4">
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fa fa-caret-up"></i></span> 7%</span>
                                            <div class="detail-value">$243</div>
                                            <div class="detail-name">Today's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-danger"><i
                                                        class="fa fa-caret-down"></i></span> 23%</span>
                                            <div class="detail-value">$2,902</div>
                                            <div class="detail-name">This Week's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fa fa-caret-up"></i></span>9%</span>
                                            <div class="detail-value">$12,821</div>
                                            <div class="detail-name">This Month's Sales</div>
                                        </div>
                                        <div class="statistic-details-item">
                                            <span class="text-muted"><span class="text-primary"><i
                                                        class="fa fa-caret-up"></i></span> 19%</span>
                                            <div class="detail-value">$92,142</div>
                                            <div class="detail-name">This Year's Sales</div>
                                        </div>
                                    </div>
                                    <div id="apex-timeline-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
        </div>
        
        <!-- Call to footer part -->
        <?php include 'partials/footer.php'; ?>
    </div>
</div>

<!-- General JS Scripts -->
<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/apexcharts/apexcharts.min.js"></script>
<script src="assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
<script src="assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="assets/modules/summernote/summernote-bs4.js"></script>
<script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="js/page/index-0.js"></script>

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- index-0.html  Tue, 07 Jan 2020 03:35:42 GMT -->
</html>

<?php  
}
?>