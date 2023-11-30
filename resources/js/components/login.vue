<script setup>
    import axios from "axios";

    const loginHandler = async () => {
        const response = await axios.post('api/login',)
    }


    
</script>

<template>
    <div
    class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
    <div class="w-full">
        <div class="text-center">
            <h1 class="text-3xl font-semibold text-gray-900">Iniciar Sesión</h1>
        </div>
        <div class="mt-5">
            <form action="">
                <div class="relative mt-6">
                    <input type="email" name="email" id="email" placeholder="Email" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                    <label for="email" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Email</label>
                </div>
                <div class="relative mt-6">
                    <input type="password" name="password" id="password" placeholder="Contraseña" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                    <label for="password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Contraseña</label>
                </div>
                <div class="my-6">
                    <button type="submit" class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Iniciar Sesión</button>
                </div>
                <p class="text-center text-sm text-gray-500">no tienes cuenta aun ?
                    <router-link to="/register" class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">registrate</router-link>
                </p>
            </form>
        </div>
    </div>
</div>
</template>