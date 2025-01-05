<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { ref } from 'vue';
import UserStats from '@/Components/Admin/UserStats.vue';
import UserTable from '@/Components/Admin/UserTable.vue';
import EditUserModal from '@/Components/Admin/Modals/EditUserModal.vue';
import AddUserModal from '@/Components/Admin/Modals/AddUserModal.vue';

const addUser = ref(false);
const editUser = ref(false);
const selectedUser = ref({});

function openEditUserModal(user) {
    selectedUser.value = user;
    editUser.value = true;
}

const props = defineProps({ users: Array })
</script>

<template>
    <AdminLayout title="Dashboard">
        <h3 class="title">User Management</h3>
        <UserStats @openAddUserPopup="addUser = true" :users="users" />
        <UserTable @openEditUserPopup="openEditUserModal" :users="users" />
        <EditUserModal v-if="editUser" v-model:visible="editUser" v-bind:user="selectedUser" />
        <AddUserModal v-if="addUser" v-model:visible="addUser" />
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
