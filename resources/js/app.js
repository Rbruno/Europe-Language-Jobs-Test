/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from "../plugins/vuetify";
import 'vuetify/dist/vuetify.min.css'


Vue.component('app-component', require('./components/AppComponent.vue').default);
Vue.component('Lista-component', require('./components/ListaComponent.vue').default); 
Vue.component('CargaLista-component', require('./components/CargaListaComponent.vue').default); 
Vue.component('ContenidoLista-component', require('./components/ContenidoListaComponent.vue').default); 
Vue.component('CargaProductos-component', require('./components/CargaProductosComponent.vue').default); 


const app = new Vue({
    vuetify: Vuetify,
    el: '#app'
});
