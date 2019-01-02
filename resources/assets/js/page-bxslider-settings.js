jQuery(document).ready(function ($) {
  $('.bxslider').bxSlider({
    minSlides: 3,
    maxSlides: 3,
    slideWidth: 420,
    slideMargin: 10,
    pager: false,
    onSliderLoad: function () {
      $('.bxslider').removeClass('loading');
    }
  });
});
