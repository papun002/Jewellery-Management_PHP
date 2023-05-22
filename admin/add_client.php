<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['admin_logid'] == 0)) {
    header('location:logout.php');
} else {
  $_SESSION['msg'] ="";
  $admin_id = $_SESSION['admin_logid'];

  if(isset($_POST['submit'])){
    $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    $is_extension = array("jpg", "jpeg", "png");
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);  //get image extension
    
    //Validate file
    if(!file_exists($_FILES["image"]["tmp_name"])){
      $_SESSION['msg'] = "Upload Valid Image.";
      header('location:add_client.php');
    }elseif(!in_array($file_extension, $is_extension)){
      $_SESSION['msg'] = "Upload Valid Image.(JPG, JPEG, PNG) !";
      header('location:add_client.php');
    }elseif($_FILES["image"]["size"] > 800000){
      $_SESSION['msg'] = "Image size must be less then 800KB !";
      header('location:add_client.php');
    }else{

    $cname = $_POST['cname'];
    $cperson = $_POST['cperson'];
    $cmobile = $_POST['cmobile'];
    $caddress = $_POST['caddress'];
    $cemail = $_POST['cemail'];
    $cgst = $_POST['cgst'];
    $cusername = $_POST['cusername'];
    $password = $_POST['cpassword'];
    $cpassword = md5($password);
    

    $path = $_FILES["image"]["name"];
    $file = $_FILES["image"]["tmp_name"];
    $new_name = time();
    $renamefile = $new_name.".".pathinfo($path, PATHINFO_EXTENSION);
    $destination = 'clientlogo/'.$renamefile;
    if(move_uploaded_file($file, $destination)){
			$ret = mysqli_query($con, "select * from client_jms where client_contact='$cmobile'");
			$rowuser = mysqli_fetch_array($ret);
			if ($rowuser > 0) {
        $_SESSION['msg'] ='<div class="alert alert-danger alert-dismissible show fade" >
        <div class="alert-body">
            <button class="close" data-dismiss="alert"><span>&times;</span></button>
            Contact no already exists!
        </div>
    </div>';
        header('location:add_client.php');
			} else {
				$sql = mysqli_query($con, "INSERT INTO `client_jms`(`admin_id`, `client_id`, `client_name`, `contact_person`, `client_contact`, `client_add`, `client_email`, `client_gst`, `client_user`, `client_password`, `client_logo`) VALUES ('$admin_id','','$cname','$cperson','$cmobile','$caddress','$cemail','$cgst','$cusername','$cpassword','$renamefile')");
				if($sql){
					$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                    Client Added Successfully!
                </div>
            </div>';
					echo "<script>window.location = 'add_client.php';</script>";
					header ("location:add_client.php");

				}
			}
		} else {
      $_SESSION['msg'] = '<div class="alert alert-warning alert-dismissible show fade">
      <div class="alert-body">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          Error While uploading file!
      </div>
  </div>';;
        header('location:add_client.php');			
		}


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
 <title>Clients &mdash;  <?php echo $_SESSION['admin_name']; ?> </title>

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
      <h1>Clients</h1>
      <div class="section-header-breadcrumb">
       <div class="breadcrumb-item">Add Client</div>
      </div>
     </div>

     <div class="section-body">
      <h2 class="section-title">Add a new client</h2>
      <p class="section-lead">
       To add a new client enter all information.
      </p>

      <div class="row">
       <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
         <div class="card-header">
          <h4>Add Client</h4>
         </div>

         <div class="card-body">
          <?php echo $_SESSION['msg']; ?>
          <form action="" method="post" enctype="multipart/form-data">
           <div class="row">

            <div class="form-group col-4">
             <label>Organisation Name:</label>
             <input type="text" class="form-control" name="cname">
            </div>

            <div class="form-group col-4">
             <label>Contact Person:</label>
             <input type="tel" class="form-control" name="cperson">
            </div>

            <div class="form-group col-4">
             <label>Mobile Number:</label>
             <input type="tel" class="form-control" name="cmobile">
            </div>

            <div class="form-group col-12">
             <label>Address: </label>
             <input type="text" class="form-control" name="caddress">
             <small>Enter the Full Address of your Store, including street name, area,
              city, district, state and pin code</small>
            </div>

            <div class="form-group col-4">
             <label>Email:</label>
             <input type="email" class="form-control" name="cemail">
            </div>

            <div class="form-group col-4">
             <label>GST No.:</label>
             <input type="text" class="form-control" name="cgst">
            </div>

            <div class="form-group col-4">
             <label>Organisation's Logo:</label>
             <input type="file" class="form-control col-12" name="image" id="image" required>
             <small>Upload a Logo of the Client of height as 200px and width as 300px & file size should be within 400kb. </small>
            </div>

            <div class="form-group col-6">
             <label>Client Username:</label>
             <input type="text" class="form-control" name="cusername" placeholder="Set client username">
             <small>Set a unique username.</small>
            </div>

            <div class="form-group col-6">
             <label>Client Password:</label>
             <input type="password" class="form-control" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              required placeholder="Set client password">
              <small>Must contain at least one number and one uppercase and lowercase
               letter, and at least 8 or more characters</small>
            </div>




           </div>

           <button class="btn btn-primary col-12" type="submit" name="submit">Save</button>

          </form>
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