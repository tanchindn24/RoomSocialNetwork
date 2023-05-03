import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue';
import chat from './components/appchat.vue';

createApp(chat).mount("#appchat")

window.Alpine = Alpine;
Alpine.start();
