<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
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
    background-color: #007bff;
    color: white;
}
button:hover {
    background-color: #0056b3;
}
</style>
