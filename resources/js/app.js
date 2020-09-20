require('./bootstrap');

import Vue from 'vue';

// Application imports
import App from './Pages/Dashboard.vue'

/* eslint-disable no-new */
new Vue({
  render: h => h(App)
}).$mount('#app')
