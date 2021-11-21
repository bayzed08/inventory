<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: login.php");
} else {

    include 'db_connect.php';
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $ipp = getRealIpAddr();

    if (isset($_POST['productnamesearch'])) {

        $productcategory = mysqli_real_escape_string($connect, $_POST['productnamesearch']);
        $model = mysqli_real_escape_string($connect, $_POST['modelname']);
        $brand = mysqli_real_escape_string($connect, $_POST['brand']);
        $PONO = mysqli_real_escape_string($connect, $_POST['POno']);
        $MRNO = mysqli_real_escape_string($connect, $_POST['MRno']);
        $qnty = mysqli_real_escape_string($connect, $_POST['qnty']);
        $warranty = mysqli_real_escape_string($connect, $_POST['warranty']);
        $entrdate = mysqli_real_escape_string($connect, $_POST['entrydate']);
        $entryuser = $_SESSION['sess_user'] . "-" . $ipp;

        $sql = "INSERT
        INTO stockentry (productName,modelName,brandName,Qnty,MR,PO,warranty,entrydate,dbentrydate,entryUser)
                VALUES('$productcategory','$model','$brand','$qnty','$MRNO','$PONO','$warranty','$entrdate',NOW(),'$entryuser')";
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
