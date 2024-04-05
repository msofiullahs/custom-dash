<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

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
    <Head title="Sign in" />

    <AuthenticationCard>

        <div class="row">
            <div v-if="status" class="col-12 mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <div class="col-md-12 mb-3">
                <h2>Sign In</h2>
                <p>Enter your email and password to login</p>
            </div>
        </div>
        <form @submit.prevent="submit" class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="form.email">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="form.password">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <div class="form-check form-check-primary form-check-inline">
                        <Checkbox v-model:checked="form.remember" name="remember" class="form-check-input me-3" id="form-check-default" />
                        <label class="form-check-label" for="form-check-default">
                            Remember me
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">SIGN IN</button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <p class="mb-0">Forgot your password? <a v-if="canResetPassword" :href="route('password.request')" class="text-warning">Reset here!</a></p>
                </div>
            </div>
        </div>
    </AuthenticationCard>
</template>
