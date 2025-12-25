<?php
session_start();
date_default_timezone_set('Asia/Karachi');
include 'libs/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash 30</title>
    <link rel="shortcut icon" href="imgs/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                container: {
                    center: true,
                    padding: {
                        DEFAULT: "0.5rem",
                        md: "1rem",
                        lg: "1.5rem",
                        xl: "2rem"
                    }
                },
                colors: {
                    pri: "#373435",
                },
            }
        }
    }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/swiper.css">
    <script>
    var swiper = new Swiper('.notiy-slider', {
        direction: 'vertical', // Vertical direction
        loop: true, // Looping slides
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 2500, // Delay for each slide
            disableOnInteraction: false,
        },
        spaceBetween: 10, // Optional spacing between slides
    });
    </script>
</head>

<body class="">

    <div id="success"
        class="hidden bg-green-100 text-green-500 text-sm lg:text-lg font-medium rounded px-6 py-3 w-auto whitespace-nowrap fixed top-6 left-[50%] translate-x-[-50%] z-10">
        <div class="flex items-center justify-center gap-3">
            <i class="bi bi-check-circle-fill text-base lg:text-xl"></i>
            <p id="success_msg"></p>
        </div>
    </div>
    <div id="failed"
        class="hidden bg-red-100 text-red-500 text-sm lg:text-lg font-medium rounded px-6 py-3 w-auto whitespace-nowrap fixed top-6 left-[50%] translate-x-[-50%] z-10">
        <div class="flex items-center justify-center gap-3">
            <i class="bi bi-x-circle-fill text-base lg:text-xl"></i>
            <p id="failed_msg"></p>
        </div>
    </div>


    <header>

        <!-- Laptop View -->
        <div class="container py-4 hidden lg:block">
            <div class="flex justify-between items-center">
                <div class="w-1/3 flex gap-5 font-medium">
                    <button class="" data-te-offcanvas-toggle data-te-target="#offcanvasExample"
                        aria-controls="offcanvasExample" data-te-ripple-init>
                        <img src="imgs/menu.svg" alt="" class="h-7">
                    </button>
                </div>
                <a href="./" class="w-1/3 flex justify-center">
                    <img src="imgs/logo.svg" alt="logo" class="h-14">
                </a>
                <div class="text-2xl w-1/3 flex items-center gap-5 justify-end">
                    <button type="button" class="" data-te-toggle="modal" data-te-target="#exampleFrameTopModal"
                        data-te-ripple-init data-te-ripple-color="light">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="shopping-cart" class="relative">
                        <i class="bi bi-cart"></i>
                        <div
                            class="cart_count w-4 h-4 rounded-full bg-gray-500 text-white absolute top-0 -right-2 text-xs flex justify-center items-center">
                            0</div>
                    </a>
                    <?php
                    if (isset($_SESSION['sm_id'])) { ?>
                    <div class="relative" data-te-dropdown-ref>
                        <button class="flex items-center px-4 py-2 border rounded-lg" type="button"
                            id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false"
                            data-te-ripple-init data-te-ripple-color="light">
                            <span class="text-base capitalize"><?php echo "Hi, " . $_SESSION['sm_username'] ?></span>
                        </button>
                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                            <li>
                                <a href="my-account"
                                    class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                        class="bi bi-person text-lg"></i> My Account</a>
                            </li>
                            <li>
                                <a href="my-orders" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                        class="bi bi-card-list text-lg"></i> My Orders</a>
                            </li>
                            <li>
                                <a href="sign-out" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                        class="bi bi-box-arrow-right text-lg"></i> Sign out</a>
                            </li>
                        </ul>
                    </div>

                    <?php

                    } else { ?>
                    <div class="relative" data-te-dropdown-ref>
                        <button id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false"
                            data-te-ripple-init data-te-ripple-color="light">
                            <i class="bi bi-person"></i>
                        </button>
                        <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg [&[data-te-dropdown-show]]:block"
                            aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                            <li>
                                <a href="sign-in" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                        class="bi bi-box-arrow-left text-lg"></i> Sign In</a>
                            </li>
                            <li>
                                <a href="sign-up" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                        class="bi bi-box-arrow-up text-lg"></i> Sign Up</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Mobile View -->
        <div class="container py-4 border-b border-pri block lg:hidden">
            <a href="./" class="flex justify-center">
                <img src="imgs/logo.svg" alt="logo" class="h-12">
            </a>
        </div>

        <!-- Mobile View -->
        <div class="container py-2 block lg:hidden">
            <div class="text-2xl flex items-center gap-5 justify-center">
                <button class="" data-te-offcanvas-toggle data-te-target="#offcanvasExample"
                    aria-controls="offcanvasExample" data-te-ripple-init>
                    <img src="imgs/menu.svg" alt="" class="h-5">
                </button>
                <button type="button" class="" data-te-toggle="modal" data-te-target="#exampleFrameTopModal"
                    data-te-ripple-init data-te-ripple-color="light">
                    <i class="bi bi-search"></i>
                </button>
                <a href="shopping-cart" class="relative">
                    <i class="bi bi-cart"></i>
                    <div
                        class="cart_count w-4 h-4 rounded-full bg-gray-500 text-white absolute top-0 -right-2 text-xs flex justify-center items-center">
                        0</div>
                </a>
                <?php
                if (isset($_SESSION['sm_id'])) { ?>
                <div class="relative" data-te-dropdown-ref>
                    <button class="flex items-center px-4 py-2 border rounded-lg" type="button" id="dropdownMenuButton1"
                        data-te-dropdown-toggle-ref aria-expanded="false" data-te-ripple-init
                        data-te-ripple-color="light">
                        <span class="text-sm capitalize"><?php echo "Hi, " . $_SESSION['sm_username'] ?></span>
                    </button>
                    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-sm shadow-lg [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                        <li>
                            <a href="my-account" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                    class="bi bi-person text-lg"></i> My Account</a>
                        </li>
                        <li>
                            <a href="my-orders" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                    class="bi bi-card-list text-lg"></i> My Orders</a>
                        </li>
                        <li>
                            <a href="sign-out" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                    class="bi bi-box-arrow-right text-lg"></i> Sign out</a>
                        </li>
                    </ul>
                </div>

                <?php
                } else { ?>
                <div class="relative" data-te-dropdown-ref>
                    <button id="dropdownMenuButton1" data-te-dropdown-toggle-ref aria-expanded="false"
                        data-te-ripple-init data-te-ripple-color="light">
                        <i class="bi bi-person"></i>
                    </button>
                    <ul class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-sm shadow-lg [&[data-te-dropdown-show]]:block"
                        aria-labelledby="dropdownMenuButton1" data-te-dropdown-menu-ref>
                        <li>
                            <a href="sign-in" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                    class="bi bi-box-arrow-left text-lg"></i> Sign In</a>
                        </li>
                        <li>
                            <a href="sign-up" class="block px-4 py-1 hover:bg-gray-100 flex items-center gap-4"><i
                                    class="bi bi-box-arrow-up text-lg"></i> Sign Up</a>
                        </li>
                    </ul>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </header>


    <!-- Search Modal -->
    <div data-te-modal-init
        class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
        id="exampleFrameTopModal" tabindex="-1" aria-labelledby="exampleFrameTopModalLabel" aria-hidden="true">
        <div data-te-modal-dialog-ref
            class="pointer-events-none relative w-full translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out">
            <div
                class="pointer-events-auto relative flex w-full flex-col border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
                <div class="relative flex-auto" data-te-modal-body-ref>
                    <div class="py-6 flex items-center justify-center">
                        <form action="search-results" method="get">
                            <input type="text" name="searched_pro" placeholder="Search"
                                style="-webkit-appearance: none; -moz-appearance: none; appearance: none; border-radius: 0;"
                                class="w-auto lg:w-[350px] outline-none border-b border-pri focus:border-orange-500 px-4 py-2 text-base lg:text-lg"
                                required>
                            <button type="submit"
                                class="bg-pri text-white px-4 py-2 text-base lg:text-lg">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Menu -->
    <section>
        <div class="invisible fixed bottom-0 left-0 top-0 z-[1045] flex w-96 max-w-full -translate-x-full flex-col border-none bg-white bg-clip-padding text-neutral-700 shadow-sm outline-none transition duration-300 ease-in-out [&[data-te-offcanvas-show]]:transform-none"
            tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" data-te-offcanvas-init>
            <div class="flex items-center justify-between p-4">
                <a href="./" class="mb-0 font-semibold leading-normal" id="offcanvasExampleLabel">
                    <img src="imgs/logo.svg" alt="" class="h-12">
                </a>
                <button type="button"
                    class="box-content rounded-none border-none opacity-50 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
                    data-te-offcanvas-dismiss>
                    <span
                        class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </button>
            </div>
            <div class="flex-grow overflow-y-auto p-4">
                <div class="relative mt-4">
                    <ul>
                        <li> <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-normal text-black hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                href="./">Home</a></li>
                        <li> <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-normal text-black hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                href="about-us.php">About Us</a></li>
                        <li>
                            <?php
                            $i = 1;
                            $CatLevel_1 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='0' ORDER by ct_id ASC LIMIT 4") or die("Error with querry");
                            while ($lvl_1_row = mysqli_fetch_assoc($CatLevel_1)) {
                                $lvl_1_ct_id       = $lvl_1_row['ct_id'];
                            ?>
                            <h2 class="mb-0" id="heading<?php echo $i; ?>">
                                <button
                                    class="group relative flex w-full justify-between items-center hover:bg-neutral-100 border-0 bg-white px-4 py-2 text-left text-black transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-neutral [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)]"
                                    type="button" data-te-collapse-init data-te-collapse-collapsed
                                    data-te-target="#collapse<?php echo $i; ?>" aria-expanded="true"
                                    aria-controls="collapse<?php echo $i; ?>">
                                    <?php echo $lvl_1_row['ct_name']; ?>
                                    <i
                                        class="bi bi-plus text-lg -mr-1 hidden group-[[data-te-collapse-collapsed]]:block transition-transform duration-200 ease-in-out"></i>
                                    <i
                                        class="bi bi-dash text-lg -mr-1 block group-[[data-te-collapse-collapsed]]:hidden transition-transform duration-200 ease-in-out"></i>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $i; ?>" class="!visible hidden" data-te-collapse-item
                                aria-labelledby="heading<?php echo $i; ?>" data-te-parent="#accordionExample">
                                <?php
                                    $CatLevel_2 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$lvl_1_ct_id' ORDER by ct_id ASC") or die("Error with querry");
                                    while ($lvl_2_row = mysqli_fetch_assoc($CatLevel_2)) {
                                        $lvl_2_ct_id = $lvl_2_row['ct_id'];
                                    ?>
                                <div class="text-xs">
                                    <p
                                        class="block w-full border-b border-neutral-200 px-6 py-2 font-semibold uppercase text-neutral-700">
                                        <?php echo $lvl_2_row['ct_name'] ?>
                                    </p>
                                    <?php
                                            $CatLevel_3 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$lvl_2_ct_id' ORDER by ct_id ASC") or die("Error with querry");
                                            while ($lvl_3_row = mysqli_fetch_assoc($CatLevel_3)) { ?>
                                    <a href="products-view?cat_id=<?php echo $lvl_3_row['ct_id'] ?>" aria-current="true"
                                        class="block w-full border-b border-neutral-200 px-6 py-2 transition duration-150 ease-in-out hover:bg-neutral-50 hover:text-neutral-700"><i
                                            class="bi bi-arrow-right mr-2"></i><?php echo $lvl_3_row['ct_name'] ?></a>
                                    <?php
                                            }
                                            ?>
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                            <?php
                                $i++;
                            }
                            ?>
                        </li>
                        <li> <a class="block w-full whitespace-nowrap bg-transparent px-4 py-2 font-normal text-black hover:bg-neutral-100 active:text-neutral-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-neutral-400"
                                href="contact-us.php">Contact Us</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <?php
    if (isset($_POST['signin'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

        $signinsql = mysqli_query($dbcon, "SELECT * FROM sm_users WHERE sm_email='$user_email'");
        if ($row = mysqli_fetch_assoc($signinsql)) {
            $db_sm_id = $row['sm_id'];
            $db_password = $row['sm_password'];
            if (md5($user_password) == $db_password) {
                $_SESSION['sm_username']    =    $row['sm_username'];
                $_SESSION['sm_contact_no']    =    $row['sm_contact_no'];
                $_SESSION['sm_email']    =    $user_email;
                $_SESSION['sm_id']        =    $db_sm_id;

                $datetime = date('Y-m-d h:i:s');
                if (!empty($_SESSION['beretta_cart'])) {
                    foreach ($_SESSION['beretta_cart'] as $key => $value) {
                        $cart_pro_id = $value["pro_id"];
                        $cart_pro_qty = $value["pro_qty"];
                        $cart_pro_size = $value["pro_size"];
                        $cart_pro_color = $value["pro_color"];
                        $setcart = mysqli_query($dbcon, "INSERT INTO sm_cart VALUE('', $db_sm_id, '$cart_pro_id', '$cart_pro_qty', '$cart_pro_size', '$cart_pro_size', '$datetime')") or die(mysqli_error($dbcon));
                    }
                    if ($setcart) {
                        unset($_SESSION['beretta_cart']);
                        echo "<script> window.location.href = './'; </script>";
                    }
                } else {
                    echo "<script> window.location.href = './'; </script>";
                }
            } else {
                echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Incorrect Password!"); </script>';
            }
        } else {
            echo '<script> $("#failed").show().delay(3000).fadeOut("slow"); $("#failed_msg").html("Incorrect Email!"); </script>';
        }
    }

    if (isset($_SESSION['sm_id'])) {
        $sm_id = $_SESSION['sm_id'];
        $getcart = mysqli_query($dbcon, "SELECT * FROM sm_cart WHERE cart_uid = '$sm_id'") or die(mysqli_error($dbcon));
        $cart_count = mysqli_num_rows($getcart);
    }

    ?>