import Vue from 'vue'
import axios from 'axios';
import moment from 'moment';
import App from './App.vue';
import Chart from 'chart.js';
import router from './router';
import VueAxios from "vue-axios";
import vuetify from './plugins/vuetify';
import VueChartkick from 'vue-chartkick';

window.Vue = Vue;
window.RestApi = {
  url: "http://barcelcargo.dev/api",
  token: ""
}

Vue.prototype.moment = moment;

Vue.config.productionTip = false

Vue.use(VueChartkick.use(Chart));
Vue.use(VueAxios, axios);

// axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';

new Vue({
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
