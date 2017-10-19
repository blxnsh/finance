require('./bootstrap');
import router from './routes';

var isLoggedMixin = {
  methods: {
    checkIfLogged(){
        var vm = this;
        return new Promise((resolve, reject) => {
          axios.get('/sessionStatus')
             .then(response => {
                resolve(response.data.user);
             })
             .catch(error => {
                reject(error.response.data);
             });
        })

    }
  }
}


let app = new Vue({
    el: '#app',
    router,
    mixins:[isLoggedMixin],
    data: {
        user: false
    },
    created(){
        this.checkIfLogged()
            .then(response => {
                    this.user = response ? response : false;
                })
            .catch(error => console.log(error));
    console.log(this.user);
    }
});
