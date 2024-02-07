<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['client_logid'] == 0)) {
    header('location:logout.php');
} else {
    $_SESSION['msg'] ="";
    $client_id = $_SESSION['client_logid'];
    if(isset($_POST['submit'])){
        $category = $_POST['category'];
       

        // DYNAMIC
        $pbarcode = $_POST['barcode'];
        $pname = $_POST['pname'];
        $huidno = $_POST['phuid'];
        $hsnno = $_POST['phsn'];
        $pweight = $_POST['pweight'];
        $pdesc = $_POST['pdesc'];

        // $sql1 = "INSERT INTO product_jms VALUES ('$client_id','','$category','$pname','$pweight','$huidno','$hsnno','$pdesc','$pbarcode','stock')";
        // $result1 = mysqli_query($con,$sql1);

        foreach ($pbarcode as $key => $value) {

            $sql= "INSERT INTO `product_jms`(`client_id`, `product_id`, `category_id`, `product_name`, `product_weight`, `product_huid_no`, `product_hsn_no`, `product_desc`, `product_barcode`, `status`) VALUES ('".$client_id."','','".$category."','".$pname[$key]."','".$pweight[$key]."','".$huidno[$key]."','".$hsnno[$key]."','".$pdesc[$key]."','".$value."','stock')";
            $result3 = mysqli_query($con, $sql);
            }

        if($result3){
            $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                Product Added Successfully!
            </div>
        </div>';
        }else{
            $_SESSION['msg'] = `<div class="alert alert-warning alert-dismissible show fade" style="background-color: #c8322d;">
            <div class="alert-body">
                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                Product doesn't add.
            </div>
        </div>`;
        }
    }
?>

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
               <div  <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Stock</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item">Product</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">Add Products</h2>
                        <p class="section-lead">
                            To add stock first select category & then enter product.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Add Product</h4>
                                    </div>


                                    <div class="card-body">
                                    <?php echo $_SESSION['msg']; ?>
                                        <div class="section-title mt-0">Enter Product details :- </div>
                                        <form action="" method="post">
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label>Select Category &amp; Product</label>
                                                <div class="input-group">
                                                    <select class="custom-select" id="inputGroupSelect05" name="category">           
                                                        <option>Add Category</option>
                                                        <?php
$sql = "SELECT * FROM `category_jms` WHERE client_id='$client_id'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        ?>
            <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
        <?php
    }
}
                                                    ?>                                                     
                                                    </select>
</div>
</div>
                                                  <div class="table-responsive">
                                                       <table class="table" id="addProduct">
                                                            <tr>
                                                                 <td>Barcode</td>
                                                                 <td>Name</td>
                                                                 <td>HUID No.</td>
                                                                 <td>HSN No.</td>
                                                                 <td>Weight</td>
                                                                 <td>Description</td>
                                                                 <td><button type="button" name="add" class="btn btn-success btn-sm btnAddRow" required><i class="fa fa-plus" ></i></button></td>
                                                             </tr>
                                                       </table>
                                                  </div>
                              </div>
                              <div class="buttons col-12">

                                                       <!-- <a href="#" class="btn btn-primary col-12" name="Reset">Clear</a> -->
                                                       <button class="btn btn-primary col-12"
                                                            name="submit">Submit</button>

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
<!-- <script type="text/javascript"> var RootUrl = '@getproduct.php.content("~/")';</script> -->
<script>
     
    $(document).ready(function(){
      $(document).on('click','.btnAddRow', function(){          
        var html='';
        html+='<tr>';
        html+='<td><input type="text" class="form-control barcode"  name="barcode[]" required></td>';
        html+='<td><input type="text" class="form-control pname" name="pname[]" ></td>';
        html+='<td><input type="text" class="form-control phuid" name="phuid[]" ></td>';
        html+='<td><input type="text" class="form-control phsn" name="phsn[]" ></td>';
        html+='<td><input type="text" class="form-control pweight" name="pweight[]" ></td>';
        html+='<td><input type="text" class="form-control pdesc" name="pdesc[]" ></td>';
        html+='<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><span class="fa fa-minus"></span></button></td>'
        $('#addProduct').append(html);
      })
    $("#addProduct").delegate(".barcode","change", function(){
        var barcode = this.value;
         var tr=$(this).parent().parent();
         $.ajax({
            url:'',
            data:{product_barcode:barcode},
            type:'POST',
            dataType: 'JSON',
            success:function(response){
                var len = response.length;
                for(let index = 0; index < len; index++){
                tr.find(".category").val(response[index].category);
                tr.find(".pname").val(response[index].product_name);
                tr.find(".phuid").val(response[index].product_huid_no);
                tr.find(".phsn").val(response[index].product_hsn_no);
                tr.find(".pweight").val(response[index].product_weight);
                tr.find(".pdesc").val(response[index].product_desc);
                tr.find(".pprice").val(response[index].product_weight * (prwt+mkcg));
               }
            }
          })                  
      })
      $(document).on('click','.btn-remove', function(){
        $(this).closest('tr').remove();
      })
     
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