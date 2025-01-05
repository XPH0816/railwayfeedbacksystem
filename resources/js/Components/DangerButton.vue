<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button :type="type" class="danger-button">
        <slot />
    </button>
</template>

<style scoped>
.danger-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    background-color: #dc2626; /* bg-red-600 */
    border: 1px solid transparent;
    border-radius: 0.375rem; /* rounded-md */
    font-weight: 600; /* font-semibold */
    font-size: 0.75rem; /* text-xs */
    color: #fff; /* text-white */
    text-transform: uppercase; /* uppercase */
    letter-spacing: 0.05em; /* tracking-widest */
    transition: background-color 0.15s ease-in-out, transform 0.15s ease-in-out; /* transition ease-in-out duration-150 */
    cursor: pointer;
}

.danger-button:hover {
    background-color: #ef4444; /* hover:bg-red-500 */
}

.danger-button:active {
    background-color: #b91c1c; /* active:bg-red-700 */
}

.danger-button:focus {
    outline: 2px solid transparent; /* focus:outline-none */
    outline-offset: 2px; /* focus:ring-offset-2 */
    box-shadow: 0 0 0 2px #f87171, 0 0 0 4px #dc2626; /* focus:ring-2 focus:ring-red-500 */
}
</style>
