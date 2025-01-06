<script setup>
import { Feedback } from '@/types/Feedback'

const emit = defineEmits({
    openShowFeedbackPopup: (value) => value instanceof Feedback,
})
function showFeedback({ id, content }) {
    const feedback = new Feedback({ id, content })
    emit('openShowFeedbackPopup', feedback)
}

defineProps({
    feedbacks: {
        type: Array,
        default: () => [],
    },
})
</script>

<template>
    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Rating</td>
                    <td>Content</td>
                    <td>Reply</td>
                    <td>Reply at</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="feedback in feedbacks" :key="feedback.name" v-if="feedbacks.length > 0">
                    <td>
                        <div class="People">
                            <div class="people-de">
                                <h5>{{ feedback.railway.name }}</h5>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p>{{ feedback.rating }}</p>
                    </td>
                    <td>
                        <p>{{ feedback.content }}</p>
                    </td>
                    <td :class="feedback.reply">
                        <p>{{ feedback.reply ?? 'Haven\'t not replied yet' }}</p>
                    </td>
                    <td>
                        <p v-if="feedback.created_at != feedback.updated_at">{{ new Date(feedback.updated_at).toLocaleString('en-MY', {
                            day: 'numeric', month: 'long', year:
                                "numeric", hour: "numeric", minute: "numeric"
                        }) }}</p>
                        <p v-else>Haven't not replied yet</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style scoped>
.board {
    /* margin: 30px 0 30px 30px; */
    overflow: auto;
    background: white;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.board img {
    width: 45px;
    height: 45px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 15px;
}

.board h5 {
    font-weight: 600;
    font-size: 14px;
}

.board p {
    font-weight: 400;
    font-size: 13px;
    color: #787d8d;
}

.board .People {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    text-align: start;
}

table {
    border-collapse: collapse;
}

tr {
    border-bottom: 1px solid #eef0f3;
}

thead td {
    font-size: 13px;
    font-family: 'Pirata One', system-ui;
    color: rgb(94, 92, 92);
    text-transform: uppercase;
    font-weight: 500;
    background: #f9fafb;
    padding: 15px;
}

thead td .bx-edit {
    text-decoration: none;
    font-size: 14px;
    color: rgb(22, 22, 99);
    font-weight: 600;
}

thead td .bx-edit:hover {
    background: #a73636;
    color: #11101d;
}

tbody tr td {
    padding: 10px 15px;
}

.active p {
    background: #d7fada;
    padding: 2px 10px;
    display: inline-block;
    border-radius: 40px;
    color: #2b2b2b;
    text-transform: capitalize;
}

.inactive p {
    background: #ffd2d2;
    padding: 2px 10px;
    display: inline-block;
    border-radius: 40px;
    color: #2b2b2b;
    text-transform: capitalize;
}

.maintenance p {
    background: #fff3cd;
    padding: 2px 10px;
    display: inline-block;
    border-radius: 40px;
    color: #2b2b2b;
    text-transform: capitalize;
}

.replied p {
    background: #d6e9f9;
    padding: 2px 10px;
    display: inline-block;
    border-radius: 40px;
    color: #2b2b2b;
    text-transform: capitalize;
}

.button-group {
    display: flex;
    justify-content: space-evenly;
}

.edit-btn {
    background: none;
    border: none;
    color: inherit;
    font: inherit;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 5px 10px;
}

.edit-btn:hover {
    background-color: #f0f0f0;
    border-radius: 5px;
}

.edit-btn:active {
    transform: scale(0.98);
}
</style>
