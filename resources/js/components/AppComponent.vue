<template>
     <v-app>
      <v-col>
        
        <v-row class="justify-center">
          <h1 class="blue--text text--darken-2">EUROPE LANGUAGE JOBS TEST </h1>
        </v-row>  
        
        <v-divider></v-divider>

        <v-row class="justify-center w-100">
          <CargaLista-component  v-on:UpdateLista="UpdateLista" ></CargaLista-component>
        </v-row> 
        
        <v-row class="justify-center w-100 mt-3">
          <div class="flex-row d-inline w-50">
            <Lista-component 
              v-bind:listas="this.listas"
              v-on:UpdateLista="UpdateLista" 
              v-on:UpdateProducto="UpdateProducto"
            >
            </Lista-component>
          </div>
          <div class="flex-row d-inline w-50">
            <ContenidoLista-component
              v-bind:nombreLista="this.nombreLista" 
              v-bind:idLista="this.idLista" 
            ></ContenidoLista-component>
          </div>
        </v-row>    
       
      </v-col>
  </v-app>
</template>
<script>
  export default {
    data: () => ({
      selectedItem: -1,
      listas: [],    
      nombreLista: '' ,
      idLista: 0, 
    }),
    mounted(){
      this.GetListas()
    },
    methods:{
      GetListas(){
          axios.get('/getListas/').then((result)=>{
            this.listas = result.data 
          })
      },

      UpdateLista(datos) {
        this.listas = datos
      },
      UpdateProducto(nombre, id){
        console.log(nombre)
        this.nombreLista = nombre;
        this.idLista = id;
      }
    },
  }
</script>
