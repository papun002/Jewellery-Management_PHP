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
    <title>Jewellary Management system </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        .invoice {
            background-image: linear-gradient(rgb(187, 255, 0), rgb(255, 213, 44));


        }

        .invoice-form {
            margin-bottom: 0px !important;
        }
    </style>
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
                        <h1>Invoice</h1>
                        <div class="section-header-breadcrumb">

                            <div class="breadcrumb-item">Invoice</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="invoice" id="print">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="section-1">
                                            <div class="invoice-title">
                                                <img src="assets/img/Section1.png" style="width:100%; height: auto;"
                                                    alt="Invoice">
                                                <h4> Details </h4>
                                                <div class="invoice-number"></div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="card" style="border: 1px solid black">
                                                    <div class="card-body" style="padding-bottom: 0px;">
                                                        <form action="" method="post">
                                                            <div class="row">

                                                                <div class="form-group col-8 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for=""
                                                                            style="margin: 0 8px 0  0px;"><strong>Name</strong></label>
                                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-4 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for="" style="margin: 0 8px 0  0px;"><strong>Mob</strong></label>
                                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-7 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for=""
                                                                            style="margin: 0 8px 0  0px;"><strong>Address</strong></label>
                                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-5 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for="" style="margin: 0 8px 0  0px;"><strong>Rate per 10gm. Rs.</strong></label>
                                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="card" style="border: 1px solid black">
                                                    <div class="card-body" style="padding-bottom: 0px;">
                                                        <form action="" method="post">
                                                            <div class="row">

                                                                <div class="form-group col-12 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for=""
                                                                            style="margin: 0 8px 0  0px;"><strong>Bill No.</strong></label>
                                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-12 invoice-form">
                                                                    <div class="input-group md-12 form-inline">
                                                                        <label for=""
                                                                            style="margin: 0 8px 0  0px;"><strong>Date:</strong></label>
                                                                        <input type="date" class="form-control"
                                                                            placeholder="" aria-label="" name="category"
                                                                            style="
                                                            border: none;">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <!-- //section 2--------------------------------------------------------------------------------------- -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="section-title" style="margin-top: 0px;">Order Summary</div>
                                        <!-- <p class="section-lead">All items here cannot be deleted.</p> -->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-md" border="1px"
                                                style="background: white;">
                                                <tr>
                                                    <th data-width="100">Sl No</th>
                                                    <th>DESCRIPTION OF ORNAMENTS</th>
                                                    <th class="text-center">HSN Code</th>
                                                    <th class="text-center" colspan="2">Net Weight</th>
                                                    <th class="text-center" colspan="2">Amount</th>
                                                </tr>                                           
                                                <tr>
                                                    <td>1</td>
                                                    <td>Mouse Wireless</td>
                                                    <td class="text-center">10.99</td>
                                                    <td class="text-center">4900</td>
                                                    <td class="text-right">10099</td>
                                                    <td class="text-right">10099</td>
                                                    <td class="text-right">10099</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Keyboard Wireless</td>
                                                    <td class="text-center">$20.00</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-right">$60.00</td>
                                                    <td class="text-right">$60.00</td>
                                                    <td class="text-right">$60.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Headphone Blitz TDR-3000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                    <td class="text-right">$600.00</td>
                                                </tr>
                                            </table>
                                        </div>

                                        

                                            <div class="row">

                                                <div class="col-8">
                                                    <div class="images">
                                                        <img src="assets/img/Untitled design.jpg"
                                                            alt="Terms & Conditions" style="
                                                            width: 100%;
                                                            height: auto;
                                                        ">
                                                    </div>
                                                </div>
                                                
                                                <div class="col-4">
                                                <div class="table-responsive" style="">
                                                    <table class="table table-striped table-hover table-md" border="1px"
                                                        style="background: white;  ">
                                                        <tr>
                                                            <td data-width="105" data-height="58">Rohit</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-width="105" data-height="50">Mouse Wireless</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-width="105" data-height="50">Keyboard Wireless</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-width="105" data-height="50">Headphone Blitz TDR-3000</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-width="105" data-height="58">Headphone Blitz TDR-3000</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                            <div class="invoice-title">
                                                <img src="assets/img/tuxpi.com.1661101454.jpg"
                                                    style="width:97%; height: auto; margin-left: 15px;" alt="Invoice">
                                            </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- <hr> -->
                        </div>
                        <div class="text-md-right">
                            <button class="btn btn-warning btn-icon icon-left" onclick="printBarcode('print')"><i
                                    class="fa fa-print"></i> Print</button>
                        </div>

                    </div>
                </section>
            </div>



            <!-- Call to footer part -->
            <?php include 'partials/footer.php'; ?>
        </div>
    </div>

    <script>
        function printBarcode(print) {
            var printContents = document.getElementById(print).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

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