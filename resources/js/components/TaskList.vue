<template>
    <div class="list">
        
        <div class="list__heading"> <span>{{ title }}</span> </div>

        <add-task @addNewTask="addTask" :createTask="closeTaskForm"></add-task>

        <draggable :move="taskMoved" v-model="tasks" group="tasks" :key="draggableKey">
            <task v-for="task in tasks" :title="task.title" :key="task.id"></task>
        </draggable>
       
     </div>
</template>

<script>
    import Draggable from 'vuedraggable';
    import Task from './Task.vue'
    import AddTask from './AddTask.vue'

    export default {
        components: {
            "task": Task, 
            "add-task": AddTask,
            "draggable": Draggable
        },
        data() {
            return {
               closeTaskForm : true,
               tasks : [
                    
               ]
            }
        },
        methods : {
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
                confirm('Are you sure you want to delete this list ?')
                
                axios.delete('/api/task-lists?id=' + this.$vnode.key)
                    .then((response) => {
                        this.$destroy();
                        this.$el.parentNode.removeChild(this.$el);
                })
            }, 
        },  
        computed: {
            draggableKey(){
                return this.tasks.length + 1
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