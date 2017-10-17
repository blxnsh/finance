import VueRouter from 'vue-router';
import Crud from './core/crud';
import swal from 'sweetalert';
import Vuetify from 'vuetify';

window.Vue = require('vue');
window.axios = require('axios');
window.Crud = Crud;
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(require('vue-moment'));

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
