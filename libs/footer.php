<?php
require "dbconfig.php";
?>
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<footer class="bg-gray-100 text-gray-800 py-10">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">

        <!-- Contact Us -->
        <div>
            <h3 class="font-bold uppercase mb-4">Contact Us</h3>
            <p class="flex items-center gap-2 mb-2 font-semibold">
                <i class="fa-solid fa-phone "></i> +92 21 111-244-266
            </p>
            <p class="flex items-center gap-2 mb-2 font-semibold">
                <i class="fa-solid fa-envelope"></i> info@bonanzasatrangi.com
            </p>
            <p class="flex items-start gap-2 text-sm font-semibold">
                <i class="fa-regular fa-clock mt-1"></i>
                <span>
                    Customer Service<br>
                    Monday - Saturday: 9:30 AM – 10:00 PM PKT<br>
                    Sunday: 11:00 AM – 8:00 PM PKT
                </span>
            </p>

            <!-- Social Icons -->
            <div class="flex gap-8 mt-4 text-lg">
                <?php
                $footer_icons = mysqli_query($dbcon, "SELECT sm_icon, sm_url, sm_color_footer, sm_target FROM ptcs_setting_socialmedia WHERE sm_status=1 AND sm_footer=1");

                if ($footer_icons) {
                    while ($row = mysqli_fetch_assoc($footer_icons)) {
                ?>
                <a href="<?php echo htmlspecialchars($row['sm_url']); ?>"
                    target="<?php echo htmlspecialchars($row['sm_target']); ?>" class="text-gray-600 hover:text-black">

                    <i class="fa <?php echo htmlspecialchars($row['sm_icon']); ?>"
                        style="color: <?php echo htmlspecialchars($row['sm_color_footer']); ?>;">
                    </i>
                </a>
                <?php
                    }
                } else {
                    echo "Query failed: " . mysqli_error($dbcon);
                }
                ?>
            </div>

        </div>

        <!-- Information -->
        <div>
            <h3 class="font-bold uppercase mb-4 font-semibold">Information</h3>
            <ul class="space-y-2 text-sm font-semibold">
                <li><a href="#" class="hover:text-pri">About Us</a></li>
                <li><a href="#" class="hover:text-pri">Track Your Order</a></li>
                <li><a href="#" class="hover:text-pri">Shipping Information</a></li>
                <li><a href="#" class="hover:text-pri">Store Locator</a></li>
                <li><a href="#" class="hover:text-pri">Terms of Service</a></li>
            </ul>
        </div>

        <!-- Customer Care -->
        <div>
            <h3 class="font-bold uppercase mb-4">Customer Care</h3>
            <ul class="space-y-2 text-sm font-semibold">
                <li><a href="#" class="hover:text-pri">Contact Us</a></li>
                <li><a href="#" class="hover:text-pri">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-pri">Return & Exchange Policy</a></li>
                <li><a href="#" class="hover:text-pri">FAQs</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div>
            <h3 class="font-bold uppercase mb-4">Newsletter Sign Up</h3>
            <p class="text-sm mb-4 font-semibold">
                Sign up to stay in the loop. Receive updates, access to exclusive deals and more.
            </p>
            <form class="flex border border-black rounded overflow-hidden">
                <input type="email" placeholder="Enter Email"
                    class="px-3 py-2 flex-grow focus:outline-none bg-transparent">
                <button type="submit" class="px-4  text-black">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Bottom -->
    <div class="text-center text-sm mt-8 border-t pt-4">
        Powered By <span class="font-semibold">Swiwmax</span>
    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script src="js/ajax-cart-actions.js"></script>
<script src="js/ajax-color-actions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="js/script.js"></script>



</body>

</html>