<footer class="bg-sec">
    <div class=" pb-12 text-white">
        <div class="bg-[url('imgs/footer.jpg')] bg-cover bg-center bg-no-repeat p-[40px] mb-8">
            <div class="lg:flex sm:block justify-between items-center h-full">
                <div class="text-white text-center lg:text-start">
                    <h3 class="text-3xl lg:text-4xl font-medium mb-2">
                        Want To Chat? Feel Free To<br>
                        Contact Our Team.
                    </h3>
                    <p class="text-base lg:text-lg">
                        If you have anything in mind just contact us with our expert.
                    </p>
                </div>
                <div
                    class="flex flex-col md:flex-row items-center justify-center text-white space-x-0 md:space-x-3 space-y-3 md:space-y-0 mt-4 lg:mt-0 font-optima">
                    <!-- Contact Us Button -->
                    <a href="contact-us"
                        class="border border-white font-herosan rounded-full px-4 py-2 text-base lg:text-lg xl:text-xl bg-white text-black hover:bg-transparent hover:text-white transition-all duration-300 ease-in-out flex items-center">
                        CONTACT US
                        <i class="bi bi-arrow-right ml-2"></i>
                    </a>

                    <!-- Callback Request Button -->
                    <button type="button"
                        class="border border-white px-4 font-herosan rounded-full py-2 text-base lg:text-lg xl:text-xl hover:bg-white hover:text-black transition-all duration-300 ease-in-out flex items-center"
                        data-modal-target="callback-modal" data-modal-toggle="callback-modal">
                        CALL BACK REQUEST
                        <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                </div>


            </div>

        </div>

        <div class="flex flex-col lg:flex-row gap-5 lg:gap-0 justify-center items-center text-white">

            <a href="tel:+971508196285"
                class="group flex flex-col lg:flex-row justify-center items-center gap-5 px-12">
                <img src="imgs/phone-call.png" alt="" class="h-12">
                <p
                    class="text-sm lg:text-base text-white font-medium group-hover:text-pri transition-all duration-300 ease-in-out">
                    +971&nbsp;50&nbsp;819&nbsp;6285</p>
            </a>
            <div class="h-[2px] lg:h-[60px] w-[60px] lg:w-[2px] bg-white"></div>
            <a href="mailto:contact@urbanwrap.ae"
                class="group flex flex-col lg:flex-row justify-center items-center gap-5 px-12">
                <img src="imgs/email.png" alt="" class="h-12">
                <p
                    class="text-sm lg:text-base text-white font-medium group-hover:text-pri transition-all duration-300 ease-in-out">
                     Contact@urbanwrap.ae </p>
            </a>
            <div class="h-[2px] lg:h-[60px] w-[60px] lg:w-[2px] bg-white"></div>
            <div class="flex flex-col lg:flex-row justify-center items-center gap-5 px-12">
                <img src="imgs/location.png" alt="" class="h-12">
                <p class="text-sm lg:text-base text-white font-medium hidden lg:block">Office 502, Al Saud Building, Al Qusais 2, Dubai-UAE</p>
                <p class="text-sm lg:text-base text-white font-medium text-center block lg:hidden">Office 502, Al Saud Building, Al Qusais 2, Dubai-UAE</p>
            </div>
        </div>
        <div class="container w-full h-[2px] bg-white my-8"></div>
        <div class="space-x-3 text-center">
            <a href="about-us" class="hover:text-pri font-herosan transition-all duration-300 ease-in-out">ABOUT US</a>
            <!-- <a href="news-and-event" class="hover:text-pri font-herosan transition-all duration-300 ease-in-out">NEWS &
                EVENTS</a> -->
            <a href="contact-us" class="hover:text-pri font-herosan transition-all duration-300 ease-in-out">CONTACT
                US</a>
        </div>
        <div class="container w-full h-[2px] bg-white my-8"></div>
        <div class="container flex flex-col lg:flex-row justify-between items-center">
            <p class="text-xs lg:text-sm font-medium text-center lg:text-start">
                Copyrights 2025 © Urban Wrap, Designed &amp; Developed by <a href="https://swismax.com" target="_blank"
                    class="font-bold text-pri hover:underline transition-all duration-300 ease-in-out">Swismax Solutions
                    FZE</a>
            </p>
            <div class="text-xl lg:text-2xl flex items-center justify-center gap-5">
                <a href="https://www.facebook.com/share/18X7HT3gvk/" target="_blank"
                    class="hover:text-pri transition-all duration-300 ease-in-out"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/isamaviationtraining" target="_blank"
                    class="hover:text-pri transition-all duration-300 ease-in-out"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/Urban Wrapaviationtraining/" target="_blank"
                    class="hover:text-pri transition-all duration-300 ease-in-out"><i class="bi bi-linkedin"></i></a>
                <a href="https://www.youtube.com/@Urban Wrapaviationtraining" target="_blank"
                    class="hover:text-pri transition-all duration-300 ease-in-out"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>







<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
<script src="js/ajax-cart-actions.js"></script>
<script src="js/ajax-color-actions.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="js/swiper.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script>
document.querySelectorAll('.group').forEach(group => {
    group.addEventListener('mouseenter', () => {
        const dropdownItems = group.querySelectorAll('.custom-animate');
        let delay = 0;

        dropdownItems.forEach(item => {
            // Remove any previous animation class
            item.classList.remove('custom-fade-up');

            // Add animation class after a delay for staggered effect
            setTimeout(() => {
                item.classList.add('custom-fade-up');
            }, delay);

            delay += 100; // Increment delay for the next item
        });
    });

    // Optionally, reset animation on mouse leave
    group.addEventListener('mouseleave', () => {
        const dropdownItems = group.querySelectorAll('.custom-animate');
        dropdownItems.forEach(item => {
            item.classList.remove('custom-fade-up');
        });
    });
});
</script>



<script src="js/script.js"></script>


<!-- This will prevent form resubmittion when page is refreshed. -->
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>


<script>
// Define the messages to display
const messages = [
    `<div class="flex items-center space-x-2"><span class="text-green-500">🚚</span><p>Unlock Free Shipping Above 2,000 PKR</p></div>`,
    `<div class="flex items-center space-x-2"><span class="text-green-500">♻️</span><p>Easy Returns And Exchanges</p></div>`,
    `<div class="flex items-center space-x-2"><span class="text-green-500">📞</span><p>Swift Customer Support</p></div>`
];

let currentMessageIndex = 0;
const messageSlider = document.getElementById("message-slider");

function showNextMessage() {
    // Set the inner HTML to the current message
    messageSlider.innerHTML = messages[currentMessageIndex];

    // Fade in the message
    messageSlider.classList.add("opacity-100");
    messageSlider.classList.remove("opacity-0");

    // Wait for 2 seconds, then fade out the message
    setTimeout(() => {
        messageSlider.classList.remove("opacity-100");
        messageSlider.classList.add("opacity-0");
    }, 2000); // Display message for 2 seconds

    // Update the index to the next message
    currentMessageIndex = (currentMessageIndex + 1) % messages.length;
}

// Start the message slider
setInterval(showNextMessage, 3000); // Cycle every 3 seconds
showNextMessage(); // Show the initial message
</script>


</body>

</html>