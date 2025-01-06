<script setup>
import HomeLayout from '@/Layouts/HomeLayout.vue';
import FeedbackTable from '@/Components/Home/FeedbackTable.vue';
import SectionCard from '@/Components/Home/SectionCard.vue';

defineProps({
    feedbacks: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <HomeLayout title="History">
        <div>
            <h1>History</h1>
        </div>
        <SectionCard>
            <FeedbackTable :feedbacks="feedbacks" />
        </SectionCard>
    </HomeLayout>
</template>
