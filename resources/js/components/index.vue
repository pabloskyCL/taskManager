<script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import modal from './modal.vue';

let state = reactive({
    showModal: false,
    showEditModal: false,
    selectedTask: {},
    tasks: []
});

onMounted(async () => {
    state.tasks = await getTasks();
})

const getTasks = async () => {
    const response = await axios.get('/api/tasks', {
        withCredentials: true
    });

    return response.data;
}

const getStatus = (status) => {

    return status ? 'completada' : 'pendiente';
}

const deleteTask = async (task) => {
    const response = await axios.delete('/api/task', {
        data: { taskId: task },
        withCredentials: true
    });

    state.tasks = await getTasks();
}

const createTask = async (form) => {
    const response = await axios.post('/api/task', form, { withCredentials: true });
    state.tasks = await getTasks();
    toggleModal()
}
const editTask = async (form) => {
    const response = await axios.put('/api/task', form, { withCredentials: true });
    state.tasks = await getTasks();
    toggleEditTaskModal();
}

const toggleModal = () => {
    state.showModal = !state.showModal;
}

const toggleEditTaskModal = (task = {}) => {
    state.selectedTask = task;
    state.showEditModal = !state.showEditModal;

}

</script>

<template>
    <div class="flex items-center justify-center min-h-screen bg-gray-900">

        <div class="col-span-12">
            <button @click="toggleModal" class="text-white p-2 my-3 bg-blue-500 rounded">Crear Tarea</button>
            <div class="overflow-auto lg:overflow-visible ">
                <table class="table text-gray-400 border-separate space-y-6 text-sm">
                    <thead class="bg-gray-800 text-gray-200">
                        <tr>
                            <th class="p-3">Nombre</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Creado en:</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in state.tasks" class="bg-gray-800">
                            <td class="p-3">
                                <div class="flex align-items-center">
                                    <div class="ml-3">
                                        <div class="text-gray-50">{{ task.name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <span class="bg-blue-600 text-gray-50 font-bold text-base rounded-md px-2">{{
                                    getStatus(task.completed)
                                }}</span>
                            </td>
                            <td class="p-3">
                                <span class=" text-gray-50 rounded-md px-2">{{ task.created_at }}</span>
                            </td>
                            <td class="p-3 ">
                                <a href="#" class="text-gray-400 hover:text-gray-100 mx-2">
                                    <i @click="toggleEditTaskModal(task)"
                                        class="material-icons-outlined text-base">editar</i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                    <i @click="deleteTask(task.id)" class="material-icons-round text-base">eliminar</i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <modal v-if="state.showModal" :get-task="getTasks" :task-handler="createTask" :show-modal="toggleModal"
        :title="'Crear tarea'" />
    <modal v-if="state.showEditModal" :get-task="getTasks" :task-handler="editTask" :show-modal="toggleEditTaskModal"
        :task-data="state.selectedTask" :title="'Editar tarea'" />
</template>
