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
  <title>Customer &mdash; <?php echo $_SESSION['client_name']; ?></title>

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

  <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
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
              <div class="breadcrumb-item active">
                <a href="#">Customer</a>
              </div>
              <div class="breadcrumb-item">All Customer</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Customer Details</h2>
            <p class="section-lead">Show all the details of customers</p>


            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Customer</h4>
                    <div class="card-header-action dropdown">
                      <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Select Date</a>
                      <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <li class="dropdown-title">Select Period</li>
                        <li><a href="#" class="dropdown-item">Today</a></li>
                        <li><a href="#" class="dropdown-item">Week</a></li>
                        <li><a href="#" class="dropdown-item ">Month</a></li>
                        <li><a href="#" class="dropdown-item">This Year</a></li>
                        <li><a href="#" class="dropdown-item">
                        <input type="date" name="" id="" class="form-control">
                          </a></li>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped v_center" id="example">
                      <!-- <table class="table table-striped v_center" id="table-2"> -->
                        <thead>
                          <tr>
                            <th class="text-center">SL No.</th>
                            <th>Date</th>
                            <th>Bill No</th>
                            <th>Customer</th>
                            <th>Mob No.</th>
                            <th>Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>


                          <!-- table data starts here -->
                          <?php
                          $sqld = "SELECT DISTINCT `jdate`,`cus_id`, `bill_no`, `cus_name`, `contact_no`, `cus_add`  FROM view_all_cus_details where client_id='$client_id'";
                                                          $resultd = mysqli_query($con,$sqld);
                                                          $count = 1;
                                                          if(mysqli_num_rows($resultd)){
                                                          while($rowd = mysqli_fetch_array($resultd)){
                            ?>                        
<tr>
    <td class="text-center"><?php echo $count; ?></td>
    <td><?php echo $rowd['jdate']; ?></td>
    <td ><?php echo $rowd['bill_no']; ?></td>
    <td><?php echo $rowd['cus_name']; ?></td>
    <td><?php echo $rowd['contact_no']; ?></td>
    <td><?php echo $rowd['cus_add']; ?></td>
    <td><a href="cus_details_table.php?rid=<?php echo $rowd['cus_id'];?>" class="btn btn-secondary ">View</a></td>
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
// $('.table-2').dataTable({
//   "bDestroy":true
// });

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

  <!-- scriptfor sweetalert -->
  <script>

//     document.querySelector(".first").addEventListener("click", function() {
//   Swal.fire({
//     title: "Show Two Buttons Inside the Alert",
//     showCancelButton: true,
//     confirmButtonText: "Confirm",
//     confirmButtonColor: "#00ff99",
//     cancelButtonColor: "#ff0099"
//   });
// });


document.querySelector(".use").addEventListener('click', function(){
    Swal.fire("ROhit Kumar Rana", "LaxmiKanta Jwellers",   "");
                                                
});
  </script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>
<?php  
}
?>