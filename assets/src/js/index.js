import 'lazysizes/plugins/object-fit/ls.object-fit';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import 'lazysizes/plugins/rias/ls.rias';
import 'lazysizes/plugins/bgset/ls.bgset';
import 'lazysizes/plugins/aspectratio/ls.aspectratio';

// import 'lazysizes';
import 'lazysizes/plugins/respimg/ls.respimg';

// Jquery
import $ from 'jquery';
import App from './app';

// Attach to Window  (Global)
window.$ = $;
window.jQuery = $;
window.slate = window.slate || {};
window.theme = window.theme || {};

window.bootstrap = window.bootstrap || {};


$(() => {
  /**
   * NOTE: Only include global bootstrap here.
  */
  // require("bootstrap-sass/assets/javascripts/bootstrap/affix");
  // require("bootstrap-sass/assets/javascripts/bootstrap/alert");
  // require("bootstrap-sass/assets/javascripts/bootstrap/button");
  // require("bootstrap-sass/assets/javascripts/bootstrap/carousel");

  // eslint-disable-next-line global-require
  require('bootstrap-sass/assets/javascripts/bootstrap/collapse');
  // eslint-disable-next-line global-require
  require('bootstrap-sass/assets/javascripts/bootstrap/dropdown');
  // eslint-disable-next-line global-require
  // require('bootstrap-sass/assets/javascripts/bootstrap/modal');

  // require("bootstrap-sass/assets/javascripts/bootstrap/popover");
  // require("bootstrap-sass/assets/javascripts/bootstrap/tab");
  // require("bootstrap-sass/assets/javascripts/bootstrap/tooltip");
  // require("bootstrap-sass/assets/javascripts/bootstrap/transition");
});

$(document).ready(() => {
  // Initialize App
  $(() => {
    App.initialize();
  });
});

$(() => {
  // Global YoutuneIframeAPI Ready Event
  const onYouTubeIframeAPIReady = () => {
    $('body').trigger('onYouTubeIframeAPIReady');
  };
  window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
  $('body').on('onYouTubeIframeAPIReady', () => {
    // eslint-disable-next-line no-console
    console.log('onYouTubeIframeAPIReady', 'ready');
  });
});
