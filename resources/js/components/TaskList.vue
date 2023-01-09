<template>
    <div class="tasklist">
        <div class="tasklist__heading">
            <span>{{ title }}</span>
            <a @click="deleteTaskList" class="close-btn"></a>
        </div>

       <div v-show="!createCardVisible" class="cards">
            <div @click="showCreateCardForm" class="add-card-btn">+ Add a card</div>
       </div>

        <div v-show="createCardVisible" class="tasklist__createcardform">
            <form @submit.prevent="addNewCard">
            
                <textarea v-model="newTitle" class="createcardform__textarea" name="" rows="1" placeholder="Tasks title"></textarea>
                <br/><br/>
                
                <textarea v-model="newDescription" class="createcardform__textarea" name="" rows="2" placeholder="Describe the task"></textarea>

                <div class="createcardform__controls">
                    <button class="btn">Add Card</button>
                    <a @click="cancelCreateCard()" style="font-family: sans-serif;width:10px; height:10px;cursor:pointer;">X</a>
                </div>
            </form>

        </div>

        <draggable :move="taskMoved" v-model="cards" group="lists" :key="draggableKey">
            <card v-for="card in cards" :title="card.title" :key="card.id"></card>
        </draggable>
     </div>
</template>

<script>
    import draggable from 'vuedraggable';
    import Card from './Card.vue'; 

    export default {
    components: {
        "card": Card,
        draggable
    },
        data() {
            return {
               cards : [

               ],
               createCardVisible: false, 
               newTitle: '', 
               newDescription: ''
            }
        },
        methods : {
            taskMoved(e){
                
                axios.put('/api/list-cards',{
                    newTaskListId: e.relatedContext.component.$options.parent.$vnode.key ,
                    taskId: e.draggedContext.element.id
                });

            },
            addNewCard(){
                axios
                .post('/api/list-cards',{
                    title: this.newTitle, 
                    description: this.newDescription, 
                    taskListId: this.$vnode.key
                })
                .then(response => (this.cards.push({
                    id: response.data.data.task_list_id, 
                    title: response.data.data.title, 
                    description: response.data.data.description
                })))

                this.newTitle = ''; 
                this.newDescription = '';
                this.createCardVisible = false;
            },
            deleteTaskList(){
                alert('Are you sure you want to delete this list ?')
                
                axios.delete('/api/task-lists?id=' + this.$vnode.key)
                    .then((response) => {
                        this.$destroy();
                        this.$el.parentNode.removeChild(this.$el);
                    })
            },
            showCreateCardForm() {
                this.createCardVisible = ! this.createCardVisible;
            },
            cancelCreateCard(){
                this.createCardVisible = false;
            }
        },  
        computed: {
            draggableKey(){
                return this.cards.length + 1
            }
        },
        props: {
            title: String
        }, 
        mounted(){
            
            axios
                .get('/api/list-cards?task_list_id=' + this.$vnode.key)
                .then(response => (this.cards = response.data.data))
        }
    };
</script>