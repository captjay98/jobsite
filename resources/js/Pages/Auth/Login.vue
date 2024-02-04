<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login")),
        {
            onFinish: () => form.reset("passowrd"),
        };
};
</script>
<template>
    <Head title="Login" />
    <GuestLayout>
        <div class="w-96">
            <div class="">
                <p class="text-sm text-center text-blue-500">Welcome Back!</p>
                <p
                    class="my-1 text-3xl font-semibold text-center text-gray-800"
                >
                    Member Login
                </p>
                <p class="mb-4 text-sm text-center">
                    Access to all features, No credit card required.
                </p>
            </div>
            <div class="py-2 px-2 my-4 w-full rounded-md bg-slate">
                <form
                    class="my-4 w-full text-gray-700 rounded-sm"
                    @submit.prevent="submit"
                >
                    <div class="m-auto w-full text-center">
                        <div class="">
                            <label for="email"></label>
                            <input
                                class="mx-2 my-2 border-slate-400 bg-slate-100 rounded-md w-[90%] m-auto shadow-xl"
                                type="text"
                                id="email"
                                v-model="form.email"
                                placeholder="Email"
                                required
                                autocomplete="email"
                            />
                            <div v-show="form.errors.email">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.email }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <label for="password"></label>
                            <input
                                class="mx-2 my-2 border-slate-400 bg-slate-100 rounded-md w-[90%] m-auto shadow-xl"
                                type="password"
                                id="password"
                                v-model="form.password"
                                placeholder="Password"
                                required
                            />
                            <div v-show="form.errors.password">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.password }}
                                </p>
                            </div>
                        </div>
                        <div class="flex justify-between py-2 px-4 text-xs">
                            <div class="">
                                <input
                                    class="mx-1 rounded-md"
                                    type="checkbox"
                                    id="Remember me"
                                />
                                <label for="email">remember me</label>
                            </div>
                            <Link :href="route('password.request')"
                                >Forgot password?</Link
                            >
                        </div>

                        <div>
                            <Button> Login </Button>
                        </div>
                        <Link :href="route('register')">
                            <p class="px-4 pt-2 text-xs text-left">
                                Don't have an account?
                                <span class="text-blue-500"> Sign up.</span>
                            </p>
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
