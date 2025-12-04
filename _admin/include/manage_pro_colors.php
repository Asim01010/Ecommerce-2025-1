<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add Product Colors</h1>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('ob_bookdisc');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
    });
</script>

<BR>
<link href="css/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.tabs.min.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.9.2.tabs.custom.min.js" type="text/javascript"></script>




<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>


<!------------------------------------------------------------ jQUERY TEXT EDITOR ------------------------------------------------------------>

<?php

$ProID = $_GET['ProID'];

if (isset($_POST['delete_procolor'])) {
    $pc_id = $_POST['pc_id'];
    $pc_qty = $_POST['pc_qty'];
    $pro_ava_qty = $_POST['pro_ava_qty'];


    $pc_qty = explode("_", $pc_qty);
    for ($i = 0; $i < count($pc_qty); $i++) {
        $total_qty += $pc_qty[$i];
    }
    $pro_ava_qty = $pro_ava_qty - $total_qty;

    $updateTotalqty = mysqli_query($dbcon, "UPDATE `sm_products` SET `pro_ava_qty`='$pro_ava_qty' WHERE pro_id = $ProID") or die(mysqli_error($dbcon));

    $GETcolor = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_id ='$pc_id'") or die(mysqli_error($dbcon));
    if ($row = mysqli_fetch_assoc($GETcolor)) {
        $DeleteLds = "DELETE FROM sm_products_colors WHERE pc_id='$pc_id'";
        $DeleteNewsCheck = mysqli_query($dbcon, $DeleteLds) or die(mysqli_error($dbcon));
        echo "<div class='alert alert-success'>DELETE - Color has been deleted.</div>";
    }
}

if (isset($_POST['add_pro_color'])) {
    $colors = $_POST['colors'];
    $codes = $_POST['codes'];
    $sizes = $_POST['sizes'];
    $quantities = $_POST['quantities'];
    $pro_ava_qty = $_POST['pro_ava_qty'];
    $new_pro_ava_qty = $_POST['new_pro_ava_qty'];

    $pro_ava_qty = $pro_ava_qty + $new_pro_ava_qty;

    $updateTotalqty = mysqli_query($dbcon, "UPDATE `sm_products` SET `pro_ava_qty`='$pro_ava_qty' WHERE pro_id = $ProID") or die(mysqli_error($dbcon));

    // $images = $_FILES['images'];

    for ($i = 0; $i < count($colors); $i++) {
        $color = $colors[$i];
        $code = $codes[$i];
        $size = $sizes[$i];
        $quantity = $quantities[$i];

        $insetColor = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '$ProID', '$color', '$code', '$size', '$quantity')") or die(mysqli_error($dbcon));
    }
    echo "<div class='alert alert-success'>Color has been added!</div>";
}
if (isset($_POST['update_qty'])) {
    $pc_id = $_POST['pc_id'];
    $pc_pro_id = $_POST['pc_pro_id'];
    $pc_qty = $_POST['pc_qty'];
    $pro_ava_qty = $_POST['new_pro_ava_qty'];

    //update product quantity from color
    $updateQty = mysqli_query($dbcon, "UPDATE `sm_products_colors` SET `pc_qty`='$pro_ava_qty' WHERE pc_id = '$pc_id'");
    //fetch quatity of all color
    $currentQtyResult = mysqli_query($dbcon, "SELECT SUM(pc_qty) AS total_qty FROM `sm_products_colors` WHERE pc_pro_id = '$pc_pro_id'");
    $row = mysqli_fetch_assoc($currentQtyResult);
    
    $totalQty = $row['total_qty'];
    //echo $totalQty;
    //update quantity in product table (total quantity)
    $updateQtyPro = mysqli_query($dbcon, "UPDATE `sm_products` SET `pro_ava_qty` = $totalQty WHERE pro_id = '$pc_pro_id'");


    echo "<div class='alert alert-success'>Quantity Updated!</div>";
}


?>
<!-- --------------------------- -->


<div class="SpacingBox"></div>

<div class="wrapper">
    <div class="container form">
        <div class="row">

            <div class="col-sm-10">

                <script>
                    function sumQty() {
                        var qtyArray = $('input[name="quantities[]"]').map(function() {
                            return $(this).val();
                        }).get();

                        var total_qty = 0;

                        for (var i = 0; i < qtyArray.length; i++) {
                            var qtySingleArray = qtyArray[i].split(", ");

                            for (var j = 0; j < qtySingleArray.length; j++) {
                                var qtySingleArray = qtyArray[i].split("_");
                                var qty = parseFloat(qtySingleArray[j]) || 0;
                                total_qty += qty;
                            }
                        }

                        $('#new_pro_ava_qty').val(total_qty);
                    }
                </script>

                <form method="post" enctype="multipart/form-data">
                    <div id="fieldsSet" style="margin-bottom: 30px;">

                        <div class="fieldsSet" style="border-radius: 5px; border: 1px solid #c9cccf; padding: 25px; margin-bottom: 15px;">
                            <button type="button" class="btn btn-danger " style="float: right;" onclick="removeFields(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="color">Color:</label>
                                <div style="display: flex; gap: 18px;">
                                    <input type="text" name="colors[]" class="form-control" placeholder="Black, Smoke Gray, Blaze Green" required>
                                    <input type="color" name="codes[]" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="size">Size:</label>
                                <input type="text" name="sizes[]" class="form-control" placeholder="S_M_L_XL_2XL_3Xl OR 36_38_40_42_44_46" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" oninput="sumQty()" required>
                            </div>


                        </div>

                    </div>

                    <button type="button" class="btn btn-primary" onclick="addFields()">Add Another Set</button>

                    <button type="submit" name="add_pro_color" class="btn btn-success mt-3">Submit</button>

                    <div class="form-group" style="margin-top: 20px;">
                        <label class="control-label" for="new_pro_ava_qty">New Added Total Quantity:</label>
                        <div>
                            <input type="text" class="form-control" name="new_pro_ava_qty" id="new_pro_ava_qty" value="" readonly>
                            <small>It will automatically calculated based on the quantities you provide for each color and size.</small>
                        </div>
                    </div>

                    <?php
                    $getPro = mysqli_query($dbcon, "SELECT pro_ava_qty FROM sm_products WHERE pro_id='$ProID'") or die(mysqli_error($dbcon));
                    if ($proRrow = mysqli_fetch_assoc($getPro)) { ?>
                        <div class="form-group" style="margin-top: 20px;">
                            <label class="control-label" for="pro_ava_qty">Total Quantity:</label>
                            <div>
                                <input type="text" class="form-control" name="pro_ava_qty" id="pro_ava_qty" value="<?= $proRrow['pro_ava_qty'] ?>" readonly>
                                <small>It will automatically calculated based on the quantities you provide for each color and size.</small>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </form>
            </div>



        </div>
        <div class="col-sm-2">
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="Table table-responsive">

        <table width="100%" border="1" style="margin-bottom: 30px;">
            <tbody>
                <tr class="Thead">

                    <td width="29%">Color</td>
                    <td width="29%">Size</td>
                    <td width="29%">Quantity</td>
                    <td width="13%">Add</td>
                    <td width="13%">Delete</td>
                </tr>
                <?php
                $GetWebSlider = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id='$ProID'") or die(mysqli_error($dbcon));
                while ($row = mysqli_fetch_assoc($GetWebSlider)) {
                    $Code = explode("#", $row['pc_code'])
                ?>
                    <tr>
                        <td style="text-transform: capitalize;"><?= $row['pc_name']; ?> <div style="width: 30px; height: 30px; border-radius: 50px; background-color: <?= $row['pc_code']; ?>;"></div>
                        </td>
                        <td style="text-transform: capitalize;"><?= $row['pc_size']; ?></td>
                        <td style="text-transform: capitalize;">
                            <form method="post">
                                <input type='hidden' name='pc_id' value='<?= $row['pc_id']; ?>'>
                                <input type='hidden' name='pc_pro_id' value='<?= $row['pc_pro_id']; ?>'>
                                <input type='hidden' name='pc_name' value='<?= $row['pc_name']; ?>'>
                                <input type="text" name="new_pro_ava_qty" value="<?= $row['pc_qty']; ?>">
                                <?php
                                $getPro = mysqli_query($dbcon, "SELECT pro_ava_qty FROM sm_products WHERE pro_id='$ProID'") or die(mysqli_error($dbcon));
                                if ($proRrow = mysqli_fetch_assoc($getPro)) { ?>
                                    <input type="hidden" class="form-control" name="pro_ava_qty" id="pro_ava_qty" value="<?= $proRrow['pro_ava_qty'] ?>">
                                <?php
                                }
                                ?>
                                <button class="btn btn-success" name="update_qty" type="submit">update</button>
                            </form>
                           
                        </td>

                        <td>
                            <a href="index.php?view=manage_pro_images&ProID=<?= $row['pc_pro_id']; ?>&Color=<?= $row['pc_name']; ?>&Code=<?= $Code[1]; ?>" class="btn btn-primary" style="color: white;">Add Images</a>
                        </td>
                        <form method='post' style="margin-bottom: 0;">
                            <td>
                                <input type='hidden' name='pc_id' value='<?= $row['pc_id']; ?>'>
                                <input type='hidden' name='pc_qty' value='<?= $row['pc_qty']; ?>'>
                                <?php
                                $getPro = mysqli_query($dbcon, "SELECT pro_ava_qty FROM sm_products WHERE pro_id='$ProID'") or die(mysqli_error($dbcon));
                                if ($proRrow = mysqli_fetch_assoc($getPro)) { ?>
                                    <input type="hidden" class="form-control" name="pro_ava_qty" id="pro_ava_qty" value="<?= $proRrow['pro_ava_qty'] ?>">
                                <?php
                                }
                                ?>
                                <button type='submit' class='btn btn-danger' name='delete_procolor'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                    </svg>
                                </button>
                            </td>
                        </form>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function addFields() {
        var newSet = `<div class="fieldsSet" style="border-radius: 5px; border: 1px solid #c9cccf; padding: 25px; margin-bottom: 15px;">
                            <button type="button" class="btn btn-danger " style="float: right;" onclick="removeFields(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="color">Color:</label>
                                <div style="display: flex; gap: 18px;">
                                    <input type="text" name="colors[]" class="form-control" placeholder="Black, Smoke Gray, Blaze Green" required>
                                    <input type="color" name="codes[]" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="size">Size:</label>
                                <input type="text" name="sizes[]" class="form-control" placeholder="S_M_L_XL_2XL_3Xl" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" oninput="sumQty()" required>
                            </div>
                        </div>`;

        $('#fieldsSet').append(newSet);
    }

    function removeFields(button) {
        $(button).parent().remove();
    }
</script>
<script type="text/javascript">
    $(function() {
        $("#Tabs1").tabs();
    });
</script>
<script>
    $('.jqte-test').jqte();

    // settings of status
    var jqteStatus = true;
    $(".status").click(function() {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({
            "status": jqteStatus
        })
    });
</script>

</div>