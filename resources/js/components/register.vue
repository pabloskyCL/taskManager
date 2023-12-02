<script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

const errorAlert = reactive({
    message: ""
});

const form = reactive({
    name: "",
    email: "",
    password: ""
});



const registerHandler = async (data) => {
    try {
        await axios.post('/api/register', data);
        await router.push('/login');
    } catch (error) {
        errorAlert.message = error.response.data.message;
    }
}


</script>

<template>
    <div v-if="errorAlert.message" class="bg-red-50 border-b border-red-400 text-red-800 text-sm p-4 flex justify-between">
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
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <form @submit.prevent="registerHandler(form)">
        <div class="bg-grey-lighter min-h-screen flex flex-col">
            <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                    <h1 class="mb-8 text-3xl text-center">Registrate</h1>
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                        v-model="form.name" placeholder="Nombre Completo" />

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="email"
                        v-model="form.email" placeholder="Email" />

                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        v-model="form.password" placeholder="Contraseña" />

                    <button type="submit"
                        class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-800 focus:outline-none my-1">Create
                        Account</button>

                    <div class="text-center text-sm text-grey-dark mt-4">
                        By signing up, you agree to the
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Terms of Service
                        </a> and
                        <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                            Privacy Policy
                        </a>
                    </div>
                </div>

                <div class="text-grey-dark mt-6">
                    Tienes cuenta ya?
                    <router-link class="no-underline border-b border-blue text-blue-500" to="/login">
                        Inicia sesión
                    </router-link>.
                </div>
            </div>
        </div>
    </form>
</template>