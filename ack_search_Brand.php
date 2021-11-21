<?php
require_once 'db_connect.php';
//product model search of product search
//$sql2="SELECT spm.model FROM stockproductmodel spm WHERE spm.model like '%$_GET[productnamesearch]%' LIMIT 7";
$sql6 = "SELECT distinct(spm.brandName)  FROM stockentry spm WHERE spm.productName like '%$_GET[productnamesearch]%'
ORDER BY brandName";
$data6 = mysqli_query($connect, $sql6);
while ($resultBrand = $data6->fetch_assoc()) {
    echo "<dl style='border-radius:5px;background-color : #d1d1d1;
    box-shadow: 1px 3px lightgray, -.1em 0 .4em olive;'>$resultBrand[brandName]</dl>";
}
