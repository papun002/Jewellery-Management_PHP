<!-- HTML starts here ---------------------------------------------------------------------------------------- -->
<?php
session_start();
include('../db.php');

// checking session is valid or not 
if (strlen($_SESSION['staff_logid'] == 0)) {
    header('location:logout.php');
} else {


	$client_id = $_SESSION['client_id'];
	$_SESSION['msg'] ="";

	if(isset($_POST['submit'])){
			$bill_no = $_POST['bill_no'];
			
			$datetime = $_POST['datetime'];
			$cname = $_POST['cname'];
			$cmobile = $_POST['cmobile'];
			$caddress = $_POST['caddress'];
			$price_pergram = $_POST['price_pergram'];
			$making_charge = $_POST['making_charge'];
			$total = $_POST['total'];
			$gst = $_POST['gst'];
			$grand_total = $_POST['grand_total'];
			$discount = $_POST['discount'];
			$balance = $_POST['balance'];

			//from dynamic html
			$barcode = $_POST['barcode'];
			$pdt_price = $_POST['pprice'];
			

			if($bill_no == 0 or $bill_no == NULL){
						$_SESSION['msg'] ='<div class="alert alert-danger alert-dismissible show fade" >
													<div class="alert-body">
																		<button class="close" data-dismiss="alert"><span>&times;</span></button>
																		Bill No. cannot be zero!
													</div>
								</div>';
			}else{
			
		
			$sql1 = mysqli_query($con, "select * from cus_details_jms where bill_no ='$bill_no'");
								$result1 = mysqli_fetch_array($sql1);
								if ($result1 > 0) {

	$_SESSION['msg'] ='<div class="alert alert-danger alert-dismissible show fade" >
													<div class="alert-body">
																		<button class="close" data-dismiss="alert"><span>&times;</span></button>
																		Bill No. already exits!
													</div>
								</div>';
								//  header('location:add_customer.php');
			} else {
			$sql2= "INSERT INTO `cus_details_jms`(`client_id`, `cus_id`, `bill_no`, `jdate`, `cus_name`, `contact_no`, `cus_add`, `pdt_price_per_gram`, `pdt_mc`, `pdt_total`, `pdt_gst`, `pdt_grand_total`, `pdt_discount`, `pdt_bal`) VALUES ('$client_id',' ','$bill_no','$datetime','$cname','$cmobile','$caddress','$price_pergram','$making_charge','$total','$gst','$grand_total','$discount','$balance')";

			foreach ($barcode as $key => $value) {
								$sql = "INSERT INTO `cus_pdt_jms`( `client_id`, `product_barcode`, `bill_no`, `pdt_price`) VALUES ('".$client_id."','".$value."','".$bill_no."','".$pdt_price[$key]."')";
								$result3 = mysqli_query($con, $sql)    ;
			}

			$result2= mysqli_query($con, $sql2);
			if($result2){
				$status = "out of stock";
				$sts = strval($status);
				$sql5 = "UPDATE `product_jms` SET status=$sts WHERE `client_id`='$client_id' and `product_barcode`='$barcode';";
				mysqli_query($con,$sql5);				
							
						$_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;>
													<div class="alert-body">
																		<button class="close" data-dismiss="alert"><span>&times;</span></button>
																		Customer Added Successfully!
													</div>
								</div>';
														//     echo "<script>window.location = 'add_customer.php';</script>";
														//     header ("location:add_customer.php");
			}
			

}
}
}

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
	<title>Jewellary Management system </title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS Libraries -->
	<link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

	<!-- Template CSS -->
	<link rel="stylesheet" href="assets/css/style.min.css">
	<link rel="stylesheet" href="assets/css/components.min.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

	<style>
		.invoice {
			background-image: linear-gradient(rgb(187, 255, 0), rgb(255, 213, 44));
		}

		.invoice-form {
			margin-bottom: 0px !important;
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
</head>

<body>
					<div class="section-body">

					<?php
$billno = $_SESSION['bill_no'];
$sql3 = "SELECT * FROM `view_all_cus_details` WHERE client_id='$client_id' and bill_no = $billno";
$rs3 = mysqli_query($con,$sql3);
if($rs3){
$row = mysqli_fetch_array($rs3);

?>
<div class="invoice" id="print">
							<div class="invoice-print">
								<div class="row">
									<div class="col-lg-12">
										<div class="section-1">
											<div class="invoice-title">
												<img src="assets/img/Section1.png" style="width:100%; height: auto;"
													alt="Invoice">
												<h4> Details </h4>
												<div class="invoice-number"></div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-8">
												<div class="card" style="border: 1px solid black">
													<div class="card-body" style="padding-bottom: 0px;">
														<form action="" method="post">
															<div class="row">
																<div class="form-group col-8 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for=""
																			style="margin: 0 8px 0  0px;"><strong>Name</strong></label>
																		<input type="text" class="form-control"
																			placeholder="" aria-label="" name="category"
																			style="border: none;" value="<?php echo $row['cus_name']; ?>">
																	</div>
																</div>
																<div class="form-group col-4 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for=""
																			style="margin: 0 8px 0  0px;"><strong>Mob</strong></label>
																		<input type="text" class="form-control"
																			placeholder="" aria-label="" name="category"
																			style="border: none;" value="<?php echo $row['contact_no']; ?>">
																	</div>
																</div>
																<div class="form-group col-7 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for=""
																			style="margin: 0 8px 0  0px;"><strong>Address</strong></label>
																		<input type="text" class="form-control"
																			placeholder="" aria-label="" name="category"
																			style="border: none;" value="<?php echo $row['cus_add']; ?>">
																	</div>
																</div>
																<div class="form-group col-5 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for=""
																			style="margin: 0 8px 0  0px;"><strong>Rate
																				per 10gm. Rs.</strong></label>
																		<input type="text" class="form-control"
																			placeholder="" aria-label="" name="category"
																			style="border: none;" value="<?php echo $row['pdt_price_per_gram'] * 10; ?>">
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>

											<div class="col-md-4">
												<div class="card" style="border: 1px solid black">
													<div class="card-body" style="padding-bottom: 0px;">
														<form action="" method="post">
															<div class="row">
																<div class="form-group col-12 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for=""
																			style="margin: 0 8px 0  0px;"><strong>Bill
																				No.</strong></label>
																		<input type="text" class="form-control"
																			placeholder="" aria-label="" name="category"
																			style="border: none;" value="<?php echo $row['bill_no']; ?>">
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="form-group col-12 invoice-form">
																	<div class="input-group md-12 form-inline">
																		<label for="" style="margin: 0 8px 0  0px;"><strong>Date:</strong></label>
																		<input type="text" class="form-control" placeholder="" aria-label="" name="category" style="border: none;" value="<?php echo $row['jdate']; ?>"> 
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- //section 2--------------------------------------------------------------------------------------- -->

								<div class="row">
									<div class="col-md-12">
										<div class="section-title" style="margin-top: 0px;">Order Summary</div>
										<!-- <p class="section-lead">All items here cannot be deleted.</p> -->
										<div class="table-responsive">
											<table class="table table-striped table-hover table-md" border="1px"
												style="background: white;">												
												<tr>
													<th data-width="100">Sl No</th>
													<th>DESCRIPTION OF ORNAMENTS</th>
													<th class="text-center">HSN Code</th>
													<th class="text-center" >Net Weight</th>
													<th class="text-center" >Amount</th>
												</tr>
												<?php
												$cout = 1;
												$sql4 = "SELECT * FROM `view_all_cus_details` WHERE client_id='$client_id' and bill_no = $billno";
												$rs4 = mysqli_query($con,$sql4);
												if($rs4){
													while($row1 = mysqli_fetch_array($rs4)){
														?>
																										<tr>													
																											<td><?php echo $cout; ?></td>
																											<td><?php echo $row1['product_name']; ?></td>
																											<td class="text-center"><?php echo $row1['product_hsn_no']; ?></td>
																											<td class="text-center"><?php echo $row1['product_weight']; ?></td>
																											<td class="text-right"><?php echo $row1['pdt_price']; ?></td>													
																										</tr>
														<?php
														$cout++;
														}
													}
														?>																							


												
											</table>
										</div>
										<div class="row">
											<div class="col-8">
												<div class="images">
													<img src="assets/img/Untitled design.jpg" alt="Terms & Conditions" style="width: 100%; height: auto;">
												</div>
											</div>
											<div class="col-4">
												<div class="table-responsive" style="">
													<table class="table table-striped table-hover table-md" border="1px"
														style="background: white;  ">
														<tr>
															<td data-width="105" data-height="58" class="bg">Total</td>
															<td data-width="105" data-height="58" class="text-right"><?php echo $row['pdt_total']; ?></td>
														</tr>
														<tr>
															<td data-width="105" data-height="50">GST 3%</td>
															<td data-width="105" data-height="50" class="text-right"><?php echo $row['pdt_gst']; ?></td>
														</tr>
														<tr>
															<td data-width="105" data-height="50">Grand Total</td>
															<td data-width="105" data-height="50" class="text-right"><?php echo $row['pdt_grand_total']; ?></td>
														</tr>
														<tr>
															<td data-width="105" data-height="50">Less Balance
															<td data-width="105" data-height="50" class="text-right"><?php echo $row['pdt_discount']; ?></td>
														</tr>
														<tr>
															<td data-width="105" data-height="58">Balance
															<td data-width="105" data-height="58" class="text-right"><?php echo $row['pdt_bal']; ?></td>
														</tr>
													</table>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="invoice-title" style="width: 100%;">
												<img src="assets/img/tuxpi.com.1661101454.jpg"
													style="width:97%; height: auto; margin-left: 15px;" alt="Invoice">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <hr> -->
							<script>
								window.print();
							</script>
						</div>
<?php
}
?>
						<div class="text-md-right no-print">
							<button class="btn btn-warning btn-icon icon-left" onClick="window.print();"><i
									class="fa fa-print"></i> Print</button>
						</div>
						
					</div>

	<!-- General JS Scripts -->
	<script src="assets/bundles/lib.vendor.bundle.js"></script>
	<script src="js/jms.js"></script>

	<!-- Template JS File -->
	<script src="js/scripts.js"></script>
	<script src="js/custom.js"></script>
</body>

<!-- Copyright © 2022 Jewellary Management Sysytem. All Right Reserved -->
</html>
<?php
}
?>