import Vue from 'vue'
import axios from 'axios';
import App from './App.vue'
import Chart from 'chart.js'
import router from './router'
import VueAxios from "vue-axios";
import vuetify from './plugins/vuetify';
import VueChartkick from 'vue-chartkick';

window.Vue = Vue;

Vue.config.productionTip = false

Vue.use(VueChartkick.use(Chart));
Vue.use(VueAxios, axios);

// axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
