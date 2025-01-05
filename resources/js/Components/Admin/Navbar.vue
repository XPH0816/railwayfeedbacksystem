<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { router } from '@inertiajs/vue3';

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="interface">
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class="bx bx-search-alt"></i>
                    <input type="text" placeholder="Search" />
                </div>
            </div>
            <div class="profile" style="cursor: pointer">
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <div class="profile">
                            <img :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name" />
                            <label for="username">{{ $page.props.auth.user.name }}</label>
                            <i class="bx bx-chevron-down"></i>
                        </div>
                    </template>
                    <template #content>
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Account
                        </div>

                        <DropdownLink :href="route('profile.show')">
                            Profile
                        </DropdownLink>

                        <div class="border-t border-gray-200" />

                        <!-- Authentication -->
                        <form @submit.prevent="logout">
                            <DropdownLink as="button">
                                Log Out
                            </DropdownLink>
                        </form>
                    </template>
                </Dropdown>
            </div>
        </div>
    </div>
</template>

<style scoped>
* {
    font-family: "Poppins", sans-serif;
}
.navigation {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #fdfdfd;
    padding: 20px 40px;
    border-bottom: 3px solid #594ef7;
    border-radius: 10px;
}

.navigation .search {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    border: 1px solid #d6dae3;
    padding: 5px 10px;
    border-radius: 10px;
}

.navigation .search i {
    margin-right: 14px;
    padding: 5px 10px;
}

.navigation .search input {
    border: none;
    outline: none;
    font-size: 14px;
}

.navigation .profile {
    display: flex;
    gap: 0.5em;
    justify-content: flex-start;
    align-items: center;
}

.navigation .profile i {
    margin-right: 20px;
    font-size: 19px;
    font-weight: 400;
}

.navigation .profile img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
}

.n1 {
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.interface .i-name {
    color: #444a53;
    font-size: 30px;
    font-weight: 700;
}

.text-gray-400 {
    --tw-text-opacity: 1;
    color: rgba(156, 163, 175, var(--tw-text-opacity));
}

.border-gray-200 {
    --tw-border-opacity: 1;
    border-color: rgba(229, 231, 235, var(--tw-border-opacity));
}

.border-t {
    border-top-width: 1px;
}

.block {
    display: block;
}

.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}

.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}

.text-xs {
    font-size: 0.75rem;
    line-height: 1rem;
}

@media screen and (max-width: 768px) {
    label[for='username'] {
        display: none;
    }
}

@media screen and (max-width: 600px) {
    .navigation {
        padding: 20px;
    }

    .navigation .search input {
        width: 20dvw;
    }

    .navigation .search i {
        display: none;
    }

    label[for='username'] {
        display: none;
    }
}
</style>
