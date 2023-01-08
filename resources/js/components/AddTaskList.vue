<template>
    <div class="column">
       <div @click="toggleAddTaskList" v-show="addTaskList" class="add-card-btn">+ Add a list</div>
       

       <div v-show="! addTaskList" class="" style="display:flex; flex-direction:column">
            <input type="text" placeholder="Enter list tile">

            <div v-show="true" style="display:flex; align-items:center; gap:20px;">
                <button class="btn" style="background-color: grey;cursor:pointer;">Add list</button>
                <div @click="toggleAddTaskList" style="font-size:25px; font-weight:bold; font-family:sans-serif;cursor:pointer;">X</div>
            </div>
       
       </div>
     </div>
</template>
<script>
    export default {
        data(){
            return {
                addTaskList : true
            }
        }, 
        methods: {
            toggleAddTaskList(){
                this.addTaskList = ! this.addTaskList
            }
        }
    }
</script>