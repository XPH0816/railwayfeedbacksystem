<script setup>
defineProps({
    bestRailway: {
        type: Object,
        default: () => {},
    },
    worstRailway: {
        type: Object,
        default: () => {},
    },
});
</script>

<template>
    <div class="interface">
        <div class="values">
            <div class="val-box">
                <i class="bx bx-train"></i>
                <div>
                    <h3>{{ bestRailway.name }}</h3>
                    <span>Best Railway</span>
                </div>
            </div>
            <div class="val-box">
                <i class="bx bxs-train"></i>
                <div>
                    <h3>{{ worstRailway.name }}</h3>
                    <span>Worst Railway</span>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.values {
    /* padding: 30px 30px 0 30px; */
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-wrap: wrap;
    gap: 20px;
}

.values .val-box {
    background: white;
    width: 280px;
    padding: 16px 20px;
    border-radius: 5px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.values .val-box i {
    font-size: 25px;
    width: 60px;
    height: 60px;
    line-height: 60px;
    border-radius: 50%;
    text-align: center;
    color: white;
    margin-right: 15px;
}

.values .val-box:nth-child(1) i {
    background: palevioletred;
}

.values .val-box:nth-child(2) i {
    background: powderblue;
}

.values .val-box:nth-child(3) i {
    background: greenyellow;
}

.values .val-box:nth-child(4) i {
    background: rgb(227, 47, 255);
}

.values .val-box h3 {
    font-size: 18px;
    font-weight: 600;
}

.values .val-box span {
    font-size: 15px;
    color: #828997;
}

button.val-box {
    background: none;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    margin: 5px;
}

button.val-box:hover {
    background-color: #f1f1f1;
}

button.val-box:active {
    transform: scale(0.98);
}

@media screen and (max-width: 768px) {
    .values {
        flex-direction: column;
    }
}
</style>
