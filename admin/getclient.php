<?php
 require '../db.php';
 session_start();
 $admin_id = $_SESSION['admin_logid'];

 $client_id = $_POST['client_id'];
 $sql = "SELECT * FROM `client_jms` WHERE client_id='$client_id' AND admin_id='$admin_id'";
 $result = mysqli_query($con,$sql);

 $str = array();

 while($row = mysqli_fetch_array($result)){
  $client_contact = $row['client_contact'];
  $contact_person = $row['contact_person'];

  $str[] = array("client_contact" => $client_contact, "contact_person" => $contact_person);
 }

 echo json_encode($str);


?>