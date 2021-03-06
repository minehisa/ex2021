/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('vue-bootstrap4-table', require('./components/Bootstrap4TableComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


/*
Dropzone 用の設定
*/

require('./bootstrap');
// require("./fontawesome");
/*
window.Dropzone = require('dropzone');

$(function () {
   // Here the default dropzone code:
    var myDropzone = new Dropzone(document.body, {
        url: "/paper_add"
    });
});
*/

 Vue.config.devtools = true;

const app = new Vue({
    el: '#app',
});
