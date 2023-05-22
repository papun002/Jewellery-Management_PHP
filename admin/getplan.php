<?php
 require '../db.php';
 session_start();
 $admin_id = $_SESSION['admin_logid'];

 $plan_id = $_POST['plan_id'];
 $sql = "SELECT * FROM `plan_jms` WHERE plan_id='$plan_id' AND admin_id='$admin_id'";
 $result = mysqli_query($con,$sql);

 $str = array();

 while($row = mysqli_fetch_array($result)){
  $plan_duration = $row['plan_duration'];
  $plan_price = $row['plan_price'];

  $str[] = array("plan_duration" => $plan_duration, "plan_price" => $plan_price);
 }

 echo json_encode($str);


?>