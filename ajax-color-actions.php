<?php
session_start();
include 'libs/dbconfig.php';

if (isset($_POST['action'])) {

    if ($_POST['action'] == "change_color") {
        $pro_id = $_POST['pro_id'];

        if (isset($_POST['pro_color'])) {
            $pro_color = $_POST['pro_color'];
            $colorsizes = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id='$pro_id' AND pc_name= '$pro_color' ORDER BY pc_id ASC") or die(mysqli_error($dbcon));
            if (mysqli_num_rows($colorsizes) > 0) {
                if ($sizerow = mysqli_fetch_assoc($colorsizes)) {
                    $size =  explode("_", $sizerow['pc_size']);
                    $qty =  explode("_", $sizerow['pc_qty']);

                    foreach ($size as $key => $value) {
                        $isChecked = ($key === 0) ? 'checked' : '';
                        echo "<div class='flex items-center gap-2 capitalize'>
                    <input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
                    <input type='hidden' id='pro_color' name='pro_color' value='$pro_color'>

                    <input class='hidden' id='pro_size_$key' type='radio' name='pro_size' value='$size[$key]' $isChecked>
                    <label class='flex flex-col cursor-pointer border-b-2 px-2 py-1 text-gray-500' for='pro_size_$key'>
                        $size[$key]
                    </label>
                    </div>";

                        // echo "<label>$size[$key]</label>"; 
                        // echo "<label>$qty[$key]</label>"; 
                    }
                }
            }
        } else {
            echo "<div class='flex items-center gap-2 capitalize'>
                    <input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
                    <div>No Sizes Available</div>
                    </div>";
        }
    }
    if ($_POST['action'] == "change_size") {
        $pro_id = $_POST['pro_id'];
        $pro_size = $_POST['pro_size'];
        $pro_color = $_POST['pro_color'];
        $colorsizes = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id='$pro_id' AND pc_name= '$pro_color' ORDER BY pc_id ASC") or die(mysqli_error($dbcon));
        if (mysqli_num_rows($colorsizes) > 0) {
            if ($sizerow = mysqli_fetch_assoc($colorsizes)) {
                $size =  explode("_", $sizerow['pc_size']);
                $qty =  explode("_", $sizerow['pc_qty']);

                foreach ($size as $key => $value) {
                    // echo "<label>$size[$key]</label>"; 
                    if ($size[$key] == $pro_size) {
                        echo $qty[$key];
                    }
                }
            }
        }
    }
}
