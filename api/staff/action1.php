<?php

//action.php

$connect = new PDO("mysql:host=localhost;dbname=j", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('jdate', 'bill_no', 'cus_name','category_name','product_name', 'product_weight', 'product_huid_no','pdt_price');

		$main_query = " SELECT 'jdate', 'bill_no', 'cus_name','category_name','product_name', 'product_weight', 'product_huid_no','pdt_price' FROM view_all_cus_details ";

		$search_query = 'WHERE jdate <= "'.date('Y-m-d').'" AND ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'jdate >= "'.$_POST["start_date"].'" AND jdate <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(order_number LIKE "%'.$_POST["search"]["value"].'%" OR order_total LIKE "%'.$_POST["search"]["value"].'%" OR order_date LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY jdate ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY jdate DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $connect->prepare($main_query . $search_query . $group_by_query . $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $connect->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $connect->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

			$sub_array[] = $row['jdate'];

			$sub_array[] = $row['bill_no'];

			$sub_array[] = $row['cus_name'];
			$sub_array[] = $row['category_name'];
			$sub_array[] = $row['product_name'];
			$sub_array[] = $row['product_weight'];
			$sub_array[] = $row['product_huid_no'];
			$sub_array[] = $row['pdt_price'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}
}

?>