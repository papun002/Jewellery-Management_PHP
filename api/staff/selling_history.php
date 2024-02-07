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
  <title>Jewellary Management system</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css" />
  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="assets/modules/bootstrap-daterangepicker/daterangepicker.js" />
  <!-- <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" /> -->
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --> -->

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
            <h1>History Section</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Selling History</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">History of all selling products</h2>
            <p class="section-lead">
              Here all the details of product are shown sequencially and also you can search any product as per date, bill no, price etc also             ...
            </p>

            <!-- //another section -->
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Product</h4>
                  </div>

                  <div class="card-body">
                  <div class="row">
                    <div class="col-md-2" style="margin-left: auto;">
                      <!-- <label>Advance</label> -->
                    <select name="days_filter" id="days_filter" class="form-control" style="margin-bottom: 1em;font-weight: bolder;">
                      <option value="">Select Days</option>
                      <option value="365">Year</option>
                      <option value="180">6 Month</option>
                      <option value="90">3 Month</option>
                      <option value="30">Last Month</option>
                      <option value="1">Yesterday</option>
                      <option value="0">Today</option>
                    </select>
                  <!-- </div> -->
                    </div>
                    <div style="clear:both"></div>
                    <br />
                    <div class="table-responsive">
                    <table id="order_data" class="table table-bordered table-striped v_center">
                      <thead>
                      <tr>
                        <th>Date</th>
                        <th>Bill No.</th>
                        <th>Customer Name</th>
                        <th>Product Name</th>
                        <th>Product Weight</th>
                        <th>HUID No.</th>
                        <th>GST</th>
                        <th>Price</th>
                      </tr>
                      </thead>
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

  <script type="text/javascript" language="javascript" >
    $(document).ready(function(){

      // $('#order_data').DataTable({
      //   dom: 'Bfrtip',
      //   buttons: [
      //     'copyHtml5',
      //     'excelHtml5',
      //     'csvHtml5',
      //     'pdfHtml5',
      //     'print'
      //   ]
      // });

     load_data();    
     function load_data(is_days)
     {
      var dataTable = $('#order_data').DataTable({
       "processing":true,
       "serverSide":true,
       "order":[],
       "ajax":{
        url:"fetch_history.php",
        type:"POST",
        data:{is_days:is_days}
       }
      });
     }
    
     $(document).on('change', '#days_filter', function(){
      var no_of_days = $(this).val();
      $('#order_data').DataTable().destroy();
      if(no_of_days != '')
      {
       load_data(no_of_days);
      }
      else
      {
       load_data();
      }
     });      

    });
    </script>

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>



  <!-- General JS Scripts -->
  <script src="assets/bundles/lib.vendor.bundle.js"></script>
  <script src="js/jms.js"></script>

  <!-- JS Libraies -->
   <script src="assets/modules/datatables/datatables.min.js"></script>
  <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

  <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script> 


  <!-- Page Specific JS File -->
  <script src="js/page/index.js"></script>
  <script src="js/page/modules-datatables.js"></script>
  <script src="js/page/forms-advanced-forms.js"></script>

  <!-- Template JS File -->
  <script src="js/scripts.js"></script>
  <script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php
}
?>