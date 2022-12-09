// app.js
import './bootstrap';

import {createApp} from 'vue';

import App from './App.vue'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import router from './router';


const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
  };
const app=createApp(App);
app.use(router);
app.use(VueSweetalert2,options);
app.config.globalProperties.$path = 'http://127.0.0.1:8000/';
app.mount("#app")