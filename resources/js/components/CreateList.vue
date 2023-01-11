<template>
        <div class="box__createlist">
            <div @click="toggleAddTaskList" v-show="addTaskList" class="box__btn box__btn--addlist">+ Add a list</div>

            <div v-show="! addTaskList" class="box__form box__form--addlist">
                <form @submit.prevent="addNewTaskList">

                        <input required v-model="newTaskListTitle" type="text" class="form__input form__input--addlist" placeholder="Enter list title">

                        <div v-show="true" class="box__control">
                            <button class="box__btn box__btn--addlist">Add list</button>
                            <a class="box__btn box__btn--close" @click="toggleAddTaskList" style="">X</a>
                        </div>
                </form>
            </div>
        </div>
</template>

<script>
    export default {
        data(){
            return {
                addTaskList: false, 
                newTaskListTitle: ''
            }
        },
        props: {
            title: String
        },
        methods : {
            toggleAddTaskList(){
                this.addTaskList = ! this.addTaskList
            }, 
            addNewTaskList(){
                this.$emit('addTaskList', this.newTaskListTitle)
                this.newTaskListTitle = '';
            }
        }
    }
</script>