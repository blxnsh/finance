<template>
  <v-container grid-list-xs text-xs-center elevation-3 class="pb-2 pt-2">
    <v-layout row wrap>
      <v-flex xs10 offset-xs1>
  <v-form @submit.prevent="addWaste">
    <v-text-field
     label="Трата"
     v-model="crud.name"
      required></v-text-field>
    <v-text-field
     label="Сумма"
     v-model="crud.price"
      required></v-text-field>
    <v-text-field
     label="Описание (опционально)"
     v-model="crud.description"></v-text-field>
    <v-btn  type="submit" color="primary" dark>
         Добавить
     </v-btn>
    <v-btn color="error" dark @click="displayAdditional">
         Постоянные
       </v-btn>
</v-form>
      <v-flex v-show="showAdditional" class="pb-2 pt-2">
        <v-btn color="green accent-4" fab large
        @click="marshrutka16">16</v-btn>
        <v-btn color="green accent-4" fab large
        @click="marshrutka5">5</v-btn>
      </v-flex>
</v-flex>
</v-layout>
</v-container>
</template>
<script>
export default {

    data(){
      return {crud : new Crud({name:'',
                               description:'',
                                price:''}),
              showAdditional: false,
              };
    },
      methods: {
    addWaste() {
       this.crud.price = -Math.abs(this.crud.price);
       this.crud.post('/api/waste')
            .then(waste => this.$emit('completedWaste', waste))
              .catch(error => console.log(error.message));
    },
    marshrutka16() {
      this.crud.name = 'Маршрутка';
      this.crud.price = '16';
      this.addWaste();
    },
    marshrutka5() {
      this.crud.name = 'Маршрутка';
      this.crud.price = '5';
      this.addWaste();
    },
    displayAdditional(){
      this.showAdditional == false ? this.showAdditional = true : this.showAdditional = false;
    }
  }
}
</script>
<style lang="scss" scoped>
</style>
