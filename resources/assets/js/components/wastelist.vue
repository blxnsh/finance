<template>
  <div v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="10">
  <v-flex v-for="waste in wastes" :key="waste.id" >
    <v-divider></v-divider>
    <v-list class="pa-2 pl-4 pr-4" >
      <v-layout row wrap>
      <v-flex xs10 class="headline ">{{waste.name}}</v-flex>
      <v-flex xs2>
        <v-btn dark fab small color="red" @click="deleteWaste(waste)">
          <v-icon>clear</v-icon>
        </v-btn>
      </v-flex>
      <v-flex xs11 class="body-1">{{waste.description}}</v-flex>
      <v-flex xs9 class="headline deep-purple--text text--accent-3">{{Math.abs(waste.price)}} грн.</v-flex>
      <v-flex xs3 class="red--text text--accent-3 subheading">{{waste.created_at | moment('DD/MM/YYYY')}}</v-flex>
      </v-layout>
    </v-list>
  </v-flex>
  <v-flex offset-xs5>
    <v-progress-circular indeterminate color="red" v-show="showLoad" indeterminate v-bind:size="50"></v-progress-circular>
  </v-flex>
  </div>
</template>

<script>
export default {
  data() {
    return {
            crud: new Crud({
              id:''
            }),
            busy: false,
            dataArr:[],
            wastes:[],
            count: 0,
            showLoad: false
          };
  },
  mounted() {
    axios.get('/api/waste')
                    .then(response => this.dataArr = response.data);
                    console.log(this.dataArr);
  },
  methods: {
    deleteArrayElement(value){
      this.wastes.splice(this.wastes.indexOf(value),1);
    },
    deleteWaste(value) {
    swal({
  title: "Вы уверены?",
  text: "Трата /" + value.name + "/ будет удалена",
  icon: "warning",
  buttons: true,
  dangerMode: true,
        })
.then((willDelete) => {
  if (willDelete) {
    swal("Трата удалена!", {
      icon: "success",
    });
    axios.delete('/api/wastedelete', {params: {id: value.id, price:Math.abs(value.price)}})
          .catch(error => console.log(error));
    this.$emit('updBalance', value.price);
    this.deleteArrayElement(value);
                  } else {
    swal("Все на месте!");
                        }
      });
    },
    loadMore() {
    this.showLoad = true;
    this.busy = true;
    let i = 0;
    setTimeout(() => {
      do {
        if(this.dataArr[this.count].id == undefined){break}
        this.wastes.push(this.dataArr[this.count]);
        this.count++;
        i++;
      } while( i < 7 )
      this.busy = false;
      this.showLoad = false;
    }, 1000);
  },
    },
  }

</script>

<style lang="css">
</style>
