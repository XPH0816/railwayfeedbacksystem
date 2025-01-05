<script setup lang="ts">
import { User } from '@/types/User'
const users = defineModel('users', {
    type: Array as () => User[],
    default: [],
})

defineEmits(['openAddUserPopup'])
</script>

<template>
    <div class="interface">
        <div class="values">
            <div class="val-box">
                <i class="bx bx-user"></i>
                <div>
                    <h3>{{ users.length }}</h3>
                    <span>Total Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="bx bx-user-check"></i>
                <div>
                    <h3>{{ users.filter(user => user.status === 'active').length }}</h3>
                    <span>Active Users</span>
                </div>
            </div>
            <div class="val-box">
                <i class="bx bx-user"></i>
                <div>
                    <h3>{{ users.filter(user => user.status === 'inactive').length}}</h3>
                    <span>Inactive Users</span>
                </div>
            </div>
            <!-- Add New User Button -->
            <button class="val-box" @click="$emit('openAddUserPopup')" style="margin: 0%;">
                <i class="bx bx-user-plus"></i>
                <div>
                    <h3>Add New User</h3>
                </div>
            </button>
        </div>
    </div>
</template>

<style>
.values {
    /* padding: 30px 30px 0 30px; */
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.values .val-box {
    background: white;
    width: 235px;
    padding: 16px 20px;
    border-radius: 5px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}


.values .val-box i {
    font-size: 25px;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    text-align: center;
    color: white;
    margin-right: 15px;
}

.values .val-box:nth-child(1) i {
    background: palevioletred;
}

.values .val-box:nth-child(2) i {
    background: powderblue;
}

.values .val-box:nth-child(3) i {
    background: greenyellow;
}

.values .val-box:nth-child(4) i {
    background: rgb(227, 47, 255);
}

.values .val-box h3 {
    font-size: 18px;
    font-weight: 600;
}

.values .val-box span {
    font-size: 15px;
    color: #828997;
}

button.val-box {
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    margin: 5px;
}

button.val-box:hover {
    background-color: #f1f1f1;
}

button.val-box:active {
    transform: scale(0.98);
}

@media screen and (max-width: 768px) {
    .values {
        flex-direction: column;
    }
}
</style>
