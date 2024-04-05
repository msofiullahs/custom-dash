<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    password: '',
});

const passwordInput = ref(null);

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <AuthenticationCard>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Secure Area</h2>
                <p>This is a secure area of the application. Please confirm your password before continuing.</p>
            </div>
        </div>

        <form @submit.prevent="submit" class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" v-model="form.password">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-4">
                    <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">CONFIRM</button>
                </div>
            </div>

        </form>
    </AuthenticationCard>
</template>
