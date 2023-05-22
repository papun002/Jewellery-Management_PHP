<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {
    $client_id = $_SESSION['client_id'];
    // if(isset($_POST['submit'])){
    //     $category = $_POST['category'];
    //     $sql = "SELECT * FROM `category_jms` WHERE category_name='$category' AND client_id='$client_id';";
    //     $result = mysqli_query($con,$sql);
    //     if(mysqli_num_rows($result)>0){
    //         // echo "<script>
    //         // alert('Categorya already exist..!');
    //         // </script>";
    //         ?>
    //             <script>
    //                 // swal('Good Job', 'Categorya already exist!', 'warning');
    //             alert('Categorya already exist..!');
    //             </script>
    //         <?php    
    //     } else {
    //         $sql1 = "INSERT INTO `category_jms` VALUES ('','$client_id', '$category');";
    //         $result1 = mysqli_query($con,$sql1);
    //         if($result1){
    //             ?>
    //                 <script>
    //                     // swal('Good Job', 'Category has been added!', 'success');
    //                     alert('DONE ! Categorya has been added..');
    //                 </script>
    //             <?php   
                
    //         }
    //     }

    // }

?>

<!DOCTYPE html>
<html lang="en">

<!--   //Jewellary Management system powered by JMS -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Stock &mdash;
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
                        <h1>Stock</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item">Category</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">All Categories</h2>
                        <p class="section-lead">All category as per your products.</p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">

                                <!-- <div class="card">
                                    <div class="card-header">
                                        <h4>Add Category</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="section-title mt-0">Category</div>
                                        <form action="" method="post">
                                            <div class="row" >
                                                <div class="form-group col-12">
                                                    <div class="input-group md-12">
                                                        <input type="text" class="form-control" placeholder="" aria-label="" name="category">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit" name="submit">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->


                                <div class="card">
                                    <div class="card-header">
                                        <h4>View Categories</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="section-title mt-0">Latest Categories</div>
                                        <div class="row col-12">
<?php
$sql2 = "SELECT `category_name` FROM `category_jms` WHERE client_id='$client_id';";
$result2 = mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0){
    ?>
    <ul class="list-group col-12 ">
        <?php
    while($row = mysqli_fetch_array($result2)){
        ?>
        <li class="list-group-item d-flex justify-content-between align-items-center"> <?php echo $row['category_name']; ?><span class="badge badge-primary badge-pill">55 </span></li>
    <?php
    }
    ?>
    </ul>
    <?php
}else{
    ?>
<ul class="list-group col-12 ">
<li class="list-group-item d-flex justify-content-between align-items-center">No Categories found</li>
</ul>
    <?php
}
?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Call to footer part -->
    <?php include 'partials/footer.php'; ?>
    </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/jms.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
   

    <!-- Page Specific JS File -->
    <script src="js/page/modules-sweetalert.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->

</html>
<?php  
}
?>