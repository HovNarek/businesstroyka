$(document).ready(function () {
  // Password show
  $(".btn-password").on("click", function (e) {
    e.preventDefault();
    if ($(".password-input").attr("type") == "text") {
      $(".password-input").attr("type", "password");
    } else $(".password-input").attr("type", "text");
  });
  // Phone mask
  $("input[name=phone]").mask("+7(999) 999-9999");

  // Region block active
  $(".region-select").on("click", function (e) {
    e.preventDefault();
    $(".city-block").removeClass("city-block--active");
    $(".region-block").toggleClass("region-block--active");
  });

  // City block active
  $(".city-select").on("click", function (e) {
    e.preventDefault();
    $(".city-block").toggleClass("city-block--active");
  });

  // Region select, AJAX
  $(".region__item").on("click", function (e) {
    e.preventDefault();
    const thisDataID = $(this).data("id");
    $(".region-select").html($(this).html());
    $("input[name=region]").val(thisDataID);
    $(".region-block").removeClass("region-block--active");
    $(".left__city li, .right__city li").remove();

    $.ajax({
      url: "",
      type: "GET",
      data: { DataID: thisDataID },
      dataType: "json",
      success: function (data) {
        for (i = 0; i < Math.floor(data.length / 2); i++) {
          $(".left__city").append(
            `<li>
            <a class="city__item" href="" data-id="${data[i].id}"> ${data[i].id}</a>
            </li>`
          );
        }
        for (i = Math.floor(data.length / 2); i < data.length; i++) {
          $(".right__city").append(
            `<li>
            <a class="city__item" href="" data-id="${data[i].id}">
           ${data[i].id}
            </a>
            </li>`
          );
        }
        // City select
        $(".city__item").on("click", function (e) {
          e.preventDefault();
          $("input[name=city]").val($(this).data("id"));
          $(".city-select").html($(this).html());
          $(".city-block").removeClass("city-block--active");
        });
      },
    });
  });
});
