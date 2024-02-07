<?php
print_r($_POST);

require '../db.php';
session_start();
 $client_id = $_SESSION['client_id'];
 $bill_no = $_POST['bill_no'];


foreach ($bill_no as $key => $value) {
 $sql = "INSERT INTO `cus_pdt_jms`(`slno`, `client_id`, `product_barcode`, `bill_no`, `pdt_price`) VALUES ('','$client_id',':barcode','$bill_no',':pdt_price')";

 // $sql = "INSERT INTO `cus_pdt_jms`(`slno`, `client_id`, `product_id`, `cus_id`, `product_barcode`, `bill_no`, `pdt_price`) VALUES ('','$client_id',':pdt_id ',':cus_id',':barcode',':bill_no',':pdt_price')";

 $stmt = $con->prepare($sql);
 $stmt->execute([
  
  'barcode' => $_POST['barcode'][$key],
  'pdt_price' => $_POST['pprice'][$key],



  

 ]);
}
echo "Item inserted successfully";






?>