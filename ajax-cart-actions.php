<?php
session_start();
include 'libs/dbconfig.php';

if (isset($_POST["action"])) {

    if (isset($_SESSION['sm_id'])) {
        $sm_id = $_SESSION['sm_id'];

        //Theses Actions are for Cart Table
        if ($_POST["action"] == "additemtable") {
            $pro_id = $_POST['pro_id'];
            $pro_qty = $_POST['pro_qty'];
            $pro_max_qty = $_POST['pro_max_qty'];
            $pro_size = $_POST['pro_size'];
            $pro_color = $_POST['pro_color'];
            $datetime = date('Y-m-d h:i:s');
            $getcart = mysqli_query($dbcon, "SELECT * FROM sm_cart WHERE cart_uid = '$sm_id' AND cart_pro_id = '$pro_id' AND (cart_pro_size = '$pro_size' AND cart_pro_color = '$pro_color')") or die(mysqli_error($dbcon));
            $cart_count = mysqli_num_rows($getcart);
            if ($cart_count == 0) {
                $setcart = mysqli_query($dbcon, "INSERT INTO sm_cart VALUE('', $sm_id, '$pro_id', '$pro_qty', '$pro_max_qty', '$pro_size', '$pro_color', '$datetime')") or die(mysqli_error($dbcon));
                echo 1;
            }
        } else if ($_POST["action"] == 'removetableitem') {
            $pro_id = $_POST['pro_id'];
            $pro_size = $_POST['pro_size'];
            $pro_color = $_POST['pro_color'];
            $deletesql = mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_uid = '$sm_id' AND cart_pro_id = '$pro_id' AND (cart_pro_size = '$pro_size' AND cart_pro_color = '$pro_color')") or die(mysqli_error($dbcon));
            if ($deletesql) {
                echo 1;
            }
        } elseif ($_POST["action"] == 'emptytable') {
            $deletesql = mysqli_query($dbcon, "DELETE FROM sm_cart WHERE cart_uid = '$sm_id'") or die(mysqli_error($dbcon));
            if ($deletesql) {
                echo 1;
            }
        } else if ($_POST["action"] == 'updatetable_qty') {
            $updatetable_pro_id = $_POST['updatetable_pro_id'];
            $updatetable_pro_qty = $_POST['updatetable_pro_qty'];
            $updatetable_pro_size = $_POST['updatetable_pro_size'];
            $updatetable_pro_color = $_POST['updatetable_pro_color'];
            $datetime = date('Y-m-d h:i:s');
            $updatecart = mysqli_query($dbcon, "UPDATE sm_cart SET cart_pro_qty = '$updatetable_pro_qty', cart_datetime = '$datetime' WHERE cart_uid = '$sm_id' AND cart_pro_id = '$updatetable_pro_id' AND (cart_pro_size = '$updatetable_pro_size' AND cart_pro_color = '$updatetable_pro_color')") or die(mysqli_error($dbcon));
            if ($updatecart) {
                echo 1;
            }
        } else {
            echo 0;
        }
    } else {

        //Theses Actions are for Cart Session
        if ($_POST["action"] == "add") {
            if (isset($_SESSION["beretta_cart"])) {
                $is_available = 0;
                $currentIndex = false;

                $temp_array = array(
                    'pro_id'               =>     $_POST["pro_id"],
                    'pro_name'             =>     $_POST["pro_name"],
                    'pro_image'             =>     $_POST["pro_image"],
                    'pro_price'            =>     $_POST["pro_price"],
                    'pro_qty'         =>     $_POST["pro_qty"],
                    'pro_max_qty'         =>     $_POST["pro_max_qty"],
                    'pro_size'         =>     $_POST["pro_size"],
                    'pro_color'         =>     $_POST["pro_color"],
                );

                foreach ($_SESSION["beretta_cart"] as $key1 => $value1) {
                    foreach ($temp_array as $key2 => $value2) {
                        if ($_SESSION["beretta_cart"][$key1]["pro_id"] == $value2) {
                            $currentIndex = true;
                        }
                    }
                    if ($currentIndex == true) {
                        foreach ($_SESSION["beretta_cart"][$key1] as $key3 => $value3) {
                            foreach ($temp_array as $key4 => $value4) {
                                if (($key3 == "pro_size") && ($value3 == $value3)) {
                                    if (($key3 == "pro_color") && ($value4 == $value4)) {
                                        $is_available++;
                                        echo 0;
                                    }
                                }
                            }
                        }
                    }
                }
                foreach ($_SESSION["beretta_cart"] as $keys => $values) {
                    if (($_SESSION["beretta_cart"][$keys]['pro_id'] == $_POST["pro_id"])) {
                        if (($_SESSION["beretta_cart"][$keys]['pro_size'] == $_POST["pro_size"])) {
                            if (($_SESSION["beretta_cart"][$keys]['pro_color'] == $_POST["pro_color"])) {
                                $is_available++;
                                echo 0;
                            }
                        }
                    }
                }

                if ($is_available == 0) {
                    $item_array = array(
                        'pro_id'               =>     $_POST["pro_id"],
                        'pro_name'             =>     $_POST["pro_name"],
                        'pro_image'             =>     $_POST["pro_image"],
                        'pro_price'            =>     $_POST["pro_price"],
                        'pro_qty'         =>     $_POST["pro_qty"],
                        'pro_max_qty'         =>     $_POST["pro_max_qty"],
                        'pro_size'         =>     $_POST["pro_size"],
                        'pro_color'         =>     $_POST["pro_color"],
                    );
                    $_SESSION["beretta_cart"][] = $item_array;
                    echo 1;
                }
            } else {
                $item_array = array(
                    'pro_id'               =>     $_POST["pro_id"],
                    'pro_name'             =>     $_POST["pro_name"],
                    'pro_image'             =>     $_POST["pro_image"],
                    'pro_price'            =>     $_POST["pro_price"],
                    'pro_qty'         =>     $_POST["pro_qty"],
                    'pro_max_qty'         =>     $_POST["pro_max_qty"],
                    'pro_size'         =>     $_POST["pro_size"],
                    'pro_color'         =>     $_POST["pro_color"],
                );
                $_SESSION["beretta_cart"][] = $item_array;
                echo 1;
            }
        } else if ($_POST["action"] == 'remove') {
            $currentIndex = false;
            foreach ($_SESSION["beretta_cart"] as $key => $value) {
                if ($value["pro_id"] == $_POST["pro_id"] && ($value["pro_size"] == $_POST["pro_size"] && $value["pro_color"] == $_POST["pro_color"])) {
                    unset($_SESSION["beretta_cart"][$key]);
                    echo 1;
                }
            }
        } else if ($_POST["action"] == 'empty') {
            unset($_SESSION["beretta_cart"]);
            echo 1;
        } else if ($_POST["action"] == 'update_qty') {
            foreach ($_SESSION["beretta_cart"] as $key => $value) {
                if ($_SESSION["beretta_cart"][$key]['pro_id'] == $_POST["update_pro_id"] && ($_SESSION["beretta_cart"][$key]['pro_size'] == $_POST["update_pro_size"] && $_SESSION["beretta_cart"][$key]['pro_color'] == $_POST["update_pro_color"])) {
                    $_SESSION["beretta_cart"][$key]['pro_qty'] = $_POST["update_pro_qty"];
                }
            }
        } else {
            echo 0;
        }
    }
}