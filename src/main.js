import Vue from 'vue'
import axios from 'axios';
import App from './App.vue'
import Chart from 'chart.js'
import router from './router'
import VueAxios from "vue-axios";
import vuetify from './plugins/vuetify';
import VueChartkick from 'vue-chartkick';

Vue.config.productionTip = false

Vue.use(VueChartkick.use(Chart));
Vue.use(VueAxios, axios);

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
