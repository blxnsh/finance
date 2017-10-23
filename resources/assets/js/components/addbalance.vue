<template>
  <v-container grid-list-xs text-xs-center elevation-3 class="pb-2 pt-2">
    <v-layout row wrap>
      <v-flex xs10 offset-xs1>
  <v-form v-model="valid">
    <v-text-field
     label="Сумма"
     v-model="crud.bill"
      required></v-text-field>

    <v-btn  @click="addBalance" color="primary" dark>
         Добавить
       </v-btn>
    <v-btn  @click="removeBalance" color="error" dark>
         Удалить
       </v-btn>
</v-form>
</v-flex>
</v-layout>
</v-container>
</template>
<script>
export default {
  data(){
    return {crud : new Crud({bill:''}),
            valid:false};
  },
    methods: {
      addBalance() {
     this.crud.post('/api/addbill')
          .then(bill => this.$emit('completedAdd', bill))
            .catch(error => console.log(error.message));
  },
      removeBalance() {
     this.crud.bill = -Math.abs(this.crud.bill);
     this.crud.post('/api/removebill')
          .then(bill => this.$emit('completedRemove', bill))
            .catch(error => console.log(error.message));
  }
    }
}
</script>
<style lang="scss" scoped>
.pbutton {
  padding-top:5px;
}
</style>
