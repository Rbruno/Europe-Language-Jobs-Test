<template>
<v-card
    class="card"
>
<v-card-title> Nueva Lista </v-card-title>
<v-card-text>
    <v-form ref="form"  @submit.prevent="submit">
        <v-text-field
        v-model="nombre"
        label="Nombre de la lista"
        ></v-text-field>
        <v-alert  dismissible dense text :type="tipoMensaje" v-text="mensaje" v-if="mensaje !== ''"  >
    </v-alert>
        <v-btn
        :disabled="this.nombre === ''"
        color="success"
        class="mr-4"
        @click="submit()"
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
      nombre: '',
      mensaje: '',
      tipoMensaje: '',
    }),
    methods: {
      async submit () {
        let formData = new FormData();
        formData.append('nombre', this.nombre);
        await axios.post('/GuardarLista', formData).then((result) => {
          if(result.statusText === 'OK'){
            this.$emit('UpdateLista', result.data);
            this.nombre = ''
            this.mensaje = 'Lista creada con exito' 
            this.tipoMensaje = 'success' 
          }else{
            this.mensaje = 'Hubo un Error no pudo crearse la lista' 
            this.tipoMensaje = 'error' 
          }
        })
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