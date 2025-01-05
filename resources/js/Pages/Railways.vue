<script setup>
import { ref } from 'vue'
import RailwayStats from '@/Components/Admin/RailwayStats.vue'
import RailwayTable from '@/Components/Admin/RailwayTable.vue'
import EditRailwayModal from '@/Components/Admin/Modals/EditRailwayModal.vue'
import AddRailwayModal from '@/Components/Admin/Modals/AddRailwayModal.vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'

const addRailway = ref(false)
const editRailway = ref(false)
const selectedRailway = ref({})

function openEditRailwayModal(railway) {
  selectedRailway.value = railway
  editRailway.value = true
}

const props = defineProps({ railways: Array })
</script>

<template>
    <AdminLayout title="Railway Management">
        <h3 class="title">Railway Management</h3>
        <RailwayStats @openAddRailwayPopup="addRailway = true" :railways="railways" />
        <RailwayTable @openEditRailwayPopup="openEditRailwayModal" :railways="railways" />
        <EditRailwayModal
        v-if="editRailway"
        v-model:visible="editRailway"
        v-bind:railway="selectedRailway"
        />
        <AddRailwayModal v-if="addRailway" v-model:visible="addRailway" />
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
