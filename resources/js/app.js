require('./bootstrap');

import { createApp } from 'vue'

const el = document.getElementById('app')

const app = createApp({})

app.component('input-money', require('./components/InputMoney').default)

app.mount(el)
