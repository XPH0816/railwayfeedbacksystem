<script setup>
import RatingStats from '@/Components/Admin/RatingStats.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';

import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend, Colors } from 'chart.js';
import SectionCard from '@/Components/Home/SectionCard.vue';

ChartJS.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend, Colors);
ChartJS.defaults.font.family = 'cursive';

const props = defineProps({
    bestRailway: {
        type: Object,
        default: () => { },
    },
    worstRailway: {
        type: Object,
        default: () => { },
    },
    railways: {
        type: Array,
        default: () => [],
    },
});

const datacollection = {
    labels: [""],
    datasets: props.railways.map((railway) => ({
        label: railway.name,
        data: [railway.rating ?? 0],
        backgroundColor: `hsl(${Math.random() * 360}, 70%, ${50 + Math.random() * 40}%)`
    })),
};

const options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        x: {
            title: {
                display: true,
                text: 'Railway Lines',
                font: {
                    size: 16,
                    weight: 'bold',
                },
            },
        },
        y: {
            title: {
                display: true,
                text: 'Rating',
                font: {
                    size: 14,
                },
            },
            min: 0,
            max: 5,
            ticks: {
                stepSize: 1,
            },
        },
    },
    plugins: {
        legend: {
            labels: {
                display: false,
            },
        },
        title: {
            display: true,
            text: 'Railway Ratings',
            font: {
                size: 20,
            },
        },
    },
};
</script>

<template>
    <AdminLayout title="Dashboard">
        <h3 class="title">Dashboard</h3>
        <RatingStats :bestRailway="bestRailway" :worstRailway="worstRailway" />
        <div class="chart">
            <SectionCard height="400px" width="600px">
                <Bar :data="datacollection" :options="options" />
            </SectionCard>
        </div>
    </AdminLayout>
</template>

<style scoped>
.title {
    color: #444a53;
    font-size: 30px;
    margin-left: 3rem;
    font-weight: 700;
}

.chart {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

@media screen and (max-width: 768px) {
    .title {
        margin-left: 1rem;
    }

    .chart {
        display: block;
    }
}
</style>
