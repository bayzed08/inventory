<?php
require_once 'db_connect.php';
//product search
$sql2 = "SELECT distinct sp.productName productname
         FROM stockentry sp
         where sp.productName like '%$_GET[productnamesearch]%'
         order by sp.productName";
$data1 = mysqli_query($connect, $sql2);
while ($resultproduct = $data1->fetch_assoc()) {
    echo "<li style='border-radius:3px;background-color : #d1d1d1;
    box-shadow: .8px 2px lightgray, -.1em 0 .4em olive;'>$resultproduct[productname]</li>";
}
