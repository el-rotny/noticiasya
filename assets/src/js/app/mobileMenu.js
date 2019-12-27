// import TweenLite from 'gsap/TweenLite';
import $ from 'jquery';

const transitions = require('./transitions');

/* eslint-disable no-param-reassign */
const MobileMenu = {
  initialize(page) {
    page.mobileMenuIsOpen = false;

    //= = Open Mobile Menu Modal
    $(document).on('click', '.burger-button', (e) => {
      e.preventDefault();

      if (page.mobileMenuIsOpen) {
        page.mobileMenuClose();
      } else {
        page.mobileMenuOpen(true);
      }
      return false;
    });

    // == Mobile Menu MODAL ==/
    page.mobileMenuOpen = (darkDrop) => {
      const mobileMenu = $('.mobile-menu');
      const button = $('.burger-button');
      const $container = $('.mobile-menu-container');
      const iconClass = '.animated-menu-icon';
      const padding = page.calcNavHeight();
      button.find(iconClass).addClass('-active');


      $container.css('padding-top', padding);
      page.mobileMenuIsOpen = true;

      if (darkDrop) {
        $('.mobile-menu-backdrop').addClass('-dark');
      } else {
        $('.mobile-menu-backdrop').removeClass('-dark');
      }

      $('body').addClass('noScroll');

      // mobileMenu.find('.request-form').show();
      // mobileMenu.find('.request-message').hide();

      const tl = transitions.mobileMenu.open(mobileMenu);
      mobileMenu.show();

      tl.play();

      // YaStats
      //! window.yaCounter || window.yaCounter.reachGoal('request');
    };

    page.mobileMenuClose = () => {
      const mobileMenu = $('.mobile-menu');
      const tl = transitions.mobileMenu.close(mobileMenu);
      $('body').removeClass('noScroll');
      // Animate the close button
      const button = $('.burger-button');
      const iconClass = '.animated-menu-icon';
      button.find(iconClass).removeClass('-active');

      tl.add(() => {
        mobileMenu.hide();
      }).play();

      page.mobileMenuIsOpen = false;
    };


    // Close Actions
    $(document).on('click', '.mobile-menu-backdrop', (e) => {
      /* eslint-disable-next-line no-console */
      console.info('backdrop clicked', e);
      page.mobileMenuClose();
    });

    $(document).on('click', '.mobile-menu-close', (e) => {
      page.mobileMenuClose();
      e.preventDefault();
      return false;
    });

    $(document).on('click', '.mobile-menu-close-link', (e) => {
      page.mobileMenuClose();
      e.preventDefault();
      return false;
    });
  },
};

module.exports = MobileMenu;
