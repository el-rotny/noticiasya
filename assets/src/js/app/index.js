
// NOTE: THIS IS NOT THE WEBPACK ENTRY
// For shopify related JS please go to
// src/assets/scripts/layout/theme.js <-- our weback entry

// Application bootstrapper.
// Vendor
import 'gsap/CSSPlugin';
import 'slick-carousel';
import exampleModule from '../modules';

const App = {
  initialize() {
    require('./page');
    require('./mobileMenu');
    exampleModule.sayHello();
    console.log('initialize, app.js');
  },
};

module.exports = App;
