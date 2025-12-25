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

if (isset($_POST['add_pro_color'])) {
    $colors = $_POST['colors'];
    $codes = $_POST['codes'];
    $sizes = $_POST['sizes'];
    $quantities = $_POST['quantities'];
    // $images = $_FILES['images'];

    for ($i = 0; $i < count($colors); $i++) {
        $color = $colors[$i];
        $code = $codes[$i];
        $size = $sizes[$i];
        $quantity = $quantities[$i];

        $insetColor = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '109', '$color', '$code', '$size', '$quantity')") or die(mysqli_error($dbcon));
    }
}
?>
<!-- --------------------------- -->


<div class="SpacingBox"></div>

<div class="wrapper">
    <div class="container form">
        <div class="row">

            <div class="col-sm-10">

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
                                <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" required>
                            </div>


                        </div>

                    </div>

                    <button type="button" class="btn btn-primary" onclick="addFields()">Add Another Set</button>

                    <button type="submit" name="add_pro_color" class="btn btn-success mt-3">Submit</button>

                </form>
            </div>



        </div>
        <div class="col-sm-2">
        </div>
    </div>
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
                                <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" required>
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