import TimelineLite from 'gsap/TimelineLite';
import $ from 'jquery';

const defaultVars = { paused: true, timeScale: 0.5 };

/* eslint-disable no-unused-vars, no-undef */
const WSIZE = (s) => {
  const sizes = {
    xs: 375,
    sm: 768,
    md: 1024,
    lg: 1366,
    xl: 1600,
  };
  const w = $(window).width();
  return sizes[s] >= w;
};

const maxOverheat = false;

const transitions = {
  join: {
    open(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.join-request-backdrop'), 0.3, {
        opacity: 0,
      }, {
        opacity: 1,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.join-request-box'), 0.4, {
        x: '100%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      });

      tl.staggerFromTo(tween.find('.join-request-title p'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.3');

      tl.staggerFromTo(tween.find('.join-request-form .row'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.5');

      /* Remove transform matrix */
      tl.add(() => {
        tween.find('.join-request-form .row').css('transform', 'none');
      });

      return tl;
    },
    close(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.join-request-backdrop'), 0.3, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.join-request-box'), 0.4, {
        x: '0%',
      }, {
        x: '100%',
        ease: Power2.easeInOut,
      }, '-=0.3');

      tl.fromTo(tween.find('.join-request-inner'), 0.2, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      }, '-=0.4');

      tl.set(tween.find('.join-request-inner'), {
        opacity: 1,
      });

      return tl;
    },
  },
  cart: {
    open(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.slide-panel-backdrop'), 0.3, {
        opacity: 0,
      }, {
        opacity: 1,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.slide-panel-box'), 0.4, {
        x: '100%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      });

      tl.staggerFromTo(tween.find('.slide-panel-title p'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.3');

      tl.staggerFromTo(tween.find('.slide-panel-form .row'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.5');

      /* Remove transform matrix */
      tl.add(() => {
        tween.find('.slide-panel-form .row').css('transform', 'none');
      });

      return tl;
    },
    close(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.slide-panel-backdrop'), 0.3, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.slide-panel-box'), 0.4, {
        x: '0%',
      }, {
        x: '100%',
        ease: Power2.easeInOut,
      }, '-=0.3');

      tl.fromTo(tween.find('.slide-panel-inner'), 0.2, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      }, '-=0.4');

      tl.set(tween.find('.slide-panel-inner'), {
        opacity: 1,
      });

      return tl;
    },
  },
  mobileMenu: {
    open(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.mobile-menu-backdrop'), 0.3, {
        opacity: 0,
      }, {
        opacity: 1,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.mobile-menu-box'), 0.4, {
        x: '100%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      });

      tl.staggerFromTo(tween.find('.navbar-nav-item'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.3');

      tl.staggerFromTo(tween.find('.mobile-menu-seperator'), 0.5, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.3');


      tl.staggerFromTo(tween.find('.movement-request'), 0.7, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.5');

      tl.staggerFromTo(tween.find('.mobile-menu-nav-cart'), 0.8, {
        x: '200%',
      }, {
        x: '0%',
        ease: Power2.easeInOut,
      }, 0.05, '-=0.5');


      /* Remove transform matrix */
      tl.add(() => {
        tween.find('.mobile-menu-form .row').css('transform', 'none');
      });

      return tl;
    },
    close(tween, vars) {
      const tl = new TimelineLite($.extend(true, vars || {}, defaultVars));

      tl.fromTo(tween.find('.mobile-menu-backdrop'), 0.3, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      });

      tl.fromTo(tween.find('.mobile-menu-box'), 0.4, {
        x: '0%',
      }, {
        x: '100%',
        ease: Power2.easeInOut,
      }, '-=0.3');

      tl.fromTo(tween.find('.mobile-menu-inner'), 0.2, {
        opacity: 1,
      }, {
        opacity: 0,
        ease: Power2.easeInOut,
      }, '-=0.4');

      tl.set(tween.find('.mobile-menu-inner'), {
        opacity: 1,
      });

      return tl;
    },
  },
};

module.exports = transitions;
