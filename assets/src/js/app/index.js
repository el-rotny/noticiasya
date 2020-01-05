
// NOTE: THIS IS NOT THE WEBPACK ENTRY
// For shopify related JS please go to
// src/assets/scripts/layout/theme.js <-- our weback entry

// Application bootstrapper.
// Vendor
import 'gsap/CSSPlugin';
import exampleModule from '../modules';
import Page from './page';
import mobileMenu from './mobileMenu';
import joinRequest from './joinRequest';

const App = {
  initialize() {
    const page = Page.initialize();
    mobileMenu.initialize(page);
    joinRequest.initialize(page);
    exampleModule.sayHello();
    /* eslint-disable-next-line no-console */
    console.log('initialize, app.js');
  },
};

module.exports = App;
