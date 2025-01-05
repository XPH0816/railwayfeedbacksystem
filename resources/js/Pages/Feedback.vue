<script setup>
import { ref } from "vue";
import PassengerInfo from "@/Components/Feedback/PassengerInfo.vue";
import RailwayFeedback from "@/Components/Feedback/RailwayFeedback.vue";
import StationFeedback from "@/Components/Feedback/StationFeedback.vue";
import SectionCard from "@/Components/Home/SectionCard.vue";
import HomeLayout from "@/Layouts/HomeLayout.vue";
import { Head } from "@inertiajs/vue3";
const currentTab = ref("Railway"); // Default tab

defineProps({
    lines: Array,
});
</script>

<template>
    <Head title="Feedback" />
    <HomeLayout>
        <!-- Tab Navigation -->
        <div class="tabs">
            <button type="button" :class="['pure-btn', currentTab === 'Railway' ? 'active' : '']"
                @click.prevent="currentTab = 'Railway'">
                Railway
            </button>
            <button type="button" :class="['pure-btn', currentTab === 'Station' ? 'active' : '']"
                @click.prevent="currentTab = 'Station'">
                Station
            </button>
        </div>

        <!-- Tab Content -->
        <SectionCard>
            <PassengerInfo :title="currentTab === 'Railway' ? 'Railway Service' : 'Station Facilities'" />
        </SectionCard>
        <RailwayFeedback v-if="currentTab === 'Railway'" title="Railway Service Feedback" :user="$page.props.auth.user" :lines="lines"  />
        <StationFeedback v-if="currentTab === 'Station'" title="Station Facilities Feedback" :user="$page.props.auth.user" :lines="lines" />
    </HomeLayout>
</template>

<style scoped>
/* Tabs Container */
.tabs {
    display: flex;
    justify-content: space-evenly;
}

/* Pure.css Button Customization for Tabs */
.pure-btn {
    padding: 1% 10%;
    background-color: #f2f2f2;
    color: #333;
    border-radius: 5px;
    border: 1px solid #ddd;
    font-size: 1.6rem;
    transition: background-color 0.3s, color 0.3s;
    cursor: pointer;
}

/* Adjust button sizes for smaller or larger screens */
@media (max-width: 768px) {
    .pure-btn {
        padding: 3dvw 8dvw;
    }

    .pure-btn:hover {
        background-color: #0073e6;
        color: #fff;
    }
}

/* Active Tab Style */
.pure-btn.active {
    background-color: #0073e6;
    color: white;
    border: 1px solid #005bb5;
}

/* Tab Content Styling */
.tab-content {
    padding: 40px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
</style>
