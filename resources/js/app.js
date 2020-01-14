

require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('inquilino-component', require('./components/InquilinoComponent.vue').default);
Vue.component('arrendatario-component', require('./components/arrendatarioComponent.vue').default);
Vue.component('inmueble-component', require('./components/inmuebleComponent.vue').default);
Vue.component('contrato-component', require('./components/contratoComponent.vue').default);
Vue.component('factura-component', require('./components/facturaComponent.vue').default);
Vue.component('facturain-component', require('./components/facturainComponent.vue').default);

const app = new Vue({
    el: '#app',
});
