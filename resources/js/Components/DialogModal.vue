<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
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

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="modal-content">
            <div class="modal-title">
                <slot name="title" />
            </div>

            <div class="modal-body">
                <slot name="content" />
            </div>
        </div>

        <div class="modal-footer">
            <slot name="footer" />
        </div>
    </Modal>
</template>

<style scoped>
.modal-content {
    padding: 1.5rem;
}

.modal-title {
    font-size: 1.125rem;
    font-weight: 500;
    color: #1f2937; /* text-gray-900 */
}

.modal-body {
    margin-top: 1rem;
    font-size: 0.875rem;
    color: #4b5563; /* text-gray-600 */
}

.modal-footer {
    display: flex;
    justify-content: space-evenly;
    padding: 1.5rem;
    background-color: #f3f4f6; /* bg-gray-100 */
    text-align: end;
}
</style>
