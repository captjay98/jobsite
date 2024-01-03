<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const form = useForm({
    firstname: "",
    lastname: "",
    username: "",
    email: "",
    account_type: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Register" />
        <div class="w-96 h-[90%] rounded-md">
            <div class="pt-3 mb-1 h-16 rounded-md bg-">
                <p class="my-2 text-lg font-semibold text-center text-blue-600">
                    Create a Free Account
                </p>
            </div>

            <div class="py-2 mb-4 w-full rounded-md">
                <form
                    @submit.prevent="submit"
                    class="m-auto rounded-md w-[90%] h-[80%] my-2 px-4 pt-4 pb-6"
                >
                    <div class="pt-2 m-auto text-center">
                        <div>
                            <div
                                class="flex justify-between mb-4 ml-3 text-black"
                            >
                                <div
                                    class="py-2 w-32 h-10 text-sm rounded-md border-2 border-blue-500"
                                    :class="{
                                        'bg-blue-500':
                                            form.account_type === 'seeker',
                                    }"
                                    @click="form.account_type = 'seeker'"
                                >
                                    Seeker
                                </div>

                                <div
                                    class="py-2 w-32 h-10 text-sm rounded-md border-2 border-blue-500"
                                    :class="{
                                        'bg-blue-500 shadow-2xl':
                                            form.account_type === 'employer',
                                    }"
                                    @click="form.account_type = 'employer'"
                                >
                                    Employer
                                </div>
                            </div>
                        </div>
                        <div v-show="form.errors.account_type">
                            <p class="text-sm text-red-500">
                                {{ form.errors.account_type }}
                            </p>
                        </div>

                        <div>
                            <input
                                class="my-2 mx-2 w-full h-9 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="text"
                                id="firstname"
                                placeholder="First Name"
                                v-model="form.firstname"
                                required
                            />
                            <div v-show="form.errors.firstname">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.firstname }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="my-2 mx-2 w-full h-9 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="text"
                                id="lastname"
                                placeholder="Last Name"
                                v-model="form.lastname"
                                required
                            />
                            <div v-show="form.errors.lastname">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.lastname }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="my-2 mx-2 w-full h-9 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="text"
                                id="username"
                                placeholder="Username"
                                v-model="form.username"
                                required
                                autocomplete="username"
                            />
                            <div v-show="form.errors.username">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.username }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="my-2 mx-2 w-full h-9 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="text"
                                id="email"
                                placeholder="Email"
                                v-model="form.email"
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
                            <input
                                class="my-2 mx-2 w-full h-9 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="password"
                                id="password"
                                placeholder="Password"
                                v-model="form.password"
                                required
                            />
                            <div v-show="form.errors.password">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.password }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="my-2 mx-2 w-full h-8 rounded-md shadow-xl border-slate-300 bg-slate-100"
                                type="password"
                                id="password_confirmation"
                                placeholder="Confirm Password"
                                v-model="form.password_confirmation"
                                required
                            />
                            <div v-show="form.errors.password_confirmation">
                                <p class="text-sm text-red-500">
                                    {{ form.errors.password_confirmation }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <button
                                class="py-1 px-2 my-4 mx-2 w-full text-white bg-blue-500 rounded-md shadow-xl"
                            >
                                Register
                            </button>
                        </div>
                        <Link :href="route('login')">
                            <p class="px-4 pt-2 text-xs text-left">
                                Already a Member?
                                <span class="text-blue-500"> Sign in.</span>
                            </p>
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
