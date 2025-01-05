<script setup>
import { ref } from 'vue'
import FeedbackStats from '@/Components/Admin/FeedbackStats.vue'
import FeedbackTable from '@/Components/Admin/FeedbackTable.vue'
import EditFeedbackModal from '@/Components/Admin/Modals/EditFeedbackModal.vue'
import AddFeedbackModal from '@/Components/Admin/Modals/AddFeedbackModal.vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const addFeedback = ref(false)
const editFeedback = ref(false)
const selectedFeedback = ref({})

defineProps({
    feedbacks: {
        type: Array,
        required: true,
    },
    railways: {
        type: Array,
        required: true,
    },
})

function openEditFeedbackModal(feedback) {
    console.log('Editing Feedback:', feedback)
    selectedFeedback.value = feedback
    editFeedback.value = true
}
</script>

<template>
    <AdminLayout title="Feedback Management">
        <h3 class="title">Feedback Management</h3>
        <FeedbackStats @openAddFeedbackPopup="addFeedback = true" :feedbacks="feedbacks" />
        <FeedbackTable @openEditFeedbackPopup="openEditFeedbackModal" :feedbacks="feedbacks" />
        <EditFeedbackModal v-if="editFeedback" v-model:visible="editFeedback" v-bind:feedback="selectedFeedback" />
        <AddFeedbackModal v-if="addFeedback" v-model:visible="addFeedback" :railways="railways" />
    </AdminLayout>
</template>

<style scoped>
.title {
    color: #444a53;
    font-size: 30px;
    margin-left: 3rem;
    font-weight: 700;
}

@media screen and (max-width: 768px) {
    .title {
        margin-left: 1rem;
    }
}
</style>
