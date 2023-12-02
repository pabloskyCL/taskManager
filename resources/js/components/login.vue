<script setup>
import { reactive } from "vue";
import { useAuthStore } from '../stores/auth';

const authStore = useAuthStore();

const form = reactive({
    email: "",
    password: ""
});

const errorAlert = reactive({
    message: ""
});

</script>

<template>
    <div
        class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
        <div v-if="errorAlert.message"
            class="my-5 bg-red-50 border-b border-red-400 text-red-800 text-sm p-4 flex justify-between">
            <div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                    </svg>
                    <p>
                        <span class="font-bold">Info:</span>
                        {{ errorAlert.message }}
                    </p>
                </div>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
        <div class="w-full">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-gray-900">Iniciar Sesión</h1>
            </div>
            <div class="mt-5">
                <form @submit.prevent="authStore.login(form)">
                    <div class="relative mt-6">
                        <input type="email" name="email" v-model="form.email" id="email" placeholder="Email"
                            class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                            autocomplete="NA" />
                        <label for="email"
                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Email</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="password" name="password" v-model="form.password" id="password"
                            placeholder="Contraseña"
                            class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                        <label for="password"
                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Contraseña</label>
                    </div>
                    <div class="my-6">
                        <button type="submit"
                            class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Iniciar
                            Sesión</button>
                    </div>
                    <p class="text-center text-sm text-gray-500">no tienes cuenta aun ?
                        <router-link to="/register"
                            class="font-semibold text-blue-600 hover:underline focus:text-gray-800 focus:outline-none">registrate</router-link>
                    </p>
                </form>
            </div>
        </div>
    </div>
</template>