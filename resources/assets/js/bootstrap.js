import VueRouter from 'vue-router';
import Crud from './core/crud';
import swal from 'sweetalert';
import VueBlu from 'vue-blu'
import 'vue-blu/dist/css/vue-blu.min.css'


window.Vue = require('vue');
window.axios = require('axios');
window.Crud = Crud;
Vue.use(VueRouter);
Vue.use(VueBlu);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
