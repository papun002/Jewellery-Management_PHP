<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {
  $client_id = $_SESSION['client_id'];
  $_SESSION['msg'] ="";
  
?>

<!DOCTYPE html>
<html lang="en">

<!-- //Jewellary Management system powered by JMS -->

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <meta name="keywords" content="">
     <meta name="description" content="">    
     <title>Add Customer</title>

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
                              <h1>Customer Section</h1>
                              <div class="section-header-breadcrumb">
                                   <div class="breadcrumb-item active"><a href="#">Customer</a></div>
                                   <div class="breadcrumb-item">Add Customer</div>
                              </div>
                         </div>

                         <div class="section-body">
                         <h2 class="section-title">Add Customer</h2>
                         <p class="section-lead">Enter all the details of a customer and then sequencially add the product as per customer need.</p>

                              <div class="row">
                                   <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                             <div class="card-header">
                                                  <h4>Add Customer</h4>
                                             </div>

                                             <div class="card-body">
                                                  <div class="section-title mt-0">Details</div>
                                                  <form action ="generate_bill.php" method="post" id="form" >
                                                  <div class="row">
                                                       <div class="form-group col-6">
                                                            <label>Bill No:</label>
                                                            <?php
$sql3 = "SELECT bill_no FROM `cus_details_jms` WHERE client_id = $client_id order by bill_no DESC limit 1";
$rs3 = mysqli_query($con, $sql3);
     
     if(mysqli_num_rows($rs3)>0){
          while($row = mysqli_fetch_array($rs3)){
               $billno = $row['bill_no'] + 1;
               $_SESSION['bill_no'] = $billno;
               ?>
               <input type="text" class="form-control" name="bill_no" id="bill_no" value="<?php  echo $billno; ?>" required>
<?php
          }
     }
?>
                                                       </div>

                                                       <div class="form-group col-6">
                                                            <label>Date:</label>
                                                            <input type="datetime-local"
                                                                 class="form-control datetimepicker" name="datetime" value="<?php echo date('Y-m-d h:s A'); ?>">
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
                                                            <label>Price Per 10 Gram:</label>
                                                            <input type="number" id="per_price" class="form-control" name="price_pergram">
                                                       </div>

                                                       <div class="form-group col-6">
                                                            <label>Making Charges:</label>
                                                            <input type="number" class="form-control" id="mkchrg"                              name="making_charge">
                                                       </div>

                                                  <div class="table-responsive">
                                                       <table class="table" id="addProduct">
                                                            <tr>
                                                                 <td>Barcode</td>
                                                                 <td>Catagory</td>
                                                                 <td>Name</td>
                                                                 <td>HUID No.</td>
                                                                 <td>HSN No.</td>
                                                                 <td>Weight</td>
                                                                 <td>Description</td>
                                                                 <td>Price</td>
                                                                 <td><button type="button" name="add" class="btn btn-success btn-sm btnAddRow" required><i class="fa fa-plus" ></i></button></td>
                                                             </tr>
                                                       </table>
                                                  </div>
                                                  
                                             </div>

                                                  <div class="section-title mt-0">Product Details</div>
                                                  <div class="row">
                                                      

                                                       <div class="form-group col-3">
                                                            <label>Total:</label>
                                                            <input type="text" class="form-control" name="total" id="ttl">
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>GST(3%):</label>
                                                            <input type="text" id="gst" class="form-control" name="gst">
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>Grand Total(Applying GST):</label>
                                                            <input type="text" class="form-control" id="gndTotal" name="grand_total">
                                                       </div>

                                                       <div class="form-group col-3">
                                                            <label>Discount:</label>
                                                            <input type="text" class="form-control" id="discount" name="discount">
                                                       </div>
                                                       
                                                       <div class="form-group col-12">
                                                            <label>Balance:</label>
                                                            <input type="text" class="form-control" id="balance" name="balance">
                                                       </div>


                                                  </div>
                                                  <div class="buttons col-12">

                                                       <!-- <a href="#" class="btn btn-primary col-12" name="Reset">Clear</a> -->
                                                       <button class="btn btn-primary col-12" name="submit" id="submit">Submit</button>

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

     <script>

          
     
</script>
<script>
     
    $(document).ready(function(){
         var prcArr = [];
         var finalBalance = 0;
      $(document).on('click','.btnAddRow', function(){
          

        var html='';
        html+='<tr>';
        html+='<td><input type="text" class="form-control barcode"  name="barcode[]" required></td>';
        html+='<td><input type="text" class="form-control category" name="category[]" readonly></td>';
        html+='<td><input type="text" class="form-control pname" name="pname[]" readonly></td>';
        html+='<td><input type="text" class="form-control phuid" name="phuid[]" readonly></td>';
        html+='<td><input type="text" class="form-control phsn" name="phsn[]" readonly></td>';
        html+='<td><input type="text" class="form-control pweight" name="pweight[]" readonly></td>';
        html+='<td><input type="text" class="form-control pdesc" name="pdesc[]" readonly></td>';
        html+='<td class="price"><input type="text" class="form-control pprice" name="pprice[]" readonly></td>';
        html+='<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><span class="fa fa-minus"></span></button></td>'
        $('#addProduct').append(html);
      })
    $("#addProduct").delegate(".barcode","change", function(){
      var per_price;
          var mkcg;          
          var ttl = [];
          var arr;
          perprice = $('#per_price').val();    
          mkcg = $('#mkchrg').val();
          var per_price = parseFloat(perprice);
          var mk_cg = parseFloat(mkcg);
         
          
          var barcode = this.value;
         var tr=$(this).parent().parent();
         $.ajax({
            url:"getproduct.php",
            data:{product_barcode:barcode},
            type:'POST',
            dataType: 'JSON',
            success:function(response){
                var len = response.length;
                
                let price = (per_price+mk_cg);
                console.log(price);
                // price = price.toString();
                for(let index = 0; index < len; index++){
                tr.find(".category").val(response[index].category);
                tr.find(".pname").val(response[index].product_name);
                tr.find(".phuid").val(response[index].product_huid_no);
                tr.find(".phsn").val(response[index].product_hsn_no);
                tr.find(".pweight").val(response[index].product_weight);
                tr.find(".pdesc").val(response[index].product_desc);
                tr.find(".pprice").val(response[index].product_weight * (price));
                calcPrc(response[index].product_weight * (price).toString())
     
               }
            }
          })

     })
     
      $(document).on('click','.btn-remove', function rmv (){
          let gst = 0;
          let gndTotal = 0;
          let discount = 0;
          let balance = 0;
          var val = $(this).closest('tr').find('.pprice').val()
          console.log(val);
          val = Number.parseFloat(val)
          let finalPrice = $('#ttl').val();
          finalPrice = finalPrice - val
          $('#ttl').val(finalPrice);
          gst = finalPrice * 0.03;
          $('#gst').val(gst);
          gndTotal = finalPrice + gst;
          $('#gndTotal').val(gndTotal);
          balance = gndTotal - discount
          finalBalance = balance;
          $('#balance').val(balance);
          $('#discount').on('change',function(){
               discount = Number.parseFloat($('#discount').val())
               balance = gndTotal - discount
               $('#balance').val(balance);
          })
          $(this).closest('tr').remove();
      })
      
      function calcPrc(price){
          let finalPrice = 0;
          let gst = 0;
          let gndTotal = 0;
          let discount = 0;
          let balance = 0;
          prcArr.push(Number.parseFloat(price));
          for (let i = 0; i < prcArr.length; i++) {
               if (prcArr.length == 1) {
                    finalPrice = prcArr[i];
               }
               else if(prcArr.length > 1){
                    finalPrice = prcArr.reduce((partialSum, a) => partialSum + a, 0);
               }
          }
          
          console.log("final price is " + finalPrice);
          $('#ttl').val(finalPrice);
          gst = finalPrice * 0.03;
          $('#gst').val(gst);
          gndTotal = finalPrice + gst;
          $('#gndTotal').val(gndTotal);
          balance = gndTotal - discount
          finalBalance = balance;
          $('#balance').val(balance);
          $('#discount').on('change',function(){
               discount = Number.parseFloat($('#discount').val())
               balance = gndTotal - discount
               $('#balance').val(balance);
          })
      }      
});
  
</script>

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