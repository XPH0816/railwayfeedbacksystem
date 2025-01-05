<script setup lang="ts">
import { User } from '@/types/User'
import { useForm } from '@inertiajs/vue3';

const emit = defineEmits({
    openEditUserPopup: (value) => value instanceof User,
})

function editUser({ id, name, phone, email, status }) {
    const user = new User({ id, name, phone, email, status })
    emit('openEditUserPopup', user)
}

const form = useForm({
    _method: 'DELETE'
})

function deleteUser(user: User) {
    form.post(route('users.delete', { user: user.id }), {
        errorBag: 'deleteUser',
        preserveScroll: true,
        onSuccess: () => {
            console.log('User deleted:', user);
        }
    })
}

const users = defineModel('users', {
    type: Array as () => User[],
    default: [],
})
</script>

<template>
    <div class="board">
        <table width="100%">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Phone Number</td>
                    <td>Status</td>
                    <td>Date Join</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users" :key="user.id" v-if="users.length > 0">
                    <td>
                        <div class="People">
                            <img :src="user.profile_photo_url" alt="User Image" />
                            <div class="people-de">
                                <h5>{{ user.name }}</h5>
                                <p>{{ user.email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="people-phone">
                        <p>{{ user.phone }}</p>
                    </td>
                    <td :class="user.status.toLowerCase()">
                        <p>{{ user.status }}</p>
                    </td>
                    <td class="datejoin">
                        <p>{{ new Date(user.created_at).toLocaleString('en-MY', {
                            day: 'numeric', month: 'long', year:
                                "numeric"
                        }) }}</p>
                    </td>
                    <td>
                        <div class="button-group">
                            <button class="edit-btn" @click="editUser(user)">
                                <i class="bx bx-edit"></i>
                                Edit
                            </button>
                            <button class="edit-btn" @click="deleteUser(user)" :disabled="form.processing"
                                :style="{ opacity: form.processing ? 0.25 : 1 }">
                                <i class="bx bx-trash"></i>
                                Delete
                            </button>
                        </div>
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
