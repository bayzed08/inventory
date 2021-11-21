<?php
session_start();
if (!isset($_SESSION["sess_user"])) {
    header("Location: login.php");
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>ERL Basic</title>
        <?php
        include("header.php");
        require_once 'db_connect.php';
        date_default_timezone_set("Asia/Dhaka");
        include("function.php");

        error_reporting(0);
        ?>
        <link rel="stylesheet" type="text/css" href="custom/css/stockEntry.css">

    </head>

    <body>
        <div class="container">
            <?php
            include("menu.php");
            ?>
            <div class="container-fluid text-center fullbody">
                <div class="logposition">
                    <?= $_SESSION['sess_user']; ?><button class="btn btn-outline-info btn-sm" type="button" onclick="window.location.href='logout.php'">Logout</button>
                </div>
                <div class="row content">
                    <!--Show stock Product Model List-->
                    <div class="col-sm-12 text-left  StockEntry" id="StockEntry">
                        <h4 id="StockEntryForm" class="StockEntryHead"> Stock Entry Form <span class="glyphicon glyphicon-menu-down"></span> </h4>
                        <hr>
                        <div>
                            <form id="addStockDataform" name="addStockDataform">
                                <div class="form-group" style="width:100%;">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="text" name="productnamesearch" id="productnamesearch" class="form-control" placeholder="Product Category Name" autocomplete="off" required>
                                            <div id="resultproduct"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand Name" autocomplete="off" required>
                                            <div id="resultBrand"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <input type="text" name="modelname" id="modelname" class="form-control" placeholder="Model Name" autocomplete="off" required>
                                            <div id="resultmodel"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" name="qnty" id="qnty" class="form-control" placeholder="Quantity" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input type="text" name="MRno" class="form-control" placeholder="MR No.">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="POno" class="form-control" placeholder="PO No.">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="warranty" class="form-control" placeholder="Warranty">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-2" style="text-align:right;">
                                            <label for="entrydate" class="form-control-label" style="padding:8px;">Entry date</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="date" name="entrydate" id="entrydate" value="<?php echo date("Y-m-d"); ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <button id="submit12" name="submit12" type="submit" class="btn btn-primary">submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="msg"></div>
                        </div>
                    </div>
                    <!--Show stock stock List-->
                    <div class="col-sm-12 StockEntry" id="">
                        <br>
                        <h4 class="StockEntryHead" id="stockListHead">Stock Entry List
                            <span class="glyphicon glyphicon-menu-down"></span>
                        </h4>
                        <hr>


                        <div id="stockList" class="table-responsive">
                            <div class="input-group rounded">
                                <input type="text" class="form-control rounded mysearch" id="mysearch" onkeyup="searchStock()" placeholder="Search anything here..." />
                            </div>
                            <br>
                            <?php
                            $sql123 = "SELECT se.productName,
                            se.brandName,
                            se.modelName ,
                            se.Qnty,
                            CONCAT(se.MR,'--',se.PO) MR_PO,
                            se.warranty,
                            DATE(se.entrydate) entrydate
                            FROM stockentry se
                            ORDER BY se.entrydate";
                            $result123 = mysqli_query($connect, $sql123);
                            echo "<table id='StockEntryTable' class='table table-hover' style='width:100%;' >";
                            echo "<tr style='font-size:16px;padding:10px;width:100%'>
                                         <th style='width:2%;border:1px solid black;text-align:center;'>No</th>
                                         <th style='width:10%;border:1px solid black;text-align:center;'>EntryDate</th>
                                         <th style='width:15%;border:1px solid black;text-align:center;'>Product</th>
                                         <th style='width:15%;border:1px solid black;text-align:center;'>Brand</th>
                                         <th style='width:20%;border:1px solid black;text-align:center;'>Model</th>
                                         <th style='width:4%;border:1px solid black;text-align:center;'>Qnty</th>
                                         <th style='width:12%;border:1px solid black;text-align:center;'>MR--PO</th>
                                         <th style='width:2%;border:1px solid black;text-align:center;'>Warranty</th>
                                    </tr>";
                            $i = 0;
                            while ($row123 = $result123->fetch_assoc()) :
                                ++$i;
                                echo "<tr style='font-size:17px;padding:1px;'>
                                        <td>$i</td>
                                        <td>" . $row123['entrydate'] . "</td>
                                        <td>" . $row123['productName'] . "</td>
                                        <td>" . $row123['brandName'] . "</td>
                                        <td>" . $row123['modelName'] . "</td>
                                        <td>" . $row123['Qnty'] . "</td>
                                        <td>" . $row123['MR_PO'] . "</td>
                                        <td>" . $row123['warranty'] . "</td>
                                </tr>";
                            endwhile;
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 StockEntry" id="Stock Report">
                        <br>
                        <h4 class="StockEntryHead" id="stockListHead">Stock Report
                            <span class="glyphicon glyphicon-menu-down"></span>
                        </h4>
                        <hr>
                        <div>
                            <form id="stockreport" class="stockreport">
                                <div class="form-group" style="width:100%">
                                    <div class="form-group row">
                                        <div class="col-sm-2" style="text-align:right;">
                                            <label for="entrydate" class="form-control-label" style="padding:8px;">To date</label>
                                        </div>
                                        <div class="col-sm-2">
                                            <input class="form-control" type="date" name="entrydate" id="entrydate" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-8">
                                            <button id="submit12" name="submit12" type="submit" class="btn btn-primary">submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="stockList" class="table-responsive">
                            <div class="input-group rounded">
                                <input type="text" class="form-control rounded mysearch" id="mysearch" onkeyup="searchStock()" placeholder="Search anything here..." />
                            </div>
                            <br>
                            <?php
                            $sql123 = "SELECT se.productName,
                            se.brandName,
                            se.modelName ,
                            se.Qnty,
                            CONCAT(se.MR,'--',se.PO) MR_PO,
                            se.warranty,
                            DATE(se.entrydate) entrydate
                            FROM stockentry se
                            ORDER BY se.entrydate";
                            $result123 = mysqli_query($connect, $sql123);
                            echo "<table id='StockEntryTable' class='table table-hover' style='width:100%;' >";
                            echo "<tr style='font-size:16px;padding:10px;width:100%'>
                                         <th style='width:2%;border:1px solid black;text-align:center;'>No</th>
                                         <th style='width:10%;border:1px solid black;text-align:center;'>EntryDate</th>
                                         <th style='width:15%;border:1px solid black;text-align:center;'>Product</th>
                                         <th style='width:15%;border:1px solid black;text-align:center;'>Brand</th>
                                         <th style='width:20%;border:1px solid black;text-align:center;'>Model</th>
                                         <th style='width:4%;border:1px solid black;text-align:center;'>Qnty</th>
                                         <th style='width:12%;border:1px solid black;text-align:center;'>MR--PO</th>
                                         <th style='width:2%;border:1px solid black;text-align:center;'>Warranty</th>
                                    </tr>";
                            $i = 0;
                            while ($row123 = $result123->fetch_assoc()) :
                                ++$i;
                                echo "<tr style='font-size:17px;padding:1px;'>
                                        <td>$i</td>
                                        <td>" . $row123['entrydate'] . "</td>
                                        <td>" . $row123['productName'] . "</td>
                                        <td>" . $row123['brandName'] . "</td>
                                        <td>" . $row123['modelName'] . "</td>
                                        <td>" . $row123['Qnty'] . "</td>
                                        <td>" . $row123['MR_PO'] . "</td>
                                        <td>" . $row123['warranty'] . "</td>
                                </tr>";
                            endwhile;
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="cleaner h80"></div>
                <script type="text/javascript" src="custom/js/stockEntry.js"></script>
            </div>
            <?php
            include("footer.php");
            ?>
        </div>
    </body>

    </html>
<?php
}
?>