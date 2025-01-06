<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    email: String,
    token: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Reset Password" />

    <div class="reset-password-container">
        <div class="reset-password-form">
            <h1>Reset Password</h1>
            <form @submit.prevent="submit">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input autocomplete="username" v-model="form.email" type="email" id="email"
                        placeholder="Enter your email address" required autofocus />
                </div>
                <div class="input-group">
                    <label for="newPassword">New Password</label>
                    <input v-model="form.password" type="password" id="newPassword"
                        placeholder="Enter your new password" required autocomplete="new-password" />
                </div>
                <div class="input-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input v-model="form.password_confirmation" type="password" id="confirmPassword"
                        placeholder="Confirm your new password" required autocomplete="new-password" />
                </div>
                <button type="submit" :style="{ opacity: form.processing ? 0.25 : 1 }" :disabled="form.processing">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</template>

<style scoped>
.reset-password-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
}

.reset-password-form {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    width: 350px;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

h1 {
    color: #333;
    font-size: 26px;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
    text-align: left;
    /* Ensures labels are aligned to the left */
}

.input-group label {
    color: #333;
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
    /* Adds spacing between label and input box */
}

input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-top: 0;
    background-color: white;
    /* Ensures the textbox is white */
    color: #333;
    /* Dark text for contrast */
}

input:focus {
    outline: none;
    border-color: #4CAF50;
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
</style>
