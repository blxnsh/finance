<template>
<div>
  <p class="bal">
    Баланс : <span class="bill"><slot name="balance"></slot> грн.</span>
  </p>
 <p class="control has-addons bigbutton">
    <a class="button is-danger dButton"
    @click="$emit('showAddBalance')">
    <span> <i class="fa fa-plus"></i> </span>
    Добавить баланс
  </a>
    <a class="button is-danger dButton"
    @click="$emit('showAddWaste')">
     Добавить расходы
    <span> <i class="fa fa-minus"></i> </span>
  </a>
  </p>

</div>
</template>
<script>
    export default {

    }
</script>

<style>
button {
  margin:5px;
}
.bal {
  font-size: 2.5rem;
  color: #bdc3c7;
}
.bill {
  color: #ecf0f1;
  font-size: 3rem;
}
.dButton {
  font-size: 1.2rem;
}
.fa-minus {
  padding-left: 0.3rem;
  padding-top: 0.11rem;
}
.fa-plus {
  padding-right: 0.3rem;
  padding-top: 0.11rem;
}
.bigbutton {
  margin-top:0.8rem;
}
</style>
