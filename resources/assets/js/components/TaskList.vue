<template>
    <div>
        <task-item
            v-for="(task, key) in items"
            :task="task"
            :key="key"
        />
    </div>
</template>

<script>
    export default {
        name: "task-list",
        props: {
            'items': {
                type: Array,
                required: true,
            },
        },
    }
</script>

<style scoped>

</style>