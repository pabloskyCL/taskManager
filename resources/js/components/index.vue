<script setup>
import { useAuthStore } from '../stores/auth';
const authStore = useAuthStore();


const handleLogout = async () => {

    await authStore.logout();

}


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