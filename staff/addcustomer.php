<?php
include('../db.php');

     $_SESSION['msg'] ="submit";
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
       
  
       $client_id = $_SESSION['client_id'];
      
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
       $sql2= "INSERT INTO `cus_details_jms`(`client_id`, `cus_id`, `bill_no`, `date`, `cus_name`, `contact_no`, `cus_add`, `pdt_price_per_gram`, `pdt_mc`, `pdt_total`, `pdt_gst`, `pdt_grand_total`, `pdt_discount`, `pdt_bal`) VALUES ('$client_id',' ','$bill_no','$datetime','$cname','$cmobile','$caddress','$price_pergram','$making_charge','$total','$gst','$grand_total','$discount','$balance')";
  
       $result2= mysqli_query($con, $sql2);
       if($result2){
           
          $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible show fade" style="background-color:#0db10d;>
                 <div class="alert-body">
                      <button class="close" data-dismiss="alert"><span>&times;</span></button>
                      Customer Added Successfully!
                 </div>
            </div>';
                      echo "<script>window.location = 'add_customer.php';</script>";
                      header ("location:add_customer.php");
       }
  
       foreach ($barcode as $key => $value) {
            $sql = "INSERT INTO `cus_pdt_jms`( `client_id`, `product_barcode`, `bill_no`, `pdt_price`) VALUES ('".$client_id."','".$value."','".$bill_no."','".$pdt_price[$key]."')";
            $result3 = mysqli_query($con, $sql)    ;
       }
       
  
  }
  }
 
?>