jQuery(document).ready(function($) {
  var swiper = new Swiper(".feed-slider", {
    cssMode: true,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    mousewheel: true,
    keyboard: true,
  });

  var swiper_taxonomy = new Swiper(".taxonomy_swiper", {
    cssMode: true,
    loop: true,
    navigation: {
      nextEl: ".taxonomy_recent-button-next",
      prevEl: ".taxonomy_recent-button-prev",
    },
    pagination: {
      el: ".taxonomy_recent-pagination",
      clickable: true,
    },
    mousewheel: true,
    keyboard: true,
  });

  var header = $(".head-menu");

  $(window).scroll(function() {
    var mmx = window.matchMedia("(min-width: 300px)");
    if (mmx.matches) {
      var scroll = $(window).scrollTop();
      if (scroll >= 150) {
          header.addClass("scrolled");
          $(".head-menu").addClass("fixed_x");
      } else {
          header.removeClass("scrolled");
          $(".head-menu").removeClass("fixed_x");
      }
    }
  });


  var header = $(".home .head-menu");

  $(window).scroll(function() {
    var mq = window.matchMedia("(min-width: 992px)");
    var mq_tab = window.matchMedia("(min-width: 700px)");
    if (mq.matches) {
      var scroll = $(window).scrollTop();
      if (scroll >= 900) {
          header.addClass("scrolled");
          $(".home .head-menu").removeClass("mm_1");
          $(".home .head-menu").removeClass("fixed_x");
      } else {
          header.removeClass("scrolled");
          $(".home .head-menu").addClass("mm_1");
          $(".home .head-menu").removeClass("fixed_x");
      }
    }
    if (mq_tab.matches) {
      var scroll = $(window).scrollTop();
      if (scroll >= 700) {
          header.addClass("scrolled");
          $(".home .head-menu").removeClass("mm_1");
          $(".home .head-menu").removeClass("fixed_x");
      } else {
          header.removeClass("scrolled");
          $(".home .head-menu").addClass("mm_1");
          $(".home .head-menu").removeClass("fixed_x");
      }
    }
  });

  $('.search-btn_box span').click(function(){ // for the circle id
    $(this).addClass('active');
    $('.search-box').addClass('active');
  });

  $('.cancel-btn_box').click(function(){ // for the circle id
    $('.search-box').removeClass('active');
    $('.search-btn_box span').removeClass('active');
  });
  // var single_toggle = $(".box-social_share .seed-social");

  // $(window).scroll(function() {
  //     var scroll = $(window).scrollTop();
  //     if (scroll >= 900) {
  //       single_toggle.addClass("scrolled");
  //     } else {
  //       single_toggle.removeClass("scrolled");
  //     }
  // });

  $(window).scroll(reOrder)
  $(window).resize(reOrder)

  function reOrder() {
    var mq = window.matchMedia("(min-width: 992px)");
    if (mq.matches) {
      $('.right-child').addClass('customm');
      var scroll = $(window).scrollTop(),
        topContent = $('.one').position().top + 850,
        sectionHeight = $('.left').height(),
        rightHeight = $('.right-child').height(),
        bottomContent = topContent + sectionHeight - rightHeight - 45;

      if (scroll > topContent && scroll < bottomContent) {
        $('.customm').removeClass('posAbs').addClass('posFix');
      } else if (scroll > bottomContent) {
        $('.customm').removeClass('posFix').addClass('posAbs');
      } else if (scroll < topContent) {
        $('.customm').removeClass('posFix');
      }
    } else {
      $('.right-child').removeClass('customm posAbs posFix');
    }
  }
});
