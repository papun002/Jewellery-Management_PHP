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
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Stock &mdash;
        <?php echo $_SESSION['client_name']; ?>
    </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css" />
    <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.min.css" />
    <link rel="stylesheet" href="assets/css/components.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
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
                            <div class="breadcrumb-item">Stock</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <h2 class="section-title">All Stock</h2>
                        <p class="section-lead">
                            All these products are available in our stock.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">

                                

                        <!-- //another section -->
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>View Product</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped v_center" id="example">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">SL No.</th>
                                                        <th>Category</th>
                                                        <th>Product</th>
                                                        <th>Barcode</th>
                                                        <th>Wt. (In Gram)</th>
                                                        <th>HUID No.</th>
                                                        <th>HSN No.</th>
                                                        <th>Description</th>
                                                        <th>Status</th>

                                                        
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <!-- table data starts here -->
                                                    <?php
                                                    $sql2 = "SELECT * FROM `view_product_jms` WHERE client_id='$client_id' and status='stock'";
                                                    $result2 = mysqli_query($con,$sql2);
                                                    $count = 1;
                                                    if(mysqli_num_rows($result2)){
                                                        while($row1 = mysqli_fetch_array($result2)){
                                                            ?>
<tr>
    <td class="text-center"><?php echo $count; ?></td>
    <td class="align-middle"><?php echo $row1['category_name']; ?></td>
    <td class="align-middle"><?php echo $row1['product_name']; ?></td>
    <td class="align-middle"><?php echo $row1['product_barcode']; ?></td>
    <td class="align-middle"><?php echo $row1['product_weight']; ?></td>
    <td class="align-middle"><?php echo $row1['product_huid_no']; ?></td>
    <td class="align-middle"><?php echo $row1['product_hsn_no']; ?></td>
    <td class="align-middle"><?php echo $row1['product_desc']; ?></td>
    <td class="align-middle">        
            <div class="badge badge-success"><?php echo $row1['status']; ?></div>        
    </td>
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
            </section>
        </div>

        <!-- Call to footer part -->
        <?php include 'partials/footer.php'; ?>
    </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5',
          'print'
        ]
      });
    });
  </script>

    <!-- General JS Scripts -->
    <script src="assets/bundles/lib.vendor.bundle.js"></script>
    <script src="js/jms.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/datatables/datatables.min.js"></script>
    <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php  
}
?>