require('./bootstrap');

import { createApp } from 'vue'

const el = document.getElementById('app')

const app = createApp({})

console.log(app)

app.mount(el)
