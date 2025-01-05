<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>

    <Head title="Forgot Password" />
    <div class="forgot-password-container">
        <div class="forgot-password-form">
            <Link :href="route('home')" style="display: block; text-align: left;">&lt; Back to Home</Link>
            <h1>Forgot Password</h1>
            <p>Enter your email address, and a reset link will be sent to your email.</p>
            <form @submit.prevent="submit">
                <div class="input-group">
                    <label for="email">Email Address</label>
                    <input v-model="form.email" type="email" id="email" placeholder="Enter your email" required />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <button type="submit" :style="{ opacity: form.processing ? 0.25 : 1 }" :disabled="form.processing">Send
                    Reset Link</button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.forgot-password-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.forgot-password-form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    width: 350px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    font-size: 26px;
    margin-bottom: 10px;
}

p {
    color: #555;
    margin-bottom: 20px;
    font-size: 14px;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
}

.input-group label {
    font-size: 14px;
    margin-bottom: 5px;
    color: #333;
    display: block;
}

input {
    width: calc(100% - 20px);
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: white;
    /* White textbox background */
    color: #333;
    /* Dark text for visibility */
}

input:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

a {
    text-decoration: none;
    color: #4CAF50;
}

a:hover {
    text-decoration: underline;
}
</style>
