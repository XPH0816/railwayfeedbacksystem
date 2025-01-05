<script setup>
import { Head } from '@inertiajs/vue3';
import Sidebar from '@/Components/Admin/Sidebar.vue';
import Navbar from '@/Components/Admin/Navbar.vue';

defineProps({
    title: String,
});
</script>

<template>

    <Head :title="title">
        <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    </Head>

    <Sidebar />
    <main>
        <section id="interface" class="content">
            <Navbar />
            <slot />
        </section>
    </main>
</template>

<style>
:root {
    --sidebar-width: 78px;
}
</style>
<style scoped>
main {
    padding: 0 3em 3em;
}

#interface {
    margin-left: var(--sidebar-width);
}

@media screen and (max-width: 768px) {
    main {
        padding: 0 1em 1em;
    }
}

.content {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
</style>
