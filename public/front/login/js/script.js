$(document).ready(function () {
  //
  $(".user__info-name, .user__btn").on("click", function (e) {
    e.preventDefault();
    $(".user_block").toggleClass("user_block--active");
  });
  // User-block-links
  $(".block__links a").on("click", function (e) {
    e.preventDefault();
    $(".block__links a").removeClass("active");
    $(this).addClass("active");
  });

  // Slick
  $(".slider__inner").slick({
    infinite: true,
    speed: 1200,
    slidesToShow: 1,
    prevArrow:
      '<button type="button" class="slick-prev"><img src="icons/left.svg"></button>',
    nextArrow:
      '<button type="button" class="slick-next"><img src="icons/right.svg"></button>',
    responsive: [
      {
        breakpoint: 575,
        settings: {
          dots: false,
          arrows: false,
        },
      },
    ],
  });

  // Filter Region
  $(".filter-region_link").on("click", function (e) {
    e.preventDefault();

    $(".specialization-block").removeClass("specialization-block--active");

    $(".region-block").toggleClass("region-block--active");
  });

  // Filter specialization
  $(".filter-specialization_link").on("click", function (e) {
    e.preventDefault();
    $(".region-block").removeClass("region-block--active");

    $(".specialization-block").toggleClass("specialization-block--active");
  });

  // Tabs
  $(".main__tabs-item").on("click", function (e) {
    e.preventDefault();

    $(".main__tabs-item").removeClass("main__tabs-item--active");
    $(this).addClass("main__tabs-item--active");

    $(".main__links").removeClass("main__links--active");
    $(`.${$(this).data("id")}`).addClass("main__links--active");

    $(".main__content-item").removeClass("main__content-item--active");
    $($(this).attr("href")).addClass("main__content-item--active");
  });

  // Menu Btn
  $(".menu__btn").on("click", function (e) {
    e.preventDefault();

    $(".main__header").toggleClass("main__header--active");
  });

  // Footer
  $(" .footer-item__title").on("click", function () {
    $(this).next().slideToggle();
    $(this).toggleClass("footer-item__title--active");
  });

  // Order-item form
  $(".form__title").on("click", function () {
    $(this).toggleClass("form__title--close");
    $(".orders-item_form").toggleClass("orders-item_form--close");
  });

  // My order & basket
  $(".orders__info .links .my").on("click", function (e) {
    e.preventDefault();
    $(this).addClass("my--active");
    $(".orders__info .links .basket").removeClass("basket--active");
  });

  $(".orders__info .links .basket").on("click", function (e) {
    e.preventDefault();
    $(this).addClass("basket--active");
    $(".orders__info .links .my").removeClass("my--active");
  });

  // Message ingor & favorite
  $(".avatar__dropdown .select").on("click", function () {
    // $(".down-links").toggleClass("down-links--active");
    $(this).next().toggleClass("down-links--active");

    $(this)
      .next()
      .find("a")
      .on("click", function (e) {
        e.preventDefault();

        $(this).parent().removeClass("down-links--active");
        $(this).parent().prev().html($(this).html());
      });
  });
});

// $(".region_item").on("click", function (e) {
//   e.preventDefault();
//   let id = $(this).data("id");
//   // $.ajax({
//   //   id
//   //   success(data) {

//   //   }
//   // })
//   let data = [];
// });
