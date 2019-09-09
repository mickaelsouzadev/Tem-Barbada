/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

Vue.config.productionTip = false

Vue.filter('formatDate', function(value) {

  if (value) {

    return moment(String(value)).format('DD/MM/YYYY')

  }

});
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('filter-component', require('./components/FilterComponent.vue').default);
Vue.component('my-ad-modal', require('./components/MyAdModalComponent.vue').default);
Vue.component('my-ad', require('./components/MyAdComponent.vue').default);
Vue.component('my-ads', require('./components/MyAdsComponent.vue').default);
Vue.component('add-ad-modal', require('./components/AddAdModalComponent.vue').default);
Vue.component('my-profile-modal', require('./components/MyProfileModalComponent.vue').default);
Vue.component('profile', require('./components/ProfileComponent.vue').default);
Vue.component('profile-nav', require('./components/ProfileNavComponent.vue').default);
Vue.component('edit-my-info', require('./components/EditMyInfoComponent.vue').default);
Vue.component('ad', require('./components/AdComponent.vue').default);
Vue.component('ads-by-city', require('./components/AdsByCityComponent.vue').default);
Vue.component('ads-by-state', require('./components/AdsByStateComponent.vue').default);
Vue.component('ad-modal', require('./components/AdModalComponent.vue').default);
Vue.component('login', require('./components/LoginComponent.vue').default);
Vue.component('register', require('./components/RegisterComponent.vue').default);
Vue.component('new-password', require('./components/NewPasswordComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
