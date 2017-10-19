<template lang="html">
<v-app>
  <v-form ref="form" lazy-validation>
    <v-text-field
      label="Name"
      v-model="crud.name"
      required
    ></v-text-field>

    <v-text-field
      label="E-mail"
      v-model="crud.email"
        required
    ></v-text-field>

    <v-text-field
      label="Password"
      v-model="crud.password"
        required
    ></v-text-field>

    <v-text-field
      label="Password again"
      v-model="crud.password_confirmation"
        required
    ></v-text-field>


    <v-btn
      @click="register"
    >
      submit
    </v-btn>
    <v-btn @click="clear">clear</v-btn>
  </v-form>
</v-app>
</div>
</form>

  </div>
</template>

<script>
export default {

data(){
return {
  crud: new Crud({name:'',
                  email:'',
                  password:'',
                  password_confirmation:''}),
}
},
methods: {
  register() {
    this.crud.post('/register');
  },
  clear(){
    this.crud.name = '';
    this.crud.email = '';
    this.crud.password = '';
    this.crud.password_confirmation = '';
  }
}
}
</script>

<style lang="css">
</style>
