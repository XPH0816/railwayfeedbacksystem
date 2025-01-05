<script setup>
import TextInput from '@/Components/TextInput.vue';
import { useForm } from '@inertiajs/vue3';
import { watch, computed, ref } from 'vue';
import InputError from '../InputError.vue';

const props = defineProps({
    title: {
        type: String,
        default: "Station Feedback",
    },
    user: Object,
    lines: Array,
});

const form = useForm({
    username: props.user ? props.user.name : "",
    email: props.user ? props.user.email : "",
    rating: 3,
    content: "",
    railway_id: props.lines[0].id,
})

let availableServiceStations = computed(() => {
    return form.railway_id ? props.lines[form.railway_id - 1].stations : [];
});

let selectedStation = ref(availableServiceStations.value[0].id);

watch(() => form.railway_id, () => {
    selectedStation.value = form.railway_id ? availableServiceStations.value[0].id : "";
});

const submit = () => {
    form.post(route('feedback.store'), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset()
            props.user ? form.username = props.user.name : "";
            props.user ? form.email = props.user.email : "";
        },
        onError: () => console.log(form.errors),
    });
};

</script>

<template>
    <form @submit.prevent="submit" class="feed-form feed-form-stacked feedback-form">
        <!-- Form Section -->
        <div class="form-section">
            <h1>{{ props.title }}</h1>
            <div class="pure-form pure-form-stacked">
                <fieldset>
                    <legend>Passenger Information</legend>
                    <TextInput label="Name" v-model="form.username" title="Name" :readonly="$page.props.auth.user" />
                    <InputError :message="form.errors.username" />
                    <TextInput label="Email" v-model="form.email" title="Email" :readonly="$page.props.auth.user" />
                    <InputError :message="form.errors.email" />
                </fieldset>
                <div>
                    <fieldset>
                        <legend for="serviceLine">Service Line</legend>
                        <label v-for="line in props.lines" :key="line.id">
                            <input type="radio" name="serviceLine" :value="line.id" v-model="form.railway_id" />
                            {{ line.name }}
                        </label>
                    </fieldset>

                    <!-- Service Line Dropdown -->
                    <div class="form-group">
                        <label for="serviceStation">Service Station</label>
                        <select id="serviceStation" class="pure-input-1" v-model="selectedStation">
                            <option v-for="station in availableServiceStations" :key="station.id" :value="station.id">{{
                                station.name
                            }}</option>
                        </select>
                    </div>

                    <!-- Feedback Sliders -->
                    <div class="form-group">
                        <label for="rating">Service Rating</label>
                        <input id="rating" type="range" min="1" max="5" v-model="form.rating" class="slider" />
                        <span class="slider-labels">
                            <span v-for="i in 5" :key="i">{{ i }}</span>
                        </span>
                    </div>

                    <!-- Feedback Text -->
                    <div class="form-group">
                        <label for="feedback">Your Feedback</label>
                        <textarea id="feedback" placeholder="Write your feedback here..." class="pure-input-1"
                            v-model="form.content"></textarea>
                        <InputError :message="form.errors.content" />
                    </div>

                    <!-- Saved Feedback Message -->
                    <Transition name="fade">
                        <div v-show="form.recentlySuccessful" class="saved-feedback-message">
                            Feedback saved successfully!
                        </div>
                    </Transition>

                    <button type="submit" class="pure-btn button-primary"
                        :style="{ opacity: form.processing ? 0.5 : 1 }" :disabled="form.processing">
                        Submit Feedback
                    </button>
                </div>
            </div>
        </div>
    </form>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}

.saved-feedback-message {
    background-color: lightgreen;
    color: white;
    padding: 10px;
    width: 20vw;
    margin: auto;
    border-radius: 5px;
    margin-top: 10px;
    margin-bottom: 10px;
    text-align: center;
}

h1 {
    text-align: center;
    color: #0073e6;
}

.pure-form-stacked fieldset {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 5px;
    background: #f9f9f9;
    display: flex;
    gap: 5rem;
    font-size: 22px;
}

.pure-form-stacked input {
    padding: .8rem;
    border-radius: 10px;
}

/* Form Container */
.feedback-form {
    padding: 20px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 1.3rem;
}

/* Custom styles */
.form-group {
    margin-bottom: 20px;
}

.pure-input-1 {
    width: 100%;
    padding: 8px;
    font-size: 1.2rem;
    border-radius: 4px;
    border: 1px solid #ddd;
}

/* Slider styles */
.pure-form-stacked input.slider {
    padding: initial;
    width: 100%;
    height: 15px;
    background: #ddd;
    outline: none;
    opacity: 0.7;
    transition: opacity .2s;
    border-radius: 5px;
}

.pure-form-stacked input.slider:hover {
    opacity: 1;
}

fieldset {
    border: none;
    margin-bottom: 25px;
}

legend {
    font-weight: bold;
    font-size: 2rem;
}

label {
    margin-right: 20px;
}

input[type="radio"] {
    margin-right: 5px;
}

/* Slider Labels */
.slider-labels {
    display: flex;
    justify-content: space-between;
    color: #000000;
    margin-top: 3px;
}

/* Custom Button Style */
.button-primary {
    width: 100%;
    padding: 10px;
    background-color: #0073e6;
    color: white;
    border: 1px solid #005bb5;
    border-radius: 5px;
    font-size: 1.4rem;
}

.button-primary:hover {
    background-color: #005bb5;
}

@media screen and (max-width: 768px) {
    .feedback-form {
        padding: 10px;
    }

    .input-1 {
        font-size: 1rem;
    }

    legend {
        font-size: 1.6rem;
    }

    label {
        font-size: 1.2rem;
    }

    .slider-labels {
        font-size: 1.2rem;
    }

    .button-primary {
        padding: 8px;
        font-size: 1.2rem;
    }

    .pure-form-stacked fieldset {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    h1 {
        font-size: 1.6em;
    }

    .saved-feedback-message {
        width: 80vw;
    }
}
</style>
