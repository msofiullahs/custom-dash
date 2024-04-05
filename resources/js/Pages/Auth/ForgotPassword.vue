<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

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

    <AuthenticationCard>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Forgot Password</h2>
                <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            </div>

            <div v-if="status" class="col-md-12 mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
        </div>

        <form @submit.prevent="submit" class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control add-billing-address-input" v-model="form.email">
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">Email Password Reset Link</button>
            </div>
        </form>
    </AuthenticationCard>
</template>
