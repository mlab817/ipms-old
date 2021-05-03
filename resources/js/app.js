require('./bootstrap');

import { createApp } from 'vue'

const el = document.getElementById('app')

const app = createApp({
    components: {
        'notification-button': () => import('./components/NotificationButton.vue'),
    }
})

console.log(app)

app.mount(el)
