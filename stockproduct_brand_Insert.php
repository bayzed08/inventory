<?php
include 'db_connect.php';
if (isset($_POST['productnamesearch2'])) {

	$productcategory = mysqli_real_escape_string($connect, $_POST['productnamesearch2']);
	$productid = trim(substr($productcategory, strpos($productcategory, "|") + 1));
	$brand = mysqli_real_escape_string($connect, $_POST['brandname']);

	//mysqli_real_escape_string($connect,$_POST['entryuser']);
	$sql = "INSERT INTO stockproductbrand(productid,brandname,createdate)
		VALUES('$productid','$brand',now())";
	if (mysqli_query($connect, $sql)) {
		//  $validator['success']=true;
		//  $validator['messages']="Successfully Data Inserted";
		echo "OK";
		// header("Location: acknowledgment2.php");
	} else {
		//  $validator['success']=false;
		//  $validator['messages']="No Data Inserted";
		echo "NOT OK";
	}
}
mysqli_close($connect);
//echo json_encode($validator);
