<template>
  <v-card
    class="mx-auto ml-3"
  >
    <v-toolbar color="blue darken-3" dark >
      <v-toolbar-title>{{this.nombreLista}}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon @click="() => this.dialog = true">
        <v-icon>mdi-basket-outline</v-icon>
      </v-btn>
    </v-toolbar>

    <v-list subheader>
      <v-list-item
        v-for="chat in recent"
        :key="chat.title"
      >
        <v-list-item-avatar>
          <v-img
            :alt="`${chat.title} avatar`"
            :src="chat.avatar"
          ></v-img>
        </v-list-item-avatar>
    
        <v-list-item-content>
          <v-list-item-title v-text="chat.title" :class="chat.active ? 'text-decoration-line-through' : '' "></v-list-item-title>
        </v-list-item-content>

        <v-list-item-icon>
          <v-checkbox
            v-model="chat.active"
            hide-details
          ></v-checkbox>
        </v-list-item-icon>
      </v-list-item>
    </v-list>

    <v-dialog
      v-model="dialog"
      max-width="600px"
    >
      <carga-productos-component></carga-productos-component>
      
    </v-dialog>
  </v-card>
</template>

<script>
import CargaProductosComponent from './CargaProductosComponent.vue'
  export default {
  components: { CargaProductosComponent },
    props: ['nombreLista', 'idLista'],
    data: () => ({
      productos: [],
      dialog: false,
      recent: [
        {
          active: true,
          avatar: 'https://cdn.vuetifyjs.com/images/lists/1.jpg',
          title: 'Jason Oner',
        },
        {
          active: true,
          avatar: 'https://cdn.vuetifyjs.com/images/lists/2.jpg',
          title: 'Mike Carlson',
        },
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/3.jpg',
          title: 'Cindy Baker',
        },
        {
          avatar: 'https://cdn.vuetifyjs.com/images/lists/4.jpg',
          title: 'Ali Connors',
        },
      ],
    }),
  }
</script>