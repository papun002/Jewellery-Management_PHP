<?php
$server = "10.35.11.173";
$username = "root";
$password = "";
$database = "j";

$con = mysqli_connect($server,$username,$password,$database);
if(!$con){
    echo "Not Connected";
}
?>
