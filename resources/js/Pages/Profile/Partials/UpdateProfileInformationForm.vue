<script setup>
import { ref } from 'vue';
import { Link, router, useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Input from '@/Components/Admin/Input.vue';

const props = defineProps({
    user: Object,
});

const form = useForm({
    _method: 'PUT',
    name: props.user.name,
    email: props.user.email,
    phone: props.user.phone,
    photo: null,
});

const verificationLinkSent = ref(null);
const photoPreview = ref(null);
const photoInput = ref(null);

const updateProfileInformation = () => {
    if (photoInput.value) {
        form.photo = photoInput.value.files[0];
    }

    form.post(route('user-profile-information.update'), {
        errorBag: 'updateProfileInformation',
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};

const sendEmailVerification = () => {
    verificationLinkSent.value = true;
};

const selectNewPhoto = () => {
    photoInput.value.click();
};

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];

    if (!photo) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    router.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoInput.value.value = null;
    }
};
</script>

<template>
    <FormSection @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input id="photo" ref="photoInput" type="file" class="hidden" @change="updatePhotoPreview">

                <InputLabel for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div v-show="!photoPreview" class="mt-2">
                    <img :src="user.profile_photo_url" :alt="user.name" class="rounded-full size-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'" />
                </div>

                <SecondaryButton class="mt-2 me-2" type="button" @click.prevent="selectNewPhoto">
                    Select A New Photo
                </SecondaryButton>

                <SecondaryButton v-if="user.profile_photo_path" type="button" class="mt-2" @click.prevent="deletePhoto">
                    Remove Photo
                </SecondaryButton>

                <InputError :message="form.errors.photo" class="mt-2" />
            </div>
            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <div>
                    <Input id="name" label="Name" v-model="form.name" type="text" width="20vw"
                        style="justify-content: center; gap: 1rem;" required autocomplete="name" />
                    <InputError :message="form.errors.name" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <Input id="email" label="Email" v-model="form.email" type="email" width="20vw"
                        style="justify-content: center; gap: 1rem;" required autocomplete="username" />
                    <InputError :message="form.errors.email" class="mt-2" />
                </div>

                <div>
                    <Input id="phone" label="Phone" v-model="form.phone" type="text" width="20vw"
                        style="justify-content: center; gap: 1rem;" :required="false" autocomplete="phone" />
                    <InputError :message="form.errors.phone" class="mt-2" />
                </div>
            </div>
            <div v-if="$page.props.jetstream.hasEmailVerification && user.email_verified_at === null">
                <p class="mt-2">
                    Your email address is unverified.

                    <Link :href="route('verification.send')" method="post" as="button" class="verification-link"
                        @click.prevent="sendEmailVerification">
                    Click here to re-send the verification email.
                    </Link>
                </p>

                <div v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                    A new verification link has been sent to your email address.
                </div>
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="mt-2 me-3">
                Saved.
            </ActionMessage>

            <PrimaryButton class="mt-1" :style="{ opacity: form.processing ? 0.25 : 1 }" :disabled="form.processing">
                Save
            </PrimaryButton>
        </template>
    </FormSection>
</template>

<style scoped>
.font-medium {
    font-weight: 500;
}
.text-sm {
    font-size: 0.875rem;
}
.text-green-600 {
    --tw-text-opacity: 1;
    color: rgba(16, 185, 129);
}

.mt-1 {
    margin-top: 0.25rem;
}

.mt-2 {
    margin-top: 0.5rem;
}

.mt-4 {
    margin-top: 1rem;
}

.verification-link {
    text-decoration: underline;
    font-size: 0.875rem;
    color: #4B5563;
    background-color: inherit;
    border: none;
}

.verification-link:hover {
    color: #1F2937;
}

.verification-link:focus {
    border-radius: 0.375rem;
    outline: none;
    box-shadow: 0 0 0 2px #6366F1;
}
</style>
