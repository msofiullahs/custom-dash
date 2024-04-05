<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    status: String,
});

const form = useForm({});

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Email Verification" />

    <AuthenticationCard>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Email Verification</h2>
                <p>Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
                <p v-if="verificationLinkSent">A new verification link has been sent to the email address you provided in your profile settings.</p>
            </div>
        </div>

        <form @submit.prevent="submit" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">Resend Verification Email</button>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <Link
                            :href="route('profile.show')"
                            class="text-success"
                        >
                        Edit Profile</Link>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="text-danger"
                        >
                        Logout</Link>
                    </div>
                </div>
            </div>

        </form>
    </AuthenticationCard>
</template>
