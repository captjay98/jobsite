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
    <GuestLayout>
        <div class="w-96">
            <div class="">
                <p class="text-sm text-center text-blue-500">Welcome Back!</p>
                <p class="text-3xl my-1 text-center font-semibold text-gray-800">Member Login</p>
                <p class="text-sm text-center mb-4">
                    Access to all features, No credit card required.
                </p>
            </div>
            <div class="w-full bg-slate rounded-md px-2 py-2 my-4">
                <form class="w-full my-4 text-gray-700 rounded-sm" @submit.prevent="submit">
                    <div class="text-center m-auto w-full">
                        <div class="">
                            <label for="email"></label>
                            <input
                                class="mx-2 my-2 border-slate-400 bg-slate-100 rounded-md w-[90%] m-auto shadow-xl"
                                type="text"
                                name="email"
                                v-model="form.email"
                                placeholder="Email"
                                required
                            />
                            <div v-show="form.errors.email">
                                <p class="text-sm text-red-500">{{ form.errors.email }}</p>
                            </div>
                        </div>
                        <div>
                            <label for="password"></label>
                            <input
                                class="mx-2 my-2 border-slate-400 bg-slate-100 rounded-md w-[90%] m-auto shadow-xl"
                                type="password"
                                name="password"
                                v-model="form.password"
                                placeholder="Password"
                                required
                            />
                            <div v-show="form.errors.password">
                                <p class="text-sm text-red-500">{{ form.errors.password }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between px-4 py-2 text-xs">
                            <div class="">
                                <input class="rounded-md mx-1" type="checkbox" id="Remember me" />
                                <label for="email">remember me</label>
                            </div>
                            <Link :href="route('password.request')">Forgot password?</Link>
                        </div>

                        <div>
                            <Button> Login </Button>
                        </div>
                        <Link :href="route('register')"
                            ><p class="text-xs text-left px-4 pt-2">
                                Don't have an account?
                                <span class="text-blue-500"> Sign up.</span>
                            </p></Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
