<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {
  $client_id = $_SESSION['client_id'];
  $cid=$_GET['rid'];

?>

<!DOCTYPE html>
<html lang="en">

<!-- //Jewellary Management system powered by JMS -->

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <meta name="keywords" content="">
     <meta name="description" content="">    
     <title>Customer &mdash; <?php echo $_SESSION['client_name']; ?></title>

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

     <!-- java script -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

     <style>
          .spnSelected{
               font-weight:bold;
               border: 1px solid red;
               border-radius: 2px;
               font-size: 12px;
               padding: 2px;
               cursor: pointer
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
                         <div class="section-header bg-info text-white">
                              <h1>Customer Details</h1>
                              <div class="section-header-breadcrumb">
                                   <div class="breadcrumb-item">View Customer</div>
                              </div>
                         </div>

                         <div class="section-body">
                         <!-- <h2 class="section-title">View Customer</h2>
                         <p class="section-lead">Details of a Customer and their Products</p> -->

                              <div class="row">

                              <?php
                                                  $sql4 = "SELECT * FROM `view_all_cus_details` WHERE client_id='$client_id' and cus_id='$cid'";
                                                    $result4 = mysqli_query($con,$sql4);
                                                    if(mysqli_num_rows($result4)){
                                                        $row4 = mysqli_fetch_array($result4);
                                                            ?>

                                   <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                             <div class="card-header">
                                                  <h4>Customer &mdash; <?php echo $row4['cus_name']; ?></h4>
                                             </div>

                                             <div class="card-body">
                                            <div class="section-title mt-0">Details</div>
                                                  <form action ="" method="post" id="form">
                                                  <div class="row">
                                                       <div class="form-group col-6">
                                                            <label>Bill No:</label>
                                                            <input type="text" style="font-weight: 700;" class="form-control" name="bill_no" id="bill_no" value="<?php echo $row4['bill_no']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-6">
                                                            <label>Date:</label>
                                                            <input type="text"
                                                                 class="form-control" style="font-weight: 700;" name="datetime" value="<?php echo $row4['jdate']; ?>" readonly>
                                                       </div>
                                                  </div>

                                                  <div class="section-title mt-0">Customer</div>
                                                  <div class="row">
                                                       <div class="form-group col-4">
                                                            <label>Name:</label>
                                                            <input type="text" style="font-weight: 700;" class="form-control" name="cname" value="<?php echo $row4['cus_name']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Contact No:</label>
                                                            <div class="input-group">
                                                                 <div class="input-group-prepend">
                                                                      <div class="input-group-text">
                                                                           <i class="fa fa-phone"></i>
                                                                      </div>
                                                                 </div>
                                                                 <input type="text" class="form-control phone-number"
                                                                      name="cmobile" style="font-weight: 700;" value="<?php echo $row4['contact_no']; ?>" readonly>
                                                            </div>
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Address:</label>
                                                            <input type="text" style="font-weight: 700;" class="form-control" name="caddress" value="<?php echo $row4['cus_add']; ?>" readonly>
                                                       </div>
                                                  </div>

                                                  <div class="section-title mt-0">Product</div>
                                                  <div class="row">

                                                  <div class="form-group col-6">
                                                            <label>Price Per Gram:</label>
                                                            <input type="number" style="font-weight: 700;" id="per_price" class="form-control" name="price_pergram" value="<?php echo $row4['pdt_price_per_gram']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-6">
                                                            <label>Making Charges:</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control" id="mkchrg" name="making_charge" value="<?php echo $row4['pdt_mc']; ?>" readonly>
                                                       </div>
                                                       <?php
                                                        }
                                                       
                                                       ?>

                                                       <div class="table-responsive">
                      <table class="table table-striped v_center" id="example">
                      <!-- <table class="table table-striped v_center" id="table-2"> -->
                        <thead>
                          <tr style="background: cadetblue;">
                            <th style="color: white;" class="text-center">SL No.</th>
      
                            <th style="color: white;">Barcode</th>
                            <th style="color: white;">Category Name</th>
                            <th style="color: white;">Item Name</th>
                            <th style="color: white;">Item HUID</th>
                            <th style="color: white;">Item HSN</th>
                            <th style="color: white;">Item Weight(gm)</th>
                            <th style="color: white;">Item Desc.</th>
                            <th style="color: white;">Item Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                                                     
                                                    $sql2 = "SELECT * FROM `view_all_cus_details` WHERE client_id='$client_id' and cus_id='$cid'";
                                                    $result2 = mysqli_query($con,$sql2);
                                                    $count = 1;
                                                    if(mysqli_num_rows($result2)){
                                                        while($row1 = mysqli_fetch_array($result2)){
                                                        

                                                            ?>
<tr>
    <td style="font-weight: 700;" class="text-center"><?php echo $count; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_barcode']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['category_name']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_name']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_huid_no']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_hsn_no']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_weight']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['product_desc']; ?></td>
    <td style="font-weight: 700;" class="text-center"><?php echo $row1['pdt_price']; ?></td>
</tr>

                                                            <?php
                                                            $count++;
                                                        }
                                                    }
                                                    ?>



                        </tbody>
                      <!-- </table> -->
                    </table>
                    </div>
                                                 
                                             </div>

                                                  <div class="section-title mt-0">Product Details</div>
                                                  <div class="row">


                                                       <div class="form-group col-3">
                                                            <label>Total:</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control" name="total" id="ttl" value="<?php echo $row4['pdt_total']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>GST(3%):</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control" name="gst" value="<?php echo $row4['pdt_gst']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>Grand Total(Applying GST):</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control"name="grand_total" value="<?php echo $row4['pdt_grand_total']; ?>" readonly>
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>Discount:</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control" name="discount" value="<?php echo $row4['pdt_discount']; ?>" readonly>
                                                       </div>
                                                       
                                                       <div class="form-group col-12">
                                                            <label>Balance:</label>
                                                            <input type="number" style="font-weight: 700;" class="form-control" name="balance" value="<?php echo $row4['pdt_bal']; ?>" readonly>
                                                       </div>

                                                  </div>
                                                  <div class="buttons col-12">
                                                       <a href="all_customer.php" class="btn btn-primary col-12"
                                                            name="back" id="back"> Back</a>
                                                  </div>     
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
     <script src="js/CodiePie.js"></script>

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