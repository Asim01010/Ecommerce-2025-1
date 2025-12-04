<?php include 'libs/header.php' ?>


<section class="bg-pri">
    <div class="contaienr py-4">
        <h2 class="text-white font-bold text-center text-2xl lg:text-3xl">Shopping Cart</h2>
    </div>
</section>

<section>
    <div class="container py-16">
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-xl lg:text-2xl font-medium">Cart (<span class="cart_count">0</span>)</h3>
            <?php
            if (isset($_SESSION['sm_id'])) { ?>
            <button class="text-xs lg:text-base text-white bg-pri py-3 px-5" id="emptycarttable">Clear Cart</button>
            <?php

            } else { ?>
            <button class="text-xs lg:text-base text-white bg-pri py-3 px-5" id="emptycart">Clear Cart</button>
            <?php
            }
            ?>
        </div>


        <div class="relative overflow-x-auto">
            <table class="w-[220%] lg:w-full mb-8">
                <tbody id="cart_details">

                </tbody>
            </table>
        </div>

    </div>
</section>

<section>
    <div class="container pb-16">
        <div class="w-full lg:w-1/3 bg-pri p-5 ml-auto text-white">
            <h3 class="text-lg lg:text-xl font-bold text-center mb-5">Order Summary</h3>
            <div class="flex justify-between border-t py-3 text-sm lg:text-base font-medium">
                <h4>Total Items:</h4>
                <p class="cart_count">0</p>
            </div>
            <div class="flex justify-between border-y py-3 text-sm lg:text-base font-medium mb-12">
                <h4>Total:</h4>
                <p class="total_price">0</p>
            </div>

            <div class="flex justify-between items-center text-xs lg:text-base">
                <a href="./" class="">Continue Shopping</a>
                <a href="checkout" class="bg-white text-pri font-medium py-3 px-5">Check Out</a>
            </div>
        </div>
    </div>
</section>



<?php include 'libs/footer.php' ?>