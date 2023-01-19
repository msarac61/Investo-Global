var fixOwl = function () {
  var $stage = $(".owl-stage"),
    stageW = $stage.width(),
    $el = $(".owl-item"),
    elW = 0;
  $el.each(function () {
    elW += $(this).width() + +$(this).css("margin-right").slice(0, -2);
  });
  if (elW > stageW) {
    $stage.width(elW);
  }
};

// All Room Carousel

$(".room-carousel").each(function () {
  $(this).owlCarousel({
    margin: 10,
    nav: true,
    navText: [
      "<i class='bi bi-chevron-left'></i>",
      "<i class='bi bi-chevron-right'></i>",
    ],
    loop: true,
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });
});

// All Carousel Parameters

$(".testimonials-slider").each(function () {
  $(this).owlCarousel({
    margin: 10,
    items: 1,
    nav: false,
    dots: false,
    loop: true,
    navSpeed: 1500,
  });
});

var owl = $(".testimonials-slider");
owl.owlCarousel();
$(".customNextBtn").click(function () {
  owl.trigger("next.owl.carousel", [300]);
});
$(".customPrevBtn").click(function () {
  owl.trigger("prev.owl.carousel", [300]);
});

$(".single-slider").each(function () {
  $(this).owlCarousel({
    loop: true,
    margin: 1,
    center: true,
    nav: true,
    navText: [
      "<i class='bi bi-chevron-left'></i>",
      "<i class='bi bi-chevron-right'></i>",
    ],
    dots: false,

    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});

$(".single-slider2").each(function () {
  $(this).owlCarousel({
    loop: true,
    margin: 0,
    center: false,
    nav: false,
    touchDrag: false,
    mouseDrag: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});

var ss2 = $(".single-slider2");
ss2.owlCarousel();
$(".sscustomNextBtn").click(function () {
  ss2.trigger("next.owl.carousel");
});
$(".sscustomPrevBtn").click(function () {
  ss2.trigger("prev.owl.carousel", [300]);
});

$(".owl-social").each(function () {
  $(this).owlCarousel({
    loop: true,
    nav: true,
    navText: [
      "<i class='bi bi-chevron-left'></i>",
      "<i class='bi bi-chevron-right'></i>",
    ],
    dots: false,

    responsive: {
      0: {
        items: 1,
        margin: 10,
      },
      600: {
        items: 3,
        margin: 10,
      },
      1000: {
        items: 5,
        center: true,
        margin: 1,
      },
      2000: {
        items: 7,
        center: true,
        margin: 1,
      },
      2500: {
        items: 9,
        center: true,
        margin: 1,
      },
      3000: {
        items: 11,
        center: true,
        margin: 1,
      },
      3500: {
        items: 13,
        center: true,
        margin: 1,
      },
    },
  });
});

$(".owl-slider").each(function () {
  $(this).owlCarousel({
    loop: false,
    items: 1,
    dots: true,
    mouseDrag: false,
    animateOut: "animate__fadeOut",
    animateIn: "animate__fadeIn",
    autoplay: true,
    autoplayTimeout: 7000,
    autoplayHoverPause: true,
  });
});

$(".property-slider").each(function () {
  $(this).owlCarousel({
    loop: true,
    nav: true,
    navText: [
      "<i class='bi bi-chevron-left'></i>",
      "<i class='bi bi-chevron-right'></i>",
    ],
    items: 1,
    dots: false,
    mouseDrag: false,
    autoplay: true,
    autoplayTimeout: 7000,
    autoplayHoverPause: true,
  });
});

$(".youtube-slider").each(function () {
  $(this).owlCarousel({
    items: 1,
    loop: true,
    center: false,
    nav: false,
    dots: false,
    mouseDrag: false,
    responsive: {
      0: {
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
      },
      600: {
        items: 1,
        autoplay: true,
        autoplayTimeout: 7000,
        autoplayHoverPause: true,
      },
      1000: {
        items: 1,
      },
    },
  });
});

$(".youtube-slider2").each(function () {
  $(this).owlCarousel({
    items: 1,
    loop: true,
    center: false,
    nav: false,
    dots: false,
    mouseDrag: false,
  });
});

var yt1 = $(".youtube-slider");
var yt2 = $(".youtube-slider2");

$(".CustomYTnext").click(function () {
  yt1.trigger("next.owl.carousel");
  yt2.trigger("next.owl.carousel");
});

$(".CustomYTPrev").click(function () {
  yt1.trigger("prev.owl.carousel");
  yt2.trigger("prev.owl.carousel");
});

$(".menu-item a").hover(function () {
  var value = $(this).attr("data-hover");
  $(".opened-menu-right").css("background", "url(" + value + ")");
  $(".opened-menu-right").css("-webkit-background-size", "cover");
  $(".opened-menu-right").css("-moz-background-size", "cover");
  $(".opened-menu-right").css("-o-background-size", "cover");
  $(".opened-menu-right").css("background-size", "cover");
});

var step = $(".step");
if (step.length) {
  var position = $(".step").offset();
  $(".right-bar").css("top", position.top);
}

$(".show-more-futures-button").click(function () {
  $(".ss-bottom-futured").css("max-height", "100%");
  $(".show-more-futures-button").hide();
});

$(".wpcf7-tel").keyup(function () {
  $(this).val($(this).val().replace(/\D/, ""));
});

$(".close-property-lightbox,.property-lightbox-form-container").click(
  function () {
    $(".property-main-form").hide();
    $(".opened-lightbox-form-item").show();
  }
);

$(".opened-lightbox-form-item,.cf-box-button").click(function () {
  $(".property-main-form").show();
  $(".opened-lightbox-form").hide();
});

if ($(window).width() > 992) {
  $(window).scroll(function () {
    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
      $(".opened-lightbox-form").fadeOut();
    } else {
      $(".opened-lightbox-form").fadeIn();
    }
  });
}

$(".range-price").ionRangeSlider({
  prefix: "TL ",
});

$("select").niceSelect();

$(".play-loader").click(function () {
  $(".loader").show();
});

$(".open-menu").click(function () {
  $(".opened-menu").toggle();
  $(".open-menu-a").text(
    $(".open-menu-a").text() == "Close" ? "Menu" : "Close"
  );
});

$(".investo-menu").click(function () {
  $(".opened-menu").toggle();
});

$(".close-opened-menu").click(function () {
  $(".opened-menu").toggle();
});

$(window).load(function () {
  $(".loader").fadeOut("slow");
});

function DoSubmit(sel) {
  if (sel.val() != "0") this.form.submit();
}

$(document).ready(function () {
  $(".slider-pagination ul li a").click(function (e) {
    $(".slider-pagination ul li.active").removeClass("active");

    var $parent = $(this).parent();
    $parent.addClass("active");
    e.preventDefault();
  });
});

$(document).ready(function () {
  $(".slider-pagination-mobil ul li a").click(function (e) {
    $(".slider-pagination-mobil ul li.active").removeClass("active");

    var $parent = $(this).parent();
    $parent.addClass("active");
    e.preventDefault();
  });
});

jQuery(document).on("click", ".slider-item-id", function () {
  var id = $(this).attr("data-id");
  var page = $(this).attr("data-page");
  jQuery.ajax({
    url: ajax_slider.ajax_url,
    type: "post",
    data: {
      action: "ajaxslider",
      id: id,
      page: page,
    },
    success: function (response) {
      $(".slider-result").html(response);
    },
  });
});

// fixed video

var FixedClassControl = document.getElementsByClassName("discover-video-title");
if (FixedClassControl.length > 0) {
  var video_status = false; //video kapali
  var scrollStatus = false;
  var video_kapali = true;

  discover_title_offset = $(".discover-video-title").offset().top;

  function scrollFunction() {
    var TopHeight = document.documentElement.scrollTop;

    if (TopHeight > 230) {
      $("#video").show("slow");
      $("#video-title").hide("slow");
      $("#close-button-icon").removeClass("ri-play-line");
      $("#close-button-icon").addClass("ri-close-fill");
      video_status = true;
    }
    if (TopHeight < 230) {
      $("#video").hide("slow");
      $("#video-title").show("slow");
      $("#close-button-icon").addClass("ri-play-line");
      $("#close-button-icon").removeClass("ri-close-fill");
      video_status = false;
    }
    if (TopHeight > discover_title_offset) {
      $("close-button").show("slow");
    }
    if (TopHeight < discover_title_offset) {
      $("close-button").hide("slow");
    }
  }

  $("#close-button").click(function () {
    if (video_status == true) {
      $("#video").hide("slow");
      $("#video-title").show("slow");
      $("#youtube-video")[0].contentWindow.postMessage(
        '{"event":"command","func":"' + "pauseVideo" + '","args":""}',
        "*"
      );
      $("#close-button-icon").addClass("ri-play-line");
      $("#close-button-icon").removeClass("ri-close-fill");
      video_kapali = true;
      video_status = false;
      video_kapali = false;
    } else if (video_status == false) {
      $("#video").show("slow");
      video_kapali = false;
      $("#video-title").hide("slow");
      $("#close-button-icon").removeClass("ri-play-line");
      $("#close-button-icon").addClass("ri-close-fill");
      video_status = true;
    }
  });

  function scrollFunction2() {
    var TopHeight = document.documentElement.scrollTop;
   
    if (TopHeight > discover_title_offset) {
      $(".close-button").addClass("d-flex");
      $(".close-button").removeClass("d-none");
      $("#video").show("slow");
    }
    if (TopHeight < discover_title_offset) {
      $(".close-button").addClass("d-none");
      $(".close-button").removeClass("d-flex");
      $("#video").hide("slow");
    }
  }

  function myFunction(mobile_media) {
    if (mobile_media.matches) {
      window.onscroll = function () {
        scrollFunction2();
      };
    } else {
      window.onscroll = function () {
        if (video_kapali == true) {
          scrollFunction();
        }
      };
    }
  }

  var mobile_media = window.matchMedia("(max-width: 768px)");
  myFunction(mobile_media); // Call listener function at run time
  mobile_media.addListener(myFunction); // Attach listener function on state changes
}


// ajax district

$("#citySelect").change(function() {
  var cityId = $("#citySelect").children("option:selected").val();
  console.log(cityId);

  $.ajax({
    url: district_ajax.ajax_url,
    type: 'POST',
    data: {
      action: "districtAjax",
      cityId: cityId
    },
    success: function(result) {
      $('.district-result').html(result);
      console.log("Sonuc " + result);
  

    },
    error: (error) => {
      console.log(JSON.stringify(error));
    }
  })

})