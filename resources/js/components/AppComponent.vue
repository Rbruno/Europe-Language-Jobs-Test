<template>
     <v-app>
      <v-col>
        
        <v-row class="justify-center">
          <h1 class="blue--text text--darken-2">EUROPE LANGUAGE JOBS TEST </h1>
        </v-row>  
        
        <v-divider></v-divider>

        <v-row class="justify-center w-100">
          <CargaLista-component></CargaLista-component>
        </v-row> 
        
        <v-row class="justify-center w-100 mt-3">
          <div class="flex-row d-inline ">
            <Lista-component></Lista-component>
          </div>
          <div class="flex-row d-inline w-50">
            <ContenidoLista-component></ContenidoLista-component>
          </div>
        </v-row>    
       
      </v-col>
  </v-app>
</template>

<script>
   
</script>
