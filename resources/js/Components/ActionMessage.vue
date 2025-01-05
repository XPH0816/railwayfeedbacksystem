<script setup>
defineProps({
    on: Boolean,
});
</script>

<template>
    <div>
        <transition name="fade">
            <div v-show="on" class="message">
                <slot />
            </div>
        </transition>
    </div>
</template>

<style>
.message {
    font-size: 0.875rem; /* text-sm */
    color: #4a5568; /* text-gray-600 */
}

.fade-leave-active {
    transition: opacity 1s ease-in;
}

.fade-leave-from {
    opacity: 100;
}

.fade-leave-to {
    opacity: 0;
}
</style>
