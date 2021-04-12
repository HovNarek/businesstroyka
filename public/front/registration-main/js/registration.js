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

});
