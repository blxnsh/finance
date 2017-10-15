<template>
<div class="container">
  <div class="balanceBlock">
  <balance @showAddBalance="showAddBalance" @showAddWaste="showAddWaste"><template slot="balance">{{balance}}</template></balance>
  </div>
  <addbalance @completedBal="addBalance" v-show="showBalance" ref="balanceForm"></addbalance>
  <addwaste @completedWaste="addWaste" v-show="showWaste" ref="wasteForm"></addwaste>
  <div class="wasteBlock" >
  <div class="box shadow" v-for="waste in wastes">
    <p class="wasteTitle">{{waste.name}} : <span class="price">{{Math.abs(waste.price)}} грн.</span>
      <br>{{waste.description}}
    </p>
  </div>
</div>
</div>
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
                  console.log('loaded');
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
.waste {
  padding-top:10px;
}
.balanceBlock {
    padding:1rem;
    padding-bottom:2rem;
    background:#592E83;
    box-shadow: 0 0 10px rgba(0,0,0,0.5);
}
.wasteBlock {
  padding:10px;
}
.shadow {
  -moz-box-shadow:    inset 0 0 10px #000000;
 -webkit-box-shadow: inset 0 0 10px #000000;
 box-shadow:         inset 0 0 10px #000000;
}

.price {
  font-size: 1.7rem;
  font-weight: 600;
  color: #c0392b;
}
</style>
