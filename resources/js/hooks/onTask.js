import { reactive } from "vue";


function onTask() {

let state = reactive({
    showModal: false,
    showEditModal: false,
    selectedTask: {},
    tasks: []
});


const getTasks = async () => {
    const response = await axios.get('/api/tasks', {
        withCredentials: true
    });

    return response.data;
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
}
const editTask = async (form) => {
    const response = await axios.put('/api/task', form, { withCredentials: true });
    state.tasks = await getTasks();
}

return {
    getTasks,
    deleteTask,
    createTask,
    editTask,
    state
}

}

export default onTask;