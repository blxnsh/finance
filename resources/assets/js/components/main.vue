<template>
<v-app>
 <v-container grid-list-xs>
  <v-flex xs12 class="red darken-1 elevation-8">
      <balance @showAddBalance="showAddBalance" @showAddWaste="showAddWaste"><template slot="balance">{{balance}}</template></balance>
  </v-flex>
  <addbalance @completedAdd="addBalance" @completedRemove="removeBalance" v-show="showBalance" ref="balanceForm"></addbalance>
  <addwaste @completedWaste="addWaste" v-show="showWaste" ref="wasteForm"></addwaste>
  <v-flex class="pt-3">
    <wastelist ref="wList" @updBalance="updBalance"></wastelist>
  </v-flex>
  </v-container>
</v-app>
</template>
<script>
import balance from './balance';
import addbalance from './addbalance';
import addwaste from './addwaste';
import wastelist from './wastelist';

export default {
    components: {
      balance,
      addbalance,
      addwaste,
      wastelist
    },
    data(){
     return { balance:'',
             showBalance:false,
             showWaste:false,
            };
    },

    mounted() {
      axios.get('/api/getbill')
                  .then(response => this.balance = response.data);
    },
    methods: {
      addBalance(data){
        this.balance = parseInt(this.balance) + parseInt(data);
        this.showBalance = false;
        this.showWaste = false;
        this.$refs.balanceForm.crud.bill = '';
    },
      removeBalance(data){
        this.balance = parseInt(this.balance) + parseInt(data);
        this.showBalance = false;
        this.showWaste = false;
        this.$refs.balanceForm.crud.bill = '';
    },
      showAddBalance() {
      this.showBalance == false ? this.showBalance = true : this.showBalance = false;
      this.showWaste = false;
      },
      addWaste(data){
        this.balance = parseInt(this.balance) + parseInt(data.price);
        data.price = Math.abs(data.price);
        this.$refs.wList.wastes.unshift(data);
        this.showWaste = false;
        this.$refs.wasteForm.crud = new Crud({name:'',
                                 description:'',
                                  price:''});
      },
      showAddWaste() {
        this.showWaste == false ? this.showWaste = true : this.showWaste = false;
        this.showBalance = false;
      },
      updBalance(value){
        console.log(value);
        this.balance = parseInt(this.balance) + parseInt(Math.abs(value));
      }
    },

}
</script>
<style lang="scss" scoped>
.container{
  padding: 0px;
}
</style>
