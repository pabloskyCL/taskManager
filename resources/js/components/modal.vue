

<script setup>
import { onMounted, reactive } from 'vue';

const props = defineProps({
    taskHandler: Function,
    showModal: Function,
    taskData: { type: Object, default: null },
    title: String
});

onMounted(() => {
    if (props.taskData) {
        form.name = props.taskData.name;
        form.description = props.taskData.description;
        form.completed = props.taskData.completed == 1 ? true : false;
        form.taskId = props.taskData.id;
    }
});

const form = reactive({
    name: "",
    description: "",
    completed: false,
    taskId: ""
});

</script>

<template>
    <div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-black/50"
        id="modal-id">
        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
        <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl bg-white ">
            <!--content-->
            <form @submit.prevent="props.taskHandler(form)">
                <div class="bg-grey-lighter flex flex-col">
                    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
                        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                            <h1 class="mb-8 text-3xl text-center">{{ props.title }}</h1>
                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                                v-model="form.name" placeholder="Nombre" />

                            <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4"
                                name="description" v-model="form.description" placeholder="descripción" />
                            <div class="block border border-grey-light w-full p-3 rounded mb-4">
                                <label for="completed">estado inicial</label>
                                <input id="completed" type="checkbox" class="mx-5" name="completed"
                                    v-model="form.completed" />
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-800 focus:outline-none my-1">Crear
                                    tarea</button>
                                <button @click="props.showModal()"
                                    class="w-full text-center py-3 rounded bg-red-600 text-white hover:bg-red-800 focus:outline-none my-1">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>