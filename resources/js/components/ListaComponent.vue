<template>
 <v-card
    tile
    class="ml-3"
  >
     <v-list shaped>
      <v-subheader>LISTAS</v-subheader>
      
      <v-list-item-group
        v-model="selectedItem"
        color="primary"
      >
        <v-list-item v-for="(lista) in listas" :key="lista.id" @click="CargarLista(lista.id, lista.nombre)">
          
          <v-list-item-icon>
            <v-icon>mdi-clipboard-list</v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="lista.nombre"></v-list-item-title>
          </v-list-item-content>
          
          <v-spacer></v-spacer>
          
          <v-btn icon color="red" @click="EliminarLista(lista.id)">
            <v-icon>mdi-window-close</v-icon>
          </v-btn>
        
        </v-list-item>

        <!-- vacio -->
        <v-alert v-if="listas.length === 0" text dense color="teal" icon="mdi-clock-fast" border="left" class="ml-1" >
          No existen listas creadas
        </v-alert>


      </v-list-item-group>
    </v-list>
</v-card>
</template>

<script>
  export default {
    props:['listas'],
    data: () => ({
      selectedItem: -1,
    }),
    methods:{
      CargarLista(id, nombre){
        axios.get('/getProductos/'+id).then((result)=>{
            this.$emit('UpdateProducto', nombre, id, result.data);
        })
        
      },
      EliminarLista(id){
        axios.get('/DeleteListas/'+id).then((result)=>{
            this.$emit('UpdateLista', result.data);
          })
      }
    },
  }
</script>
