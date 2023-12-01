import './bootstrap';

import { createApp, markRaw } from 'vue';
import { createPinia } from 'pinia';
import { createPersistedState } from 'pinia-plugin-persistedstate';
import App from './components/app.vue';
import router from './router';



const pinia = createPinia();
pinia.use(({ store }) => {
    store.router = markRaw(router);
});

pinia.use(createPersistedState());

const app = createApp(App);

app.use(pinia);
app.use(router);
app.mount('#app');