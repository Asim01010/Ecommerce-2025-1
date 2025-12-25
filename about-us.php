<?php
$pageTitle = " About Us - Splash 30";
$pageDescription = " About Us - Splash 30";
include 'libs/header.php';
?>

<section class="bg-pri">
    <div class="container py-4 uppercase text-white text-center text-3xl">
        About Us
    </div>
</section>


<section class="bg-gray-50 py-16 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto">
        <!-- Grid Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left Column: Image -->
            <div class="order-2 md:order-1">
                <img src="imgs/about-img.png" alt="Urban Wrap Image" class="rounded-lg  w-full h-auto">
            </div>

            <!-- Right Column: Content -->
            <div class="order-1 md:order-2">
                <h2 class="text-3xl  text-black font-herosan mb-4 font-semibold">
                    Welcome To <br><span class="text-sec text-5xl"> Urban Wraps</span>
                </h2>

                <p class="text-sm font-popin mb-6">
                    Urban Wrap is a dynamic and growing company specializing in high-quality tissue, paper, and plastic products. Established with a vision to provide reliable and eco-friendly solutions for everyday needs, we have become a trusted name in the product packaging and hygiene industry.
                    <br><br>
                    With a strong commitment to quality, innovation, and customer satisfaction, Urban Wrap offers a wide range of products including facial tissues, kitchen rolls, toilet papers, food wrapping sheets, and a variety of plastic packaging materials. Our products are designed to meet the highest standards of cleanliness, durability, and convenience.
                    <br><br>
                    At Urban Wrap, sustainability is at the heart of what we do. We strive to adopt environmentally responsible practices in our manufacturing and packaging processes, helping reduce waste and support a greener planet.
                </p>
            </div>

        </div>
    </div>
</section>

<?php include 'libs/footer.php'; ?>