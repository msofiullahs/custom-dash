<script setup>
import { nextTick, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const recovery = ref(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const recoveryCodeInput = ref(null);
const codeInput = ref(null);

const toggleRecovery = async () => {
    recovery.value ^= true;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = '';
    } else {
        codeInput.value.focus();
        form.recovery_code = '';
    }
};

const submit = () => {
    form.post(route('two-factor.login'));
};
</script>

<template>
    <Head title="Two-factor Confirmation" />

    <AuthenticationCard>

        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>2FA Confirmation</h2>
                <p v-if="! recovery">Please confirm access to your account by entering the authentication code provided by your authenticator application.</p>
                <p v-else>Please confirm access to your account by entering one of your emergency recovery codes.</p>
            </div>
        </div>

        <form @submit.prevent="submit" class="row">

            <div v-if="! recovery" class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Code</label>
                    <input type="text" class="form-control" v-model="form.code">
                </div>
            </div>

            <div v-else class="col-md-12">
                <div class="mb-3">
                    <label class="form-label">Recovery Code</label>
                    <input type="text" class="form-control" v-model="form.recovery_code">
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <button type="submit" class="btn btn-primary w-100" :disabled="form.processing">
                            <template v-if="! recovery">
                                Use a recovery code
                            </template>

                            <template v-else>
                                Use an authentication code
                            </template>
                        </button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button type="submit" class="btn btn-secondary w-100" :disabled="form.processing">Sign In</button>
                    </div>
                </div>
            </div>

        </form>
    </AuthenticationCard>
</template>
