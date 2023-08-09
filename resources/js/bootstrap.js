window.axios = require('axios');

try {
    // window.Popper = require('popper.js').default;
    // window.$ = window.jQuery = require('jquery');

} catch (e) {}
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
