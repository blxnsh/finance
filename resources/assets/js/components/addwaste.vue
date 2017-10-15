<template>
  <div>
    <div class="box outlineform">
      <form @submit.prevent="addWaste">
        <p>
        <p>
          <label for="name">Трата</label> <br>
          <input id="name" type="text" v-model="crud.name">
        </p>
        <p>
          <label for="price">Сумма</label> <br>
          <input id="price" type="text" v-model="crud.price">
        </p>
        <p>
          <label for="description">Описание (optional)</label> <br>
          <input id="description" type="text" v-model="crud.description">
        </p>
        <br>
          <button class="button is-info is-outlined is-large"
          type="submit">Добавить</button>
        </p>
      </form>
      <button class="button is-primary is-outlined is-large"
      @click="displayAdditional">Стандартные расходы</button>
      <div v-show="showAdditional">
        <button class="button is-danger is-outlined is-large"
        @click="marshrutka16">Машрутка 16</button>
        <button class="button is-danger is-outlined is-large"
        @click="marshrutka5">Маршрутка 5</button>
      </div>
    </div>
  </div>
</template>
<script>
export default {

    data(){
      return {crud : new Crud({name:'',
                               description:'',
                                price:''}),
              showAdditional: false};
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
