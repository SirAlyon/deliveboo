require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('Barchart', require('./components/Barchart.vue'));

const app = new Vue({
    el: '#admin'
});


