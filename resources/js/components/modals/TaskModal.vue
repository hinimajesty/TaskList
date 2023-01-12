<template>
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <form @submit.prevent="editTask">

                <div class="modal-header poppins_heavy">
                <slot name="header">
                  <input class="form__input form__input--disableedit" v-model="newTitle" />
                </slot>
              </div>

              <div class="modal-body poppings_light">
                <slot name="body">
                  <textarea class="form__input form__input--nodrag form__input--disableedit" v-model="newDescription"></textarea>
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  <button type="submit" class="box__btn box__btn--addlist">Edit</button>
                  <button class="box__btn box__btn--addlist" @click.prevent="$emit('close')">
                    Close
                  </button>
                </slot>
              </div>

              </form>
              
              
            </div>
          </div>
        </div>
      </transition>
  </template>

  <script>
    export default {
        data(){
            return {
               newTitle: this.title,
               newDescription: this.description
            }
        },
        components: {
         
        }, 
        props: {
          title: String, 
          description: String, 
          taskId : Number
        }, 
        methods: {
          editTask(){
              axios.put('/api/list-cards',{
                  taskId: this.taskId,
                  title: this.newTitle,
                  description: this.newDescription
              }).then((response) => {
                  this.$emit('taskUpdated',{
                     taskId: this.taskId, 
                     taskTitle: this.newTitle, 
                     taskDescription: this.newDescription
                  })
              })
          }
        }
    }
  </script>
  