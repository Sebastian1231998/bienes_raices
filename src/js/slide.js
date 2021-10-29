!(function () {




  let v_ppalCarousel = $("#ppalCarousel");
  let v_carouselIndicators = $("#principal-carousel-indicators");


  v_ppalCarousel
    .find(".carousel-inner")
    .children(".carousel-item")
    .each(function (index) {
      if (index == 0) {
        v_carouselIndicators.append(
          "<button type='button' data-bs-target='#ppalCarousel' data-bs-slide-to='" +
            index +
            "' class='active' aria-current='true' aria-label='Slide 1'></button>"
        );
      } else {
        v_carouselIndicators.append(
          "<button type='button' data-bs-target='#ppalCarousel' data-bs-slide-to='" +
            index +
            "' aria-label='Slide 1'></button>"
        );
      }
    });





})(jQuery);




