<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import InputError from '@/Components/InputError.vue';
import UserIcon from '@/Components/icons/UserIcon.vue';
import EmailIcon from "@/Components/icons/EmailIcon.vue";
import EyeIcon from "@/Components/icons/EyeIcon.vue";
import EyeSlash from "@/Components/icons/EyeSlash.vue";
import LockCheck from "@/Components/icons/LockCheck.vue";
const passwordVisible = ref(false);

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

function togglePasswordVisibility() {
    passwordVisible.value = !passwordVisible.value;
}

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<!-- <template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />
                <TextInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="name"
                />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />
                <TextInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />
                <TextInput
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="new-password"
                />
                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="mt-4">
                <InputLabel for="terms">
                    <div class="flex items-center">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required />

                        <div class="ms-2">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </div>
                    </div>
                    <InputError class="mt-2" :message="form.errors.terms" />
                </InputLabel>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Already registered?
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template> -->

<template>

    <Head title="Register" />

    <div class="register-container">
        <div class="register-form">
            <Link :href="route('home')" class="back-home">&lt; BACK TO HOME</Link>
            <h1>REGISTER</h1>
            <form @submit.prevent="submit">
                <div class="input-group">
                    <div class="input-wrapper">
                        <input id="name" v-model="form.name" type="text" required autofocus autocomplete="name"
                            placeholder="Enter your Name" />
                        <UserIcon class="icon" />
                    </div>
                    <InputError :message="form.errors.name" />
                </div>

                <div class="input-group">
                    <div class="input-wrapper">
                        <input id="email" v-model="form.email" type="email" required autocomplete="username"
                            placeholder="Enter your email" />
                        <EmailIcon class="icon" />
                    </div>
                    <InputError :message="form.errors.email" />
                </div>

                <div class="input-group">
                    <div class="input-wrapper">
                        <input id="password" v-model="form.password" required autocomplete="new-password"
                            :type="passwordVisible ? 'text' : 'password'" placeholder="Enter your password" />
                        <EyeIcon v-if="passwordVisible" class="icon" @click="togglePasswordVisibility"
                            style="cursor: pointer;" />
                        <EyeSlash v-else class="icon" @click="togglePasswordVisibility" style="cursor: pointer;" />
                    </div>
                    <InputError :message="form.errors.password" />
                </div>

                <div class="input-group">
                    <div class="input-wrapper">
                        <input id="password_confirmation" v-model="form.password_confirmation"
                            autocomplete="new-password" :type="passwordVisible ? 'text' : 'password'"
                            placeholder="Confirm your password" />
                        <LockCheck class="icon" />
                    </div>
                    <InputError :message="form.errors.password_confirmation" />
                </div>
                <button type="submit" :style="{ opacity: form.processing ? 0.25 : 1 }" :disabled="form.processing">SIGN
                    UP</button>
            </form>

            <p class="login-link">
                Already have an account?
                <Link :href="route('login')">Login</Link>
            </p>
        </div>
    </div>
</template>

<style scoped>
* {
    font-family: 'Comic Neue', 'Comic Sans MS', cursive, sans-serif;
}

.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: white;
}

.register-form {
    background: #ffffff;
    width: 400px;
    padding: 50px;
    border-radius: 34px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    text-align: center;
}

.back-home {
    display: block;
    text-align: left;
    font-size: 16px;
    color: #4CAF50;
    text-decoration: none;
    margin-bottom: 20px;
}

h1 {
    color: #333;
    font-size: 26px;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    gap: 20px;
    align-items: center;
    width: 100%;
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
    height: 48px; /* Fixed height to prevent layout shifts */
}

.input-wrapper input {
    width: 100%;
    padding: 12px;
    padding-right: 40px; /* Ensure enough space for the icon */
    border: 1px solid #000000;
    border-radius: 8px;
    font-size: 16px;
    box-sizing: border-box;
}

.input-wrapper .icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 18px;
    color: #000000;
}

input:focus {
    outline: none;
    border-color: #4CAF50;
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

.login-link {
    margin-top: 20px;
    color: #333;
}

.login-link a {
    color: #4CAF50;
}

.login-link a:hover {
    text-decoration: underline;
}
</style>
