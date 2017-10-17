<template>
  <v-app>
 <v-container grid-list-xs>
  <v-flex xs12 class="red darken-1 elevation-8">
      <balance @showAddBalance="showAddBalance" @showAddWaste="showAddWaste"><template slot="balance">{{balance}}</template></balance>
  </v-flex>
  <addbalance @completedBal="addBalance" v-show="showBalance" ref="balanceForm"></addbalance>
  <addwaste @completedWaste="addWaste" v-show="showWaste" ref="wasteForm"></addwaste>
  <v-flex class="pt-3">
  <v-flex v-for="waste in wastes" :key="waste.id">
    <v-divider></v-divider>
    <v-list class="pa-2 pl-5" >
      <v-layout row wrap>
      <v-flex xs11 class="headline ">{{waste.name}}</v-flex>
      <v-flex xs11 class="body-1">{{waste.description}}</v-flex>
      <v-flex xs7 class="headline purple--text text--darken-3">{{Math.abs(waste.price)}} грн.</v-flex>
      <v-flex xs5 class="red--text text--accent-3">{{waste.created_at | moment('DD/MM/YYYY')}}</v-flex>
      </v-layout>
    </v-list>
  </v-flex>
</v-flex>
</v-container>
</v-app>
</template>
<script>
import balance from './balance';
import addbalance from './addbalance';
import addwaste from './addwaste';

export default {
    components: {
      balance,
      addbalance,
      addwaste,
    },
    data(){
     return { balance:'',
              wastes: [''],
             showBalance:false,
             showWaste:false,
            };
    },

    mounted() {
      axios.get('/api/getbill')
                  .then(response => this.balance = response.data);
      axios.get('/api/waste')
                      .then(response => this.wastes = response.data);
    },
    methods: {
      addBalance(data){
        this.balance = parseInt(this.balance) + parseInt(data.bill);
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
        this.wastes.unshift(data)
        this.showWaste = false;
        this.$refs.wasteForm.crud = {name:'',
                                 description:'',
                                  price:''};

      },
      showAddWaste() {
        this.showWaste == false ? this.showWaste = true : this.showWaste = false;
        this.showBalance = false;
      },

    },

}
</script>
<style lang="scss" scoped>
.container{
  padding: 0px;
}
</style>
