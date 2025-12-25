<?php
if (isset($_POST['btnsub'])) {
    if (!empty($_POST['pro_color_name'])) {
        $pro_color_names = $_POST['pro_color_name'];
        $pro_color_codes = $_POST['pro_color_code'];
        for ($i = 0; $i < count($pro_color_names); $i++) {
            $pro_color_name = $pro_color_names[$i];
            $pro_color_code = $pro_color_codes[$i];
            echo "$pro_color_names[$i]<BR>";
            // $save_color = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '$last_product_id', '$pro_color_name', '$pro_color_code')") or die(mysqli_error($dbcon));
        }
    } else {
        echo "asdas";
    }
}
?>


<form action="" method="post">
    <div class="form-group">
        <label class="control-label col-sm-3" for="pro_colors">Add Product Colors:</label>
        <div class="col-sm-5" id="colorInputs">
            <div class="color-input">
                <input type="text" name="pro_color_name[]" placeholder="Enter color name">
                <input type="color" name="pro_color_code[]">
            </div>
        </div>
        <button type="button" id="addColor">Add More Color</button>
        <script>
            document.getElementById('addColor').addEventListener('click', function() {
                var colorInputs = document.getElementById('colorInputs');
                var newColorInput = document.createElement('div');
                newColorInput.innerHTML = '<input type="text" name="pro_color_name[]" placeholder="Enter color name"> <input type="color" name="pro_color_code[]">';
                colorInputs.appendChild(newColorInput);
            });
        </script>
    </div>
    <button type="submit" name="btnsub">submit</button>
</form>