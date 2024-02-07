<?php
session_start();
include('../db.php');
// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
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
 <title>Customer &mdash; JMS</title>

 <!-- General CSS Files -->
 <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css" />
 <!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

 <!-- CSS Libraries -->
 <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css" />
 <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css" />
 <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css" />

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
      <h1>Customer Section</h1>
      <div class="section-header-breadcrumb">
       <div class="breadcrumb-item active">
        <a href="#">Old Product</a>
       </div>
       <div class="breadcrumb-item">All Customer</div>
      </div>
     </div>

     <div class="section-body">
     <h2 class="section-title">Customer details of buying old product</h2>
      <p class="section-lead">Show all the details of customers who buying their old products</p>

      <div class="row">
       <div class="col-12">
        <div class="card">
         <div class="card-header">
          <h4>All Customer</h4>
         </div>
         <div class="card-body">                 
          <div class="table-responsive">
           <table class="table table-striped v_center" id="table-2">
            <div class="dt-buttons">
             <a class="dt-button buttons-copy buttons-html5 btn btn-primary" tabindex="0"
              aria-controls="DataTables_Table_1" href="#"><span>Copy</span></a>
             <a class="dt-button buttons-csv buttons-html5 btn btn-primary" tabindex="0"
              aria-controls="DataTables_Table_1" href="#"><span>CSV</span></a>
             <a class="dt-button buttons-excel buttons-html5 btn btn-primary" tabindex="0"
              aria-controls="DataTables_Table_1" href="#"><span>Excel</span></a>
             <a class="dt-button buttons-pdf buttons-html5 btn btn-primary" tabindex="0"
              aria-controls="DataTables_Table_1" href="#"><span>PDF</span></a>
             <a class="dt-button buttons-print btn btn-primary" tabindex="0"
              aria-controls="DataTables_Table_1 btn btn-primary" href="#"><span>Print</span></a>
            </div>
            <thead>
             <tr>
              <th class="text-center">
               <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input"
                 id="checkbox-all" />
                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
               </div>
              </th>
              <th>Task Name</th>
              <th>Progress</th>
              <th>Members</th>
              <th>Due Date</th>
              <th>Status</th>
              <th>Action</th>
             </tr>
            </thead>
            <tbody>
             <tr>
              <td>
               <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1" />
                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
               </div>
              </td>
              <td>Create a mobile app</td>
              <td class="align-middle">
               <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                <div class="progress-bar bg-success" data-width="100%"></div>
               </div>
              </td>
              <td>
               <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Wildan Ahdian" />
              </td>
              <td>2018-01-20</td>
              <td>
               <div class="badge badge-success">Completed</div>
              </td>
              <td>
               <a href="#" class="btn btn-secondary">Detail</a>
              </td>
             </tr>
             <tr>
              <td>
               <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2" />
                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
               </div>
              </td>
              <td>Redesign homepage</td>
              <td class="align-middle">
               <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                <div class="progress-bar" data-width="0"></div>
               </div>
              </td>
              <td>
               <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Nur Alpiana" />
               <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Hariono Yusup" />
               <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Bagus Dwi Cahya" />
              </td>
              <td>2018-04-10</td>
              <td>
               <div class="badge badge-info">Todo</div>
              </td>
              <td>
               <a href="#" class="btn btn-secondary">Detail</a>
              </td>
             </tr>
             <tr>
              <td>
               <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3" />
                <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
               </div>
              </td>
              <td>Backup database</td>
              <td class="align-middle">
               <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                <div class="progress-bar bg-warning" data-width="70%"></div>
               </div>
              </td>
              <td>
               <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Debra Stewart" />
               <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Susie Willis" />
              </td>
              <td>2018-01-29</td>
              <td>
               <div class="badge badge-warning">
                In Progress
               </div>
              </td>
              <td>
               <a href="#" class="btn btn-secondary">Detail</a>
              </td>
             </tr>
             <tr>
              <td>
               <div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4" />
                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
               </div>
              </td>
              <td>Input data</td>
              <td class="align-middle">
               <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                <div class="progress-bar bg-success" data-width="100%"></div>
               </div>
              </td>
              <td>
               <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Debra Stewart" />
               <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Isnap Kiswandi" />
               <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Yudi Nawawi" />
               <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"
                data-toggle="tooltip" title="Khaerul Anwar" />
              </td>
              <td>2018-01-16</td>
              <td>
               <div class="badge badge-success">Completed</div>
              </td>
              <td>
               <a href="#" class="btn btn-secondary">Detail</a>
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
    </section>
   </div>

   <!-- Call to footer part -->
   <?php include 'partials/footer.php'; ?>
  </div>
 </div>

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