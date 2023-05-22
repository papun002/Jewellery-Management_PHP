<?php
 require '../db.php';
 session_start();
 $client_id = $_SESSION['client_id'];

 $product_barcode = $_POST['product_barcode'];
 $sql = "SELECT * FROM `view_product_jms` WHERE product_barcode='$product_barcode' AND client_id='$client_id'";
 $result = mysqli_query($con,$sql);

 $str = array();

 while($row = mysqli_fetch_array($result)){
  $product_id = $row['product_id'];
  $category = $row['category_name'];
  $product_name = $row['product_name'];
  $product_weight = $row['product_weight'];
  $product_huid_no = $row['product_huid_no'];
  $product_hsn_no = $row['product_hsn_no'];
  $product_desc = $row['product_desc'];

  

  $str[] = array("category" => $category, "product_name" => $product_name, "product_weight" => $product_weight, "product_huid_no" => $product_huid_no, "product_hsn_no" => $product_hsn_no, "product_desc" => $product_desc );
 }

 echo json_encode($str);

?>