<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />

        <div class="w-96">
            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Enter your email address and we will email you a
                password reset link.
            </div>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit">
                <div>
                    <input
                        placeholder="Email"
                        id="email"
                        type="email"
                        class="mt-1 rounded-md w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />
                </div>
                <div v-if="form.errors.email">{{ form.errors.email }}</div>

                <div class="flex items-center justify-center mt-4">
                    <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Email Password Reset Link
                    </Button>
                </div>
            </form>
        </div>
    </GuestLayout>
</template>
