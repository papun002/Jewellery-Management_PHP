<?php
 require '../db.php';
 session_start();
 $client_id = $_SESSION['client_logid'];
if(isset($_POST["pk"])){
    $sql= "UPDATE `order_pdt_jms` SET `order_status`='".$_POST["value"]."' WHERE client_logid = '".$_POST["pk"]."' ";
    
    $conn-> mysqli_query($sql);
    echo done;
}
?>