<script setup>
import axios from 'axios';
import { useAuthStore } from '../stores/auth';
import { onMounted, ref } from 'vue';

const authStore = useAuthStore();
const tasks = ref([]);

const handleLogout = async () => {

    await authStore.logout();

}

onMounted(async () => {
    const response = await axios.get('/api/tasks',{
        withCredentials: true
    });

    console.log(response.data);
})


</script>

<template>
    <h2 v-if="authStore.user">Bienvenido: {{ authStore.user.name }} </h2>
    <router-link v-if="!authStore.user" to="/login"> Iniciar sesión</router-link>
    <router-link v-if="!authStore.user" to="/register"> Registro</router-link>
    <button @click="handleLogout">cerrar sesión</button>
    <h1>
        hello from index
    </h1>
</template>