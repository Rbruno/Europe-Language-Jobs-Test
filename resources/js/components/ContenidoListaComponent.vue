<template>
  <v-card
    class="mx-auto ml-3"
  >
    <v-toolbar color="blue darken-3" dark >
      <v-toolbar-title>{{this.nombreLista !== '' ? this.nombreLista : "Seleccione una lista"}}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon @click="() => this.dialog = true" :disabled="this.nombreLista === ''">
        <v-icon>mdi-cart-plus</v-icon>
      </v-btn>
    </v-toolbar>

    <v-list subheader>
      <v-list-item
        v-for="producto in productos"
        :key="producto.id"
      >
        <v-list-item-avatar>
          <v-img
            :class="producto.comprado ? 'gris' : ''"
            :alt="`${producto.nombre} avatar`"
            :src="producto.imagen"
          ></v-img>
        </v-list-item-avatar>
    
        <v-list-item-content>
          <v-list-item-title v-text="producto.nombre" :class="producto.comprado ? 'text-decoration-line-through' : '' "></v-list-item-title>
        </v-list-item-content>

        <v-list-item-icon>
          <v-checkbox
            v-model="producto.comprado"
            hide-details
            @change="CambiarEstado(producto.id,producto.comprado)"
          ></v-checkbox>
        </v-list-item-icon>
      </v-list-item>

      <!-- vacio -->
        <v-alert v-if="productos.length === 0" text dense color="teal" icon="mdi-clock-fast" border="left" class="ml-1 mt-2" >
          No hay Productos Agregados
        </v-alert>
    </v-list>

    <v-dialog
      v-model="dialog"
      max-width="600px"
    >
      <carga-productos-component
        v-bind:idLista="this.idLista" 
        v-on:UpdateProducto="UpdateProducto"
      ></carga-productos-component>
      
    </v-dialog>
  </v-card>
</template>

<script>
import CargaProductosComponent from './CargaProductosComponent.vue'
  export default {
  components: { CargaProductosComponent },
    props: ['nombreLista', 'idLista', 'productos'],
    data: () => ({
      dialog: false,      
    }),
    methods:{
        CambiarEstado(id, estado){
          let estadoProducto = estado ? 1 : 0;
          axios.get('/marcarProducto/'+id+'/'+estadoProducto).then((result)=>{         
          })
        },
        UpdateProducto(id, datos){
          this.$emit('UpdateProducto','', id, datos);
          this.dialog = false;
        }
    },
  }
</script>
<style>
.gris{
  filter: grayscale(100%);
}
</style>