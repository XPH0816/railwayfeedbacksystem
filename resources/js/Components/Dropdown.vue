<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

const props = defineProps({
    align: {
        type: String,
        default: 'right',
    },
    width: {
        type: String,
        default: '48',
    },
    contentClasses: {
        type: Array,
        default: () => ['py-1', 'bg-white'],
    },
});

let open = ref(false);

const closeOnEscape = (e) => {
    if (open.value && e.key === 'Escape') {
        open.value = false;
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));
onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const widthClass = computed(() => {
    return {
        '48': 'w-48',
    }[props.width.toString()];
});

const alignmentClasses = computed(() => {
    if (props.align === 'left') {
        return 'ltr-origin-top-left rtl-origin-top-right start-0';
    }

    if (props.align === 'right') {
        return 'ltr-origin-top-right rtl-origin-top-left end-0';
    }

    return 'origin-top';
});
</script>

<template>
    <div class="relative">
        <div @click="open = ! open">
            <slot name="trigger" />
        </div>

        <!-- Full Screen Dropdown Overlay -->
        <div v-show="open" class="fixed inset-0 z-40" @click="open = false" />

        <transition
            enter-active-class="transition ease-out duration-200"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <div
                v-show="open"
                class="absolute z-50 mt-2 rounded-md shadow-lg"
                :class="[widthClass, alignmentClasses]"
                style="display: none;"
                @click="open = false"
            >
                <div class="rounded-md ring-1 ring-black ring-opacity-5" :class="contentClasses">
                    <slot name="content" />
                </div>
            </div>
        </transition>
    </div>
</template>

<style scoped>
.relative {
    position: relative;
}
.fixed {
    position: fixed;
}
.inset-0 {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.z-40 {
    z-index: 40;
}
.z-50 {
    z-index: 50;
}
.mt-2 {
    margin-top: 0.5rem;
}
.rounded-md {
    border-radius: 0.375rem;
}
.shadow-lg {
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}
.transition {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
}
.ease-out {
    transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
}
.ease-in {
    transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
}
.duration-200 {
    transition-duration: 200ms;
}
.duration-75 {
    transition-duration: 75ms;
}
.transform {
    transform: translate3d(0, 0, 0);
}
.opacity-0 {
    opacity: 0;
}
.opacity-100 {
    opacity: 1;
}
.scale-95 {
    transform: scale(0.95);
}
.scale-100 {
    transform: scale(1);
}
.absolute {
    position: absolute;
}
.ring-1 {
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05);
}
.ring-black {
    --tw-ring-color: rgba(0, 0, 0, 1);
}
.ring-opacity-5 {
    --tw-ring-opacity: 0.05;
}
.w-48 {
    width: 12rem;
}
.ltr-origin-top-left {
    transform-origin: top left;
}
.ltr-origin-top-right {
    transform-origin: top right;
}
.rtl-origin-top-left {
    transform-origin: top left;
}
.rtl-origin-top-right {
    transform-origin: top right;
}
.start-0 {
    left: 0;
}
.end-0 {
    right: 0;
}
.origin-top {
    transform-origin: top;
}
.py-1 {
    padding-top: 0.25rem;
    padding-bottom: 0.25rem;
}
.bg-white {
    background-color: #ffffff;
}
</style>
