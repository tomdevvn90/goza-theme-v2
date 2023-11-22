(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/theme"],{

/***/ "./resources/assets/js/blocks/counter-box.js":
/*!***************************************************!*\
  !*** ./resources/assets/js/blocks/counter-box.js ***!
  \***************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! counterup2 */ "./node_modules/counterup2/dist/index.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(counterup2__WEBPACK_IMPORTED_MODULE_0__);

var beCounterBox = function beCounterBox() {
  var $isCounterBox = document.querySelectorAll('.be-counter-up .counter-up');
  if ($isCounterBox.length === 0) return;
  var callback = function callback(entries) {
    entries.forEach(function (entry) {
      var el = entry.target;
      if (entry.isIntersecting && !el.classList.contains('is-visible')) {
        var $duration = $(el).data('duration') ? $(el).data('duration') : 1000;
        var $delay = $(el).data('delay') ? $(el).data('delay') : 60;
        counterup2__WEBPACK_IMPORTED_MODULE_0___default()(el, {
          duration: $duration,
          delay: $delay
        });
        el.classList.add('is-visible');
      }
    });
  };
  var IO = new IntersectionObserver(callback, {
    threshold: 1
  });
  $isCounterBox.forEach(function ($value, index) {
    IO.observe($value);
  });
};
$(document).ready(function () {
  beCounterBox();
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/events-carousel.js":
/*!*******************************************************!*\
  !*** ./resources/assets/js/blocks/events-carousel.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beEventsCarousel = function beEventsCarousel() {
    var $block = $('.be-events-carousel');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-events-carousel-inner'),
        $dataSlider = $slider.data('carousel');
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 1
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(document).ready(function () {
    beEventsCarousel();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/events-listing.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/blocks/events-listing.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beEventsListing = function beEventsListing() {
    var $block = $('.be-events-listing-block');
    if ($block.length === 0) return;
    var $tplDefault = $('.be-events-listing-block.is-style-default');
    if ($tplDefault.length > 0) {
      $tplDefault.find('.item-event').first().removeClass('__hide');
      $tplDefault.find('.item-event').first().find('.item-event--excerpt').show('1000');
      $(document).on('click', '.item-event.__hide .item-event--icon-toggle', function (e) {
        e.preventDefault();
        $('.item-event').addClass('__hide');
        $('.item-event').find('.item-event--excerpt').hide('1000');
        $(this).parents('.item-event').removeClass('__hide');
        $(this).parents('.item-event').find('.item-event--excerpt').show('1000');
      });
    }
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beEventsListing();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/gives-slider.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/gives-slider.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beGivesSlider = function beGivesSlider() {
    var $block = $('.be-give-slider-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-give-slider-block-inner'),
        $dataSlider = $(this).data('slider'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 2
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(window).on("scroll", function () {});
  $(document).ready(function () {
    beGivesSlider();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/logo-carousel.js":
/*!*****************************************************!*\
  !*** ./resources/assets/js/blocks/logo-carousel.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {jQuery(function ($) {
  "use strict";

  var GozaLogoCarousel = function GozaLogoCarousel() {
    var GozaLogoCarouselBlock = $('.goza-logo-carousel-block');
    if (!GozaLogoCarouselBlock.length) return;
    GozaLogoCarouselBlock.each(function () {
      var $self = $(this);
      var $carouselWrap = $self.find(".block-inner");
      var opt = $self.data("slider");
      // console.log(opt)

      var opt_df = {
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        infinite: true,
        prevArrow: "<button type='button' class='slick-arrows s-prev pull-left'></button>",
        nextArrow: "<button type='button' class='slick-arrows s-next pull-right'></button>",
        responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        }, {
          breakpoint: 767,
          settings: {
            slidesToShow: 2
          }
        }, {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }]
      };
      $carouselWrap.slick(Object.assign({}, opt_df, opt));
    });
  };
  $(document).ready(function () {
    GozaLogoCarousel();
  });
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/posts-slider.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/posts-slider.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var bePostsSlider = function bePostsSlider() {
    var $block = $('.be-post-slider-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-post-slider-block-inner'),
        $dataSlider = $(this).data('slider'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 2
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(document).ready(function () {
    bePostsSlider();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/progressbar-block.js":
/*!*********************************************************!*\
  !*** ./resources/assets/js/blocks/progressbar-block.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beProgressbarBlock = function beProgressbarBlock() {
    var $progressbar = $('.be-progressbar-block');
    if ($progressbar.length === 0) return;
    var ProgressBar = __webpack_require__(/*! progressbar.js */ "./node_modules/progressbar.js/src/main.js");
    $progressbar.each(function () {
      var $idProgressbar = $(this).find('.be-progressbar-block-warp').attr('id'),
        $shape = $(this).data('shape'),
        $value = $(this).data('value') / 100,
        $height = $(this).data('height'),
        $strokeColor = $(this).data('stroke-color'),
        $trailColor = $(this).data('trail-color'),
        $duration = $(this).data('duration');
      if ($value > 0) {
        var progressbar;
        if ($shape === 'circle') {
          progressbar = new ProgressBar.Circle("#".concat($idProgressbar), {
            strokeWidth: $height,
            easing: 'easeInOut',
            duration: $duration,
            color: $strokeColor,
            trailColor: $trailColor,
            trailWidth: $height,
            svgStyle: null
          });
        } else {
          progressbar = new ProgressBar.Line("#".concat($idProgressbar), {
            easing: 'easeInOut',
            duration: $duration,
            color: "".concat($strokeColor),
            trailColor: "".concat($trailColor)
          });
          $(this).find('.be-progressbar-block-warp svg').css("height", $height);
        }
        var waypoint = new Waypoint({
          element: this,
          handler: function handler(direction) {
            if (direction === 'down' && !progressbar.path.classList.contains('in-view')) {
              progressbar.animate($value);
              progressbar.path.classList.add('in-view');
            }
          },
          offset: '80%'
        });
      }
    });
  };
  $(window).on("load", function () {
    beProgressbarBlock();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/projects-grid-action.js":
/*!************************************************************!*\
  !*** ./resources/assets/js/blocks/projects-grid-action.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(jQuery) {/* harmony import */ var lightgallery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery */ "./node_modules/lightgallery/lightgallery.es5.js");

var projectsGridLightGallery = function projectsGridLightGallery() {
  var be_projects_grid = document.querySelectorAll('.be-projects-grid-section .be-projects-grid');
  be_projects_grid.forEach(function (element) {
    Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById(element.getAttribute('id')), {
      selector: '.zoom-image'
    });
  });
};
projectsGridLightGallery();
var be_projects_grid_loadmore = document.querySelectorAll('.be-projects-grid-section .be-projects-grid__loadmore-btn');
be_projects_grid_loadmore.forEach(function (element) {
  element.onclick = function (event) {
    event.preventDefault();
    var button = this;
    var page = parseInt(this.getAttribute('data-page'));
    var max_page = parseInt(this.getAttribute('data-max-page'));
    var settings = this.getAttribute('data-settings');
    var data = {
      action: 'loadmore_projects_grid',
      page: page,
      settings: settings
    };
    jQuery.ajax({
      type: "post",
      url: php_data.ajax_url,
      data: data,
      dataType: "json",
      beforeSend: function beforeSend() {
        button.classList.add('loading');
      },
      success: function success(response) {
        if (response.success) {
          button.classList.remove('loading');
          var loadmore = button.closest('.be-projects-grid__loadmore');
          var projects_grid = jQuery('#block-projects-grid-action-' + loadmore.getAttribute('data-block-id'));
          projects_grid.append(response.data);
          page++;
          button.setAttribute('data-page', page);
          if (page == max_page) {
            loadmore.classList.add('hide');
          }
          projectsGridLightGallery();
        }
      },
      error: function error(jqXHR, textStatus, errorThrown) {
        console.log('The following error occured: ' + textStatus, errorThrown);
      }
    });
  };
});
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/ss-text-tsm-video.js":
/*!*********************************************************!*\
  !*** ./resources/assets/js/blocks/ss-text-tsm-video.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beTestimonialSlider = function beTestimonialSlider() {
    var $testimonial = $('.be-ss-text-tsm-video .be-ss-text-tsm-video--testimonial-slider');
    if ($testimonial.length === 0) return;
    $testimonial.each(function () {
      var $dataSlider = $(this).data('slider');
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: true,
        fade: false,
        cssEase: 'linear'
      };
      $(this).slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(document).ready(function () {
    beTestimonialSlider();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/ss-upcoming-event-video.js":
/*!***************************************************************!*\
  !*** ./resources/assets/js/blocks/ss-upcoming-event-video.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beHanldeEvent = function beHanldeEvent() {
    var $block = $('.be-ss-upcoming-event-video--content-event-list-inner');
    if ($block.length === 0) return;
    $block.find('.item-event').first().removeClass('__hide');
    $block.find('.item-event').first().find('.item-event--excerpt').show('1000');
    $(document).on('click', '.item-event.__hide .item-event--icon-toggle', function (e) {
      e.preventDefault();
      $('.item-event').addClass('__hide');
      $('.item-event').find('.item-event--excerpt').hide('1000');
      $(this).parents('.item-event').removeClass('__hide');
      $(this).parents('.item-event').find('.item-event--excerpt').show('1000');
    });
  };
  $(document).ready(function () {
    beHanldeEvent();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/team-carousel.js":
/*!*****************************************************!*\
  !*** ./resources/assets/js/blocks/team-carousel.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beTeamCarousel = function beTeamCarousel() {
    var $block = $('.be-team-carousel-is-style-default');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-team-carousel-inner'),
        $dataSlider = $slider.data('carousel');
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: false,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 2
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            dots: true,
            arrows: false
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  var beTeamCarousel_style2 = function beTeamCarousel_style2() {
    var $block = $('.be-team-carousel-is-style-2  ');
    if ($block.length === 0) return;
    $block.each(function () {
      var $slider = $(this).find('.be-team-carousel-inner'),
        $dataSlider = $slider.data('carousel');
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: false,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 1200,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 2,
            dots: true,
            arrows: false
          }
        }]
      };
      $slider.slick(Object.assign({}, opt_df, $dataSlider));
    });
  };
  $(document).ready(function () {
    beTeamCarousel_style2();
    beTeamCarousel();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/testimonials.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/blocks/testimonials.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var beTestimonialCarousel = function beTestimonialCarousel() {
    var $block = $('.be-testimonials-block');
    if ($block.length === 0) return;
    $block.each(function () {
      var $carousel = $(this).find('.be-testimonials-block-carousel'),
        $dataCarousel = $(this).data('carousel'),
        $style = $(this).data('style'),
        $arrowTablet = true,
        $arrowMobile = false;
      if ($style == 'is-style-default') {
        $arrowTablet = false;
      }
      if ($style == 'is-style-2') {
        $arrowMobile = true;
      }
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: false,
        adaptiveHeight: false,
        fade: false,
        cssEase: 'linear',
        responsive: [{
          breakpoint: 992,
          settings: {
            arrows: $arrowTablet,
            slidesToShow: 1
          }
        }, {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: $arrowMobile,
            dots: true
          }
        }]
      };
      $carousel.slick(Object.assign({}, opt_df, $dataCarousel));
    });
  };
  var beSSTestimonials = function beSSTestimonials() {
    var $block = $('.be-section-w-testinials-block');
    if (!$block.length) return;
    $block.each(function () {
      var $carousel = $(this).find('.be-testimonials-list'),
        $dataCarousel = $(this).data('carousel');
      var opt_df = {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        arrows: true,
        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-long-arrow-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-long-arrow-right' aria-hidden='true'></i></button>"
      };
      $carousel.slick(Object.assign({}, opt_df, $dataCarousel));
    });
  };
  $(document).ready(function () {
    beTestimonialCarousel();
    beSSTestimonials();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/blocks/video-popup-actions.js":
/*!***********************************************************!*\
  !*** ./resources/assets/js/blocks/video-popup-actions.js ***!
  \***********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lightgallery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery */ "./node_modules/lightgallery/lightgallery.es5.js");
/* harmony import */ var lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lightgallery/plugins/video */ "./node_modules/lightgallery/plugins/video/lg-video.es5.js");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }
function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, _toPropertyKey(descriptor.key), descriptor); } }
function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }
function _toPropertyKey(arg) { var key = _toPrimitive(arg, "string"); return _typeof(key) === "symbol" ? key : String(key); }
function _toPrimitive(input, hint) { if (_typeof(input) !== "object" || input === null) return input; var prim = input[Symbol.toPrimitive]; if (prim !== undefined) { var res = prim.call(input, hint || "default"); if (_typeof(res) !== "object") return res; throw new TypeError("@@toPrimitive must return a primitive value."); } return (hint === "string" ? String : Number)(input); }


Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById('block-video-action'), {
  plugins: [lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__["default"]]
});

// Block Column Image Text Video
Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById('goza-citv-action'), {
  plugins: [lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__["default"]]
});
var LiquidButton = /*#__PURE__*/function () {
  function LiquidButton(optionsParam) {
    _classCallCheck(this, LiquidButton);
    var options = optionsParam || {};
    this.tension = options.tension || 0.4;
    this.width = options.width || 100;
    this.height = options.width || 100;
    this.margin = options.margin || 50;
    this.padding = options.padding || 17;
    this.hoverFactor = options.hoverFactor || -0.1;
    this.gap = options.gap || 5;
    this.debug = options.debug || false;
    this.forceFactor = options.forceFactor || 0.2;
    this.color1 = options.color1 || '#d41b65';
    this.color2 = options.color2 || '#e21da7';
    this.color3 = options.color3 || '#ffffff';
    this.textColor = options.textColor || '#FFFFFF';
    this.layers = [{
      points: [],
      viscosity: 0.5,
      mouseForce: 100,
      forceLimit: 2
    }, {
      points: [],
      viscosity: 0.8,
      mouseForce: 150,
      forceLimit: 3
    }];
    this.text = options.text || '';
    this.canvas = options.canvas || document.createElement('canvas');
    this.context = this.canvas.getContext('2d');
    this.wrapperElement = options.wrapperElement || document.body;
    if (!this.canvas.parentElement && document.getElementById('liquid-svg-button')) {
      document.getElementById('liquid-svg-button').append(this.canvas);
    }
    this.touches = [];
    this.noise = options.noise || 0;
    this.canvas.addEventListener('mousemove', this.mousemove);
    this.canvas.addEventListener('mouseout', this.mouseout);
    this.initOrigins();
    this.animate();
  }
  _createClass(LiquidButton, [{
    key: "mousemove",
    get: function get() {
      var _this = this;
      return function (e) {
        _this.touches = [{
          x: e.offsetX,
          y: e.offsetY,
          z: 0,
          force: 1
        }];
      };
    }
  }, {
    key: "mouseout",
    get: function get() {
      var _this2 = this;
      return function (e) {
        _this2.touches = [];
      };
    }
  }, {
    key: "raf",
    get: function get() {
      return this.__raf || (this.__raf = (window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function (callback) {
        setTimeout(callback, 10);
      }).bind(window));
    }
  }, {
    key: "distance",
    value: function distance(p1, p2) {
      return Math.sqrt(Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2));
    }
  }, {
    key: "update",
    value: function update() {
      for (var layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
        var layer = this.layers[layerIndex];
        var points = layer.points;
        for (var pointIndex = 0; pointIndex < points.length; pointIndex++) {
          var point = points[pointIndex];
          var dx = point.ox - point.x + (Math.random() - 0.5) * this.noise;
          var dy = point.oy - point.y + (Math.random() - 0.5) * this.noise;
          var d = Math.sqrt(dx * dx + dy * dy);
          var f = d * this.forceFactor;
          point.vx += f * (dx / d || 0);
          point.vy += f * (dy / d || 0);
          for (var touchIndex = 0; touchIndex < this.touches.length; touchIndex++) {
            var touch = this.touches[touchIndex];
            var mouseForce = layer.mouseForce;
            if (touch.x > this.margin && touch.x < this.margin + this.width && touch.y > this.margin && touch.y < this.margin + this.height) {
              mouseForce *= -this.hoverFactor;
            }
            var mx = point.x - touch.x;
            var my = point.y - touch.y;
            var md = Math.sqrt(mx * mx + my * my);
            var mf = Math.max(-layer.forceLimit, Math.min(layer.forceLimit, mouseForce * touch.force / md));
            point.vx += mf * (mx / md || 0);
            point.vy += mf * (my / md || 0);
          }
          point.vx *= layer.viscosity;
          point.vy *= layer.viscosity;
          point.x += point.vx;
          point.y += point.vy;
        }
        for (var _pointIndex = 0; _pointIndex < points.length; _pointIndex++) {
          var prev = points[(_pointIndex + points.length - 1) % points.length];
          var _point = points[_pointIndex];
          var next = points[(_pointIndex + points.length + 1) % points.length];
          var dPrev = this.distance(_point, prev);
          var dNext = this.distance(_point, next);
          var line = {
            x: next.x - prev.x,
            y: next.y - prev.y
          };
          var dLine = Math.sqrt(line.x * line.x + line.y * line.y);
          _point.cPrev = {
            x: _point.x - line.x / dLine * dPrev * this.tension,
            y: _point.y - line.y / dLine * dPrev * this.tension
          };
          _point.cNext = {
            x: _point.x + line.x / dLine * dNext * this.tension,
            y: _point.y + line.y / dLine * dNext * this.tension
          };
        }
      }
    }
  }, {
    key: "animate",
    value: function animate() {
      var _this3 = this;
      this.raf(function () {
        _this3.update();
        _this3.draw();
        _this3.animate();
      });
    }
  }, {
    key: "draw",
    value: function draw() {
      this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
      for (var layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
        var layer = this.layers[layerIndex];
        if (layerIndex === 1) {
          if (this.touches.length > 0) {
            var gx = this.touches[0].x;
            var gy = this.touches[0].y;
            layer.color = this.context.createRadialGradient(gx, gy, this.height * 2, gx, gy, 0);
            layer.color.addColorStop(0, this.color2);
            layer.color.addColorStop(1, this.color3);
          } else {
            layer.color = this.color2;
          }
        } else {
          layer.color = this.color1;
        }
        var points = layer.points;
        this.context.fillStyle = layer.color;
        this.context.beginPath();
        this.context.moveTo(points[0].x, points[0].y);
        for (var pointIndex = 1; pointIndex < points.length; pointIndex += 1) {
          this.context.bezierCurveTo(points[(pointIndex + 0) % points.length].cNext.x, points[(pointIndex + 0) % points.length].cNext.y, points[(pointIndex + 1) % points.length].cPrev.x, points[(pointIndex + 1) % points.length].cPrev.y, points[(pointIndex + 1) % points.length].x, points[(pointIndex + 1) % points.length].y);
        }
        this.context.fill();
      }
      this.context.fillStyle = this.textColor;
      this.context.font = '100 ' + (this.height - this.padding * 2) + 'px sans-serif';
      this.context.textAlign = 'center';
      this.context.textBaseline = 'middle';
      this.context.fillText(this.text, this.canvas.width / 2, this.canvas.height / 2, this.width - this.padding * 2);
      if (this.debug) {
        this.drawDebug();
      }
    }
  }, {
    key: "drawDebug",
    value: function drawDebug() {
      this.context.fillStyle = 'rgba(255, 255, 255, 0.8)';
      this.context.fillRect(0, 0, this.canvas.width, this.canvas.height);
      for (var layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
        var layer = this.layers[layerIndex];
        var points = layer.points;
        for (var pointIndex = 0; pointIndex < points.length; pointIndex++) {
          if (layerIndex === 0) {
            this.context.fillStyle = this.color1;
          } else {
            this.context.fillStyle = this.color2;
          }
          var point = points[pointIndex];
          this.context.fillRect(point.x, point.y, 1, 1);
          this.context.fillStyle = '#000';
          this.context.fillRect(point.cPrev.x, point.cPrev.y, 1, 1);
          this.context.fillRect(point.cNext.x, point.cNext.y, 1, 1);
          this.context.strokeStyle = 'rgba(0, 0, 0, 0.33)';
          this.context.strokeWidth = 0.5;
          this.context.beginPath();
          this.context.moveTo(point.cPrev.x, point.cPrev.y);
          this.context.lineTo(point.cNext.x, point.cNext.y);
          this.context.stroke();
        }
      }
    }
  }, {
    key: "createPoint",
    value: function createPoint(x, y) {
      return {
        x: x,
        y: y,
        ox: x,
        oy: y,
        vx: 0,
        vy: 0
      };
    }
  }, {
    key: "initOrigins",
    value: function initOrigins() {
      this.canvas.width = this.width + this.margin * 2;
      this.canvas.height = this.height + this.margin * 2;
      for (var layerIndex = 0; layerIndex < this.layers.length; layerIndex++) {
        var layer = this.layers[layerIndex];
        var points = [];
        for (var x = ~~(this.height / 2); x < this.width - ~~(this.height / 2); x += this.gap) {
          points.push(this.createPoint(x + this.margin, this.margin));
        }
        for (var alpha = ~~(this.height * 1.25); alpha >= 0; alpha -= this.gap) {
          var angle = Math.PI / ~~(this.height * 1.25) * alpha;
          points.push(this.createPoint(Math.sin(angle) * this.height / 2 + this.margin + this.width - this.height / 2, Math.cos(angle) * this.height / 2 + this.margin + this.height / 2));
        }
        for (var _x = this.width - ~~(this.height / 2) - 1; _x >= ~~(this.height / 2); _x -= this.gap) {
          points.push(this.createPoint(_x + this.margin, this.margin + this.height));
        }
        for (var _alpha = 0; _alpha <= ~~(this.height * 1.25); _alpha += this.gap) {
          var _angle = Math.PI / ~~(this.height * 1.25) * _alpha;
          points.push(this.createPoint(this.height - Math.sin(_angle) * this.height / 2 + this.margin - this.height / 2, Math.cos(_angle) * this.height / 2 + this.margin + this.height / 2));
        }
        layer.points = points;
      }
    }
  }]);
  return LiquidButton;
}();
var redraw = function redraw() {
  button.initOrigins();
};
var button = new LiquidButton();

/***/ }),

/***/ "./resources/assets/js/components/function.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/components/function.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(jQuery) {/* harmony import */ var lightgallery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lightgallery */ "./node_modules/lightgallery/lightgallery.es5.js");
/* harmony import */ var lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lightgallery/plugins/video */ "./node_modules/lightgallery/plugins/video/lg-video.es5.js");
/* harmony import */ var lightgallery_plugins_autoplay__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! lightgallery/plugins/autoplay */ "./node_modules/lightgallery/plugins/autoplay/lg-autoplay.es5.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! counterup2 */ "./node_modules/counterup2/dist/index.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(counterup2__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var lightgallery_plugins_thumbnail__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lightgallery/plugins/thumbnail */ "./node_modules/lightgallery/plugins/thumbnail/lg-thumbnail.es5.js");
/* harmony import */ var lightgallery_plugins_zoom__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! lightgallery/plugins/zoom */ "./node_modules/lightgallery/plugins/zoom/lg-zoom.es5.js");
//lightgallery






(function ($) {
  "use strict";

  var lightGalleryFooter = function lightGalleryFooter() {
    Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById('main-footer-gallery-list'), {
      speed: 500
    });
  };
  var beProgressbar = function beProgressbar() {
    var $isProgressbar = $('[data-progressbar]');
    if ($isProgressbar.length === 0) return;
    $isProgressbar.each(function () {
      var $value = $(this).data('progressbar') / 100,
        $idProgressbar = $(this).attr('id'),
        ProgressBar = __webpack_require__(/*! progressbar.js */ "./node_modules/progressbar.js/src/main.js"),
        $heading = $(this).data('heading') ? $(this).data('heading') : '',
        $duration = $(this).data('duration'),
        $trailcolor = $(this).data('trailcolor'),
        $strokecolor = $(this).data('strokecolor');
      if ($value && $idProgressbar) {
        var circle = new ProgressBar.Circle("#".concat($idProgressbar), {
          strokeWidth: 8,
          trailWidth: 8,
          trailColor: $trailcolor,
          easing: 'easeInOut',
          duration: $duration,
          text: {
            autoStyleContainer: false
          },
          from: {
            color: $strokecolor,
            width: 8
          },
          to: {
            color: $strokecolor,
            width: 8
          },
          // Set default step function for all animate calls
          step: function step(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);
            var value = Math.round(circle.value() * 100);
            if (value === 0) {
              circle.setText('');
            } else {
              circle.setText("<span> ".concat(value, "<sup>%</sup> </span> <p> ").concat($heading, " </p>"));
            }
          }
        });
        circle.animate($value);
      }
    });
  };
  var beCounter = function beCounter() {
    var $isCounter = document.querySelectorAll('[data-counter]');
    if ($isCounter.length === 0) return;
    var callback = function callback(entries) {
      entries.forEach(function (entry) {
        var el = entry.target;
        if (entry.isIntersecting && !el.classList.contains('is-visible')) {
          var $duration = $(el).data('duration') ? $(el).data('duration') : 1000;
          var $delay = $(el).data('delay') ? $(el).data('delay') : 60;
          counterup2__WEBPACK_IMPORTED_MODULE_3___default()(el, {
            duration: $duration,
            delay: $delay
          });
          el.classList.add('is-visible');
        }
      });
    };
    var IO = new IntersectionObserver(callback, {
      threshold: 1
    });
    $isCounter.forEach(function ($value, index) {
      IO.observe($value);
    });
  };
  var bePopupsVideo = function bePopupsVideo() {
    var $popupVideo = $('.be-popup-video');
    if ($popupVideo.length === 0) return;
    $popupVideo.each(function () {
      var $idPopupVd = $(this).attr('id');
      Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById("".concat($idPopupVd)), {
        plugins: [lightgallery_plugins_video__WEBPACK_IMPORTED_MODULE_1__["default"], lightgallery_plugins_autoplay__WEBPACK_IMPORTED_MODULE_2__["default"]],
        autoplay: true,
        speed: 500,
        videojs: true,
        videojsOptions: {
          muted: true
        },
        loadYoutubeThumbnail: true,
        youtubeThumbSize: 'default',
        loadVimeoThumbnail: true,
        vimeoThumbSize: 'thumbnail_medium',
        youtubePlayerParams: {
          modestbranding: 1,
          showinfo: 0,
          rel: 0,
          controls: 1,
          autoplay: 1,
          mute: 1
        },
        vimeoPlayerParams: {
          byline: 0,
          portrait: 0,
          color: 'A90707'
        }
      });
    });
  };
  var gozaSearch = function gozaSearch() {
    $(document).on('click', '.goza-header-search', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_SEARCH = $('#goza-modal-search');
      MODAL_SEARCH.addClass('is-show');
    });
    $(document).on('click', '.goza-search-close', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_SEARCH = $('#goza-modal-search');
      MODAL_SEARCH.removeClass('is-show');
    });
  };
  var gozaModalFormDonation = function gozaModalFormDonation() {
    $(document).on('click', '.btn-donation-form', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_FORM_DN = $('#goza-modal-donation-form');
      MODAL_FORM_DN.addClass('is-show');
      $('body').css('overflow', 'hidden');
    });
    $(document).on('click', '.goza-form-close', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var MODAL_FORM_DN = $('#goza-modal-donation-form');
      MODAL_FORM_DN.removeClass('is-show');
      $('body').css('overflow', 'visible');
    });
  };
  var beLightGallery = function beLightGallery() {
    var $lightGallery = $('[data-light-gallery]');
    if ($lightGallery.length === 0) return;
    $lightGallery.each(function () {
      var $id = $(this).attr('id');
      Object(lightgallery__WEBPACK_IMPORTED_MODULE_0__["default"])(document.getElementById("".concat($id)), {
        speed: 500,
        plugins: [lightgallery_plugins_zoom__WEBPACK_IMPORTED_MODULE_5__["default"], lightgallery_plugins_thumbnail__WEBPACK_IMPORTED_MODULE_4__["default"]]
      });
    });
  };
  var beBtnSliderWater = function beBtnSliderWater() {
    var $btn = $('.n2-ss-slider .be-btn-slider-water');
    if ($btn.length === 0) return;
    $btn.each(function () {
      $(this).append('<svg class="wgl-dashes inner-dashed-border animated-dashes"><rect > </rect></svg>');
    });
  };
  var beCountDown = function beCountDown() {
    var $count_Down = $('[data-count-down]');
    if ($count_Down.length === 0) return;
    $count_Down.each(function () {
      var $dataCountDown = $(this).data('count-down');
      var $result = $(this).find('#be-count-down--result');
      if ($dataCountDown.length > 0) {
        __renderCountDown($dataCountDown, $result);
      }
    });
    function __renderCountDown($dataCountDown, $result) {
      var countDownDate = new Date("".concat($dataCountDown)).getTime();
      var x = setInterval(function () {
        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
        var seconds = Math.floor(distance % (1000 * 60) / 1000);
        $result.html("<div class='be-day'>" + days + "<span>Days</span>" + "</div>" + "<div class='be-hours'>" + hours + "<span>Hours</span>" + "</div>" + "<div class='be-min'>" + minutes + "<span>Minutes</span>" + "</div>" + "<div class='be-sec'>" + seconds + "<span>Seconds</span>" + "</div>");
        if (distance < 0) {
          clearInterval(x);
          $result.html("<span>EXPIRED</span>");
        }
      }, 1000);
    }
  };
  $(window).on("load", function () {
    //preloader
    var $PRELOADER = $('.goza-preloader');
    $PRELOADER.hide();

    //Back to top
    $("#back-to-top").click(function () {
      $("html, body").animate({
        scrollTop: 0
      }, 1000);
    });

    //Gallery on footer
    lightGalleryFooter();

    //search
    gozaSearch();
    gozaModalFormDonation();
    bePopupsVideo();
    beCounter();
    beProgressbar();
    beLightGallery();
    beBtnSliderWater();
    beCountDown();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/components/navigation.js":
/*!******************************************************!*\
  !*** ./resources/assets/js/components/navigation.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  //Toggle Menu
  var gozaToggleMenu = function gozaToggleMenu() {
    $('.nav-link.dropdown-toggle').append('<span class="handle-sub"></span>');
    $(document).on('click', '.handle-sub', function (e) {
      e.preventDefault();
      e.stopPropagation();
      var el = $(this).closest('.menu-item');
      $(el).toggleClass('li-active');
      $(el).children('.sub-menu.dropdown-menu').slideToggle();
      $(el).find('.handle-sub').toggleClass('active');
    });
    var MENU_HAMBERGER = $('#goza-hamberger'),
      $body = $('body'),
      MENU_CLOSE = $('.off-canvas-menu-closed');
    MENU_HAMBERGER.click(function () {
      $body.addClass('--menu-open');
    });
    MENU_CLOSE.click(function () {
      $body.removeClass('--menu-open');
    });
  };
  $(window).on("load", function () {
    gozaToggleMenu();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/components/tabpanel.js":
/*!****************************************************!*\
  !*** ./resources/assets/js/components/tabpanel.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  //Tab Panel
  var gozaTabPanel = function gozaTabPanel() {
    $(document).on('click', '.nav-tabs .tab-item', function (e) {
      e.preventDefault();
      var el = $(this).closest('li');
      var tab_panel = $($(this).attr('href'));
      var el_sl = el.siblings();
      var tab_panel_sl = tab_panel.siblings();
      el.addClass('active');
      el_sl.removeClass('active');
      tab_panel.addClass('active');
      tab_panel_sl.removeClass('active');
    });
  };
  $(window).on("load", function () {
    gozaTabPanel();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/components/woocommerce.js":
/*!*******************************************************!*\
  !*** ./resources/assets/js/components/woocommerce.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(jQuery) {(function ($) {
  "use strict";

  var miniCartPopup = function miniCartPopup() {
    var cart_icon = $('.goza-header-cart-icon');
    var menu_mini_cart = $('#menu-mini-cart');
    var menu_mini_cart_main = menu_mini_cart.find('.menu-mini-cart__main');
    var menu_mini_cart_close = menu_mini_cart.find('.menu-cart__close-button');
    cart_icon.on('click', function (e) {
      e.preventDefault();
      menu_mini_cart.addClass('active');
    });
    menu_mini_cart.on('click', function (e) {
      // e.preventDefault();
      if (!menu_mini_cart_main.is(e.target) && menu_mini_cart_main.has(e.target).length === 0) {
        $(this).removeClass('active');
      }
    });
    menu_mini_cart_close.on('click', function (e) {
      e.preventDefault();
      menu_mini_cart.removeClass('active');
    });
  };
  $(document).ready(function () {});
  $(window).on("load", function () {
    miniCartPopup();
  });
})(jQuery);
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/js/theme.js":
/*!**************************************!*\
  !*** ./resources/assets/js/theme.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function($) {/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! slick-carousel */ "./node_modules/slick-carousel/slick/slick.js");
/* harmony import */ var slick_carousel__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(slick_carousel__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! counterup2 */ "./node_modules/counterup2/dist/index.js");
/* harmony import */ var counterup2__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(counterup2__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./components/navigation */ "./resources/assets/js/components/navigation.js");
/* harmony import */ var _components_navigation__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_components_navigation__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_function__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./components/function */ "./resources/assets/js/components/function.js");
/* harmony import */ var _components_tabpanel__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./components/tabpanel */ "./resources/assets/js/components/tabpanel.js");
/* harmony import */ var _components_tabpanel__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_components_tabpanel__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _components_woocommerce__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./components/woocommerce */ "./resources/assets/js/components/woocommerce.js");
/* harmony import */ var _components_woocommerce__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_components_woocommerce__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! aos */ "./node_modules/aos/dist/aos.js");
/* harmony import */ var aos__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(aos__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! aos/dist/aos.css */ "./node_modules/aos/dist/aos.css");
/* harmony import */ var aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(aos_dist_aos_css__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var waypoints_lib_jquery_waypoints_min_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! waypoints/lib/jquery.waypoints.min.js */ "./node_modules/waypoints/lib/jquery.waypoints.min.js");
/* harmony import */ var waypoints_lib_jquery_waypoints_min_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(waypoints_lib_jquery_waypoints_min_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _blocks_progressbar_block__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./blocks/progressbar-block */ "./resources/assets/js/blocks/progressbar-block.js");
/* harmony import */ var _blocks_progressbar_block__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_blocks_progressbar_block__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _blocks_team_carousel__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./blocks/team-carousel */ "./resources/assets/js/blocks/team-carousel.js");
/* harmony import */ var _blocks_team_carousel__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_blocks_team_carousel__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _blocks_events_carousel__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./blocks/events-carousel */ "./resources/assets/js/blocks/events-carousel.js");
/* harmony import */ var _blocks_events_carousel__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_blocks_events_carousel__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _blocks_testimonials__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./blocks/testimonials */ "./resources/assets/js/blocks/testimonials.js");
/* harmony import */ var _blocks_testimonials__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_blocks_testimonials__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _blocks_posts_slider__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./blocks/posts-slider */ "./resources/assets/js/blocks/posts-slider.js");
/* harmony import */ var _blocks_posts_slider__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_blocks_posts_slider__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _blocks_events_listing__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./blocks/events-listing */ "./resources/assets/js/blocks/events-listing.js");
/* harmony import */ var _blocks_events_listing__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_blocks_events_listing__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _blocks_gives_slider__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./blocks/gives-slider */ "./resources/assets/js/blocks/gives-slider.js");
/* harmony import */ var _blocks_gives_slider__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_blocks_gives_slider__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _blocks_video_popup_actions__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./blocks/video-popup-actions */ "./resources/assets/js/blocks/video-popup-actions.js");
/* harmony import */ var _blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./blocks/ss-upcoming-event-video */ "./resources/assets/js/blocks/ss-upcoming-event-video.js");
/* harmony import */ var _blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(_blocks_ss_upcoming_event_video__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var _blocks_ss_text_tsm_video__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ./blocks/ss-text-tsm-video */ "./resources/assets/js/blocks/ss-text-tsm-video.js");
/* harmony import */ var _blocks_ss_text_tsm_video__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(_blocks_ss_text_tsm_video__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var _blocks_logo_carousel__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ./blocks/logo-carousel */ "./resources/assets/js/blocks/logo-carousel.js");
/* harmony import */ var _blocks_logo_carousel__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(_blocks_logo_carousel__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var _blocks_projects_grid_action__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./blocks/projects-grid-action */ "./resources/assets/js/blocks/projects-grid-action.js");
/* harmony import */ var _blocks_counter_box__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ./blocks/counter-box */ "./resources/assets/js/blocks/counter-box.js");









/* global Waypoint */

$(document).ready(function () {
  aos__WEBPACK_IMPORTED_MODULE_6___default.a.init({
    duration: 1200,
    once: true,
    disable: 'mobile'
  });
  var el = document.querySelector('.counterUp');
  if (el === null) return;
  counterup2__WEBPACK_IMPORTED_MODULE_1___default()(el, {
    duration: 2000,
    delay: 100
  });
});
$(document).on("load", function () {
  aos__WEBPACK_IMPORTED_MODULE_6___default.a.refresh();
});













/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ }),

/***/ "./resources/assets/scss/editor/editor.scss":
/*!**************************************************!*\
  !*** ./resources/assets/scss/editor/editor.scss ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/charity-new.scss":
/*!*****************************************************!*\
  !*** ./resources/assets/scss/home/charity-new.scss ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/charity-organization.scss":
/*!**************************************************************!*\
  !*** ./resources/assets/scss/home/charity-organization.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/charity.scss":
/*!*************************************************!*\
  !*** ./resources/assets/scss/home/charity.scss ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/dream.scss":
/*!***********************************************!*\
  !*** ./resources/assets/scss/home/dream.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/earthquake.scss":
/*!****************************************************!*\
  !*** ./resources/assets/scss/home/earthquake.scss ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/general.scss":
/*!*************************************************!*\
  !*** ./resources/assets/scss/home/general.scss ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/ngo-dark.scss":
/*!**************************************************!*\
  !*** ./resources/assets/scss/home/ngo-dark.scss ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/ngo.scss":
/*!*********************************************!*\
  !*** ./resources/assets/scss/home/ngo.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/organization.scss":
/*!******************************************************!*\
  !*** ./resources/assets/scss/home/organization.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/water-charity.scss":
/*!*******************************************************!*\
  !*** ./resources/assets/scss/home/water-charity.scss ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/home/water.scss":
/*!***********************************************!*\
  !*** ./resources/assets/scss/home/water.scss ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/assets/scss/theme.scss":
/*!******************************************!*\
  !*** ./resources/assets/scss/theme.scss ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** multi ./resources/assets/js/theme.js ./resources/assets/scss/theme.scss ./resources/assets/scss/editor/editor.scss ./resources/assets/scss/home/general.scss ./resources/assets/scss/home/charity.scss ./resources/assets/scss/home/dream.scss ./resources/assets/scss/home/ngo-dark.scss ./resources/assets/scss/home/ngo.scss ./resources/assets/scss/home/organization.scss ./resources/assets/scss/home/water-charity.scss ./resources/assets/scss/home/water.scss ./resources/assets/scss/home/charity-new.scss ./resources/assets/scss/home/charity-organization.scss ./resources/assets/scss/home/earthquake.scss ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\js\theme.js */"./resources/assets/js/theme.js");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\theme.scss */"./resources/assets/scss/theme.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\editor\editor.scss */"./resources/assets/scss/editor/editor.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\general.scss */"./resources/assets/scss/home/general.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\charity.scss */"./resources/assets/scss/home/charity.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\dream.scss */"./resources/assets/scss/home/dream.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\ngo-dark.scss */"./resources/assets/scss/home/ngo-dark.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\ngo.scss */"./resources/assets/scss/home/ngo.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\organization.scss */"./resources/assets/scss/home/organization.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\water-charity.scss */"./resources/assets/scss/home/water-charity.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\water.scss */"./resources/assets/scss/home/water.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\charity-new.scss */"./resources/assets/scss/home/charity-new.scss");
__webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\charity-organization.scss */"./resources/assets/scss/home/charity-organization.scss");
module.exports = __webpack_require__(/*! C:\Users\Admin\Local Sites\goza\app\public\wp-content\themes\goza-theme\resources\assets\scss\home\earthquake.scss */"./resources/assets/scss/home/earthquake.scss");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);