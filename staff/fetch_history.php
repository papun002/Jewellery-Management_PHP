<?php
//fetch.php
// session_start();
// include('../db.php');
$connect = mysqli_connect("localhost", "root", "", "j");
$column = array("jdate", "bill_no", "cus_name", "product_name", "product_weight", "product_huid_no", "pdt_gst", "pdt_price");
$query = "
 SELECT * FROM view_all_cus_details WHERE 
";

if(isset($_POST["is_days"]))
{
 $query .= "jdate BETWEEN CURDATE() - INTERVAL ".$_POST["is_days"]." DAY AND CURDATE() AND ";
}

if(isset($_POST["search"]["value"]))
{
 $query .= '(cus_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product_name LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR bill_no LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR jdate LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR pdt_price LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR pdt_gst LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product_weight LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR product_huid_no LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY jdate DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = $row["jdate"];
 $sub_array[] = $row["bill_no"];
 $sub_array[] = $row["cus_name"];
 $sub_array[] = $row["product_name"];
 $sub_array[] = $row["product_weight"];
 $sub_array[] = $row["product_huid_no"];
 $sub_array[] = $row["pdt_gst"];
 $sub_array[] = $row["pdt_price"];
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM view_all_cus_details";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>