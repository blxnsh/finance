import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    component: require('./components/main')
  },
  {
    path: '/register',
    component: require('./components/register')
  }
];

export default new VueRouter({
  routes,
  linkActiveClass: 'is-active'
});
