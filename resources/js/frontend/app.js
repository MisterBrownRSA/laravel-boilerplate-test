require('../bootstrap');
require('../plugins');

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;

window.Vue = require('vue');

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(require('vue-moment'));

const app = new Vue({
    el: '#app',
});
