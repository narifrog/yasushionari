$(function () {
  var headerHeight = $("header").outerHeight();

  $('a[href^="#"]').click(function () {
    var href = $(this).attr("href");
    var target = $(href);

    if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/i)){
      var position = target.offset().top - headerHeight + 1;
    }else{
      var position = target.offset().top - headerHeight + 0;
    }

    $("body,html").stop().animate({ scrollTop: position }, 100);
    return false;
  });
});

$(window).on('load',function(){
  var headerHeight = $("header").outerHeight();
	$(function() {
    var url = location.href;
    if(url.indexOf("?id=") != -1){
        var id = url.split("?id=");
        var $target = $('#' + id[id.length - 1]);
        if($target.length){
          if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/i)){
            var position = $target.offset().top - headerHeight +1;
          }else{
            var position = $target.offset().top - headerHeight;
          }
          $("html, body").animate({ scrollTop: position }, 1);
        }
    }
	});
})