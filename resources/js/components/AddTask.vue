<template>
    <div> <!--root-->

       <div v-show="showCreateTaskBtn" class="addtask">
            <div @click="showCreateTaskForm" class="addtask__btn addtask__btn--addtask">+ Add a task</div>
       </div>

      <div v-show="showForm" class="form">
            <form @submit.prevent="addTask">
            
                <textarea v-model="newTitle" class="form__input form__input--nodrag" name="" rows="1" placeholder="Tasks title" required></textarea>
                <br/><br/>
                
                <textarea v-model="newDescription" class="form__input form__input--nodrag" name="" rows="2" placeholder="Describe the task" required></textarea>

                <div class="form__control">
                    <button class="form__btn form__btn--addtask">Add Task</button>
                    <a @click="cancelCreateTask()" class="form__btn form__btn--close">X</a>
                </div>
            </form>

        </div>

    </div>  <!--end root-->
</template>

<script>
    export default {
        data(){
            return {
                newTitle: '',
                newDescription: '', 
                showForm : false, 
            }
        },
        props: {
        },
        methods : {
            showCreateTaskForm() {
                this.showForm = true;
            }, 
            addTask(){
                this.$emit('addNewTask',this.newTitle, this.newDescription)

                this.showForm = false;
                this.newTitle = '';
                this.newDescription = '';
            }, 
            cancelCreateTask(){
                this.showForm = false;
            }
        }, 
        computed: {
            showCreateTaskBtn (){ return ! this.showForm }
        }
    }
</script>