<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "databaseName";

$con = mysqli_connect($server,$username,$password,$database);
if(!$con){
    echo "Not Connected";
}
?>
