<template>
    <div class="task" @click="showInModal">
        {{ title }}
    </div>
</template>

<script>
    export default {
        data(){
            return {}
        },
        methods: {
            showInModal(){
                this.$emit('showInModal');
            }
        },
        props: {
            title: String
        }
    }
</script>