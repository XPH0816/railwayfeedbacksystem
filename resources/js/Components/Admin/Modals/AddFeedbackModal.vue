<script setup>
import Modal from '@/Components/Admin/Modal.vue'
import Input from '@/Components/Admin/Input.vue'
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    railways: {
        type: Array,
        required: true,
    },
})

const feedback = useForm({
    railway_id: props.railways[0].id,
    rating: 3,
    content: '',
});

function saveNewFeedback() {
    console.log('Saving new feedback:', feedback.data());
    feedback.post(route('feedbacks.store'), {
        onSuccess: () => {
            visible.value = false;
        },
    });
}

const visible = defineModel('visible', {
    type: Boolean,
    default: false,
})
</script>
<template>
    <Modal @submit="saveNewFeedback" :title="'Add New Feedback'" :submit-text="'Submit'" v-model:visible="visible">
        <div v-for="(_, key) in feedback.data()" :key="key">
            <Input v-if="key == 'railway_id'" type="custom">
            <template #custom>
                <label>Railway :</label>
                <select v-model="feedback.railway_id" class="w-full">
                    <option v-for="railway in railways" :key="railway.id" :value="railway.id">{{ railway.name }}
                    </option>
                </select>
            </template>
            </Input>
            <Input v-else-if="key == 'rating'" type="custom">
            <template #custom>
                    <label>Rating :</label>
                    <div style="width: 30vw; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                        <input type="range" min="1" max="5" v-model="feedback.rating" style="padding: 0;"/>
                        <div style="display: flex; justify-content: space-between; width: 100%;">
                            <span v-for="i in 5" :key="i">{{ i }}</span>
                        </div>
                    </div>
            </template>
            </Input>
            <Input v-else :label="key" :placeholder="key" v-model="feedback[key]" />
            <InputError :message="feedback.errors[key]" />
        </div>
    </Modal>
</template>

<style scoped>
select {
    width: 30vw;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

label {
    text-align: justify;
    font-weight: bold;
    text-transform: capitalize;
}

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

input {
    width: calc(100% - 20px);
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
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
}

@media screen and (max-width: 768px) {
    .modal-content {
        width: 50dvw;
    }
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.8em;
}
</style>
