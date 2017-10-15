require('./bootstrap');
import router from './routes';

let app = new Vue({
    el: '#app',
    router
});
