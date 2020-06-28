require('./bootstrap');
window.Vue = require('vue');

Vue.component('main-app', require('./components/App.vue').default);
Vue.component('new-book', require('./components/newBook.vue').default);
Vue.component('edit-book', require('./components/editBook.vue').default);
Vue.component('delete-book', require('./components/deleteBook.vue').default);
Vue.component('lend-book', require('./components/lendBook.vue').default);
Vue.component('return-book', require('./components/returnBook.vue').default);

const app = new Vue({
    el: '#app',

});


