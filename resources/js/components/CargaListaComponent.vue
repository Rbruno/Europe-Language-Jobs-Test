<template>
<v-card
    class="card"
>
<v-card-title> Nueva Lista </v-card-title>
<v-card-text>
    <v-form ref="form">
        <v-text-field
        v-model="name"
        label="Name"
        required
        ></v-text-field>

        <v-btn
        :disabled="!valid"
        color="success"
        class="mr-4"
        @click="submit"
        >
        Guardar
        </v-btn>

    </v-form>
</v-card-text>
</v-card>
</template>

<script>
  
  export default {

    data: () => ({
      name: '',
      valid: true,
    }),
    methods: {
      submit () {
        console.log("hola")
      },
      
    },
   
  }
</script>

<style>
    .card{
        width: 40%;
        margin-bottom: 5px;
    }
</style>