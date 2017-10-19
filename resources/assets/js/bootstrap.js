import VueRouter from 'vue-router';
import Crud from './core/crud';
import swal from 'sweetalert';
import Vuetify from 'vuetify';
import infiniteScroll from 'vue-infinite-scroll';

window.Vue = require('vue');
window.axios = require('axios');
window.Crud = Crud;
Vue.use(VueRouter);
Vue.use(Vuetify);
Vue.use(require('vue-moment'));
Vue.use(infiniteScroll);

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
