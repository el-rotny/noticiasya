
import TweenLite from 'gsap/TweenLite';
import $ from 'jquery';
import wow from 'wowjs';

/* Detect our user agent the
 * Uses req for express and window headers for webdev
*/
// https://github.com/hgoebl/mobile-detect.js/
import MobileDetect from 'mobile-detect';

const FastClick = require('fastclick');

// import scrollClass from './scrollClass';

const config = {
  calcNavHeight: {},
  root: $('html'),
  body: $('body'),
  content: $('.content'),
};

const page = {
  ...config,
  browser: {
    mobile: config.body.hasClass('mobile'),
    tablet: config.body.hasClass('tablet'),
    touch: config.body.hasClass('touch'),
  },
};

console.log('page:', page);

// Main blocks

/* Add Browser name to body */
if (window) {
  const UAParser = require('ua-parser-js');
  const parser = new UAParser();
  const browser = parser.getBrowser();
  console.log('browser', browser);
  page.body.addClass(slugify(browser.name));
}

/* Check if ApplePay is avialable */
if (window.ApplePaySession) {
  // The Apple Pay JS API is available.
  page.body.addClass('apple-pay-enabled');
}

if (window) {
  const device = new MobileDetect(window.navigator.userAgent);
  if (device.mobile()) {
    page.body.addClass('mobile');
  }
  if (device.tablet()) {
    page.body.addClass('tablet');
  }
  if (device.is('iPhone') || device.is('AndroidOS') || device.is('Windows Phone')) {
    page.body.addClass('touch');
  }
}

page.calcNavHeight = function () {
  const navfixed = page.body.hasClass('navbar-is-fixed');
  const nh = page.navbar.outerHeight();
  const ah = page.announcementBar.outerHeight();
  let calcHeight = nh;

  if (0 < page.announcementBar.length && !navfixed) {
    calcHeight = nh + ah;
  } else {
    calcHeight = nh;
  }

  return calcHeight;
};

// Parallax

// import skrollr from 'skrollr';
// if (!page.browser.touch) {
//  var s = skrollr.init({
//       forceHeight: false,
//    });
// }


// Active elements
if (!page.browser.touch) {

  // Things for non mobile browsers
}

if (page.browser.touch) {
  FastClick.attach(window.document.body);

  if ('addEventListener' in document) {
    document.addEventListener('DOMContentLoaded', () => {
      FastClick.attach(document.body);
    }, false);
  }
}

// Navbar
page.navbar = $('#mainNav');
page.announcementBar = $('.announcement-bar');
page.navbarBack = page.navbar.find('.navbar-back');
page.navbarItems = page.navbar.find('.navbar-nav-item');
page.navbarTabs = page.navbar.find('.navbar-tabs');

let scrollToClear = page.calcNavHeight();
let topOffset = page.navbar.outerHeight();

let navResizeTime;
$(window).resize(() => {
  clearTimeout(navResizeTime);
  navResizeTime = setTimeout(() => {
    scrollToClear = page.calcNavHeight();
    topOffset = page.navbar.outerHeight();
  }, 100);
});

let scroll_pos = 0;
let scroll_time;

// NOTE:  Simple Navbar Scroll
$(window).scroll(() => {
  clearTimeout(scroll_time);
  const current_scroll = $(window).scrollTop();

  if ($(window).scrollTop() > scrollToClear) {
    page.navbar.addClass('navbar-fixed-top');
    TweenLite.to('#mainNav', 0.5, { y: (topOffset - 10) });
    page.body.addClass('navbar-is-fixed');
  }

  if ($(window).scrollTop() < scrollToClear) {
    page.navbar.removeClass('navbar-fixed-top');
    TweenLite.to('#mainNav', 0.5, { y: 0 });
    page.body.removeClass('navbar-is-fixed');
  }
  scroll_time = setTimeout(() => {
    scroll_pos = $(window).scrollTop();
  }, 100);
});


// Scroller
page.skroller = $('.scroller');
page.skroller.on('click', () => {
  if (page.browser.touch) {
    var scroll_offset = 0;
  } else {
    var scroll_offset = page.navbar.outerHeight() + 30;
  }

  console.log(scroll_offset);

  $('html, body').animate({ scrollTop: $('#hero_end').offset().top - scroll_offset }, 1000);
});

// Loader
page.loader = $('.loader');
page.loaderPromises = [];

page.loaderHide = function () {
  const ldr = this.loader;

  ldr.addClass('-hidden');
  setTimeout(() => {
    ldr.hide();
  }, 1700);
};


page.loaderWatch = function () {
  const self = this;
  $.when.apply($, self.loaderPromises).done(() => {
    console.log('all items have loaded');
    $(document).trigger('allItems:loaded');
    self.loaderHide();
  });
};

// Media Load
page.mediaStart = function () {
  $('audio,video').each(function () {
    const loader = $.Deferred();
    const self = $(this);
    const video = this;

    if (self.data('media-inited')) {
      return;
    }
    self.data('media-inited', true);

    page.loaderPromises.push(loader.promise());

    video.load();
    self.on('canplaythrough error', () => {
      loader.resolve();
    });
  });
};

page.mediaRemove = function () {
  $('audio,video').empty().remove();
};

// Preupdate handler
// page.preUpdate = function () {
//
//     // Gecko fix xhref:link
//     $("svg *").each(function () {
//         var self = $(this);
//
//         $.each(this.attributes, function () {
//             if (this.specified && this.value.indexOf('url') > -1) {
//                 var val = this.value;
//                 self.removeAttr(this.name).attr(this.name, val);
//             }
//         });
//     });
// };


// const fontawesome = require('@fortawesome/fontawesome')
// const faChevronLeft = require('@fortawesome/fontawesome-free-solid/faChevronLeft')
// const faLeftIcon = fontawesome.icon(faChevronLeft).html
// const faChevronRight = require('@fortawesome/fontawesome-free-solid/faChevronRight')
// const faRightIcon = fontawesome.icon(faChevronRight).html

page.heroSlickConfig = {

  // normal options...
  infinite: false,
  slidesToShow: 1,
  dots: true,
  fade: false,
  draggable: false,
  focusOnSelect: false,
  pauseOnHover: false,
  respondTo: 'slider',
  swipeToSlide: false,
  touchMove: false,
  waitForAnimate: false,
  prevArrow: '<a href="#" class="slides-prev"><<span class="sr-only">Previous</span></a>',
  nextArrow: '<a href="#" class="slides-next">><span class="sr-only">Next</span></a>',

  // the magic
  responsive: [{
    breakpoint: 300,
    settings: 'unslick', // destroys slick
  }],
};

$(document).ready(() => {
  setTimeout(() => {
    page.heroSlider = $('.hero-slick');
    page.heroSlider.slick(page.heroSlickConfig);
  }, 0);
});


$('.hero-slick').on('init', (event, slick, direction) => {
  // eslint-disable-next-line no-console
  console.log(event, slick, direction);
});


$(window).on('load', () => {
  page.wow = new wow.WOW({
    boxClass: 'wow',
    animateClass: 'animated',
    offset: 0,
    mobile: false,
    live: false,
  }).init();
});

// Update handler
page.update = function () {
  if (!page.browser.touch) {
    page.mediaStart();
  }
};

function slugify(text) {
  return text.toString().toLowerCase()
    .replace(/\s+/g, '-') // Replace spaces with -
    .replace(/[^\w\-]+/g, '') // Remove all non-word chars
    .replace(/\-\-+/g, '-') // Replace multiple - with single -
    .replace(/^-+/, '') // Trim - from start of text
    .replace(/-+$/, ''); // Trim - from end of text
}
module.exports = page;
