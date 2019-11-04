import 'lazysizes/plugins/object-fit/ls.object-fit';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';
import 'lazysizes/plugins/rias/ls.rias';
import 'lazysizes/plugins/bgset/ls.bgset';
import 'lazysizes/plugins/aspectratio/ls.aspectratio';

// import 'lazysizes';
import 'lazysizes/plugins/respimg/ls.respimg';

// Jquery
import $ from 'jquery';
import _ from 'lodash/core';
import App from './app';

function srcHelloWorld() {
  console.log('Src Hello!!');
}

srcHelloWorld();

// Attach to Window  (Global)
window.$ = $;
window.jQuery = $;
window.slate = window.slate || {};
window.theme = window.theme || {};

window.bootstrap = window.bootstrap || {};


$(() => {
  /** NOTE: Only include global bootstrap here. Otherwise add it to
  * template js file under templates or sections.
  * See src/assets/scripts/sections/product-template.js for a working example.
  */
  // require("bootstrap-sass/assets/javascripts/bootstrap/affix");
  // require("bootstrap-sass/assets/javascripts/bootstrap/alert");
  // require("bootstrap-sass/assets/javascripts/bootstrap/button");
  // require("bootstrap-sass/assets/javascripts/bootstrap/carousel");
  require('bootstrap-sass/assets/javascripts/bootstrap/collapse');
  require('bootstrap-sass/assets/javascripts/bootstrap/dropdown');

  // require("bootstrap-sass/assets/javascripts/bootstrap/popover");
  // require("bootstrap-sass/assets/javascripts/bootstrap/modal");
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
  const onYouTubeIframeAPIReady = function () {
    $('body').trigger('onYouTubeIframeAPIReady');
  };
  window.onYouTubeIframeAPIReady = onYouTubeIframeAPIReady;
  $('body').on('onYouTubeIframeAPIReady', () => {});
});
