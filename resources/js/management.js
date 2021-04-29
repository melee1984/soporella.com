/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap2');

window.Vue = require('vue');
window.Event = new Vue();

import VueMyToasts from 'vue-my-toasts';
import 'vue-my-toasts/dist/vue-my-toasts.css';
import BootstrapComponent from "vue-my-toasts/src/components/toasts/BootstrapComponent";

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// 
import AttractionEdit from './components/Management/Attraction/EditComponent.vue';
import Language from './components/Management/LanguageComponent.vue';
import Category from './components/Management/Category/CategoryComponent.vue';
import UserComponent from './components/Management/User/UserComponent.vue';
import PromotionComponent from './components/Management/Promotion/PromotionComponent.vue';
import TopAttractionComponent from './components/Management/TopAttraction/TopAttractionComponent.vue';

Vue.component('attraction-edit', AttractionEdit);
Vue.component('language', Language);
Vue.component('category-list', Category);
Vue.component('user-list', UserComponent);
Vue.component('promotion-list', PromotionComponent);
Vue.component('top-attraction-list', TopAttractionComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueMyToasts, {
	component: BootstrapComponent,
	options: {
	    width: '400px',
	    position: 'top-right',
	    padding: '1rem',
  }
});


const app = new Vue({
    el: '#myapp',
});


