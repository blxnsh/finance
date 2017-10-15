<template>
  <div>
    <div class="box outlineform">
    <form @submit.prevent="addBalance">
      <p>
        <label for="bill">Сумма</label>
        <br>
        <input id="bill" type="text" v-model="crud.bill">
      </p>
      <p class="pbutton">
        <button class="button is-info is-outlined is-large"
        type="submit">Добавить</button>
      </p>
    </form>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return {crud : new Crud({bill:''})};
  },
    methods: {
      addBalance() {
     this.crud.post('/api/addbill')
          .then(bill => this.$emit('completedBal', bill))
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
