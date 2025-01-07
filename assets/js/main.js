(function ($) {
  "use strict";

  /*===========================================
        =         On Load Function         =
    =============================================*/
  $(window).on("load", function () {
    $(".preloader").fadeOut();
    $(".best-sellers-nav").toggle();
  $(".contacts-nav").toggle();
  });

  

  /*===========================================
        =         Preloader         =
    =============================================*/
  if ($(".preloader").length > 0) {
    $(".preloaderCls").each(function () {
      $(this).on("click", function (e) {
        e.preventDefault();
        $(".preloader").css("display", "none");
      });
    });
  }

  $(".nav-toggle").click(() => {
    const navIsShowing = $(".mobile-nav").hasClass("show");
    $(".mobile-nav").toggleClass("show");
    if (navIsShowing) {
      $(".mobile-sub-menu").css("display", "flex");
      $(".mobile-nav").css("left", "0px");
    } else {
      $(".mobile-sub-menu").css("display", "none");
      $(".mobile-sub-menu").css("right", "-100%");
      $(".mobile-nav").css("left", "-100%");
    }
  });

  /*===========================================
        =         Sticky fix         =
    =============================================*/
  $(window).on("scroll", function () {
    var topPos = $(this).scrollTop();
    var header = $(".header-wrapper");
    if (topPos > 600) {
      header.addClass("sticky");
    } else {
      header.removeClass("sticky");
    }
  });

  $(".dropdown-header").click(function () {
    $(this).next(".dropdown-link").slideToggle();
    $(this).next(".dropdown-content").toggle();
    var $toggle = $(this).closest(".dropdown-item").find(".toggle");
    $toggle.toggleClass("open closed");
  });

  $(".dropdown-item .toggle").click(function () {
    $(this).siblings(".column").find(".dropdown-content").toggle();
    $(this).toggleClass("open closed");
  });

  $(".nav-toggle").click(function () {
    $(this).toggleClass("active");
    $("body").css(
      "position",
      $(this).hasClass("active") ? "fixed" : "relative"
    );
  });
  $(".mobile-nav .open-menu-btn").click(function () {
    var clickedId = $(this).attr("id");
    var icon = $(this).find("i");

    if (clickedId === "sellers") {
      $(".best-sellers-nav").toggle();
      icon.toggleClass("rotate");
    } else if (clickedId === "contact") {
      $(".contacts-nav").toggle();
      icon.toggleClass("rotate");
    }
  });

  let currentIndex = 0;
  const $carouselItems = $(".home-section-3 .img-wrapper .content");
  const $carouselDots = $(".home-section-3 .carousel-dot");

  function showCarouselItem(index) {
    $carouselItems.removeClass("active next prev");

    $carouselItems.eq(index).addClass("active");

    if (index > currentIndex) {
      $carouselItems.eq(index).addClass("next");
      $carouselItems.eq(currentIndex).addClass("prev");
    } else {
      $carouselItems.eq(index).addClass("prev");
      $carouselItems.eq(currentIndex).addClass("next");
    }

    $carouselDots.removeClass("active");
    $carouselDots.eq(index).addClass("active");

    currentIndex = index;
  }

  $carouselDots.click(function () {
    const index = $(this).index();
    showCarouselItem(index);
    $carouselDots.removeClass("active");
    $carouselDots.eq(index).addClass("active");
  });

  $carouselItems.on("touchstart", function (e) {
    const touch =
      e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
    const startX = touch.clientX;

    $(this).on("touchmove", function (e) {
      const touch =
        e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
      const currentX = touch.clientX;
      const distance = currentX - startX;

      if (distance > 50) {
        $(this).off("touchmove");
        prevCarousel();
      } else if (distance < -50) {
        $(this).off("touchmove");
        nextCarousel();
      }
    });
  });

  function prevCarousel() {
    currentIndex =
      (currentIndex - 1 + $carouselItems.length) % $carouselItems.length;
    showCarouselItem(currentIndex);
  }

  function nextCarousel() {
    currentIndex = (currentIndex + 1) % $carouselItems.length;
    showCarouselItem(currentIndex);
  }

  // Show the first carousel item initially
  showCarouselItem(currentIndex);

  $(".product-wrapper").slick({
    dots: true,
    infinite: true,
    autoplay: true,
    vertical: false,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 1080,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });

  function disableAOSOnMobile() {
    if ($(window).width() <= 1080) {
      // Example threshold for mobile
      $(".landing-banner-text").removeAttr("data-aos data-aos-duration");
    }
  }
  disableAOSOnMobile();

  $(window).on("resize", function () {
    disableAOSOnMobile();
  });

  /*===========================================
        =         Scroll To Top         =
    =============================================*/
  // progressAvtivation
  if ($(".scroll-top")) {
    var scrollTopbtn = document.querySelector(".scroll-top");
    var progressPath = document.querySelector(".scroll-top path");
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "none";
    progressPath.style.strokeDasharray = pathLength + " " + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition =
      "stroke-dashoffset 10ms linear";
    var updateProgress = function () {
      var scroll = $(window).scrollTop();
      var height = $(document).height() - $(window).height();
      var progress = pathLength - (scroll * pathLength) / height;
      progressPath.style.strokeDashoffset = progress;
    };
    updateProgress();
    $(window).scroll(updateProgress);
    var offset = 50;
    var duration = 750;
    jQuery(window).on("scroll", function () {
      if (jQuery(this).scrollTop() > offset) {
        jQuery(scrollTopbtn).addClass("show");
      } else {
        jQuery(scrollTopbtn).removeClass("show");
      }
    });
    jQuery(scrollTopbtn).on("click", function (event) {
      event.preventDefault();
      jQuery("html, body").animate({ scrollTop: 0 }, 1);
      return false;
    });
  }
})(jQuery);
