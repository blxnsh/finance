import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    component: require('./components/main')
  }
];

export default new VueRouter({
  routes
});
