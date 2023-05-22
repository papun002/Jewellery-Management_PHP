<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {
     $client_id = $_SESSION['client_id'];
 $_SESSION['msg'] ="";
 if(isset($_POST['submit'])){
   $oid = $_POST['oid'];
   $datetime = $_POST['datetime'];
   $cname = $_POST['cname'];
   $cmobile = $_POST['cmobile'];
   $caddress = $_POST['caddress'];
   $price_pergram = $_POST['price_pergram'];
   $pdt_type = $_POST['pdt_type'];
   $est_amt = $_POST['est_amt'];
   $est_gole_wt = $_POST['est_gold_wt'];
   $est_date = $_POST['est_date'];

   $adv = $_POST['adv'];
   $amt_adv0 = $_POST['amt_adv'];
   $gld_adv0 = $_POST['gld_adv'];
   $gld_adv_desc0 = $_POST['gld_adv_desc'];
   
   $amt_adv00 = $_POST['amt_adv1'];
   $gld_adv00 = $_POST['gld_adv1'];
   $gld_adv_desc00 = $_POST['gld_adv_desc1'];

   if(empty($amt_adv0) && empty($gld_adv0) && empty($gld_adv_desc0)){
     $amt_adv = $amt_adv00;
     $gld_adv = $gld_adv00;
     $gld_adv_desc = $gld_adv_desc00;
   }else{
     $amt_adv = $amt_adv0;
     $gld_adv = $gld_adv0;
     $gld_adv_desc = $gld_adv_desc0;
   }


   //from dynamic html
   $nname = $_POST['prt_name'];
   $wwt = $_POST['prt_wt'];
   $ddesc = $_POST['prt_desc'];
   $iimage = $_POST['prt_img'];
   $pprice = $_POST['prt_prc'];

   
  
   $sql1 = mysqli_query($con, "select * from order_jms where order_id ='$oid'");
        $result1 = mysqli_fetch_array($sql1);
        if ($result1 > 0) {
 $_SESSION['msg'] ='<div class="alert alert-danger alert-dismissible show fade" >
             <div class="alert-body">
                  <button class="close" data-dismiss="alert"><span>&times;</span></button>
                  Order Id already exits!
             </div>
        </div>';
        //  header('location:add_customer.php');
   } else {
   $sql2= "INSERT INTO `order_jms`(`sl_no`, `client_id`, `order_id`, `date`, `cust_name`, `cust_contno`, `cust_add`, `priceper_gram`, `pdt_type`, `est_amt`, `est_date`, `est_wt`, `adv`, `adv_amt`, `adv_gold`, `adv_gld_desc`) VALUES ('','$client_id','$oid','$datetime','$cname','$cmobile','$caddress','$price_pergram','$pdt_type','$est_amt','$est_date','$est_gole_wt','$adv','$amt_adv','$gld_adv','$gld_adv_desc')";

   foreach ($nname as $key => $value) {
     $sql = "INSERT INTO `order_pdt_jms`(`sl_no`, `client_id`, `order_id`, `pdt_name`, `pdt_wt`, `pdt_desc`, `pdt_img`, `pdt_price`, `order_status`) VALUES ('','".$client_id."','".$oid."','".$value."','".$wwt[$key]."','".$ddesc[$key]."','image','".$pprice[$key]."','pending')";
     $result3 = mysqli_query($con, $sql);
     }

   $result2= mysqli_query($con, $sql2);
   if($result2 && $result3){
     
      $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;>
             <div class="alert-body">
                  <button class="close" data-dismiss="alert"><span>&times;</span></button>
                  Order Added Successfully!
             </div>
        </div>';
                 // echo "<script>window.location = 'all_orders.php';</script>";
                //   header ("location:add_customer.php");
   }else{
     $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible show fade">
             <div class="alert-body">
                  <button class="close" data-dismiss="alert"><span>&times;</span></button>
                  Order not Added Successfully!
             </div>
        </div>';
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
     <meta name="keywords" content="">
     <meta name="description" content="">    
     <title>Orders</title>

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
                         <div class="section-header">
                              <h1>Order Section</h1>
                              <div class="section-header-breadcrumb">
                                   <div class="breadcrumb-item active"><a href="#">Order</a></div>
                                   <div class="breadcrumb-item">Add Order</div>
                              </div>
                         </div>

                         <div class="section-body">
                         <h2 class="section-title">Add Order</h2>
                         <p class="section-lead">Enter all the details of a Items as per customer need.</p>

                              <div class="row">
                                   <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                             <div class="card-header">
                                                  <h4>Add Order</h4>
                                             </div>

                                             <div class="card-body">
                                             <?php echo $_SESSION['msg']; ?>
                                                  <div class="section-title mt-0">Details</div>
                                                  <form action ="" method="post" id="form">
                                                  <div class="row">
                                                       <div class="form-group col-6">
                                                            <label>Order Id:</label>
                                                            <?php
$sql3 = "SELECT order_id FROM `order_jms` WHERE client_id = $client_id order by order_id DESC limit 1";
$rs3 = mysqli_query($con, $sql3);
     
     if(mysqli_num_rows($rs3)>0){
          while($row = mysqli_fetch_array($rs3)){
               $oid = $row['order_id'] + 1;
               $_SESSION['oid'] = $oid;
               ?>               
               <input type="text" class="form-control" name="oid" id="oid" value="<?php  echo $oid; ?>" required>
<?php
          }
     }
?>
                                                       </div>

                                                       <div class="form-group col-6">
                                                            <label>Date:</label>
                                                            <input type="datetime-local"
                                                                 class="form-control datetimepicker" name="datetime">
                                                       </div>
                                                  </div>

                                                  <div class="section-title mt-0">Customer</div>
                                                  <div class="row">
                                                       <div class="form-group col-4">
                                                            <label>Name:</label>
                                                            <input type="text" class="form-control" name="cname">
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
                                                                      name="cmobile">
                                                            </div>
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Address:</label>
                                                            <input type="text" class="form-control" name="caddress">
                                                       </div>
                                                  </div>

                                                  <div class="section-title mt-0">Product</div>
                                                  <div class="row">

                                                  <div class="form-group col-6">
                                                            <label>Price Per Gram:</label>
                                                            <input type="text" class="form-control" name="price_pergram">
                                                       </div>
                                                       <div class="form-group col-6">
                                                            <label>Product Type</label>
                                                            <input type="text" class="form-control"
                                                                 name="pdt_type">
                                                       </div>

                                                  <div class="table-responsive">
                                                       <table class="table" id="addProduct">
                                                            <tr>
                                                                 <td>Name</td>
                                                                 <td>Estimate Weight(gm)</td>
                                                                 <td>Description</td>
                                                                 <td>Image(Optionally)</td>
                                                                 <td>Price</td>
                                                                 <td><button type="button" name="add" class="btn btn-success btn-sm btnAddRow" required><i class="fa fa-plus" ></i></button></td>
                                                             </tr>
                                                       </table>
                                                  </div>

                                             </div>

                                                  <div class="section-title mt-0">Product Details</div>
                                                  <div class="row">

                                                       <div class="form-group col-4">
                                                            <label>Estimate Amount</label>
                                                            <input type="text" class="form-control" name="est_amt">
                                                       </div>
                                                       <div class="form-group col-4">
                                                            <label>Estimate Gold Wt.</label>
                                                            <input type="text" class="form-control" name="est_gold_wt">
                                                       </div>

                                                        <div class="form-group col-4">
                                                            <label>Estimate Date</label>
                                                            <input type="date" class="form-control" name="est_date">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Advance</label>
                                                            <select class="form-control" id="adv" onchange = "ShowHideDiv()" name="adv">
                                                                 <option value="0">What in Advance</option>
                                                                 <option value="cash">CASH</option>
                                                                <option value="gold">GOLD</option>
                                                                <option value="both">Both Gold And Cash</option>
                                                            </select>
                                                        </div>
                                                       
                                                       <div class="form-group col-4" name="" id="amtadv" style="display: none;">
                                                            <label>Amount (Advance)</label>
                                                            <input type="text" class="form-control" name="amt_adv" id="amttext">
                                                       </div>

                                                       <div class="form-group col-4" id="goldadv" style="display:none;">
                                                            <label>Gold (Advance)</label>
                                                            <input type="text" class="form-control"name="gld_adv" id="goldadvance">
                                                       </div>

                                                       <div class="form-group col-4" id="goldadv1" style="display:none ;">
                                                            <label>Gold (Advance) Desc.</label>
                                                            <input type="text" class="form-control" id="goldadvance"  name="gld_adv_desc">
                                                       </div>

                                                       <div class="form-group col-4" name="" id="amtadv2" style="display: none;">
                                                            <label>Amount (Advance)</label>
                                                            <input type="text" class="form-control" name="amt_adv1" id="amttext">
                                                       </div>

                                                       <div class="form-group col-4" id="goldadv2" style="display:none;">
                                                            <label>Gold (Advance)</label>
                                                            <input type="text" class="form-control"name="gld_adv1" id="goldadvance">
                                                       </div>

                                                       <div class="form-group col-4" id="goldadv3" style="display:none ;">
                                                            <label>Gold (Advance) Desc.</label>
                                                            <input type="text" class="form-control" id="goldadvance1"  name="gld_adv_desc1">
                                                       </div>

                                                       <!-- <a href="#" class="btn btn-primary col-6" name="Reset">Clear</a> -->
                                                       <div class="buttons col-12">
                                                       <button class="btn btn-primary col-12"
                                                            name="submit">Submit</button>

                                                  </div>
         </form>

                                        </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-12">
                                             <div class="card mb-2">
                                                       <div class="card-body">
                                                            <ul class="nav nav-pills">
                                                                 <li class="nav-item"><a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a></li>
                                                                 <li class="nav-item"><a class="nav-link" href="#">Pending <span class="badge badge-primary">1</span></a></li>
                                                                 <li class="nav-item"><a class="nav-link" href="#">Completed <span class="badge badge-primary">1</span></a></li>
                                                                 <li class="nav-item"><a class="nav-link" href="#">Trash <span class="badge badge-primary">0</span></a></li>
                                                            </ul>
                                                       </div>
                                             </div>
                                        </div>
                                   </div>
                        
                        <!-- //another section -->
                        <div class="row mt-2">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View All Orders</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center" id="example">
                                                <thead>
                                                    <tr>
                                                    <th class="text-center">SL No.</th>
                                                        <th>Order Id</th>
                                                        <th>Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Contact No.</th>
                                                        <th>Product Type</th>
                                                        <th>Product Name</th>
                                                        <th>Total Est Amt</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                       
                                                       
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <!-- table data starts here -->
                                                    <?php
                                                  $client_id = $_SESSION['client_id'];
                                                    $sql2 = "SELECT * FROM `view_order_jms` WHERE client_id='$client_id'";
                                                    $result2 = mysqli_query($con,$sql2);
                                                    $count = 1;
                                                    if(mysqli_num_rows($result2)){
                                                        while($row1 = mysqli_fetch_array($result2)){
                                                            ?>
<tr>
    <td class="text-center"><?php echo $count; ?></td>
    <td class="order_id"><?php echo $row1['order_id']; ?></td>
    <td class="align-middle"><?php echo $row1['date']; ?></td>
    <td><?php echo $row1['cust_name']; ?></td>
    <td><?php echo $row1['cust_contno']; ?></td>
    <td><?php echo $row1['pdt_type']; ?></td>
    <td><?php echo $row1['pdt_name']; ?></td>
    <td><?php echo $row1['est_amt']; ?></td>
    <td><div class="badge badge-warning"><?php echo $row1['order_status']; ?></div></td>
    
    <td><a class="btn btn-secondary view_btn" id="" >View</a></td>
</tr>


                                                            <?php
                                                            $count++;
                                                        }
                                                    }
                                                    ?>

                                                    


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

     <!-- Page Specific JS File -->
<script>
     $(document).ready(function() {
        
        $(document).on('click', '.btnAddRow', function() {
            var html = '';
            html += '<tr>';
            html +=
                '<td><input type="text" class="form-control name" name="prt_name[]" required></td>';            
            html +=
                '<td><input type="text" class="form-control weight" name="prt_wt[]"></td>';
            html +=
                '<td><input type="text" class="form-control desc" name="prt_desc[]"></td>';
            html +=
                '<td><input type="file" class="form-control image" name="prt_img[]"></td>';
            html +=
                '<td><input type="text" class="form-control price" name="prt_prc[]"></td>';
            html +=
                '<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-minus" ></i></button></td>'

                $('#addProduct').append(html);
                
                $('.barcode').on('change', function(e) {
                    var barcode = this.value;
                var tr = $(this).parent().parent();
                $.ajax({
                    url: "getproduct.php",
                    // method: "get",
                    data: { product_barcode: barcode },
                    type: "POST",
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data);
                        var len = data.length;                        
                        for(let i = 0; i < len; i++){
                            $('.category').val(data[i].category);
                            $('.pname').val(data[i].product_name);
                            $('.phuid').val(data[i].product_huid_no);
                            $('.phsn').val(data[i].product_hsn_no);
                            $('.pweight').val(data[i].product_weight);
                            $('.pdesc').val(data[i].product_desc);
                            $('.pprice').val(data[i].product_price);
                        }                        
                    }
                })
            })          
        })
        $(document).on('click', '.btn-remove', function() {
            $(this).closest('tr').remove();
        });
     });
</script>
<script type="text/javascript">
     function ShowHideDiv() {
         var adv = document.getElementById("adv");
         var goldadv = document.getElementById("goldadv");
         var goldadv1 = document.getElementById("goldadv1");
         var amtadv = document.getElementById("amtadv");

         var goldadv3 = document.getElementById("goldadv3");
         var goldadv2 = document.getElementById("goldadv2");
         var amtadv1 = document.getElementById("amtadv2");

         goldadv.style.display = adv.value == "gold" ? "block" : "none";
         goldadv1.style.display = adv.value == "gold" ? "block" : "none";
         amtadv.style.display = adv.value == "cash" ? "block" : "none";

         goldadv3.style.display = adv.value == "both" ? "block" : "none";
         goldadv2.style.display = adv.value == "both" ? "block" : "none";
         amtadv2.style.display = adv.value == "both" ? "block" : "none";
     }
 </script>

 

     <!-- Template JS File -->
     <script src="js/scripts.js"></script>
     <script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php  
}
?>