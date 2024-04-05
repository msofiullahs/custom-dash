<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Sign Up</h2>
                <p>Enter your email and password to register</p>
            </div>
        </div>

        <form @submit.prevent="submit" class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control add-billing-address-input" v-model="form.name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" v-model="form.email">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="form.password">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" v-model="form.password_confirmation">
                </div>
            </div>

            <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="col-12">
                <div class="mb-3">
                    <div class="form-check form-check-primary form-check-inline">
                        <Checkbox id="terms" v-model:checked="form.terms" name="terms" required class="form-check-input me-3" />
                        <label class="form-check-label" for="terms">
                            I agree to the <a target="_blank" :href="route('terms.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" :href="route('policy.show')" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">SIGN UP</button>
                </div>
            </div>

        </form>

        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <p class="mb-0">Already registered? <a :href="route('login')" class="text-warning">Click here to sign in!</a></p>
                </div>
            </div>
        </div>

    </AuthenticationCard>
</template>
