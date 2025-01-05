<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type">
        <slot />
    </button>
</template>

<style scoped>
button {
    all: unset;
    padding: 0.5em 1em;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    text-align: center;
    background-color: #6c757d;
    color: white;
}
button:hover {
    background-color: #5a6268;
}
</style>
