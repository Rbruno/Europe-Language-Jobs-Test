<template>
<v-card
    elevation="2"
    outlined
    shaped
>
<v-card-title> Agregar Producto </v-card-title>
<v-card-text>
    <v-form ref="form">
        <v-text-field
        v-model="nombre"
        label="Producto"
        required
        ></v-text-field>

        <img :src="imageUrl" height="150" v-if="imageUrl"/>
        <v-text-field label="Imagen del Prodcuto" @click='pickFile' v-model='imageName' prepend-icon='mdi-camera'></v-text-field>
        <input
          type="file"
          style="display: none"
          ref="image"
          accept="image/*"
          @change="onFilePicked"
        >

        <v-btn
        :disabled="nombre === ''"
        color="success"
        class="mr-4"
        @click="submit"
        >
        Cargar Producto
        </v-btn>

    </v-form>
</v-card-text>
</v-card>
</template>

<script>
  
  export default {
    props: ['idLista'],
    data: () => ({
      nombre: '',
      imagen: '',
      imageName: '',
      imageUrl: '',
      imageFile: null,
    }),
    methods: {
      pickFile() {
        this.$refs.image.click()
      },
      async onFilePicked(e) {
        const files = e.target.files
        
        if (files[0] !== undefined) {
          this.imageName = files[0].name
          if (this.imageName.lastIndexOf('.') <= 0) {
            return
          }
          const fr = new FileReader()
          await fr.readAsDataURL(files[0])
          await fr.addEventListener('load', () => {
           
            this.imageUrl = fr.result
            this.imageFile = files[0] // this is an image file that can be sent to server...
            
          })
          
        } else {
          this.imageName = ''
          this.imageFile = ''
          this.imageUrl = ''
        }
      },

      submit () {
         let formData = new FormData();
        formData.append('nombre', this.nombre);
        formData.append('image', this.imageFile);
        formData.append('imageName', this.imageName);
        formData.append('idLista', this.idLista);
        
        axios.post('/GuardarProducto', formData).then((result) => {
            this.$emit('UpdateProducto', this.idLista, result.data);
            this.nombre = '';
            this.imagen= '';
            this.imageName= '';
            this.imageUrl= '';
            this.imageFile= null;
        });
      },
      
    },
   
  }
</script>

<style>
    .card{
        width: 60%;
        margin-bottom: 5px;
    }
</style>