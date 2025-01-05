<script setup>
import HeroSection from '@/components/HeroSection.vue';
import RegisterSection from '@/components/RegisterSection.vue';
import FeedbackSection from '@/components/FeedbackSection.vue';
import NewsEvents from '@/components/NewsEvents.vue';
import SectionCard from '@/components/SectionCard.vue';
</script>

<template>
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
</template>
