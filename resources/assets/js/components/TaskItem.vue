<template>
    <div>
        <a href="#">test</a>
    </div>
</template>

<script>
    export default {
        name: "task-item",
        props: {
            'task': {
                type: Object,
                required: true,
            }
        }
    }
</script>

<style scoped>

</style>