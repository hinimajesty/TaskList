<template>
    <div>
        <h1>{{ title }}</h1>

        <div>
            {{ description }}
        </div>
    </div>
</template>
<script>
    export default {
        props: {
            title: String, 
            description: String
        }
    }
</script>