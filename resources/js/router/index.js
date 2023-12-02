import { createRouter, createWebHistory } from "vue-router";
import Login from '../components/login.vue';
import Index from '../components/index.vue';
import notFound from '../components/notFound.vue';
import Register from '../components/register.vue';
import { useAuthStore } from "../stores/auth";

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
        path: '/register',
        component: Register
    },
    {
        path: '/taskEdit',
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

router.beforeEach(async (to)=> {
    const publicPage = ['/login','/register'];
    const authRequired = !publicPage.includes(to.path);
    const auth = useAuthStore();
    if(authRequired && !auth.user) {
        return '/login'
    }
});


export default router;