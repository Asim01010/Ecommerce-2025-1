<?php

//  Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

date_default_timezone_set('Asia/Karachi');
include 'libs/dbconfig.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Wrap</title>
    <link rel="shortcut icon" href="imgs/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <link rel="stylesheet" href="css/fonts.css">
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
                    pri: "#68914A",
                    sec: "#222222",
                },
                fontFamily: {
                    poppins: "'Poppins', sans-serif",
                    "optima": ["optima"],
                    "optima-m": ["optima-m"],
                    "optima-b": ["optima-b"],
                    "kandira": ["kandira"],
                    "HeronSansCondBold": ["HeronSansCondBold"],
                    "HeronSansSemiBold": ["HeronSansSemiBold"],
                    "herosan": ["HeronSansRegular"],
                    "prime-l": ["PrimeLight"],
                    "prime-r": ["PrimeRegular"],
                    "DigitalSan": ["DigitalSan"],
                    "mont": ["Montserrat"],
                },
            }
        }
    }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

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
    <style>
    @keyframes dropdownOpen {
        from {
            opacity: 0;
            transform: scaleY(0.9);
        }

        to {
            opacity: 1;
            transform: scaleY(1);
        }
    }

    /* Base dropdown styling */
    .dropdown {
        display: none;
        /* Initially hidden */
        opacity: 0;
        transform: scaleY(0.9);
        /* Start slightly scaled down */
        transform-origin: top;
        /* Scale from the top */
        transition: opacity 0.3s ease, transform 0.3s ease;
        /* Smooth transition */
    }

    /* Show dropdown and trigger animation on hover */
    .group:hover .dropdown {
        display: block;
        /* Show on hover */
        animation: dropdownOpen 0.3s forwards ease;
        /* Smoothly appear */
    }


    /* Define keyframes for the fade-up effect */
    @keyframes custom-fade-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animation class applied dynamically */
    .custom-fade-up {
        animation: custom-fade-up 0.5s ease-in-out;
    }
    </style>
</head>

<body class="text-bs font-mont">

    <!-- Success Badge Toast -->
    <div id="success" class="fixed z-[10000] bottom-4 left-3
        flex items-center px-4 py-2
        bg-green-500 text-white text-sm font-medium
        rounded-lg shadow-lg w-auto min-w-[250px] max-w-[350px]
        transform -translate-x-full opacity-0
        transition-all duration-500 ease-in-out">

        <i class="bi bi-check-circle-fill text-white text-lg mr-2"></i>
        <p id="success_msg" class="truncate inline">Success! Item added</p>
    </div>


    <!-- Failed Badge Toast -->
    <div id="failed" class="fixed z-[10000] bottom-4 left-3
        flex items-center px-4 py-2
        bg-red-500 text-white text-sm font-medium
        rounded-lg shadow-lg w-auto min-w-[250px] max-w-[350px]
        transform -translate-x-full opacity-0
        transition-all duration-500 ease-in-out">

        <i class="bi bi-x-circle-fill text-white text-lg mr-2"></i>
        <p id="failed_msg" class="truncate inline">Something went wrong!</p>
    </div>





    <div class="swiper home-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide bg-gray-200 py-2 text-center">
                <p class="text-[11px]">No Return or Exchange on Sale Itmes</p>
            </div>
            <div class="swiper-slide bg-gray-200 py-2 text-center">
                <p class="text-[11px]">No Return or Exchange on Sale Itmes</p>
            </div>
            <div class="swiper-slide bg-gray-200 py-2 text-center">
                <p class="text-[11px]">No Return or Exchange on Sale Itmes</p>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <header>
        <div class="relative">
            <a href="./" class="block sm:hidden flex items-center justify-center">
                <img src="imgs/logo.png" alt="" class="h-[80px]">
            </a>
            <div class="absolute  top-7 flex justify-start items-center gap-8 text-lg">

            </div>
        </div>

        <div class="flex justify-end items-center max-w-[1200px] mx-auto p-2 sm:p-0">
            <div class="flex gap-8 mt-4 text-lg">

            </div>
            <div class="flex justify-between container mx-auto px-2 items-center">
                <!-- Social Icons -->
                <div class="flex items-center gap-4">
                    <?php
                    $header_icons = mysqli_query($dbcon, "SELECT sm_icon, sm_url, sm_color_header, sm_target FROM ptcs_setting_socialmedia WHERE sm_status=1 AND sm_header=1");

                    if ($header_icons) {
                        while ($row = mysqli_fetch_assoc($header_icons)) {
                    ?>
                    <a href="<?php echo htmlspecialchars($row['sm_url']); ?>"
                        target="<?php echo htmlspecialchars($row['sm_target']); ?>"
                        class="text-gray-600 hover:text-black">

                        <i class="<?php echo htmlspecialchars($row['sm_icon']); ?> text-xl"
                            style="color: <?php echo htmlspecialchars($row['sm_color_header']); ?>;"></i>
                    </a>
                    <?php
                        }
                    } else {
                        echo "Query failed: " . mysqli_error($dbcon);
                    }
                    ?>
                </div>
                <a href="./" class="hidden sm:block me-auto">
                    <img src="imgs/logo.png" alt="" class="h-[80px]">
                </a>
                <div class="flex items-center gap-5 ">
                    <div class="pb-1 px-2 border-b sm:w-[110px] w-full flex gap-2 searchBtn cursor-pointer    ">

                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="SEARCH" class="border-none outline-none w-full ">
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <!-- User Icon -->
                            <div id="show_user" class="cursor-pointer">
                                <i class="bi bi-person-circle text-xl"></i>
                            </div>
                            <!-- Dropdown -->
                            <div id="drop_user"
                                class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200 z-50">
                                <?php
                                if (isset($_SESSION['sm_username']) && !empty($_SESSION['sm_username'])) {
                                ?>
                                <div class="p-3 text-gray-700 border-b border-gray-200">
                                    <?php echo htmlspecialchars($_SESSION['sm_username']); ?>
                                </div>
                                <a href="sign-out.php"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Sign Out</a>
                            </div>
                            <?php
                                } else {
                        ?>
                            <div class="p-3 text-gray-700 border-b border-gray-200">
                                Guest
                            </div>
                            <a href="sign-in.php" class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Sign
                                In</a>
                        </div>
                        <?php
                                }
                    ?>

                    </div>


                    <!-- Wishlist Overlay -->
                    <!-- Wishlist Overlay -->
                    <div id="wishlist-overlay"
                        class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 z-[90]">
                    </div>

                    <!-- Wishlist Sidebar -->
                    <div id="wishlist"
                        class="fixed top-0 right-0 h-screen w-full sm:w-[350px] md:w-[400px] lg:w-[420px] bg-white z-[100] hidden p-3 flex flex-col transform translate-x-full transition-transform duration-300 shadow-2xl">

                        <!-- Header -->
                        <div class="flex justify-between w-full mb-2">
                            <button id="close-wishlist"
                                class="cursor-pointer h-[20px] p-2 w-[20px] flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full transition">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>

                        <!-- 🔹 Wishlist Content (AJAX will inject here) -->
                        <div id="wishlistContainer" class="flex-1 flex flex-col gap-5 max-h-[65vh] overflow-y-auto pr-2"
                            style="scrollbar-width: none;">
                            <!-- AJAX items go here -->
                        </div>

                        <!-- 🔹 Wishlist Skeleton Loader (optional, hidden by default) -->
                        <!--
  <div id="wishlistSkeleton" class="flex flex-col gap-4 animate-pulse">
    <?php for ($i = 0; $i < 5; $i++): ?>
      <div class="flex flex-col gap-2 border border-gray-200 rounded-xl p-4 shadow-sm">
        <div class="h-40 bg-gray-200 rounded-lg"></div>
        <div class="h-4 bg-gray-200 rounded w-3/4"></div>
        <div class="h-4 bg-gray-200 rounded w-1/2"></div>
        <div class="flex justify-between items-center mt-2">
          <div class="h-5 w-20 bg-gray-200 rounded"></div>
          <div class="h-8 w-20 bg-gray-200 rounded-full"></div>
        </div>
      </div>
    <?php endfor; ?>
  </div>
  -->
                    </div>
                    <!-- Heart Button -->
                    <div id="wishlist-btn" class="relative cursor-pointer">
                        <i class="bi bi-suit-heart"></i>
                        <div class="absolute -right-1 -top-1 h-4 w-4 bg-black rounded-full text-white">
                            <div class="flex items-center justify-center h-full w-full text-[10px]">
                                <p>0</p>
                            </div>
                        </div>
                    </div>


                    <div onclick="openCart()" class="relative cursor-pointer">
                        <i class="bi bi-bag"></i>
                        <div class="absolute -right-1 -top-1 h-4 w-4 bg-black rounded-full text-white">
                            <div class="flex items-center justify-center h-full w-full text-[10px]">
                                <p id="cart-badge">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div>
        </div>
        <nav class="mx-4 border-t">
            <ul
                class="max-w-screen relative flex md:gap-10  gap-1 items-center tracking-tighter uppercase mx-auto w-fit text-sec text-center py-2 text-sm">
                <?php
                $getCategories = mysqli_query($dbcon, "SELECT * FROM sm_categories  WHERE ct_parent='0'") or die("Error With Query");
                while ($row = mysqli_fetch_assoc($getCategories)) {
                ?>
                <li class="font-semibold relative menuItem" data-id="<?= $row['ct_id'] ?>">
                    <a href="#"><?= $row['ct_name'] ?></a>
                </li>
                <?php } ?>
                <div
                    class="text-left absolute z-[100] hidden mainDropdownDiv transition-all duration-500 top-6 left-0 w-full sm:w-auto min-w-[250px] sm:min-w-[400px] bg-white shadow-lg rounded-md overflow-hidden">

                    <div class="w-full flex justify-center items-start flex-wrap p-3 sm:p-4">
                        <div
                            class="dropdownDiv bg-white px-4 sm:px-8 py-2 w-full sm:w-fit flex flex-wrap gap-3 sm:gap-4">
                            <!-- Dropdown content here -->
                        </div>
                    </div>
                </div>

            </ul>



            <script>
            <?php
                $getCategoriesLevels = mysqli_query($dbcon, "SELECT * FROM sm_categories") or die("Error With Query");
                $categories = [];
                while ($row = mysqli_fetch_assoc($getCategoriesLevels)) {
                    $categories[] = $row;
                }
                ?>

            const categories = <?php echo json_encode($categories); ?>;
            const mainDropdownDiv = document.querySelector(".mainDropdownDiv")
            mainDropdownDiv.addEventListener("mouseleave", () => {
                mainDropdownDiv.classList.add("hidden", )

            })
            mainDropdownDiv.addEventListener("mouseenter", () => {
                mainDropdownDiv.classList.remove("hidden", )

            })
            document.querySelectorAll(".menuItem").forEach((elem) => {
                elem.addEventListener("mouseleave", () => {
                    mainDropdownDiv.classList.add("hidden", )

                })
                elem.addEventListener("mouseenter", () => {
                    mainDropdownDiv.classList.remove("hidden", )
                    const id = elem.getAttribute("data-id");


                    const matched = categories.filter((lvl1) => lvl1.ct_parent === id);

                    const container = document.querySelector(".dropdownDiv");
                    container.innerHTML = "";
                    matched.forEach((item) => {
                        const lvl3 = categories.filter(c => c.ct_parent === item.ct_id);
                        const div = `
       <div class="p-4 bg-white">
  <h2 class="font-semibold  text-gray-800 uppercase tracking-wide text-sm mb-3 border-b pb-2">
    ${item.ct_name}
  </h2>
  <div class="flex flex-col gap-2">
    ${lvl3.map(sub => `
      <a 
        class="block text-left  text-gray-600 hover:text-pri hover:translate-x-1 transition duration-200 text-sm"
        href="category-detail.php?ct_id=${sub.ct_id}">
        ${sub.ct_name}
      </a>
    `).join("")}
  </div>
</div>

    `;
                        container.innerHTML += div;
                    });

                });
            });
            </script>
        </nav>


        <!-- <li class="relative group cursor-pointer">
                    <a href="#" class="">Unstitched</a>

                    <div class="absolute text-left z-[100] left-0 top-full mt-2 bg-white shadow-lg opacity-0 invisible translate-y-5 
                  group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 
                  transition-all duration-300 min-w-[900px]">
                        <div class="grid grid-cols-4 gap-10 py-8 px-8">

                            <div>
                                <h2 class="uppercase font-semibold tracking-wide">Unstitched</h2>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li><a href="#">Sora Collection</a></li>
                                    <li><a href="#">Navi Collection</a></li>
                                    <li><a href="#">Monochrome Collection</a></li>
                                    <li><a href="#">Kai Collection</a></li>
                                    <li><a href="#">Lia Collection</a></li>
                                    <li><a href="#">Sage Collection</a></li>
                                    <li><a href="#">Raha Collection</a></li>
                                    <li><a href="#">Gul Collection</a></li>
                                    <li><a href="#">Spring / Summer Collection</a></li>
                                    <li><a href="#">Kaya Collection</a></li>
                                </ul>
                            </div>

                            <div>
                                <h2 class="uppercase font-semibold tracking-wide">Ready To Wear</h2>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li><a href="#">Summer Pret</a></li>
                                    <li><a href="#">Har Roz Collection</a></li>
                                </ul>
                            </div>

                            <div>
                                <h2 class="uppercase font-semibold tracking-wide">New In</h2>
                                <ul class="mt-4 space-y-2 text-sm">
                                    <li><a href="#">Ready to Wear</a></li>
                                    <li><a href="#">Unstitched</a></li>
                                    <li><a href="#">Men</a></li>
                                    <li><a href="#">Fragrances</a></li>
                                    <li><a href="#">Kids</a></li>
                                </ul>
                            </div>

                            <div class="flex justify-center items-center">
                                <div class="overflow-hidden relative">
                                    <img src="imgs/about.jpeg" alt="Sora Collection"
                                        class="w-[250px] h-[250px] object-cover hover:scale-110 transition-transform duration-500">
                                    <p class="absolute bottom-2 left-2 text-white text-sm font-semibold">Sora Collection
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <li class="relative"><a href="">ready to wear</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">unstitched</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">beauty</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">fragrances</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">men</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">kids pret</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li>
                <li class="relative"><a href="">socks</a>
                    <p class="text-[9px] absolute -right-5 -top-3 tracking-widest">sale</p>

                </li> -->

        <!-- <li class="font-semibold text-pri">best sellers</li> -->
        <!-- </ul>
        </nav> -->
    </header>


    <div class="fixed top-0 h-screen w-screen bg-black/50 z-[1200] hidden searchBox">
        <div class="bg-white w-full flex justify-center items-center py-2 searchLogoSection">
            <img src="imgs/logo.png" alt="" class="h-[80px]">
        </div>

        <div
            class="w-full max-w-screen h-auto sm:h-[530px] bg-white mx-auto p-4 sm:p-6 rounded-b-lg relative innerSearchBox overflow-hidden shadow-lg border border-gray-100">

            <div class="border flex items-center py-2 px-4 rounded-lg relative">
                <!-- Cross icon -->
                <i class="bi bi-x-lg text-gray-500 cursor-pointer absolute left-2 z-[1300]"
                    onclick="this.closest('.searchBox').classList.add('hidden')"></i>

                <!-- Input field -->
                <input type="text" placeholder="Search"
                    class="focus:outline-none w-full text-sm sm:text-base pl-8 pr-8 search_box" autocomplete="off" />

                <!-- Search icon -->
                <i class="bi bi-search text-gray-500 absolute right-2"></i>
            </div>



            <!-- Search Results Area -->
            <div class="mt-6 sm:mt-8 max-h-[450px] overflow-y-auto">
                <h1
                    class="text-center text-[12px]  md:text-xl lg:text-2xl  font-semibold text-gray-800 uppercase tracking-wide border-b border-gray-300 pb-4 whitespace-nowrap">
                    Please search your favourite product
                </h1>


                <div
                    class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 mt-6 search_results transition-all duration-300">
                    <!-- search results / skeletons will appear here -->
                </div>
            </div>
        </div>


    </div>






    <!-- Cart  -->

    <!-- Overlay -->
    <div id="cart-overlay" class="fixed inset-0 bg-black/50 z-[90] hidden opacity-0 transition-opacity duration-300"
        onclick="closeCart()"></div>

    <!-- Side Cart -->
    <div id="cart"
        class="fixed top-0 right-0 h-screen w-full sm:w-[350px] md:w-[400px] lg:w-[420px] bg-white z-[100] hidden p-3 flex flex-col transform translate-x-full transition-transform duration-300 shadow-2xl">

        <!-- Header -->
        <div class="flex justify-between w-full mb-2">
            <button onclick="closeCart()"
                class="cursor-pointer h-[20px] p-2 w-[20px] flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full transition">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- CART WRAPPER -->
        <div id="cart_details" class="flex-1 flex flex-col gap-5 max-h-[65vh] overflow-y-auto pr-2"
            style="scrollbar-width: none;">
            <!-- AJAX will inject cart items here -->
        </div>

        <!-- FOOTER -->
        <div class="border-t border-gray-200 pt-4 mt-6">
            <!-- Cart Summary -->
            <div id="cart-summary"
                class="flex items-center justify-between text-base font-semibold text-gray-800 mb-3 px-2">
                <span>Total:</span>
                <span id="cart-total-amount" class="text-green-600">PKR 0</span>
            </div>

            <!-- Checkout Button Section -->
            <div class="flex flex-col items-center gap-3">
                <a href="./checkoutCart.php" id="checkout-btn"
                    class="w-full px-5 py-3 rounded-xl bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold text-center shadow-md transition-transform duration-300 hover:scale-[1.03] hover:from-green-600 hover:to-emerald-700">
                    Proceed to Checkout
                </a>

                <a href="./index.php" id="continueShoppingBtn"
                    class="w-full px-5 py-3 text-sm font-medium text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition duration-300 text-center">
                    Continue Shopping
                </a>
            </div>
        </div>


    </div>

    <!-- Inline JS -->
    <script>
    function openCart() {
        let overlay = document.getElementById("cart-overlay");
        let cart = document.getElementById("cart");

        overlay.classList.remove("hidden");
        cart.classList.remove("hidden");

        setTimeout(() => {
            overlay.classList.add("opacity-100");
            cart.classList.remove("translate-x-full");
        }, 10);

        document.body.style.overflow = "hidden"; // disable scroll
    }

    function closeCart() {
        let overlay = document.getElementById("cart-overlay");
        let cart = document.getElementById("cart");

        overlay.classList.remove("opacity-100");
        cart.classList.add("translate-x-full");

        setTimeout(() => {
            overlay.classList.add("hidden");
            cart.classList.add("hidden");
            document.body.style.overflow = ""; // enable scroll
        }, 300); // same as transition duration
    }
    // Toggle dropdown
    $("#show_user").click(function() {
        $("#drop_user").toggleClass("hidden");
    });

    // Hide dropdown if clicked outside
    $(document).click(function(event) {
        if (!$(event.target).closest('#show_user, #drop_user').length) {
            $("#drop_user").addClass("hidden");
        }
    });
    </script>
    <script>
    $(document).ready(function() {

        // Open Wishlist
        function openWishlist() {
            let $overlay = $("#wishlist-overlay");
            let $wishlist = $("#wishlist");

            $overlay.removeClass("hidden");
            $wishlist.removeClass("hidden");

            setTimeout(() => {
                $overlay.addClass("opacity-100");
                $wishlist.removeClass("translate-x-full");
            }, 10);

            $("body").css("overflow", "hidden"); // disable page scroll
        }

        // Close Wishlist
        function closeWishlist() {
            let $overlay = $("#wishlist-overlay");
            let $wishlist = $("#wishlist");

            $overlay.removeClass("opacity-100");
            $wishlist.addClass("translate-x-full");

            setTimeout(() => {
                $overlay.addClass("hidden");
                $wishlist.addClass("hidden");
                $("body").css("overflow", ""); // enable scroll
            }, 300); // must match transition duration
        }

        // Button click events
        $("#wishlist-btn").on("click", openWishlist);
        $("#close-wishlist").on("click", closeWishlist);
        $("#wishlist-overlay").on("click", closeWishlist); // click outside to close

    });
    </script>
    <!-- Example button to test -->