$(function () {
  if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/i)){
    $('.js-accordion').on('click', function() {
      $(this).next().slideToggle();
      $(this).toggleClass('is-open');
    });
  }
})