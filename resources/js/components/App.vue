<template>
    <div class="board">

        <task-list v-for="list in taskLists" :title="list.title" :key="list.id"></task-list>

        <add-task-list @addNewTaskList="addNewTaskList"></add-task-list>

    </div>
</template>

<script>
    import AddTaskList from './AddTaskList.vue'; 
    import TaskList from './TaskList.vue'; 

    export default {
        components: {
            'add-task-list': AddTaskList, 
            'task-list': TaskList
        }, 
        data(){
            return {
                taskLists: [
                    {
                        id: 1,
                        title: 'First Task'
                    },
                    {
                        id: 2,
                        title: 'Second Task'
                    },
                    {
                        id: 3,
                        title: 'Third Task'
                    },
                ]
            }
        },
        methods: {
            addNewTaskList(title){
                this.taskLists.push({
                    id: this.taskLists.length + 1,
                    title: title
                })
            }
        }
    }
</script>
