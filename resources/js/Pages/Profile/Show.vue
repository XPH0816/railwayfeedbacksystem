<script setup>
import DeleteUserForm from '@/Pages/Profile/Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Profile/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Profile/Partials/UpdateProfileInformationForm.vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
import SectionCard from '@/Components/Home/SectionCard.vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
    <AdminLayout title="Profile" v-if="$page.props.auth.user.role === 'admin'">
        <h2>
            Profile
        </h2>
        <SectionCard v-if="$page.props.jetstream.canUpdateProfileInformation">
            <UpdateProfileInformationForm :user="$page.props.auth.user" />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.canUpdatePassword">
            <UpdatePasswordForm />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
            <TwoFactorAuthenticationForm :requires-confirmation="confirmsTwoFactorAuthentication" />
        </SectionCard>

        <SectionCard>
            <LogoutOtherBrowserSessionsForm :sessions="sessions" />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.hasAccountDeletionFeatures">
            <DeleteUserForm />
        </SectionCard>
    </AdminLayout>
    <HomeLayout title="Profile" v-else>
        <h2>
            Profile
        </h2>
        <SectionCard v-if="$page.props.jetstream.canUpdateProfileInformation">
            <UpdateProfileInformationForm :user="$page.props.auth.user" />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.canUpdatePassword">
            <UpdatePasswordForm />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
            <TwoFactorAuthenticationForm :requires-confirmation="confirmsTwoFactorAuthentication" />
        </SectionCard>

        <SectionCard>
            <LogoutOtherBrowserSessionsForm :sessions="sessions" />
        </SectionCard>

        <SectionCard v-if="$page.props.jetstream.hasAccountDeletionFeatures">
            <DeleteUserForm />
        </SectionCard>
    </HomeLayout>
</template>
