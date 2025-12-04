<?php
 include "../../libs/dbconfig.php";

if (isset($_POST['add_color'])) {
    // Adding Product Colors
    $pro_color_names = $_POST['pro_color_name'];
    $pro_color_codes = $_POST['pro_color_code'];


    for ($i = 0; $i < count($pro_color_names); $i++) {
        $pro_color_name = $pro_color_names[$i];
        $pro_color_code = $pro_color_codes[$i];
        // echo "Text: $pro_color_name, Color: $pro_color_code <br>";
        $save_color = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '5', '$pro_color_name', '$pro_color_code')") or die(mysqli_error($dbcon));
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Add Text and Color</title>
</head>

<body>
    <form id="colorForm" method="post">
        <div class="form-group">
            <label class="control-label col-sm-3" for="pro_colors">Add Product Colors:</label>
            <div id="colorInputs">
                <div class="color-input">
                    <input type="text" name="pro_color_name[]" placeholder="Enter color name">
                    <input type="color" name="pro_color_code[]">
                </div>
            </div>
            <button type="button" id="addColor">Add More Color</button>
            <button type="submit" name="add_color" >Submit</button>
        </div>
    </form>

    <script>
        document.getElementById('addColor').addEventListener('click', function() {
            var colorInputs = document.getElementById('colorInputs');
            var newColorInput = document.createElement('div');
            newColorInput.innerHTML = '<input type="text" name="pro_color_name[]" placeholder="Enter Text"> <input type="color" name="pro_color_code[]">';
            colorInputs.appendChild(newColorInput);
        });
    </script>
</body>

</html>