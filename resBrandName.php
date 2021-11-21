<?php
require_once 'db_connect.php';

$sql3 = "SELECT spb.brandname
FROM stockproduct sp, stockproductbrand spb
WHERE sp.id=spb.productid AND sp.Productname ='$_GET[productnamesearch]'
ORDER BY spb.brandname";
$data2 = mysqli_query($connect, $sql3);
while ($resultbrand = $data2->fetch_assoc()) {
    echo "<ol style='border-radius:5px;background-color : #d1d1d1;
    box-shadow: 1px 3px lightgray, -.1em 0 .4em olive;'>$resultbrand[brandname]</ol>";
}
