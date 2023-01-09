<template>
    <div class="column">
        <div class="column__addtasklist">
            <div @click="toggleAddTaskList" v-show="addTaskList" class="add-card-btn">+ Add a list</div>

            <div v-show="! addTaskList" class="" style="display:flex; flex-direction:column">
                <form @submit.prevent="addNewTaskList">

                        <input v-model="newTaskListTitle" type="text" placeholder="Enter list title">

                        <div v-show="true" style="display:flex; align-items:center; column-gap:20px;">
                            <button class="btn" style="background-color: grey;cursor:pointer;font-size:13px;">Add list</button>
                            <a @click="toggleAddTaskList" style="font-size:20px; font-family:sans-serif;cursor:pointer;">X</a>
                        </div>

                </form>
            </div>
        </div>
     </div>
</template>
<script>
    export default {
        data(){
            return {
                addTaskList : true,
                newTaskListTitle: ''
            }
        }, 
        methods: {
            toggleAddTaskList(){
                this.addTaskList = ! this.addTaskList;
            }, 
            addNewTaskList(){
                this.$emit('addNewTaskList', this.newTaskListTitle);

                this.newTaskListTitle = '';
            }
        }
    }
</script>