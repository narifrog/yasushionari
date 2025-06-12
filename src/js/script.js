
$(function () {

  // トップフェード
  const swiper = new Swiper(".p-top__fv__swiper", {
    loop: true, // ループさせる
    effect: 'fade',
    speed: 1500, // 少しゆっくり(デフォルトは300)
    autoplay: { // 自動再生
      delay: 3000, // 1.5秒後に次のスライド
      disableOnInteraction: false, // 矢印をクリックしても自動再生を止めない
    },
    on: {
      // 切り替わりのアニメーションが終了したとき
      slideChangeTransitionStart: function(){
        swipe_action();
      }
    }
  });

  const swiper__persons = new Swiper(".p-top-related__swiper", {
    loop: false,
    centeredSlides: false,
    slidesPerView: "auto",
    spaceBetween: 16,
    speed: 600, 
    scrollbar: {
      el: ".swiper-scrollbar",
      hide: false,
      draggable: true 
    },
    breakpoints: {
        1000: {
          spaceBetween: 20,
      }
    }
  });

  // ハンバーガーメニュー
  $(".js-nav-btn, .js-navClose").click(function () {
    // $(this).toggleClass("is-close");
    $(".c-nav").toggleClass("is-open");
    $("body").toggleClass("is-menu-open");
  });

  // スクロール
  var header = $(".l-header");
  var heading = $('.p-about__heading-overview');
  $(window).scroll(function() {
    var scroll = $(this).scrollTop();
    if(350 < scroll){
      header.addClass('is-scroll');
      heading.addClass('is-fadeout');
    }else{
      header.removeClass('is-scroll');
      heading.removeClass('is-fadeout');
    }
  });

});