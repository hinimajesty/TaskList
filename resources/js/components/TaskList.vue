<template>
    <div class="list">
        
        <div class="list__header"> 
            <div class="list__header list__header--heading"> <span>{{ title }}</span> </div>
            <div @click="deleteTaskList">
                <span class="list__header list__header--close">X</span>
            </div>
        </div>

        <add-task @addNewTask="addTask" :createTask="closeTaskForm"></add-task>

        <draggable :move="taskMoved" v-model="tasks" group="tasks" :key="draggableKey">
            <task @showInModal="openTask(task)" v-for="task in tasks" :title="task.title" :key="task.id"></task>
        </draggable>
       
        <task-modal @taskUpdated="updateTask" :taskId="taskIdProp" :description="descriptionProp" :title="titleProp" v-if="showModal" @close="showModal = false"></task-modal>
     </div>
</template>

<script>
    import Draggable from 'vuedraggable';
    import Task from './Task.vue'
    import AddTask from './AddTask.vue'
    import DisplayTaskModal from './modals/TaskModal.vue'

    export default {
        components: {
            "task": Task, 
            "add-task": AddTask,
            "draggable": Draggable,
            'task-modal': DisplayTaskModal
        },
        data() {
            return {
               closeTaskForm : true,
               showModal: false,
               taskIdProp: null,
               descriptionProp:null,
               titleProp: null, 
               tasks : [
                    
               ]
            }
        },
        methods : {
            openTask(task){
                this.showModal = true
                this.titleProp = task.title
                this.descriptionProp = task.description
                this.taskIdProp = task.id
            },
            taskMoved(e){
                
                axios.put('/api/list-cards',{
                    newTaskListId: e.relatedContext.component.$options.parent.$vnode.key ,
                    taskId: e.draggedContext.element.id
                });

            },
            addTask(title,description){
                axios
                .post('/api/list-cards',{
                    title: title, 
                    description: description, 
                    taskListId: this.$vnode.key
                })
                .then(response => (this.tasks.push({
                    id: response.data.data.task_list_id, 
                    title: response.data.data.title, 
                    description: response.data.data.description
                })))
            },
            deleteTaskList(){
                if (!confirm('Are you sure you want to delete this list ?')) return;
                
                axios.delete('/api/task-lists?id=' + this.$vnode.key)
                    .then((response) => {
                        this.$destroy();
                        this.$el.parentNode.removeChild(this.$el);
                })
            }, 
            updateTask(newTask)
            {
                this.tasks.forEach(function (task) {
                    if (task.id === newTask.taskId) {
                        task.title = newTask.taskTitle, 
                        task.description = newTask.taskDescription
                    }
                });

                alert('Task changed successfully'); 

                this.showModal = false;
            }
        },  
        computed: {
            draggableKey(){
                return this.tasks.length + 1
            }, 
            sortedTasks()
            {
                return this.tasks.reverse()
            }
        },
        props: {
            title: String
        }, 
        mounted(){
            
            axios
                .get('/api/list-cards?access_token=7a444cc1db5e3893f9a3af23330&task_list_id=' + this.$vnode.key)
                .then(response => (this.tasks = response.data.data))
        }
    };
</script>