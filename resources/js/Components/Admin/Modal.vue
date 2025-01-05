<script setup>
const props = defineProps({
    title: {
        type: String,
        default: 'Title',
    },
    submitText: {
        type: String,
        default: 'Submit',
    }
})

const visible = defineModel(
    'visible', {
    type: Boolean,
    default: false,
});

defineEmits(['submit']);

function close() {
    visible.value = false;
}

</script>
<template>
    <div>
        <div v-if="visible" class="modal" id="addUserModal">
            <div class="modal-content">
                <span class="close" @click="close">&times;</span>
                <slot name="header"></slot>
                <form @submit.prevent="$emit('submit')" class="form-group">
                    <h3>{{ title }}</h3>
                    <slot>
                    </slot>
                    <div class="button-group">
                        <button type="submit">{{ submitText }}</button>
                        <button type="button" @click="close">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.modal {
    display: flex;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    width: 40dvw;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    position: relative;
    text-align: center;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 24px;
    cursor: pointer;
}

button {
    padding: 10px 15px;
    margin-top: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    font-size: 14px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

button:active {
    transform: scale(0.98);
}

.button-group {
    display: flex;
    gap: 10px;
    justify-content: space-around;
}

@media screen and (max-width: 768px) {
    .modal-content {
        width: 50dvw;
    }
}

@media screen and (max-width: 600px) {
    .modal-content {
        position: fixed;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 85dvw;
    }
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: .8em;
}
</style>
