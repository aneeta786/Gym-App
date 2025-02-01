$(document).ready(function () {
  $(".main-banner-slider").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 1,
    autoplay: true,
    prevArrow: $(".left-arro-banner"),
    nextArrow: $(".right-arrow-banner"),
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,  
          slidesToScroll: 1,
          dots: true
        }
      }
    ]
  });
});




  jQuery(document).ready(function(){

    jQuery(".hamburger").click(function(){
      jQuery(".menu_navbar_set").toggleClass("is-active");
      jQuery(this).toggleClass("is-active");
    });
    });




// Click function
$('#tabs-nav li').click(function(){
  $('#tabs-nav li').removeClass('active');
  $(this).addClass('active');
  $('.tab-content').hide();
  
  var activeTab = $(this).find('a').attr('href');
  $(activeTab).fadeIn();
  return false;
});

$(window).scroll(function(){
  if($(this).scrollTop() > 40){
      $('section.header-sec').addClass('sticky')
  } else{
      $('section.header-sec').removeClass('sticky')
  }
});


$(".open").click(function () {
  var container = $(this).parents(".topic");
  var answer = container.find(".answer");
  var trigger = container.find(".faq-t");

  answer.slideToggle(200);

  if (trigger.hasClass("faq-o")) {
    trigger.removeClass("faq-o");
  } else {
    trigger.addClass("faq-o");
  }

  if (container.hasClass("expanded")) {
    container.removeClass("expanded");
  } else {
    container.addClass("expanded");
  }
});
$(document).ready(function () {
  $(".main-box-team").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 4,
    autoplay: true,
    prevArrow: $(".team-aeeow-left"),
    nextArrow: $(".arrow-team-right"),
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,  
          slidesToScroll: 1,
          dots: true
        }
      }
    ]
  });
});


$(document).ready(function () {
  $(".main-box-testimonials").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 3,
    autoplay: true,
    prevArrow: $(".left-arrow-testi"),
    nextArrow: $(".right-arrow-testi"),
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,  
          slidesToScroll: 1,
          dots: true
        }
      }
    ]
  });
});

$(document).ready(function () {
  $(".left-fitness-box").slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToScroll: 1,
    slidesToShow: 3,
    autoplay: true,
    vertical: true,
verticalSwiping: true,
    prevArrow: $(".top-arrow-jim"),
    nextArrow: $(".bottom-arrow"),
    responsive: [
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,  
          slidesToScroll: 1,
          dots: true
        }
      }
    ]
  });
});
