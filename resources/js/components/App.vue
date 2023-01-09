<template>
    <div class="container">
        <div class="board">
            
                <task-list v-for="list in taskLists" :title="list.title" :key="list.id" :taskLists="taskLists"></task-list>
            
                <add-task-list @addNewTaskList="addNewTaskList"></add-task-list>
        </div>
        <button class="btn" @click="$modal.show('example-adaptive')">Adaptive</button>
        <!-- <modal name="display-task-modal" title="Some Title" description="Some Desc"></modal> -->
    </div>
</template>

<script>
    import AddTaskList from './AddTaskList.vue'
    import TaskList from './TaskList.vue'
    import DisplayTaskModal from './Modals/DisplayTaskModal'
    import Modal_Adaptive from './Modals/Modal_Adaptive'
    export default {
        el: '#app',
        components: {
            'add-task-list': AddTaskList, 
            'task-list': TaskList, 
            'modal': DisplayTaskModal, 
            Modal_Adaptive
        }, 
        data(){
            return {
                taskLists: [
                   
                ]
            }
        },
        methods: {
            addNewTaskList(title){
                axios
                .post('/api/task-lists',{
                    title: title
                })
                .then(response => (this.taskLists.push({
                    id: response.data.data.id, 
                    title: response.data.data.title
                })))
            },
            show () {
                this.$modal.show('display-task-modal');
            },
        }, 
        mounted () {
            axios
                .get('/api/task-lists')
                .then(response => (this.taskLists = response.data.data))
        }
    }
</script>
