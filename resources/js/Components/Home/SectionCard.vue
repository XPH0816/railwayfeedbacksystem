<script setup>
defineProps({
    height: {
        type: String,
        default: 'auto',
    },
    width: {
        type: String,
        default: 'auto',
    },
});
</script>

<template>
    <section class="card" :style="{ height, width }">
        <slot>
            Test Card
        </slot>
    </section>
</template>

<style scoped>
.card {
    text-align: center;
    border: 1px solid #ddd;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}
</style>
