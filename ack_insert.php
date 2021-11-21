<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
	header("Location: login.php");
} else {
?>
<?php
	include 'db_connect.php';
	//if(isset($_POST['salcode'])||isset($_POST['productnamesearch'])||isset($_POST['Model'])||isset($_POST['sunit']))
	//if(isset($_POST['saveacknowlwgementdata']))
	if (isset($_POST['search'])) {
		//$userid=mysqli_real_escape_string($connect,$_POST['salcode']);
		$uname = mysqli_real_escape_string($connect, $_POST['search']);
		$salcode = trim(substr($uname, strpos($uname, "|") + 1));
		$userid = $salcode;
		$productname = mysqli_real_escape_string($connect, $_POST['productnamesearch']);
		$brand = mysqli_real_escape_string($connect, $_POST['brandSearch']);
		$model = mysqli_real_escape_string($connect, $_POST['modelname']);
		$supplyqnty = mysqli_real_escape_string($connect, $_POST['supplyunit']);
		$remarks = mysqli_real_escape_string($connect, $_POST['remarks']);
		$transferdate = mysqli_real_escape_string($connect, $_POST['transferdate']);
		$entryuserid = $_SESSION['sess_user'];
		//mysqli_real_escape_string($connect,$_POST['entryuser']);
		$sql = "INSERT INTO acknowledgetab (userid,productname,brand,model,supplyqnty,remarks,entryuserid,transferdate,entrydate)
		VALUES('$userid','$productname','$brand','$model','$supplyqnty','$remarks','$entryuserid','$transferdate',now())";
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
}
?>