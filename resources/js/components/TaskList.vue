<template>
    <div class="column">
        <div class="column__heading">
            <span>{{ title }}</span>
            <a class="close-btn"></a>
        </div>

       <div v-show="!createCardVisible" class="cards">
            <div @click="showCreateCardForm" class="add-card-btn">+ Add a card</div>
       </div>

        <div v-show="createCardVisible" class="create-card-form">
            <form @submit.prevent="addNewCard">
            
                <textarea v-model="newTitle" class="textarea" name="" id="" rows="1" placeholder="Tasks title"></textarea>
                <br/><br/>
                
                <textarea v-model="newDescription" class="textarea" name="" id="" rows="2" placeholder="Describe the task"></textarea>

                <div class="card-btns" style="gap:20px;">
                    <button class="btn" style="background-color: grey; font-size:13px;">Add Card</button>
                    <a @click="cancelCreateCard()" style="font-family: sans-serif;width:10px; height:10px;cursor:pointer;">X</a>
                </div>
            </form>

            
        </div>
        
        <card v-for="card in cards" :title="card.title" :key="card.id"></card>
     </div>
</template>

<style scoped>
    
</style>

<script>
    import Card from './Card.vue'; 

    export default {
        components: {
            'card': Card
        },
        data() {
            return {
               cards : [
                    {
                        title:"Title 1", 
                        description:"First Things", 
                        id: 1
                    }, 
                    {
                        title:"Title 2", 
                        description:"First Things", 
                        id: 2
                    },
                    {
                        title:"Title 3", 
                        description:"First Things", 
                        id: 3
                    }
               ],
               createCardVisible: false, 
               newTitle: '', 
               newDescription: ''
            }
        },
        methods : {
            addNewCard(){
                this.cards.push({
                    id: this.cards.length + 1,
                    title: this.newTitle,
                    description: this.newDescription
                });

                this.newTitle = ''; 
                this.newDescription = '';
                this.createCardVisible = false;
            },
            showCreateCardForm() {
                this.createCardVisible = ! this.createCardVisible;
            },
            cancelCreateCard(){
                this.createCardVisible = false;
            }
        },  
        props: {
            title: String, 
        }
    };
</script>