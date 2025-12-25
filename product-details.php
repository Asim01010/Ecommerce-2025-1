<?php include 'libs/header.php' ?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if (isset($_GET['pro_id'])) {
    $pro_id    = $_GET['pro_id'];
    $productdetails = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_id='$pro_id'") or die(mysqli_error($dbcon));
    while ($row = mysqli_fetch_assoc($productdetails)) {

        $pro_name = $row['pro_name'];
        $pro_cat_id = $row['pro_cat_id'];

        $category = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE  ct_id='$pro_cat_id'") or die(mysqli_error($dbcon));
        if ($catrow = mysqli_fetch_assoc($category)) {
            $cat_name = $catrow['ct_name'];
        } ?>

        <section class="bg-pri">
            <div class="contaienr py-4">
                <h2 class="text-white font-bold text-center text-2xl lg:text-3xl"><?php echo $cat_name ?></h2>
            </div>
        </section>

        <!-- Clothing -->
        <section>
            <div class="container py-16">
                <div class="flex flex-wrap lg:flex-nowrap gap-0 lg:gap-5">

                    <!-- Slider -->
                    <div class="w-full lg:w-1/2 lg:h-full lg:sticky top-0 mb-16 lg:mb-0">
                        <div class="swiper mySwiper2 relative swiper-slide-change">
                            <div class="swiper-wrapper ">
                                <div class="swiper-slide ">
                                    <img src="imgs/products/<?php echo $row['pro_image'] ?>" class="w-full border mb-3" alt="products" >
                                </div>

                                <?php
                                $productimages = mysqli_query($dbcon, "SELECT * FROM sm_products_images WHERE img_pro_id='$pro_id' ORDER BY img_id ASC") or die(mysqli_error($dbcon));
                                if (mysqli_num_rows($productimages) > 0) {
                                    while ($imagerow = mysqli_fetch_assoc($productimages)) { ?>
                                        <div class="swiper-slide ">
                                            <img src="imgs/products/<?php echo $imagerow['img_link'] ?>" class="w-full border mb-3" alt="product main slider" />
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="swiper-button-next-unique absolute top-[50%] right-0 translate-y-[-50%] z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-right-short text-orange-500" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </div>
                            <div class="swiper-button-prev-unique absolute top-[50%] left-0 translate-y-[-50%] z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-short text-orange-500" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg>
                            </div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper ">
                            <div class="swiper-wrapper ">
                                <div class="swiper-slide">
                                    <img src="imgs/products/<?= $row['pro_image'] ?>" class="w-full border" alt="productss" > 
                                </div>

                                <?php
                                $productimages = mysqli_query($dbcon, "SELECT * FROM sm_products_images WHERE img_pro_id='$pro_id' ORDER BY img_id ASC") or die(mysqli_error($dbcon));
                                if (mysqli_num_rows($productimages) > 0) {
                                    while ($imagerow = mysqli_fetch_assoc($productimages)) { ?>
                                        <div class="swiper-slide ">
                                            <img src="imgs/products/<?php echo $imagerow['img_link'] ?>" class="w-full border" alt="products" />
                                        </div>
                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </div>


                    </div>

                    <!-- Product Details -->
                    <div class="w-full lg:w-1/2">
                        <h3 class="font-bold text-2xl mb-3"><?php echo $row['pro_name'] ?></h3>
                         <!--<?php

                        if ($row['pro_discount'] > 0) {
                            $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                            <div class="flex gap-3 items-center mb-5">
                                <h5 class="font-graphiksb text-lg text-orange-500">
                                    <?php echo number_format($row['pro_price'] - $discount, 0); ?> PKR
                                </h5>
                                <p class="text-xs"><del><?php echo $row['pro_price']; ?> PKR</del> | <?= $row['pro_discount'] ?>% Off</p>
                            </div>
                        <?php
                        } else { ?>

                            <h5 class="font-graphiksb text-lg text-orange-500 mb-5">
                                <?php echo $row['pro_price']; ?> PKR
                            </h5>
                        <?php
                        }
                        ?> -->

                        <?php
                        // Colors selector for both guest and customer
                        $procolors = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id='$pro_id' ORDER BY pc_id ASC") or die(mysqli_error($dbcon));
                        if (mysqli_num_rows($procolors) > 0) { ?>
                            <h3 class="font-bold mb-2">Colors : <span id="selected_color"></span></h3>
                            <div class="w-full flex flex-wrap lg:flex-nowrap gap-5 mb-5">
                                <?php
                                $i = 0;
                                while ($colorrow = mysqli_fetch_assoc($procolors)) { ?>
                                    <div class="flex items-center gap-2 capitalize">
                                        <input type="hidden" id="pro_id" name="pro_id" value="<?= $pro_id ?>">

                                        <?php $isChecked = ($i === 0) ? 'checked' : ''; ?>

                                        <input class="hidden" id="pro_color_<?= $i ?>" type="radio" name="pro_color" value="<?= $colorrow['pc_name'] ?>" <?= $isChecked ?> >
                                        <label class="flex flex-col p-1 rounded-full cursor-pointer border" data-color-code="<?= $colorrow['pc_code'] ?>" id="label_<?= $i ?>" for="pro_color_<?= $i ?>">
                                            <div class="w-6 h-6 rounded-full bg-[<?= $colorrow['pc_code'] ?>] " onclick="fetchImage('<?= $colorrow['pc_name'] ?>')"></div>
                                        </label>
                                    </div>
                                <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                        <!-- Data coming from js -->
                        <!-- <h3 class="font-bold mb-2">Sizes</h3>
                        <div class="w-full flex flex-wrap lg:flex-nowrap gap-5 mb-5" id="size_div"></div>

                        <div class="mb-6">
    <h3 class="font-bold mb-2">Size Guide Line</h3>
    <a href="#" onclick="openSizeGuideModal('T-Shirt')" class="size-guide-link flex">
        <img src="imgs/size_guidline.png" alt="Size Guide Icon" class="w-6 h-6 inline">
        <h3 class="text-md">Size Guideline</h3>
    </a>
</div> -->

<!-- Size Guide Modal -->
<!-- <div id="size-guide-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-4  w-full max-w-lg relative">
        <div class="flex py-4 text-lg justify-between items-center">
            <h2 class="font-semibold text-gray-800"><?php echo $row['pro_name'] ?> Size Guideline</h2>
            <button onclick="closeSizeGuideModal()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold">
                &times;
            </button>
        </div>
        <img id="modal-image" src="imgs/products/<?php echo $row['pro_size_guidline'] ?>" alt="Size Guide" class="w-full h-auto rounded-lg">
    </div>
</div> -->




                        <div class="mb-6">
                            <?php
                            if (isset($_SESSION['sm_id'])) { ?>
                                <input type="hidden" id="pro_id" value="<?php echo $row['pro_id'] ?>">
                                <div class="space-y-5">
                                    <div>
                                        <h3 class="font-bold mb-2">Quantity</h3>
                                        <input type="number" id="pro_qty" value="1" min="1" class="text-sm lg:text-base py-3 px-5 border outline-none"><BR>
                                        <!-- <div class="text-xs" id="max_qty_div"></div> -->
                                        <input type="hidden" id="pro_max_qty" value="">
                                    </div>
                                    <div class="hidden" id="info">
                                        <div class="bg-orange-100 px-5 py-2 flex gap-2 justify-center items-center">
                                            <i class="bi bi-info-circle text-xl"></i>
                                            <p id="info_msg"></p>
                                        </div>
                                    </div>

                                    <a href="https://wa.me/971561728208?text=Hi%2C%20I%20would%20like%20to%20order%20this%20product" target="_blank"
   class="text-white bg-pri py-3 px-5 text-sm lg:text-base inline-flex items-center gap-2 rounded">
   <i class="bi bi-whatsapp text-lg"></i>
   Order via WhatsApp
</a>
<button id="outofstock" class="text-white bg-pri py-3 px-5 text-sm lg:text-base">Out of Stock</button>
                                </div>
                            <?php

                            } else { ?>
                                <input type="hidden" id="pro_id" value="<?php echo $row['pro_id'] ?>">
                                <input type="hidden" id="pro_name" value="<?php echo $row['pro_name'] ?>">
                                <input type="hidden" id="pro_image" value="<?php echo $row['pro_image'] ?>">

                                <?php
                                if ($row['pro_discount'] > 0) {
                                    $discount = ($row['pro_price'] * $row['pro_discount']) / 100; ?>
                                    <input type="hidden" id="pro_price" value="<?php echo $row['pro_price'] - $discount; ?>">
                                <?php
                                } else { ?>
                                    <input type="hidden" id="pro_price" value="<?php echo $row['pro_price']; ?>">
                                <?php
                                }
                                ?>


                                <div class="space-y-5">
                                    <div>
                                        <h3 class="font-bold mb-2">Quantity</h3>
                                        <input type="number" id="pro_qty" value="1" min="1" class="text-sm lg:text-base py-3 px-5 border outline-none"><BR>
                                        <!-- <div class="text-xs" id="max_qty_div"></div> -->
                                        <input type="hidden" id="pro_max_qty" value="">
                                    </div>
                                    <div class="hidden" id="info">
                                        <div class="bg-orange-100 px-5 py-2 flex gap-2 justify-center items-center">
                                            <i class="bi bi-info-circle text-xl"></i>
                                            <p id="info_msg"></p>
                                        </div>
                                    </div>
                                    <?php
                                    if ($row['pro_ava_qty'] > 0 && $row['pro_status'] != 2) { ?>
                                        <a href="https://wa.me/971561728208?text=Hi%2C%20I%20would%20like%20to%20order%20this%20product" target="_blank"
   class="text-white bg-pri py-3 px-5 text-sm lg:text-base inline-flex items-center gap-2 rounded">
   <i class="bi bi-whatsapp text-lg"></i>
   Order via WhatsApp
</a>

                                    <?php
                                    } else { ?>
                                        <button class="text-white bg-pri py-3 px-5 text-sm lg:text-base cursor-not-allowed">Out of Stock</button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <div class="prose text-sm lg:text-base">
                            <?php echo $row['pro_overview'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        if ($row['pro_video'] != "") { ?>
            <section class="bg-gray-50">
                <div class="container py-16">
                    <iframe class="w-full h-[500px]" src="https://www.youtube.com/embed/<?= $row['pro_video'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </section> 
<?php
        }
    }
} else {
    echo "<script>window.location.href = './'</script>";
}
?>

<!-- Quote Form -->
<div data-te-modal-init class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
    <div data-te-modal-dialog-ref class="pointer-events-none relative flex min-h-[calc(100%-1rem)] w-auto translate-y-[-50px] items-center opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:min-h-[calc(100%-3.5rem)] min-[576px]:max-w-[500px]">
        <div class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-lg outline-none">
            <div class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 border-opacity-100 p-4">
                <h5 class="text-xl font-medium leading-normal text-neutral-800" id="exampleModalCenterTitle">
                    Get Quotation
                </h5>
                <button type="button" class="box-content rounded-none border-none hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none" data-te-modal-dismiss aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form method="post" class="relative">
                <div class="p-4 space-y-3">
                    <input type="hidden" name="quote_weapon" value="<?= $pro_name ?>">
                    <input type="text" name="quote_name" class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Name" required>
                    <input type="email" name="quote_email" class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Email" required>
                    <input type="number" name="quote_contact_no" class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Enter Mobile No." required>
                    <div class="flex gap-3">
                        <input type="text" name="quote_city" class="text-sm lg:text-base border outline-none px-5 py-2 w-1/2" placeholder="Enter City" required>
                        <input type="text" name="quote_country" class="text-sm lg:text-base border outline-none px-5 py-2 w-1/2" placeholder="Enter Country" required>
                    </div>
                    <textarea name="quote_msg" id="" cols="30" rows="5" class="text-sm lg:text-base border outline-none px-5 py-2 w-full" placeholder="Write you message"></textarea>
                </div>
                <div class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 border-opacity-100 p-4">
                    <button type="button" class="inline-block rounded bg-gray-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white transition duration-150 ease-in-out focus:outline-none focus:ring-0" data-te-modal-dismiss data-te-ripple-init data-te-ripple-color="light">
                        Close
                    </button>
                    <button type="submit" name="quote_submit" class="ml-1 inline-block rounded bg-pri px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]" data-te-ripple-init data-te-ripple-color="light">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  



  let swiperSlide
    function fetchImage(colorName) {
        const proId = $('#pro_id').val();
        console.log('Selected Color:', colorName);
        console.log('Product ID:', proId);

        $.ajax({
            url: './fetch_image_url.php',
            type: 'POST',
            data: { color: colorName, pro_id: proId },
            dataType: 'json',
            success: function(response) {
                console.log('Response:', response);
                if (response.length > 0) {
                    console.log('Updating Image Source:', response[0]);
                    //$('#product-image').attr('src', response[0]);

                     // Initialize Swiper only once
                     if (!swiperSlide) {
                        swiperSlide = new Swiper('.swiper-slide-change', {
                            direction: 'horizontal',
                            loop: false, // Set loop to false to maintain position
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.swiper-button-next-unique',
                                prevEl: '.swiper-button-prev-unique',
                            },
                            slidesPerView: 1,
                            spaceBetween: 10,
                        });
                    }
                    // Check if the image URL exists in the slides
                    const currentImageSrc = response[0];
                    

                    // Find the index of the matching image in the swiper slides
                        let slideIndex = -1;
                        for (let index = 0; index < swiperSlide.slides.length; index++) {
                        const imgSrc = $(swiperSlide.slides[index]).find('img').attr('src');
                        if (imgSrc === currentImageSrc) {
                            slideIndex = index; // Update the slide index
                            break; // Exit loop once found
                        }
                    }
                        
                        // If a matching slide is found, trigger the slide transition
                        if (slideIndex !== -1) {
                            swiperSlide.slideTo(slideIndex);
                            swiper.slideTo(slideIndex);
                            // Use the swiper class to slide to the matching image
                            //$('.swiper-slide-change').css('transform', 'translate3d(-' + (slideIndex * 100) + '%, 0, 0)');
                        }
                } else if (response.default) {
                   // $('#product-image').attr('src', response.default);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching image:', textStatus, errorThrown);
                console.log('Response Text:', jqXHR.responseText);
            }
        });
    }
</script>

<!-- JavaScript to Control Modal with Condition -->
<script>
// Function to open modal and display the correct image based on product type
function openSizeGuideModal(productType) {
    var modalImage = document.getElementById("modal-image");
    
    // Check product type and set the image source accordingly
    
    
    document.getElementById("size-guide-modal").classList.remove("hidden");
}

// Function to close modal
function closeSizeGuideModal() {
    document.getElementById("size-guide-modal").classList.add("hidden");
}
</script>

<?php include 'libs/footer.php' ?>