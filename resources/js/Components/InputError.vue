<script setup>
defineProps({
    message: String,
});
</script>

<template>
    <div v-show="message">
        <p class="error-message">
            {{ message }}
        </p>
    </div>
</template>

<style scoped>
.error-message {
    font-family: cursive;
    font-size: 0.875rem; /* equivalent to text-sm */
    color: #dc2626; /* equivalent to text-red-600 */
    margin: 0.25rem 0 0 0;
}
</style>
