<!DOCTYPE html>
<html lang="en">

<!-- //Jewellary Management system powered by JMS -->

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <meta name="keywords" content="">
     <meta name="description" content="">  
     <title>Customer &mdash; JMS</title>

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
                                   <div class="breadcrumb-item active"><a href="#">Exchange Product</a></div>
                                   <div class="breadcrumb-item">Add Customer</div>
                              </div>
                         </div>

                         <div class="section-body">
                         <h2 class="section-title">Add Customer of exchange product</h2>
                         <p class="section-lead">Enter all the details of a customer and then sequencially add the product as per customer need.</p>


                              <div class="row">
                                   <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                             <div class="card-header">
                                                  <h4>Add Customer</h4>
                                             </div>

                                             <div class="card-body">
                                                  <div class="section-title mt-0">Details</div>
                                                  <div class="row">
                                                       <div class="form-group col-6">
                                                            <label>Bill No:</label>
                                                            <input type="text" class="form-control" name="bill_no">
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
                                                       <div class="form-group col-4">
                                                            <label>Product Type:</label>
                                                            <Select class="form-control select2" name="ptype">
                                                                 <option value="">Please Select here</option>
                                                                 <option value="gold">Gold</option>
                                                                 <option value="silver">Silver</option>
                                                                 <option value="both">Both</option>
                                                            </Select>
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Product Name:</label>
                                                            <input type="text" class="form-control" name="pname">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Product weight:</label>
                                                            <input type="number" class="form-control" name="pweight">
                                                       </div>

                                                       <div class="form-group col-12">
                                                            <label>Product Description:</label>
                                                            <input type="text" class="form-control" name="pdesc">
                                                       </div>
                                                  </div>

                                                  <div class="section-title mt-0">Product Details</div>
                                                  <div class="row">

                                                       <div class="form-group col-4">
                                                            <label>Price Per Gram:</label>
                                                            <input type="text" class="form-control" name="price_pergram">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Making Charges:</label>
                                                            <input type="number" class="form-control"
                                                                 name="making_charge">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Discount:</label>
                                                            <input type="number" class="form-control" name="discount">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>GST(3%):</label>
                                                            <input type="number" class="form-control" name="gst">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Total:</label>
                                                            <input type="number" class="form-control" name="total">
                                                       </div>

                                                       <div class="form-group col-4">
                                                            <label>Grand Total(Applying GST):</label>
                                                            <input type="number" class="form-control"
                                                                 name="grand_total">
                                                       </div>

                                                  </div>
                                                  <div class="buttons col-12">

                                                       <!-- <a href="#" class="btn btn-primary col-12" name="Reset">Clear</a> -->
                                                       <a href="#" class="btn btn-primary col-12"
                                                            name="submit">Submit</a>

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

     <!-- Template JS File -->
     <script src="js/scripts.js"></script>
     <script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->

</html>