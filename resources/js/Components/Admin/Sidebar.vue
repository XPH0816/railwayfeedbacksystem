<script setup>
import { ref } from 'vue'
import { Link, router } from '@inertiajs/vue3';
const isOpen = ref(false)
function toggleSidebar() {
    isOpen.value = !isOpen.value
}

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div :class="['sidebar', { open: isOpen }]">
        <div class="logo-details">
            <div class="logo_name">XYZ Railway</div>
            <i :class="['bx', { 'bx-menu': !isOpen }, { 'bx-menu-alt-right': isOpen }]" id="btn"
                @click="toggleSidebar"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a :href="route('dashboard')">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <Link :href="route('users')">
                <i class="bx bx-user"></i>
                <span class="links_name">User Management</span>
                </Link>
                <span class="tooltip">User Management</span>
            </li>
            <li>
                <Link :href="route('railways')">
                <i class="bx bx-train"></i>
                <span class="links_name">Railway Line Management</span>
                </Link>
                <span class="tooltip">Railway Line Management</span>
            </li>
            <li>
                <Link :href="route('feedbacks')">
                <i class="bx bx-file"></i>
                <span class="links_name">Complaints & Feedback</span>
                </Link>
                <span class="tooltip">Complaints & Feedback</span>
            </li>
            <li class="profile">
                <div class="profile-details">
                    <img :src="$page.props.auth.user.profile_photo_url" alt="profileImg" />
                    <div class="name_job">
                        <div class="name">{{ $page.props.auth.user.name }}</div>
                        <div class="job">{{ $page.props.auth.user.email }}</div>
                    </div>
                </div>
                <i @click.prevent="logout" style="cursor: pointer;" class="bx bx-log-out" id="log_out"></i>
            </li>
        </ul>
    </div>
</template>

<style scoped>
:root {
    --sidebar-width: 78px;
}

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    width: var(--sidebar-width);
    background: #11101d;
    padding: 6px 14px;
    z-index: 1;
    transition: all 0.5s ease;
}

.sidebar.open {
    width: 300px;
}

.sidebar .logo-details {
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
}

.sidebar .logo-details .logo_name {
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    opacity: 0;
    transition: all 0.5s ease;
}

.sidebar.open .logo-details,
.sidebar.open .logo-details .logo_name {
    opacity: 1;
}

.sidebar .logo-details #btn {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    font-size: 22px;
    text-align: center;
    cursor: pointer;
    transition: all 0.5s ease;
}

.sidebar.open .logo-details #btn {
    text-align: center;
}

#log_out:hover {
    color: #f1c40f;
}

.sidebar i {
    color: #fff;
    height: 60px;
    min-width: 50px;
    font-size: 28px;
    text-align: center;
    line-height: 60px;
}

.sidebar .nav-list {
    margin-top: 20px;
    height: 100%;
}

.sidebar li {
    position: relative;
    margin: 8px 0;
    list-style: none;
}

.sidebar input {
    font-size: 15px;
    color: #fff;
    font-weight: 400;
    outline: none;
    height: 50px;
    width: 100%;
    border: none;
    border-radius: 12px;
    transition: all 0.5s ease;
    background: #1d1b31;
}

.sidebar.open input {
    padding: 0 20px 0 50px;
    width: 100%;
}

.sidebar .bx-search {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 22px;
    background: #1d1b31;
    color: #fff;
}

.sidebar .bx-search:hover {
    background: #fff;
    color: #11101d;
}

.sidebar.open .bx-search:hover {
    background: #1d1b31;
    color: #fff;
}

.sidebar li i {
    height: 50px;
    line-height: 50px;
    font-size: 18px;
    border-radius: 12px;
}

.sidebar li a {
    display: flex;
    height: 100%;
    width: 100%;
    border-radius: 12px;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
    background: #11101d;
}

.sidebar li a:hover {
    background: #fff;
}

.sidebar li a .links_name {
    color: #fff;
    font-size: 15px;
    font-weight: 400;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: 0.4s;
}

.sidebar.open li a .links_name {
    opacity: 1;
    pointer-events: auto;
}

.sidebar li a:hover .links_name,
.sidebar li a:hover i {
    transition: all 0.5s ease;
    color: #11101d;
}

.sidebar li .tooltip {
    position: absolute;
    top: -20px;
    left: calc(100% + 15px);
    background: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 400;
    opacity: 0;
    white-space: nowrap;
    pointer-events: none;
    transition: 0s;
}

.sidebar li:hover .tooltip {
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
    top: 50%;
    transform: translateY(-50%);
}

.sidebar.open li .tooltip {
    display: none;
}

.sidebar li.profile {
    position: fixed;
    height: 60px;
    width: 78px;
    left: 0;
    bottom: -8px;
    padding: 10px 14px;
    background: #1d1b31;
    transition: all 0.5s ease;
    overflow: hidden;
}

.sidebar.open li.profile {
    width: 250px;
}

.sidebar li .profile-details {
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
}

.sidebar li img {
    height: 40px;
    width: 40px;
    object-fit: cover;
    border-radius: 50%;
    margin-right: 10px;
}

.sidebar li.profile .name,
.sidebar li.profile .job {
    font-size: 15px;
    font-weight: 400;
    color: #fff;
    white-space: nowrap;
}

.sidebar li.profile .job {
    font-size: 12px;
}

.sidebar .profile #log_out {
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    background: #1d1b31;
    width: 100%;
    height: 60px;
    line-height: 60px;
    transition: all 0.5s ease;
}

.sidebar.open .profile #log_out {
    width: 50px;
    background: none;
}
</style>
