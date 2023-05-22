<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['client_logid'] == 0)) {
    header('location:logout.php');
} else {

    $client_id = $_SESSION['client_logid'];

    //Check subscription Status-----------
    $sql4 = "SELECT * FROM client_sub_jms WHERE client_id='$client_id'";
    $result4 = mysqli_query($con,$sql4);
    if($result4){
        $row4 = mysqli_fetch_array($result4);
        if($row4['sub_status'] == "Not Active"){
            $_SESSION['status'] = '<div class="row">
            <div class="col-12 mb-4">
             <div class="hero bg-primary text-white" style="background-color: #9c27b0 !important;">
              <div class="hero-inner">
               <h2>Activation Pending !!</h2>
               <p class="lead">Your Plan is not activated yet.</p>
              </div>
             </div>
            </div>
           </div>';
        }else if($row4['sub_status'] == "Expire"){
            $_SESSION['status'] = '<div class="row">
            <div class="col-12 mb-4">
             <div class="hero bg-primary text-white" style="background-color: #9c27b0 !important;">
              <div class="hero-inner">
               <h2>Subscription Expire !!</h2>
               <p class="lead">Your Plan is expired, Choose a new plan.</p>
              </div>
             </div>
            </div>
           </div>';
        }else{
            $_SESSION['Active'];
                                // next page script 
                                header("location:client_dashboard.php");
                                echo "<script> window.location.href = 'client_dashboard.php'; </script>";    
                                exit();
        }

    }

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
    <title>Dashboard &mdash; <?php echo $_SESSION['client_name']; ?></title>

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
        <?php include 'partials/left-sidebar1.php'; ?>

        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                 <div class="section-header">
                      <h1>Dashboard</h1>
                      <div class="section-header-breadcrumb">                           
                           <div class="breadcrumb-item">Choose Plan</div>
                      </div>
                 </div>
                 <?php echo $_SESSION['status']; ?>
                 <div class="section-body">
                 <h2 class="section-title">Subscription Plan</h2>
                 <p class="section-lead">You do not have choose any plan yet, please choose a suitable plan from below.</p>

                 <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing">
                            <div class="pricing-title">Monthly</div>
                            <div class="pricing-padding">
                                <div class="pricing-price">
                                    <div>₹499.00</div>
                                    <div>per month</div>
                                </div>
                                <div class="pricing-details">
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">1 Staff</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">All features</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">1GB Storage</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">2 Custom Modules</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon bg-danger text-white"><i class="fa fa-times"></i></div>
                                        <div class="pricing-item-label">Live Support</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-cta">
                                <a href="#">Subscribe <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing pricing-highlight">
                            <div class="pricing-title">Half-Yearly</div>
                            <div class="pricing-padding">
                                <div class="pricing-price">
                                    <div>₹449.00</div>
                                    <div>per month</div>
                                </div>
                                <div class="pricing-details">
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">5 Staff</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">All features</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">5GB Storage</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">3 Custom Module</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">24/7 Support</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-cta">
                                <a href="#">Subscribe <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="pricing">
                            <div class="pricing-title">Yearly</div>
                            <div class="pricing-padding">
                                <div class="pricing-price">
                                    <div>₹409.00</div>
                                    <div>per month</div>
                                </div>
                                <div class="pricing-details">
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">10 Staff</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">All Features</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">10GB Storage</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">4 Custom Module</div>
                                    </div>
                                    <div class="pricing-item">
                                        <div class="pricing-item-icon"><i class="fa fa-check"></i></div>
                                        <div class="pricing-item-label">24/7 Support</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-cta">
                            <a href="#">Subscribe <i class="fa fa-arrow-right"></i></a>
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