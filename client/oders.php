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
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <meta name="keywords" content="">
     <meta name="description" content="">    
     <title>Orders</title>

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
          @media print {
			.no-print,
			.no-print * {
				display: none !important;
			}
			.bg *{
				background: red !important;
			}
		}
     </style>

<script>
    $(document).ready(function(){
        var date = new Date();
            
        $('.input-daterange').datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            autoclose: true
        });
            
    });
    </script>
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
                                    <div class="col-sm-4">
                                    <div class="row input-daterange">
	            					<div class="col-md-6">
		            					<input type="text" name="from_date" id="from_date" class="form-control form-control-sm" placeholder="From Date" readonly />
		            				</div>
		            				<div class="col-md-6">
		            					<input type="text" name="to_date" id="to_date" class="form-control form-control-sm" placeholder="To Date" readonly />
		            				</div>
		            			</div>
		            		</div>
		            		<div class="col-md-4">
	            				<button type="button" name="filter" id="filter" class="btn btn-info btn-sm"><i class="fa fa-filter"></i></button>
	            				&nbsp;
	            				<button type="button" name="refresh" id="refresh" class="btn btn-secondary btn-sm"><i class="fa fa-sync-alt"></i></button>
	            			</div>
                                        <div class="table-responsive mt-3">
                                            <table class="table table-striped v_center" id="example">
                                                <thead>
                                                    <tr>
                                                      <th></th>
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
                                                  $client_id = $_SESSION['client_logid'];
                                                    $sql2 = "SELECT * FROM `view_order_jms` WHERE client_id='".$client_id."'";
                                                    $result2 = mysqli_query($con,$sql2);
                                                    $count = 1;
                                                    if(mysqli_num_rows($result2)){
                                                        while($row1 = mysqli_fetch_array($result2)){
                                                            ?>
<tr>
    <td class="text-center"><input type="checkbox"></td>
    <td class="text-center"><?php echo $count; ?></td>
    <td class="order_id"><?php echo $row1['order_id']; ?></td>
    <td class="align-middle"><?php echo $row1['date']; ?></td>
    <td><?php echo $row1['cust_name']; ?></td>
    <td><?php echo $row1['cust_contno']; ?></td>
    <td><?php echo $row1['pdt_type']; ?></td>
    <td><?php echo $row1['pdt_name']; ?></td>
    <td><?php echo $row1['est_amt']; ?></td>
    <td><a href="#" class="status" id="sts'.<?php echo $row1['order_id']; ?>.'" data-type="select" data-pk= "'.<?php echo $row1['order_id']; ?>.'" data-url="abc.php" data-name="status"><div class="badge badge-warning"><?php echo $row1['order_status']; ?></div></a></td>
    
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


     <script>
      const status = document.getElementByClassName('status');
      for(var count = 0; count < status.length; count++ )
      {
        const status_data = document.getElementById(status[count].getAttribute("id"));
        const status_popover = new DarkEditable(status_data, {

          source:[
            {
              value: 'Complete',
              text: 'Complete'

            },
            {
              value: 'Pending',
              text: 'Pending'
            }
          ]
        })
      }

      </script>

     <script>
        $(document).ready(function () {
          $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
              {
                extend: 'copyHtml5',
                exportOption: {
                    columns: [ 0, ':visible']
                }
              },
              {
              extend: 'excelHtml5',
                exportOption: {
                    columns: [ 0, ':visible']
                }
              },
              {
              extend: 'pdfHtml5',
                exportOption: {
                    columns: [ 0, ':visible']
                }
              },     
              {
              extend: 'print',
                exportOption: {
                    columns: [ 0, ':visible']
                }
              },
            //   'colvis'
            ]
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

      <script>
    $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $('#visitor_table').DataTable().destroy();
        load_data(from_date, to_date);
    });

    $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        $('#visitor_table').DataTable().destroy();
        load_data();
    });

    </script>

     <!-- JS Libraies -->
     <script src="assets/modules/datatables/datatables.min.js"></script>
     <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
     <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
     <script src="assets/modules/jquery-ui/jquery-ui.min.js"></script>

     <script src="assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
     <script src="assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
 


     <script src="js/page/modules-datatables.js"></script>
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