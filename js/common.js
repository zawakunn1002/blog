$(function() {
  // ページ内リンク start
  $('a[href^="#"]').click(function() {
    var speed = 400;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
  // ページ内リンク end

  $('#page__top').hide();

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        $('#page__top').fadeIn();
    } else {
        $('#page__top').fadeOut();
    }
  });


  //ハンバーガーメニュー
  $('.header-r__target').click(function(){
      if($('.header-r__navi').hasClass(".header__block")) {

        $('.header-r__navi').fadeOut();
        $('.header-r__navi').removeClass('.header__block');
        $('.line1').removeClass('active_line1');
        $('.line2').removeClass('active_line2');
        $('.line3').removeClass('active_line3');
    } else {
        $('.header-r__navi').fadeIn();
        $('.header-r__navi').addClass('.header__block');
        $('.line1').addClass('active_line1');
        $('.line2').addClass('active_line2');
        $('.line3').addClass('active_line3');
    }
    
  });

   //ハンバーガーメニューここまで

   // profile slick ここから

   $('#profile__slick').slick({
      autoplay: true, 
      dots: false, 
      arrows: false,
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false,
      waitForAnimate: false
   });

   //　profile slick ここまで

   // flex-box 最後の要素左寄せ


  $(window).on('load resize', function(){
    $('.blog__content__detail').each(function(index,element){
      var w = $(element).width()
      $('.blog__content').append('<div style="height:0; width:'+ w +'px; margin:0;"></div>')
    })
  });

});