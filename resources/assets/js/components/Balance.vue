<template>
  <v-container grid-list-xs text-xs-center>
    <v-layout row wrap elevation-6>
  <v-flex xs4 class="pa-0">
    <v-card dark tile flat color="red lighten-2 grey--text text--lighten-4">
      <v-card-text>Баланс</v-card-text>
    </v-card>
  </v-flex>
  <v-flex xs8 class="pa-0">
    <v-card dark tile flat color="red lighten-1 grey--text text--lighten-3">
      <v-card-text><slot name="balance"></slot> грн.</v-card-text>
    </v-card>
  </v-flex>
  </v-layout>
  <v-layout row wrap style="padding-bottom:0.5rem;padding-top:0.5rem">
  <v-flex xs4>
      <v-btn fab dark large color="deep-orange accent-2"
      @click="$emit('showAddBalance')">
       <v-icon dark>add</v-icon>
      </v-btn>
  </v-flex>
  <v-flex xs8>
    <v-btn fab dark large color="deep-orange accent-2"
    @click="$emit('showAddWaste')">
      <v-icon dark>remove</v-icon>
  </v-btn>
</v-flex>
</v-layout>
</v-container>
</template>
<script>
    export default {

    }
</script>

<style>
.flex{
  padding:0px;
}
.btn__content{
  color:#e3e3e3;
}
</style>
