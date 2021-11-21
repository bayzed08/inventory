<?php
include 'db_connect.php';
if (isset($_POST['productnamesearch'])) {

    $productcategory = mysqli_real_escape_string($connect, $_POST['productnamesearch']);
    $productid = trim(substr($productcategory, strpos($productcategory, "|") + 1));
    $model = mysqli_real_escape_string($connect, $_POST['modelName']);
    $modeldesc = mysqli_real_escape_string($connect, $_POST['modelDesc']);

    //mysqli_real_escape_string($connect,$_POST['entryuser']);
    $sql = "INSERT INTO stockproductmodel(productid,model,modeldesc)
		VALUES('$productid','$model','$modeldesc')";
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
