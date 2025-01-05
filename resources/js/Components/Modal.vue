<script setup>
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';

const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const emit = defineEmits(['close']);
const dialog = ref();
const showSlot = ref(props.show);

watch(() => props.show, () => {
    if (props.show) {
        document.body.style.overflow = 'hidden';
        showSlot.value = true;
        dialog.value?.showModal();
    } else {
        document.body.style.overflow = null;
        setTimeout(() => {
            dialog.value?.close();
            showSlot.value = false;
        }, 200);
    }
});

const close = () => {
    if (props.closeable) {
        emit('close');
    }
};

const closeOnEscape = (e) => {
    if (e.key === 'Escape') {
        e.preventDefault();

        if (props.show) {
            close();
        }
    }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
    document.removeEventListener('keydown', closeOnEscape);
    document.body.style.overflow = null;
});

const maxWidthClass = computed(() => {
    return {
        'sm': 'sm:max-w-sm',
        'md': 'sm:max-w-md',
        'lg': 'sm:max-w-lg',
        'xl': 'sm:max-w-xl',
        '2xl': 'sm:max-w-2xl',
    }[props.maxWidth];
});
</script>

<template>
    <dialog class="dialog" ref="dialog">
        <div class="dialog-container" scroll-region>
            <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0"
                enter-to-class="opacity-100" leave-active-class="ease-in duration-200" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <div v-show="show" class="overlay" @click="close">
                    <div class="overlay-bg" />
                </div>
            </transition>

            <transition enter-active-class="ease-out duration-300"
                enter-from-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to-class="opacity-100 translate-y-0 sm:scale-100" leave-active-class="ease-in duration-200"
                leave-from-class="opacity-100 translate-y-0 sm:scale-100"
                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div v-show="show" class="modal" :class="maxWidthClass">
                    <slot v-if="showSlot" />
                </div>
            </transition>
        </div>
    </dialog>
</template>

<style scoped>
.dialog {
    z-index: 50;
    margin: 0;
    min-height: 100%;
    min-width: 100%;
    overflow-y: auto;
    background: transparent;
    backdrop-filter: blur(5px);
}

.dialog-container {
    position: fixed;
    inset: 0;
    overflow-y: auto;
    padding: 1.5rem 1rem;
    z-index: 50;
}

.overlay {
    position: fixed;
    inset: 0;
    transform: translateY(0);
    transition: all 0.3s ease-out;
}

.overlay-bg {
    position: absolute;
    inset: 0;
    background-color: rgba(75, 85, 99, 0.75);
}

.modal {
    margin-bottom: 1.5rem;
    background-color: white;
    border-radius: 0.5rem;
    overflow: hidden;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1), 0 4px 6px rgba(0, 0, 0, 0.05);
    transform: translateY(0);
    transition: all 0.3s ease-out;
    width: 100%;
    max-width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.sm\:max-w-sm {
    max-width: 24rem;
}

.sm\:max-w-md {
    max-width: 28rem;
}

.sm\:max-w-lg {
    max-width: 32rem;
}

.sm\:max-w-xl {
    max-width: 36rem;
}

.sm\:max-w-2xl {
    max-width: 42rem;
}

.ease-out {
    transition-timing-function: cubic-bezier(0.25, 0.8, 0.5, 1);
}

.duration-300 {
    transition-duration: 300ms;
}

.opacity-0 {
    opacity: 0;
}

.opacity-100 {
    opacity: 1;
}

.ease-in {
    transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
}

.duration-200 {
    transition-duration: 200ms;
}

.translate-y-4 {
    transform: translateY(1rem);
}

.sm\:translate-y-0 {
    transform: translateY(0);
}

.sm\:scale-95 {
    transform: scale(0.95);
}

.sm\:scale-100 {
    transform: scale(1);
}
</style>
