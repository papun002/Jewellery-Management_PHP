<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['client_logid'] == 0)) {
    header('location:logout.php');
} else {
    $client_name = $_SESSION['client_name'];
    $client_id = $_SESSION['client_logid'];

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
 <title>Barcode &mdash; <?php echo $_SESSION['client_name']; ?> </title>

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

 <style>
     .barcode {
            padding: 0.5cm 1cm;
            /* margin: 3px; */
            display: inline-block;
            text-align: center;
        }

        .barcode_img {
            display: flex;
            padding: 10px;
            flex-direction: column;
        }

        .barcode_img p {
            padding: 0px;
            margin: 0px;
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
      <h1>Barcode</h1>
      <div class="section-header-breadcrumb">
       <div class="breadcrumb-item">Generate Barcode</div>
      </div>
     </div>

     <div class="section-body">
      <h2 class="section-title">Generate Barcode</h2>
      <p class="section-lead">
       To generate barcode enter the number of barcode.
      </p>
      <div class="row">
       <div class="col-12 col-md-12 col-lg-12">

        <div class="card">        
         <div class="card-body">          
          <form action="" method="post">
           <div class="row">
            <div class="form-group col-12">
                <label>Enter number of barcode:-</label>
             <div class="input-group md-12">
              <input type="number" class="form-control" placeholder="" aria-label="" name="number">
              <div class="input-group-append">
               <button class="btn btn-primary" type="submit" name="submit">Generate</button>
              </div>
             </div>
            </div>
           </div>
          </form>
         </div>
        </div>

        <div class="card">
         <div class="card-header">
          <h4>Barcodes</h4>
         </div>
         <div class="card-body">          
           <div class="row" id="print">
           <?php
        if (isset($_POST['submit'])) {
            
            require 'vendor/autoload.php';
            $num = $_POST['number'];
            $a = 1;
            $part_num = $num/1000;
            
            while ($a <= $num) {
                $random = rand(1000,9999);
                $micro = microtime(true);
                $rand_micro = $random * $micro;
                $int_micro = (int) $rand_micro;
                $row_barcode = strval($client_id.$random.$int_micro);
                if (strlen($row_barcode) > 10) {
                    $final_barcode = substr($row_barcode,0,10);
                }
                ?>
                        <div class="barcode">
        <?php
                        $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
                        echo '
                        <div class="barcode_img">
                        <img src="data:image/jpg;base64,' . base64_encode($generator->getBarcode($final_barcode, $generator::TYPE_CODE_128)) . '">
                        <p>'.$final_barcode.'</p>
                        <p><b>'.$client_name.'</b></p>

                        </div>';
                        $a += 1; 
                    ?>
    </div>
    <?php
            }
            ?>
    
    <?php
        }
    ?>
            
           </div>
           <div class="text-md-right">
            <button class="btn btn-warning btn-icon icon-left" onclick="printBarcode('print')" style="background-color: #ffc107 !important"><i class="fa fa-print"></i> Print</button>
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

 <script>
function printBarcode(print){
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