<template>
    <div class="container">
        <div class="board">
                <task-list v-for="list in taskLists" :title="list.title" :key="list.id" :taskLists="taskLists"></task-list>
            
                <add-task-list @addNewTaskList="addNewTaskList"></add-task-list>
        </div>

        <a class='container__btn container__btn--danger' style="" href="/dump-db">Dump DB</a>
    </div>
</template>

<script>
    import TaskList from './TaskList.vue'
    import AddTaskList from './AddTaskList.vue'

    export default {
        el: '#app',
        components: {
            'task-list': TaskList, 
            'add-task-list': AddTaskList
        }, 
        data(){
            return {
                title : '', 
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
            }
        },
        mounted () {
            axios
                .get('/api/task-lists')
                .then(response => (this.taskLists = response.data.data))
    }
}
</script>
