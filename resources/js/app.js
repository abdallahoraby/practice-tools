require('./bootstrap');

window.Vue = require('vue');
Vue.component('baseline-component', require('./components/baseline.vue').default);
Vue.component('ncode-component', require('./components/ncode.vue').default);
const app = new Vue({
  el: '#app',
});