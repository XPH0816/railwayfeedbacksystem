<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TwitterIcon from '@/Components/icons/TwitterIcon.vue';
import InstaIcon from '@/Components/icons/InstaIcon.vue';
import WhatsAppIcon from '@/Components/icons/WhatsAppIcon.vue';
import { router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

const toggleMenu = () => {
    const menu = document.querySelector('.navbar');
    menu.classList.toggle('active');
};

const logout = () => {
    router.post(route('logout'));
};
</script>

<template>

    <Head :title="title" />
    <div class="app">
        <header class="navbar">
            <div class="logo-container">
                <Link class="logo" :href="route('home')">XYZ Railway</Link>
                <button id="menu-toggle" @click="toggleMenu">☰</button>
            </div>
            <nav>
                <Link :href="route('about')" :class="{ active: route().current('about') }">About Us</Link>
                <Link :href="route('faq')" :class="{ active: route().current('faq') }">FAQ</Link>
                <Link :href="route('feedback')" :class="{ active: route().current('feedback') }">Feedback</Link>
                <input type="text" placeholder="Search here" />
                <div v-if="$page.props.auth.user" class="desktop-nav">
                    <!-- Settings Dropdown -->
                    <div class="ms-3 relative">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button type="button" id="menu-button">
                                    <img class="size-8 rounded-full object-cover"
                                        :src="$page.props.auth.user.profile_photo_url"
                                        :alt="$page.props.auth.user.name">
                                    <svg class="ms-2 -me-0.5 size-4 icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>
                                </button>
                            </template>

                            <template #content>
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    Manage Account
                                </div>

                                <DropdownLink :href="route('history')">
                                    Feedback History
                                </DropdownLink>

                                <div class="border-t border-gray-200" />

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
                <div v-if="$page.props.auth.user" class="mobile-nav">
                    <Link :href="route('profile.show')">
                    {{ $page.props.auth.user.name }}'s Profile
                    </Link>

                    <div class="border-t border-gray-200" />

                    <!-- Authentication -->
                    <form @submit.prevent="logout">
                        <DropdownLink as="button" type="submit" class="mobile-nav-link"
                            style="color: #fff; font-size: inherit;">
                            Log Out
                        </DropdownLink>
                    </form>
                </div>
                <div v-else>
                    <Link :href="route('login')" :class="{ active: route().current('login') }">Login</Link>
                    <Link :href="route('register')" :class="{ active: route().current('register') }">Register</Link>
                </div>
            </nav>
        </header>
        <!-- Main Content -->
        <main class="container">
            <slot />
        </main>

        <footer class="contact-section">
            <div class="contact-info">
                <h3>Contact Information</h3>
                <p>Address: 1234 Main Street, City, State, ZIP</p>
                <p>Phone: (123) 456-7890</p>
                <p>Email: contact@company.com</p>
            </div>
            <div class="follow-us">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" target="_blank" rel="noopener noreferrer" @click.prevent="">
                        <TwitterIcon :height="40" :width="40" />
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" @click.prevent="">
                        <InstaIcon :height="40" :width="40" />
                    </a>
                    <a href="#" target="_blank" rel="noopener noreferrer" @click.prevent="">
                        <WhatsAppIcon :height="40" :width="40" />
                    </a>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
#menu-button {
    display: flex;
    background-color: #333;
    color: inherit;
    font-size: 0.875rem;
    /* text-sm */
    border-width: 2px;
    /* border-2 */
    border-color: transparent;
    border-radius: 9999px;
    outline: none;
    /* focus:outline-none */
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 150ms;
    /* transition */
}

#menu-button:focus {
    outline: 2px solid transparent;
    outline-offset: 2px;
    border-color: #4b5563;
    /* focus:border-gray-300 */
}

.mobile-nav {
    display: none;
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

.rounded-full {
    border-radius: 9999px;
}

.ms-2 {
    margin-inline-start: 0.5rem;
}

.me-0\.5 {
    margin-inline-end: 0.125rem;
}

.border-2 {
    border-width: 2px;
}

.icon {
    align-self: center;
}

.size-4 {
    width: 1.5rem;
    height: 1.5rem;
}

.size-8 {
    width: 2rem;
    height: 2rem;
}

.object-cover {
    object-fit: cover;
}

.app {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.container {
    width: 90%;
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    gap: 2rem;
}

main {
    padding: 20px 0;
}

@media screen and (max-width: 768px) {
    main {
        padding: 4rem 0;
    }

    .container {
        gap: 1rem;
    }

    .mobile-nav {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .desktop-nav {
        display: none;
    }
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 50px;
    background-color: #333;
    color: #ffffff;
    font-family: Arial, sans-serif;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.navbar .logo {
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
    color: #d1d1cd;
}

.navbar nav {
    display: flex;
    align-items: center;
    gap: 20px;
}

.navbar nav a {
    text-decoration: none;
    color: #ffffff;
    font-size: 20px;
    transition: color 0.3s ease-in-out;
    padding: 5px 10px;
    border-radius: 3px;
}

.navbar nav a:hover {
    color: #e7d4d4;
    background-color: rgba(255, 255, 255, 0.1);
}

.navbar nav a.active {
    color: #f1e05a;
}

.navbar nav .mobile-nav-link {
    background-color: transparent;
    border: none;
    color: #ffffff;
    font-size: 20px;
    cursor: pointer;
}

.navbar nav form {
    margin: auto;
}

.navbar nav input[type="text"] {
    padding: 7px 15px;
    border: none;
    border-radius: 3px;
    font-size: 18px;
    outline: none;
    color: #000000;
    background-color: #f8f9fa;
    transition: box-shadow 0.3s ease-in-out;
}

.navbar nav input[type="text"]:focus {
    box-shadow: 0 0 5px #f1e05a;
}

button#menu-toggle {
    display: none;
}

@media screen and (max-width: 768px) {
    .navbar {
        flex-direction: column;
        position: fixed;
        width: 100%;
        padding: 20px 0;
        gap: 10px;
        height: 8dvh;
        z-index: 1000;
        transition: all .8s ease-in-out;
    }

    .navbar.active {
        height: 40dvh;
    }

    .navbar nav {
        flex-direction: column;
        height: 100%;
        justify-content: space-evenly;
        gap: 10px;
        transform: translateY(-100vh);
        transition: transform 1s ease-in-out;
    }

    .navbar.active nav {
        transform: translateY(0);
    }


    .navbar nav a,
    .navbar nav input[type="text"],
    .navbar nav form {
        opacity: 0;
        transition: opacity .2s;
    }

    .navbar.active nav a,
    .navbar.active nav input[type="text"],
    .navbar.active nav form {
        opacity: 1;
        transition: opacity 2s ease-in-out;
    }

    button#menu-toggle {
        position: fixed;
        top: 15px;
        right: 15px;
        display: block;
        font-size: 24px;
        background-color: transparent;
        border: none;
        color: #ffffff;
        cursor: pointer;
    }

    button#menu-toggle:focus {
        outline: none;
    }
}

.contact-section {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
}

.contact-info {
    flex: 1;
    min-width: 300px;
}

.follow-us {
    flex: 1;
    min-width: 300px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.follow-us img {
    width: 40px;
    height: 40px;
}

footer.contact-section {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}

footer .contact-info,
footer .follow-us {
    flex: 1;
    min-width: 300px;
}

footer h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

footer p {
    margin: 5px 0;
    font-size: 18px;
    line-height: 1.5;
}

footer .follow-us {
    text-align: left;
}

footer .follow-us img {
    width: 40px;
    height: 40px;
    margin: 5px;
    cursor: pointer;
    transition: transform 0.2s;
}

footer .follow-us img:hover {
    transform: scale(1.1);
}

footer .social-icons {
    display: flex;
    gap: 10px;
}

@media screen and (max-width: 768px) {
    footer.contact-section {
        flex-direction: column;
        gap: 20px;
    }

    footer .contact-info,
    footer .follow-us {
        min-width: 100%;
        text-align: center;
        align-items: center;
    }

    footer .container {
        padding-top: 5rem;
    }
}
</style>
