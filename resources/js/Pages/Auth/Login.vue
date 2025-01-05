<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />

    <div class="container">
        <div class="login-container">
            <Link :href="route('home')" class="back-home">&lt; BACK TO HOME</Link>
            <h1>LOGIN</h1>
            <form @submit.prevent="submit">
                <div class="input-group">
                    <div class="input-wrapper">
                        <input id="email" v-model="form.email" type="email" placeholder="Enter your email" required
                            autofocus autocomplete="username">
                        <span class="icon">&#128100;</span>
                    </div>
                    <InputError :message="form.errors.email" />
                </div>
                <div class="input-group">
                    <div class="input-wrapper">
                    <input id="password" v-model="form.password" type="password" required
                        placeholder="Enter your password" autocomplete="current-password">
                    <span class="icon">&#128274;</span>
                    </div>
                    <InputError :message="form.errors.password" />
                </div>
                <div class="options">
                    <label>
                        <input type="checkbox" v-model="form.remember" name="remember"> REMEMBER ME
                    </label>
                    <Link v-if="canResetPassword" :href="route('password.request')">FORGOT PASSWORD?</Link>
                </div>
                <button type="submit" :style="{ opacity: form.processing ? 0.25 : 1 }"
                    :disabled="form.processing">LOGIN</button>
                <p class="register-text">
                    DOESN'T HAVE ANY ACCOUNT?
                    <Link :href="route('register')">REGISTER</Link>
                </p>
            </form>
        </div>
    </div>
</template>

<style scoped>
* {
    font-family: 'Comic Neue', 'Comic Sans MS', cursive, sans-serif;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100dvh;
}

@media screen and (max-width: 768px) {
    .container {
        padding: 0 20px;
    }
}

.login-container {
    background: #ffffff;
    width: 400px;
    padding: 50px;
    border-radius: 34px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    /* font-family: 'Comic Sans MS', cursive, sans-serif; */
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.input-group {
    width: 100%;
    /* Ensure input group takes full width */
    position: relative;
    /* Position relative for icon positioning */
}

.input-group label {
    color: #333;
    text-align: left;
    font-size: 14px;
    display: block;
}

.input-wrapper {
    position: relative;
    width: 100%;
    height: 48px;
    /* Fixed height to prevent layout shifts */
}

.input-wrapper input {
    width: 100%;
    padding: 12px;
    padding-right: 40px;
    /* Ensure enough space for the icon */
    border: 1px solid #000000;
    border-radius: 8px;
    font-size: 16px;
    box-sizing: border-box;
}

.input-wrapper .icon {
    position: absolute;
    right: 10px;
    top: 42.5%;
    transform: translateY(-50%);
    font-size: 18px;
    color: #000000;
}

.options {
    display: flex;
    justify-content: space-between;
    font-size: 14px;
}

.options label {
    cursor: pointer;
}

.options a {
    font-weight: bold;
    text-decoration: none;
    color: #4CAF50;
}

.options a:hover {
    text-decoration: underline;
}

.back-home {
    display: block;
    text-align: left;
    font-size: 16px;
    color: #4CAF50;
    text-decoration: none;
    margin-bottom: 20px;
}

button {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    padding: 12px;
    width: 100%;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

.register-text {
    font-size: 1rem;
}

.register-text a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: bold;
}

.register-text a:hover {
    text-decoration: underline;
}

@media screen and (max-width: 768px) {
    .login-container {
        width: 80%;
    }
}
</style>
