$(document).ready(function () {
  loadSize();

  function loadSize() {
    var pro_id = $("#pro_id").val();
    var pro_color = $('input[name="pro_color"]:checked').val();

    $("#selected_color").html(pro_color);

    $("#pro_qty").val("1");

    $.ajax({
      url: "ajax-color-actions.php",
      type: "post",
      data: {
        action: "change_color",
        pro_id: pro_id,
        pro_color: pro_color,
      },
      success: function (response) {
        // console.log(response);
        $("#size_div").html(response);
        loadQty();
      },
    });

    $('input[name="pro_color"]').change(function () {
      // Remove border from all labels
      $("label").removeClass("border-black");

      // Add border to the label next to the checked radio button
      $('input[name="pro_color"]:checked')
        .next("label")
        .addClass("border-black");
    });

    // Trigger the change event on page load to set the initial state
    $('input[name="pro_color"]:checked').change();
  }

  function loadQty() {
    var pro_id = $("#pro_id").val();
    var pro_color = $('input[name="pro_color"]:checked').val();
    var pro_size = $('input[name="pro_size"]:checked').val();

    $("#pro_qty").val("1");

    $.ajax({
      url: "ajax-color-actions.php",
      type: "post",
      data: {
        action: "change_size",
        pro_id: pro_id,
        pro_color: pro_color,
        pro_size: pro_size,
      },
      success: function (response) {
        // console.log(response);
        $("#qty_div").html(response);
        $("#pro_qty").attr("max", response);
        $("#max_qty_div").html("Max Qty: " + response);
        $("#pro_max_qty").val(response);
        if (response == 0) {
          $("#info").show();
          $("#info_msg").html("The item is temporarily unavailable.");
          $("#addtocart").hide();
          $("#addtocarttable").hide();
          $("#outofstock").show();
        } else if (response < 10) {
          $("#info").show();
          $("#info_msg").html("Hurry up! Few pieces left.");
          $("#addtocart").show();
          $("#addtocarttable").show();
          $("#outofstock").hide();
        } else {
          $("#info").hide();
          $("#outofstock").hide();
          $("#addtocart").show();
          $("#addtocarttable").show();
        }
      },
    });

    $('input[name="pro_size"]').change(function () {
      // Remove border from all labels
      $("label").removeClass("border-orange-500 font-bold text-gray-900");

      // Add border to the label next to the checked radio button
      $('input[name="pro_size"]:checked')
        .next("label")
        .addClass("border-orange-500 font-bold text-gray-900");
    });

    // Trigger the change event on page load to set the initial state
    $('input[name="pro_size"]:checked').change();
  }

  $(document).on("click", "input[name='pro_color']", function () {
    loadSize();
  });
  $(document).on("click", "input[name='pro_size']", function () {
    loadQty();
  });
});
