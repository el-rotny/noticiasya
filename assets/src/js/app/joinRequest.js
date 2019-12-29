// Page
import $ from 'jquery';

// Utils
const transitions = require('./transitions');

/* eslint-disable no-param-reassign */
const JoinRequest = {
  initialize(page) {
    // == join MODAL ==/
    page.joinOpen = (darkDrop) => {
      const join = $('.join-request');

      if (darkDrop) {
        $('.join-request-backdrop').addClass('-dark');
      } else {
        $('.join-request-backdrop').removeClass('-dark');
      }

      join.find('.join-request-form').show();
      join.find('.join-request-message').hide();

      const tl = transitions.join.open(join);
      join.show();
      tl.play();
    };

    page.joinClose = () => {
      const join = $('.join-request');
      const tl = transitions.join.close(join);
      tl.add(() => {
        join.hide();
      }).play();
    };

    // Open join Modal
    // TODO: HANDLE /?customer_posted=true

    $(document).on('click', '.join-request-open', (e) => {
      e.preventDefault();
      page.joinOpen(true);
      return false;
    });

    // $(document).on('click', '.join-request-open a', (e) => {
    //   e.preventDefault();
    //   page.joinOpen(true);
    //   return false;
    // });

    $(document).on('click', '.join-request-close', (e) => {
      e.preventDefault();
      page.joinClose();
      return false;
    });

    $(document).on('click', '.join-request-backdrop', (e) => {
      e.preventDefault();
      page.joinClose();
      return false;
    });

    // $(document).on('click', '.navbar-nav-item', (e) => {
    //   e.preventDefault();
    //   page.joinClose();
    //   console.log('event close');
    //   return false;
    // });

    // Form Sending
    $('.join-request-form form').on('submit', (e) => {
      e.preventDefault();
      const self = $(this);

      const $successContainer = self.find('.join-request-message.-success');
      const $errorContainer = self.find('.join-request-message.-error');
      // $success_message = self.find('#join-movement-success');
      // $error_message = self.find('#join-movement-error');
      // $waiting_message = self.find('#join-movement-waiting');
      //
      // // Hide the message if still showing
      $successContainer.hide();
      $errorContainer.hide();
      //
      // $waiting_message.fadeIn();

      self.find('button[type=submit]').attr('disabled', 'disabled');

      const formData = {
        name: e.target[1].value,
        email: e.target[2].value,
      };

      const req = $.ajax({
        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url: '/contact', // the url where we want to POST
        data: formData, // our data object
        dataType: 'json', // what type of data do we expect back from the server
        encode: true,
      });

      req.always(() => {
        self.find('button[type=submit]').removeAttr('disabled');
        $('.join-request-form').hide();
      });

      req.done((response) => {
        self.trigger('reset');
        if (response.success) {
          $successContainer.find('.join-request-message-body').append(response.message);
          $successContainer.fadeIn();
        } else {
          $errorContainer.find('.join-request-message-body-error').append(response.message);
          $errorContainer.fadeIn();
        }
      });

      req.fail((response) => {
        $errorContainer.find('.join-request-message-body').append(response.message);
        $errorContainer.fadeIn();
      });

      e.preventDefault();
    });

    // Close message
    $('.join-request-message button').on('click', () => {
      page.joinClose();
    });
  },
};

module.exports = JoinRequest;
