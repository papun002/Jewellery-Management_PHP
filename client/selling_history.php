<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['client_logid'] == 0)) {
    header('location:logout.php');
} else {

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
            <h1>History Section</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item">Selling History</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Add Customer of buying old products</h2>
            <p class="section-lead">
              Enter all the details of a customer and then sequencially add
              the product as per customer need.
            </p>

            <!-- //another section -->
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>View Product</h4>
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
                    <div class="table-responsive mt-3">
                      <table class="table table-striped v_center " id="example">
                        <thead>
                          <tr>
                            <th class="text-center">
                              SL No.
                            </th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Weight (In Gram)</th>
                            <th>HUID No.</th>
                            <th>Description</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>


                          <!-- table data starts here -->
                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>

                          <tr>
                            <td class="text-center">
                              1
                            </td>
                            <td>Bangles</td>
                            <td class="align-middle">
                              Bangle
                            </td>
                            <td>
                              5.2
                            </td>
                            <td>45698A</td>
                            <td>
                              <div>2/6</div>
                            </td>
                            <td>
                              <a href="#" class="btn btn-secondary">Edit</a>
                            </td>
                          </tr>


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