<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {
 $client_id = $_SESSION['client_id'];
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
 <title>Profile &mdash;
  <?php echo $_SESSION['client_name']; ?>
 </title>

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
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
       <div class="breadcrumb-item">Profile</div>
      </div>
     </div>

     <div class="section-body">
      <h2 class="section-title">Hi,
       <?php echo $_SESSION['staff_name']; ?>!
      </h2>
      <p class="section-lead">Your information is your property.</p>

      <div class="row">
       <div class="col-12 mb-4">
        <div class="hero bg-primary text-white" style="background-color: #9c27b0 !important;">
         <div class="hero-inner">
          <h2>Welcome Back !!</h2>
          <p class="lead">This page is a place to know your own details.</p>
         </div>
        </div>
       </div>
      </div>
<?php
$sql = "SELECT * FROM `client_jms` WHERE client_id='$client_id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
 while($row = mysqli_fetch_array($result)){
  ?>
  <div class="row mt-sm-4">
   <div class="col-12 col-md-12 col-lg-10" style="position: relative;top: 0px;left: auto;margin: auto;">
    <div class="card profile-widget">
     <div class="profile-widget-header">
      <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
     </div>
     <div class="profile-widget-description">
      <div class="row">
       <div class="profile-widget-name"><?php echo $_SESSION['staff_name']; ?>
        <div class="text-muted d-inline font-weight-normal">
         <div class="slash"></div> Business
        </div>
       </div>
      </div>
  
      <div class="form-group mt-3">
       <div class="row" style="text-align: center;">
  
        <div class="col-4" style="margin: 5px 0px 20px 0px;">
         <label style="font-weight: 700;">Organisation Name:</label>
         <input type="text" class="form-control-plaintext" readonly="" value="<?php echo $row['client_name']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
        </div>
        <div class="col-4" style="margin: 5px 0px 20px 0px;">
         <label style="font-weight: 700;">Owner Name:</label>
         <input type="text" class="form-control-plaintext" readonly="" value="<?php echo $row['contact_person']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
        </div>
        <div class="col-4" style="margin: 5px 0px 20px 0px;">
        <label style="font-weight: 700;">Address:</label>
        <input type="text" class="form-control-plaintext" readonly="" value="<?php echo $row['client_add']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
        </div>
        <div class="col-4" style="margin: 5px 0px 20px 0px;">
        <label style="font-weight: 700;">Contact No:</label>
        <input type="text" class="form-control-plaintext" readonly="" value="<?php echo $row['client_contact']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
       </div>
       
       <div class="col-4" style="margin: 5px 0px 20px 0px;">
        <label style="font-weight: 700;">Email:</label>
        <input type="email" class="form-control-plaintext" readonly="" value="<?php echo $row['client_email']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
       </div>
       <div class="col-4" style="margin: 5px 0px 20px 0px;">
        <label style="font-weight: 700;">GST No:</label>
        <input type="text" class="form-control-plaintext" readonly="" value="<?php echo $row['client_gst']; ?>" style="text-align: center;margin-top: -10px;font-style: italic;
  font-family: sans-serif;">
       </div>
       </div>
       </div>
      </div>
     </div>
    </div>
   </div>
<?php
 }
}
?>
        <!-- <div class="col-12 col-md-12 col-lg-7">
                                <div class="card">
                                    <form method="post" class="needs-validation" novalidate="">
                                        <div class="card-header">
                                            <h4>Edit Profile</h4>
                                            <p>do you want to edit profile</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-6 col-12">
                                                    <label> Name</label>
                                                    <input type="text" class="form-control" value="" placeholder="Enter Name" required="">
                                                    <div class="invalid-feedback">Please fill in the name</div>
                                                </div>
                                                <div class="form-group col-md-6 col-12">
                                                    <label> Organisation Name</label>
                                                    <input type="text" class="form-control" value="" placeholder="Enter Business Name" required="">
                                                    <div class="invalid-feedback">Please fill in the organisation name
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-7 col-12">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" value="" placeholder="Enter Email"
                                                        required="">
                                                    <div class="invalid-feedback">Please fill in the email</div>
                                                </div>
                                                <div class="form-group col-md-5 col-12">
                                                    <label>Phone</label>
                                                    <input type="tel" class="form-control" value="" placeholder="Enter Contact Number">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6 col-6">
                                                    <label>GST Number</label>
                                                    <input type="text" class="form-control" value="" placeholder="Enter GST number"
                                                        required="">
                                                    <div class="invalid-feedback">Please fill in the Gst number</div>
                                                </div>
                                                    <div class="form-group col-md-6 col-9">
                                                        <label>Add Profile Photo</label>
                                                        <input type="file" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
       

       <div class="col-12 mb-4">
        <div class="hero align-items-center bg-success text-white" style="background-color: #673ab7 !important;">
            <div class="hero-inner text-center">
                <h2>Profile Settings</h2>
                <p class="lead">If you want to change any information then you can contact us directly.</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> Profile Settings</a>
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