<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Input from '@/Components/Admin/Input.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title>
            Update Password
        </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div style="display: flex; gap: 10px; justify-content: space-around;" class="input-group">
                <div>
                    <Input id="current_password" ref="currentPasswordInput" label="Current Password"  v-model="form.current_password"
                        type="password" style="justify-content: space-evenly; gap: 1rem;" width="15vw" autocomplete="current-password" />
                    <InputError :message="form.errors.current_password" class="mt-2" />
                </div>

                <div>
                    <Input id="password" ref="passwordInput" v-model="form.password" label="New Password" type="password" width="15vw"
                        style="justify-content: center; gap: 1rem;" autocomplete="new-password" />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div>
                    <Input id="password_confirmation" label="Confirm Password" style="justify-content: center; gap: 1rem;" width="15vw" v-model="form.password_confirmation" type="password"
                        class="mt-1 block w-full" autocomplete="new-password" />
                    <InputError :message="form.errors.password_confirmation" class="mt-2" />
                </div>
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mt-2 me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton :style="{ opacity: form.processing ? 0.25 : 1 }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>

<style scoped>
.mt-1 {
    margin-top: 0.25rem;
}
.mt-2 {
    margin-top: 0.5rem;
}
@media screen and (max-width: 768px) {
    .input-group {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
}
</style>
