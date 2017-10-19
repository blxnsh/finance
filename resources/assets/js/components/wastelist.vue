<template>
  <div>
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
  <infinite-loading @infinite="infiniteHandler" spinner="waveDots"></infinite-loading>
  </div>
</template>

<script>
import InfiniteLoading from 'vue-infinite-loading';

export default {
  data() {
    return {wastes:[''],
            crud: new Crud({
              id:''
            })};
  },
  components: {
    InfiniteLoading
  },
  mounted() {
    axios.get('/api/waste')
                    .then(response => this.wastes = response.data);
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
    infiniteHandler($state) {
      setTimeout(() => {
        const temp = [];
        for (let i = this.wastes.length + 1; i <= this.wastes.length + 7; i++) {
          temp.push(i);
        }
        this.wastes = this.wastes.concat(temp);
        $state.loaded();
      }, 1000);
    },
  }
}
</script>

<style lang="css">
</style>
