$(function () {

  function loop() {
    $('.c-loop__item--js__inner').each(function () {
      var sliderWidth = $(this).width();
      $(this).clone(true).insertBefore(this);
      $(this).clone(true).insertAfter(this);
      //$('.c-loop__item--js').css('width', sliderWidth * 3);
    });

    $('.top-sec__work__slides__lists').each(function () {
      var sliderWidth = $(this).width();
      $(this).clone(true).insertBefore(this);
      $(this).clone(true).insertAfter(this);
      //$('.c-loop__item--js').css('width', sliderWidth * 3);
    });


  }
  loop();
});
