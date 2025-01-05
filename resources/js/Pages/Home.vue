<script setup>
import SectionCard from '@/Components/Home/SectionCard.vue';
import HeroSection from '@/Components/Home/HeroSection.vue';
import RegisterSection from '@/Components/Home/RegisterSection.vue';
import FeedbackSection from '@/Components/Home/FeedbackSection.vue';
import NewsEvents from '@/Components/Home/NewsEvents.vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
</script>

<template>
    <HomeLayout title="Home">
        <SectionCard>
            <HeroSection />
        </SectionCard>
        <SectionCard>
            <RegisterSection />
        </SectionCard>
        <SectionCard>
            <FeedbackSection />
        </SectionCard>
        <SectionCard>
            <NewsEvents />
        </SectionCard>
    </HomeLayout>

</template>
