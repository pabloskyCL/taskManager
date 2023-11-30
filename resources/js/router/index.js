

import { createRouter, createWebHistory } from "vue-router";


import Login from '../components/login.vue';
import Index from '../components/index.vue';
import notFound from '../components/notFound.vue';

const routes = [
    {
        path: '/',
        component: Index
    },
    {
        path: '/login',
        component: Login
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;