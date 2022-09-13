import { createApp } from 'vue'
import App from './App.vue'

import * as Vue from 'vue' // in Vue 3
import axios from 'axios'
import VueAxios from 'vue-axios'

import './assets/main.css'

// const app = createApp(App)
// app.mount('#app')
// Vue.use(VueAxios, axios)

const app = Vue.createApp(App)
app.use(VueAxios, axios)
app.mount('#app')


