// cart.js — unified, plain-text / HTML approach
$(function () {
  refreshCart();
  updateCartSummary();
});

// load cart HTML
function load_cart() {
  $.ajax({
    url: "fetch-cart.php",
    type: "POST",
    dataType: "html", // expecting HTML
    success: function (html) {
      $("#cart_details").html(html);
      // console.log(html);
    },
  });
}

// update small summary (expects plain HTML/snippet from cart-summary.php)
function updateCartSummary() {
  $.ajax({
    url: "cart-summary.php",
    type: "GET",
    dataType: "html",
    success: function (html) {
      $("#cart-summary").html(html); // badge updates via inline script
    },
    error: function () {
      $("#cart-summary").html("");
      // $("#cart-badge").text(0); // fallback
    },
  });
}

// ADD to cart (works from wishlist and product pages)
// 🛒 Move item from wishlist to cart
$(document).on("click", ".addtocart", function (e) {
  e.preventDefault();
  const $btn = $(this);
  const pro_id = $btn.data("id");
  const pro_color = $btn.attr("data-color") || "No Color";
  const pro_ava_qty = $btn.data("ava-qty");
  const pro_size = $btn.data("size") || $btn.data("size-name") || "No Size";
  const pro_qty =
    parseInt($btn.closest("div").parent().find("#pro_qty").val()) || 1;
  $btn.closest(".counter-box").find(".count").text() || 1;

  if (pro_ava_qty == 0) {
    showToast("failed", "Product is out of stock");
    return; // stop here
  }
  if (pro_qty > pro_ava_qty) {
    showToast("failed", "Please select available quantity");
    return; // stop here
  }

  const data = {
    action: "add",
    pro_id: pro_id,
    pro_name: $btn.data("name"),
    pro_image: $btn.data("image"),
    pro_price: $btn.data("price"),
    pro_ava_qty: pro_ava_qty,
    pro_qty: pro_qty,
    pro_size: pro_size,
    pro_color: pro_color,
    pro_color_code: $btn.data("color-code") || "",
  };

  // ✅ Add item to cart
  $.post(
    "ajax-cart-action.php",
    data,
    function (resp) {
      resp = (resp || "").trim();

      if (resp === "added" || resp === "updated") {
        showToast("success", "Item moved to cart.");
        refreshCart();
        updateCartSummary();

        // ✅ Remove this item from wishlist (session)
        $.post(
          "ajax-wishlist-remove.php",
          {
            action: "remove_wishlist",
            pro_id: pro_id,
            pro_color: pro_color,
            pro_size: pro_size,
          },
          function (resp2) {
            resp2 = (resp2 || "").trim();
            if (resp2 === "removed" || resp2 === "wishlist_empty") {
              $btn.closest(".wishlist-item").fadeOut(250, function () {
                $(this).remove();
              });
            }
            refreshWishlist();
            updateWishlistBadge();
          },
          "text"
        );
      } else if (resp === "out_of_stock") {
        showToast("failed", "Please select available quantity");
      } else if (resp === "no_stock") {
        showToast("failed", "Product is out of stock");
      } else {
        showToast("failed", resp || "Something went wrong!");
      }
    },
    "text"
  );
});

// Generic function to update quantity (increase/decrease/remove)
function updateCartItem(key, action) {
  // disable all buttons for this key briefly (optional)
  var btns = $('[data-key="' + key + '"]');
  btns.prop("disabled", true);

  $.post(
    "update-quantity.php",
    { key: key, action: action },
    function (html) {
      // Response is updated cart HTML
      $("#cart_details").html(html);
      updateCartSummary();
    },
    "html"
  );
}

// plus / minus / remove handlers
$(document).on("click", ".plus-btn", function (e) {
  e.preventDefault();
  var key = $(this).data("key");
  updateCartItem(key, "increase");
  console.log("Plus clicked for key:", key);
});

$(document).on("click", ".minus-btn", function (e) {
  e.preventDefault();
  var key = $(this).data("key");
  updateCartItem(key, "decrease");
  console.log("Minus clicked for key:", key);
});

$(document).on("click", ".remove-btn", function (e) {
  e.preventDefault();
  var key = $(this).data("key");
  updateCartItem(key, "remove");
});
// assume this is in cart.js or a separate wishlist.js loaded after jQuery
function showToast(id, msg) {
  let $toast = $("#" + id);

  $toast.find("p").text(msg);

  // clear old timer if already running
  if ($toast.data("timer")) {
    clearTimeout($toast.data("timer"));
  }

  // Show toast
  $toast
    .removeClass("-translate-x-full opacity-0")
    .addClass("translate-x-0 opacity-100");

  // Hide smoothly
  const timer = setTimeout(() => {
    $toast
      .removeClass("translate-x-0 opacity-100")
      .addClass("-translate-x-full opacity-0");
  }, 1800);

  $toast.data("timer", timer);
}

// open wishlist sidebar

// ❤️ Add / Remove (toggle) wishlist item
$(document).on("click", ".addtoWishlist", function (e) {
  e.preventDefault();
  var $btn = $(this);
  var isActive = $btn.hasClass("text-red-500"); // check heart state

  var data = {
    action: "add_wishlist",
    pro_id: $btn.data("id"),
    pro_name: $btn.data("name"),
    pro_image: $btn.data("image"),
    pro_price: $btn.data("price"),
    pro_qty: $("#pro_qty").val() || 1,
    pro_color: $btn.attr("data-color") || "No Color",
    pro_color_code: $btn.attr("data-color-code") || "No Code",
    pro_size: $btn.attr("data-size") || "No Size",
  };

  $.post(
    "ajax-wishlist-action.php",
    data,
    function (resp) {
      refreshCart();
      updateCartSummary();

      resp = (resp || "").trim();

      if (resp === "added") {
        $btn.removeClass("text-gray-500").addClass("text-red-500");
      } else if (resp === "removed") {
        $btn.removeClass("text-red-500").addClass("text-gray-500");
      }

      if (resp === "added") {
        showToast("success", "Item added to wishlist");
      } else if (resp === "removed") {
        showToast("success", "Item removed from wishlist");
      } else {
        showToast("failed", resp || "Something went wrong.");
      }

      // Refresh wishlist sidebar and badge
      refreshWishlist();
      updateWishlistBadge();

      // ⭐⭐⭐ ADD THESE LINES HERE ⭐⭐⭐
      let count = $("#wishlist-btn .absolute p").text();
      localStorage.setItem("wishlist_count", count);
      // ⭐⭐⭐ END ⭐⭐⭐
    },
    "text"
  );
});

// remove wishlist item
$(document).on("click", ".remove-wish-item", function (e) {
  e.preventDefault();
  const $btn = $(this);
  const pro_id = $btn.data("id");
  const pro_color = $btn.data("color") || $btn.data("color-name") || "No Color";

  const pro_size = $btn.data("size") || "No Size";

  $.post(
    "ajax-wishlist-remove.php",
    {
      action: "remove_wishlist",
      pro_id: pro_id,
      pro_color: pro_color,
      pro_size: pro_size,
    },
    function (resp) {
      resp = (resp || "").trim();

      refreshWishlist(); // refresh wishlist and badge
      updateWishlistBadge();
      if (resp === "removed") {
        showToast("success", "Item permanently removed from wishlist.");
        $btn.closest(".wishlist-item").fadeOut(250, function () {
          $(this).remove();
        });
      } else if (resp === "wishlist_empty") {
        showToast("success", "Wishlist is empty.");
      } else {
        showToast("failed", resp || "Remove failed.");
      }
    },
    "text"
  );
});

// when wishlist icon is clicked
$(document).on("click", "#wishlist-btn", function () {});
function loadWishlistSidebar() {
  $.ajax({
    url: "fetch-wishlist.php",
    type: "GET",
    dataType: "html",
    success: function (html) {
      $("#wishlistContainer").html(html);
      $("#wishlistContainer").removeClass("hidden");
      $("#cart_details").addClass("hidden");

      // show sidebar & overlay
      $("#wishlist")
        .removeClass("hidden translate-x-full")
        .addClass("translate-x-0");
      $("#wishlist-overlay")
        .removeClass("hidden opacity-0")
        .addClass("opacity-100");

      // ✅ Update wishlist badge count
      const count = $(html).find(".wishlist-item").length || 0;
      $("#wishlist-btn .absolute p").text(count);
    },
    error: function () {
      $("#wishlistContainer").html(
        '<div class="p-4 text-center text-gray-600">Failed to load wishlist.</div>'
      );
    },
  });
}

function updateWishlistBadge() {
  $.ajax({
    url: "fetch-wishlist.php",
    type: "POST", // ✅ Use POST (safer for sessions)
    dataType: "html",
    cache: false, // ✅ Always disable cache
    xhrFields: { withCredentials: true }, // ✅ Preserve session cookies
    success: function (html) {
      $("#wishlistContainer").html(html);
      const count = $("#wishlistContainer .wishlist-item").length || 0;
      $("#wishlist-btn .absolute p").text(count);
    },
    error: function () {
      $("#wishlistContainer").html(
        '<div class="p-4 text-center text-gray-600">Failed to load wishlist.</div>'
      );
    },
  });
}

$(document).ready(function () {
  updateWishlistBadge();
});
// --- refreshWishlist: updates wishlist HTML + badge but DOES NOT hide or show panels
function refreshWishlist() {
  $.ajax({
    url: "fetch-wishlist.php",
    type: "GET",
    dataType: "html",
    cache: false,
    success: function (html) {
      $("#wishlistContainer").html(html);
      // update wishlist badge reliably
      const count = $("#wishlistContainer").find(".wishlist-item").length || 0;
      $("#wishlist-btn .absolute p").text(count);
    },
    error: function () {
      $("#wishlistContainer").html(
        '<div class="p-4 text-center text-gray-600">Failed to load wishlist.</div>'
      );
    },
  });
}

// --- loadWishlistSidebar: opens sidebar, shows wishlist and hides cart (for user opening the sidebar)
function loadWishlistSidebar() {
  $.ajax({
    url: "fetch-wishlist.php",
    type: "GET",
    dataType: "html",
    cache: false,
    success: function (html) {
      $("#wishlistContainer").html(html);
      // show sidebar & overlay
      $("#wishlist")
        .removeClass("hidden translate-x-full")
        .addClass("translate-x-0");
      $("#wishlist-overlay")
        .removeClass("hidden opacity-0")
        .addClass("opacity-100");
      // hide cart panel
      $("#cart_details").addClass("hidden");
      // update badge
      const count = $("#wishlistContainer").find(".wishlist-item").length || 0;
      $("#wishlist-btn .absolute p").text(count);
    },
    error: function () {
      $("#wishlistContainer").html(
        '<div class="p-4 text-center text-gray-600">Failed to load wishlist.</div>'
      );
    },
  });
}

// --- refreshCart: small improvement for load_cart (non-cached + debug)
function refreshCart() {
  $.ajax({
    url: "fetch-cart.php",
    type: "POST",
    dataType: "html",
    cache: false,
    success: function (html) {
      if (!html || html.trim() === "") {
        console.warn("fetch-cart returned empty HTML");
      }
      $("#cart_details").html(html);
    },
    error: function (xhr, status, err) {
      console.error("Failed to load cart:", status, err);
    },
  });
}
// wishlist color system
$(document).ready(function () {
  let count = parseInt(localStorage.getItem("wishlist_count") || 0);

  if (count > 0) {
    $(".addtoWishlist").removeClass("text-gray-500").addClass("text-red-500");
  } else {
    $(".addtoWishlist").removeClass("text-red-500").addClass("text-gray-500");
  }
});
// debounce timer variable (keeps track of scheduled request)
let searchTimer = null;

// 🦴 Beautiful animated skeletons
function getSkeletonHTML() {
  return `
    <div class="bg-white rounded-xl shadow animate-pulse overflow-hidden border border-gray-100">
      <div class="h-52 sm:h-60 bg-gray-200"></div>
      <div class="p-3 space-y-2">
        <div class="h-4 bg-gray-200 rounded w-3/4"></div>
        <div class="h-3 bg-gray-200 rounded w-1/2"></div>
      </div>
    </div>
  `;
}

function showSkeletons(container) {
  let html = "";
  for (let i = 0; i < 8; i++) html += getSkeletonHTML();
  container.html(html);
}

// 🧩 "No results" message
function showNoResults(container) {
  container.html(`
    <div class="col-span-full text-center py-10">
      <p class="text-gray-500 text-sm sm:text-base font-medium">
        No matching products found. Try a different keyword.
      </p>
    </div>
  `);
}

// ⌨️ Debounced search (2s delay)
$(document).on("keyup", ".search_box", function () {
  const $this = $(this);
  const searchVal = $this.val().trim();
  const $resultsContainer = $(".search_results");

  if (searchTimer) clearTimeout(searchTimer);

  if (searchVal === "") {
    $resultsContainer.html("");
    return;
  }

  showSkeletons($resultsContainer);

  searchTimer = setTimeout(function () {
    $.ajax({
      url: "search-products.php",
      type: "POST",
      data: { searchVal: searchVal },
      success: function (response) {
        const trimmed = (response || "").trim();
        if (trimmed === "") showNoResults($resultsContainer);
        else $resultsContainer.html(response);
      },
    });
  }, 2000);
});

// ===================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// =======================
// ajax-cart-action.js
$(document).on("input", "#priceRange", function () {
  $("#rangeValue").text($(this).val());
});

$(document).on("click", "#applyFilterBtn", function () {
  let maxPrice = $("#priceRange").val();

  // Get ct_id from URL
  let urlParams = new URLSearchParams(window.location.search);
  let categoryId = urlParams.get("ct_id");

  if (!categoryId) {
    alert("Category ID not found in the URL!");
    return;
  }

  $.ajax({
    url: "filterProducts.php",
    type: "POST",
    data: { categoryId: categoryId, maxPrice: maxPrice },
    beforeSend: function () {
      // Show loading cards that match your grid layout
      $("#productContainer").html(
        "<div class='col-span-4 text-center w-full py-8 text-gray-500'>Loading...</div>"
      );
    },
    success: function (response) {
      // put server html into the product grid
      $("#productContainer").html(response);
    },
    error: function (xhr, status, err) {
      console.error("AJAX error:", status, err);
      alert(
        "Something went wrong while filtering! Open console/network for details."
      );
    },
  });
});
// ==============================================
// ==============================================
// ==============================================
// ==============================================
// Delegated event for dynamically loaded form
$(document).on("submit", "#newAddressForm", function (e) {
  e.preventDefault(); // stop normal form submission

  const formData = {
    postal_code: $(".postal_code").val().trim(),
    apartment_suite: $(".apartment_suite").val().trim(),
    state: $(".state").val().trim(),
    city: $(".city").val().trim(),
    country: $(".country").val().trim(),
    address: $(".address").val().trim(),
  };

  // Simple validation
  if (!formData.address || !formData.city) {
    showToast("error", "Please fill at least Address and City!");
    return;
  }

  // AJAX request
  $.ajax({
    url: "save_address.php",
    type: "POST",
    data: formData,
    success: function (res) {
      res = res.trim();

      if (res === "success") {
        // Reset form & close modal
        $("#newAddressForm")[0].reset();
        $("#addAddressModal").addClass("hidden");
        showToast("success", "New address saved successfully!");

        // 🆕 Fetch updated address list dynamically
        $.ajax({
          url: "fetch_address.php",
          method: "GET",
          success: function (data) {
            $(".selectUserAddress").html(data); // replace with latest addresses
          },
          error: function () {
            console.log("Error fetching updated addresses");
          },
        });
      } else if (res === "error_missing_fields") {
        showToast("error", "Please fill at least Address and City!");
      } else {
        showToast("error", "Error saving address: " + res);
      }
    },

    error: function () {
      showToast("error", "AJAX error occurred!");
    },
  });
});

// ==========================================
// ==========================================
// ==========================================
// ==========================================
$(document).on("click", ".deleteAddressBtn", function (e) {
  e.preventDefault();
  const id = $(this).data("id");
  const $card = $(this).closest(".addressBox");

  $.ajax({
    url: "delete_address.php",
    type: "POST",
    data: { id },
    success: function (res) {
      res = res.trim();
      if (res === "success") {
        $card.fadeOut(300, function () {
          $(this).remove();
        });
      } else if (res === "unauthorized") {
        alert("Please login first!");
      } else {
        alert("Failed to delete address. Try again.");
      }
    },
    error: function () {
      alert("AJAX error occurred.");
    },
  });
});
$(document).ready(function () {
  $.ajax({
    url: "fetch_address.php",
    method: "GET",
    success: function (data) {
      $(".selectUserAddress").html(data);
    },
  });
});
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// asd============PAYNOW==========================
// Pay Now button inside form
$(".paynow").on("click", function (e) {
  e.preventDefault();

  let $btn = $(this); // button reference
  let oldText = $btn.html(); // store original button text

  let addressId = $(".bg-white.border.rounded-lg.p-4.shadow-sm.relative").attr(
    "data-selected-address-id"
  );

  if (!addressId) {
    showToast("failed", "Please select an address first");
    return;
  }

  console.log("Selected address ID:", addressId);

  $.ajax({
    url: "place_order.php",
    type: "POST",
    data: {
      selected_address_id: addressId,
      payment_method: "cod",
    },
    dataType: "json",

    // ⭐ BEFORE SEND: change button text
    beforeSend: function () {
      $btn.html("Please wait...");
      $btn.prop("disabled", true);
    },

    success: function (res) {
      console.log(res);

      if (res.status === "success") {
        showToast("success", "Order placed: " + res.odr_no);
        setTimeout(() => location.reload(), 500);
      } else {
        showToast("failed", res.msg);
      }
    },

    // ⭐ ALWAYS EXECUTED: restore button text
    complete: function () {
      $btn.html(oldText);
      $btn.prop("disabled", false);
    },

    error: function () {
      showToast("failed", "Something went wrong");
    },
  });
});
