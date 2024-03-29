/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
//global registration
import Vuelidate from 'vuelidate'
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import Swal from 'sweetalert2'
import moment from 'moment';
import { io } from "socket.io-client";
const socket = io("http://localhost:3000");

// Vue.use(io);
// window.io = io;
window.socket =socket;
window.moment=moment;

Vue.use(VueFormWizard)

window.Swal=Swal;
Vue.use(Vuelidate);

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('quiz-component', require('./components/quiz/QuizComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 Vue.prototype.$base_url = window.location.origin;
 Vue.prototype.$hostapi_url = window.location.origin + "/api";

const app = new Vue({
    el: '#app',
});
