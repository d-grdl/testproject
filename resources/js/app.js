import './bootstrap';

import App from "./App.vue";
import { createApp } from 'vue';
import router from './router';
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

const app = createApp(App).use(router).use(ElementPlus);
app.mount("#app");
