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

<!--   //Jewellary Management system powered by JMS -->

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
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/components.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <style>
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
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
                        <h1>Dashboard</h1>
                    </div>

                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 ">
                        <div class="card card-statistic-2 bg">
                          <!-- <div class="card-chart">
                            <canvas id="balance-chart" height="80"></canvas>
                          </div> -->
                          <div class="card-icon shadow-primary bg-secondary">
                          <button id="myBtn" class="bg-secondary" style="border: none;"><i class="fa fa-sellsy"></i></button>
                          </div>
                          <div class="card-wrap">
                            <div class="card-header">
                              <h4 style="color: black;">Today Gold Rate</h4>
                            </div>
                            <div class="card-body">₹10000</div>
                          </div>
                        </div>                        
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card card-statistic-2">
                          <!-- <div class="card-chart">
                            <canvas id="balance-chart" height="80"></canvas>
                          </div> -->
                          <div class="card-icon shadow-primary bg-secondary">
                            <i class="fa fa-sellsy"></i>
                          </div>
                          <div class="card-wrap">
                            <div class="card-header">
                              <h4 style="color: black ;">Today Silver Rate</h4>
                            </div>
                            <div class="card-body">₹10000</div>
                          </div>
                        </div>                        
                      </div>

                        <!-- Call to order statistics-->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card card-statistic-2">
                            <div class="card-stats">
                              <div class="card-stats-title">
                                Order Statistics 
                                <!-- <div class="dropdown d-inline">
                                  <a
                                    class="font-weight-600 dropdown-toggle"
                                    data-toggle="dropdown"
                                    href="#"
                                    id="orders-month"
                                    >August</a>
                                  <ul class="dropdown-menu dropdown-menu-sm">
                                    <li class="dropdown-title">Select Month</li>
                                    <li><a href="#" class="dropdown-item">January</a></li>
                                    <li><a href="#" class="dropdown-item">February</a></li>
                                    <li><a href="#" class="dropdown-item">March</a></li>
                                    <li><a href="#" class="dropdown-item">April</a></li>
                                    <li><a href="#" class="dropdown-item">May</a></li>
                                    <li><a href="#" class="dropdown-item">June</a></li>
                                    <li><a href="#" class="dropdown-item">July</a></li>
                                    <li><a href="#" class="dropdown-item active">August</a></li>
                                    <li><a href="#" class="dropdown-item">September</a></li>
                                    <li><a href="#" class="dropdown-item">October</a></li>
                                    <li><a href="#" class="dropdown-item">November</a></li>
                                    <li><a href="#" class="dropdown-item">December</a></li>
                                  </ul>
                                </div> -->
                              </div>

                              <div class="card-stats-items">
                                <div class="card-stats-item">
                                  <?php
$sql = "SELECT * FROM `order_jms` WHERE client_id= $client_id and order_status = 'pending';";
$result = mysqli_query($con, $sql);
if($result){
  $row = mysqli_num_rows($result);

?>
                                  <div class="card-stats-item-count"><?php echo $row; ?></div>
                                  
                                  <?php
}else{
  ?>
                                  <div class="card-stats-item-count">0</div> 
  <?php
}
                                  ?> 
                                  <div class="card-stats-item-label">Pending</div>     
                                </div>

                                <div class="card-stats-item">
                                <?php
$sql1 = "SELECT * FROM `order_jms` WHERE client_id= $client_id and order_status = 'completed';";
$result1 = mysqli_query($con, $sql1);
if($result1){
  $row1 = mysqli_num_rows($result1);

?>                              
                                  <div class="card-stats-item-count"><?php echo $row1; ?></div>                                     
                                  <?php
}else{
  ?>
                                  <div class="card-stats-item-count">0</div> 
  <?php
}
                                  ?>  
                                  <div class="card-stats-item-label">Completed</div>                            
                                </div>
                              </div>
                            </div>
                            <div class="card-icon shadow-primary bg-secondary">
                              <i class="fa fa-archive"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Total Orders</h4>
                              </div>
                              <?php
                              $sql2 = "SELECT * FROM `order_jms` WHERE client_id = $client_id";
                              $result2 = mysqli_query($con, $sql2);
                              if($result2){  
                              $row2 = mysqli_num_rows($result2);                            
                                ?>                              
                                <div class="card-body"><?php echo $row2; ?></div>
                                <?php
                              }else{
                                ?>                              
                                <div class="card-body">0</div>
                                <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      
                        <!-- Call to selling amount-->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card card-statistic-2">
                            <div class="card-chart">
                              <canvas id="balance-chart" height="80"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-secondary">
                              <i class="fa fa-sellsy"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header">
                                <h4>Selling Amount</h4>
                              </div>
                              <?php
                              $date = date('Y-m-d');
$sql3 = "SELECT sum(pdt_bal) FROM `cus_details_jms` WHERE client_id = $client_id and jdate='$date'";
$result3 = mysqli_query($con, $sql3);

if(mysqli_num_rows($result3)>0){
  while($row3= mysqli_fetch_assoc($result3)){       
  ?>
  <div class="card-body">
    <?php echo "₹".$row3['sum(pdt_bal)']; ?>
  </div>
  <?php
  }
}else {
  ?>
  <div class="card-body">0</div>
  <?php
}
?>
                            </div>
                          </div>
                        </div>
                        <!-- Call to selling product-->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                          <div class="card card-statistic-2">
                            <div class="card-chart">
                              <canvas id="sales-chart" height="80"></canvas>
                            </div>
                            <div class="card-icon shadow-primary bg-secondary">
                              <i class="fa fa-shopping-bag"></i>
                            </div>
                            <div class="card-wrap">
                              <div class="card-header" >
                                <h4>Seling Product</h4>
                              </div>
                              <?php
                              $date = date("Y-m-d");
                              $sql4 = "SELECT * FROM `view_all_cus_details` WHERE client_id = $client_id and jdate='$date'";
                              $result4 = mysqli_query($con, $sql4);
                              if($result4){
                                $row4 = mysqli_num_rows($result4);
                                ?>
                                <div class="card-body"><?php echo $row4; ?></div>
                                
                                <?php
                              }else{
                                ?>
                                <div class="card-body">0</div>
                                <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      

                    <div class="row row-deck" style="display:none">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Budget vs Sales</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" height="158"></canvas>
                                </div>
                            </div>
                        </div>                        
                    </div>




                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Invoices</h4>
                                    <div class="card-header-action">
                                        <a href="#" class="btn btn-danger">View More <i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Invoice ID</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td><a href="#">INV-87239</a></td>
                                                <td class="font-weight-600">Kusnadi</td>
                                                <td>
                                                    <div class="badge badge-warning">Unpaid</div>
                                                </td>
                                                <td>July 19, 2018</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">INV-48574</a></td>
                                                <td class="font-weight-600">Susie Willis</td>
                                                <td>
                                                    <div class="badge badge-success">Paid</div>
                                                </td>
                                                <td>July 21, 2018</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">INV-76824</a></td>
                                                <td class="font-weight-600">Muhamad Nuruzzaki</td>
                                                <td>
                                                    <div class="badge badge-warning">Unpaid</div>
                                                </td>
                                                <td>July 22, 2018</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">INV-84990</a></td>
                                                <td class="font-weight-600">Agung Ardiansyah</td>
                                                <td>
                                                    <div class="badge badge-warning">Unpaid</div>
                                                </td>
                                                <td>July 22, 2018</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">INV-87320</a></td>
                                                <td class="font-weight-600">Ardian Rahardiansyah</td>
                                                <td>
                                                    <div class="badge badge-success">Paid</div>
                                                </td>
                                                <td>July 28, 2018</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">Detail</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                
                    </div>
                </section>
            </div>

            

            <!-- modal -->
<!-- Trigger/Open The Modal -->
<!-- <button id="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
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
    <script src="assets/modules/jquery.sparkline.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>

    <script>

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

    </script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php  
}
?>