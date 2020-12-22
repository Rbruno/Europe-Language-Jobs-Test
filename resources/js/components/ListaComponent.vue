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
        <v-list-item v-for="(lista, i) in listas" :key="i" >
          
          <v-list-item-icon>
            <v-icon v-text="lista.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-content>
            <v-list-item-title v-text="lista.nombre"></v-list-item-title>
          </v-list-item-content>
        
        </v-list-item>

      </v-list-item-group>
    </v-list>
</v-card>
</template>

<script>
  export default {
    data: () => ({
      selectedItem: -1,
      listas: [
        { nombre: 'Real-Time', icon: 'mdi-clipboard-list' },
        { nombre: 'Audience', icon: 'mdi-clipboard-list' },
        { nombre: 'Conversions', icon: 'mdi-clipboard-list' },
      ],
    }),
  }
</script>
