<script setup>
import { useAuthStore } from '../stores/auth';
const authStore = useAuthStore();

const handleLogout = async () => {
    await authStore.logout();
}

</script>

<template>
    <div>
        <nav class="bg-white-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-20 items-center justify-between">
                    <div class="flex flex-shrink-0 items-center">
                        <h2 v-if="authStore.user" class="text-xl font-medium">Bienvenido: {{ authStore.user.name }} </h2>
                    </div>

                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <button v-if="authStore.user" @click="handleLogout"
                            class="block rounded-md bg-blue-600 px-5 py-2.5 text-sm text-white font-bold transition hover:bg-blue-700">
                            Cerrar sesión
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>