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
        <link rel="stylesheet" type="text/css" href="custom/css/stockproduct.css">
    </head>

    <body>
        <div class="container">
            <?php
            include("menu.php");
            ?>
            <div class="container-fluid text-center">
                <div class="row content">
                    <div class="logposition">
                        <?= $_SESSION['sess_user']; ?><button class="btn btn-outline-info btn-sm" type="button" onclick="window.location.href='logout.php'">Logout</button>
                    </div>

                    <!--Show stock Product Model List-->
                    <div class="col-sm-6 text-left" id="stockProductList">
                        <hr>
                        <h3 id="ProductModelEntryHead" class="stockheadtitle">ADD Product Model <span class="glyphicon glyphicon-menu-down"></span> </h3>
                        <hr>
                        <div id="AddModelBody" class="stockBrandbody">
                            <div id="msg" style="width:100%;float:float-lg-none"></div>
                            <form id="addModelDataform" name="addModelDataform">
                                <div class="form-group" style="width:100%;">
                                    <div class="form-group row">
                                        <label for="productnamesearch" class="col-sm-4 col-form-label inputlabel">পন্যের নামঃ</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="productnamesearch" id="productnamesearch" class="form-control" placeholder="Product Category Name" autocomplete="off" required>
                                            <div id="resultproduct"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modelName" class="col-sm-4 col-form-label inputlabel">মডেলের নামঃ</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="modelName" id="modelName" class="form-control" placeholder="Model Name" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="modelDesc" class="col-sm-4 col-form-label inputlabel">মডেলের বর্ণনাঃ </label>
                                        <div class="col-sm-8">
                                            <input type="text" name="modelDesc" id="modelDesc" class="form-control" placeholder="Model Desc" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <button id="submit12" name="submit12" type="submit" class="btn btn-primary">submit
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <hr>
                        <h3 id="stockProductHead" class="stockheadtitle">Product Model List<span class="glyphicon glyphicon-menu-down"></span> </h3>
                        <hr>
                        <div id="stockProductBody" class="stockbody">
                            <input type="text" name="" class="modelSearch" id="myinput1" onkeyup="searchFromModelname()" placeholder="Search anything here...">
                            <?php
                            $sql555 = "SELECT sp.Productname,
                                            spm.model,
                                            spm.modeldesc
                                    FROM stockproduct sp,stockproductmodel spm
                                    WHERE sp.id=spm.productid
                                    ORDER BY sp.Productname,spm.model";
                            $result555 = mysqli_query($connect, $sql555);
                            echo "<table id='ModelTable' style='width:100%;background-color:#dbdde0;'>";
                            echo "<tr style='font-size:16px;padding:10px;'>
                                                    <th style='width:5%;border:1px solid black;text-align:center;'>No</th>
                                                    <th style='width:25%;border:1px solid black;text-align:center;'>Product Category</th>
                                                    <th style='width:30%;border:1px solid black;text-align:center;'>ProductModel</th>
                                                    <th style='width:40%;border:1px solid black;text-align:center;'>Model Desc</th>
                                    </tr>";
                            $i = 0;
                            while ($row555 = $result555->fetch_assoc()) :
                                ++$i;
                                echo "<tr style='font-size:13px;font-family:Tahoma;padding:1px;'>
                                        <td>$i</td>
                                        <td>" . $row555['Productname'] . "</td>
                                        <td>" . $row555['model'] . "</td>
                                        <td>" . $row555['modeldesc'] . "</td>

                                </tr>";
                            endwhile;
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                    <!--Show stock Product Brand List-->
                    <div class="col-sm-6 text-left" id="ProductBrandList">
                        <hr>
                        <h3 id="AddBrandHead" class="stockheadtitle">Add New Brand<span class="glyphicon glyphicon-menu-down"></span> </h3>
                        <hr>
                        <div id="AddBrandBody" class="stockBrandbody">
                            <div id="msg2" style="width:100%;float:float-lg-none"></div>
                            <form id="brandDataform" name="brandDataform">
                                <div class="form-group" style="width:100%;">
                                    <div class="form-group row">
                                        <label for="productnamesearch2" class="col-sm-4 col-form-label inputlabel">পন্যের নামঃ</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="productnamesearch2" id="productnamesearch2" class="form-control" placeholder="Product Category Name" autocomplete="off" required>
                                            <div id="resultproduct2"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="brandname" class="col-sm-4 col-form-label inputlabel">ব্র্যান্ডের নামঃ</label>
                                        <div class="col-sm-8">
                                            <input type="text" name="brandname" id="brandname" class="form-control" placeholder="Brand Name" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row">
                                        <div class="col-sm-4"></div>
                                        <div class="col-sm-8">
                                            <button id="submit12" name="submit12" type="submit" class="btn btn-primary">submit
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <hr>
                        <h3 id="ProductBrandHead" class="stockheadtitle"> Product Brand List<span class="glyphicon glyphicon-menu-down"></span> </h3>
                        <hr>
                        <div id="ProductBrandBody" class="stockbody">
                            <?php
                            $sql555 = "SELECT sp.Productname,
                                                spb.brandname
                                        FROM stockproduct sp,stockproductbrand spb
                                        WHERE sp.id=spb.productid
                                        ORDER BY sp.Productname,spb.brandname";
                            $result555 = mysqli_query($connect, $sql555);
                            echo "<table style='width:100%;background-color:#dbdde0;'>";
                            echo "<tr style='font-size:16px;padding:10px;'>
                                                    <th style='width:2%;border:1px solid black;text-align:center;'>No</th>
                                                    <th style='width:40%;border:1px solid black;text-align:center;'>Category</th>
                                                    <th style='width:50%;border:1px solid black;text-align:center;'>ProductBrand</th>
                                    </tr>";
                            $i = 0;
                            while ($row555 = $result555->fetch_assoc()) :
                                ++$i;
                                echo "<tr style='font-size:13px;font-family:Tahoma;padding:2px;'>
                                        <td>$i</td>
                                        <td>" . $row555['Productname'] . "</td>
                                        <td>" . $row555['brandname'] . "</td>

                                </tr>";
                            endwhile;
                            echo "</table>";
                            ?>
                        </div>
                    </div>
                </div>
                <div class="cleaner h80"></div>
                <script type="text/javascript" src="custom/js/stockproduct.js"></script>
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