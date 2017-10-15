<template>
<div align="center">
  <p class="bal">
    Баланс : <span class="bill"><slot name="balance"></slot> грн.</span>
  </p>
 <p class="control has-addons bigbutton" align="center">
    <a class="button is-danger" id="halfButton"
    @click="$emit('showAddBalance')">
    <span> <i class="fa fa-plus"></i> </span>
    Добавить баланс
  </a>
    <a class="button is-danger" id="halfButton"
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
  width:100%;
}

#halfButton {
  font-size: 1.3rem;
  width:50%;
  height:4em;
}

</style>
