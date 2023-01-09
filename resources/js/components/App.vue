<template>
    <div class="container">
        <div class="board">
            
                <task-list v-for="list in taskLists" :title="list.title" :key="list.id" :taskLists="taskLists"></task-list>
            
           
            <add-task-list @addNewTaskList="addNewTaskList"></add-task-list>
        </div>

        <modal name="display-task-modal" title="Some Title" description="Some Desc"></modal>
    </div>
</template>

<script>
    import AddTaskList from './AddTaskList.vue'
    import TaskList from './TaskList.vue'
    import DisplayTaskModal from './Modals/DisplayTaskModal'

    export default {
        el: '#app',
        components: {
            'add-task-list': AddTaskList, 
            'task-list': TaskList, 
            'modal': DisplayTaskModal

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
            }, 
            show () {
                this.$modal.show('display-task-modal');
            },
        }, 
        mount () {
            this.show()
        }
    }
</script>
