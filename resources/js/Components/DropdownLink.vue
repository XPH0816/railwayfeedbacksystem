<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    href: String,
    as: String,
    style: String,
});
</script>

<template>
    <div>
        <button v-if="as == 'button'" type="submit" class="button" :style="style">
            <slot />
        </button>

        <a v-else-if="as =='a'" :href="href" class="link" :style="style">
            <slot />
        </a>

        <Link v-else :href="href" class="link">
            <slot />
        </Link>
    </div>
</template>

<style scoped>
.button {
    display: block;
    width: 100%;
    padding: 0.5rem 1rem;
    text-align: start;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: #4a5568;
    background-color: transparent;
    border: none;
    cursor: pointer;
    transition: background-color 0.15s ease-in-out;
}

.button:hover,
.button:focus {
    background-color: #f7fafc;
    outline: none;
}

.link {
    display: block;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    color: #4a5568;
    text-decoration: none;
    transition: background-color 0.15s ease-in-out;
}

.link:hover,
.link:focus {
    background-color: #f7fafc;
    outline: none;
}
</style>
