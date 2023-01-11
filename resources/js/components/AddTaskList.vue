<template>
    <div class="box">
        <create-list @addTaskList="addTaskList"></create-list>
     </div>
</template>
<script>
    import CreateList from './CreateList.vue'

    export default {
        components: {
            'create-list' : CreateList
        },
        data(){
            return {
            }
        }, 
        methods: {
            addTaskList(title){
                this.$emit('addNewTaskList', title)
            }
        }
    }
</script>