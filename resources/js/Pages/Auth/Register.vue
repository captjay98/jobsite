<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const form = useForm({
    firstname: "",
    lastname: "",
    username: "",
    email: "",
    accounttype: "",
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
            <div class="bg- rounded-md h-16 pt-3 mb-1">
                <p class="text-lg my-2 font-semibold text-center text-blue-600">
                    Create a Free Account
                </p>
            </div>

            <div class="w-full rounded-md py-2 mb-4">
                <form
                    @submit.prevent="submit"
                    class="m-auto rounded-md w-[90%] h-[80%] my-2 px-4 pt-4 pb-6"
                >
                    <div class="text-center m-auto pt-2">
                        <div>
                            <div class="text-black mb-4 ml-3 flex justify-between">
                                <div
                                    class="py-2 border-2 border-blue-500 text-sm w-32 h-10 rounded-md"
                                    :class="{ 'bg-blue-500': form.accounttype === 'seeker' }"
                                    @click="form.accounttype = 'seeker'"
                                >
                                    <label for="seeker">Seeker</label>
                                </div>

                                <div
                                    class="py-2 border-2 border-blue-500 text-sm w-32 h-10 rounded-md"
                                    :class="{
                                        'bg-blue-500 shadow-2xl': form.accounttype === 'employer',
                                    }"
                                    @click="form.accounttype = 'employer'"
                                >
                                    <label for="employer">Employer</label>
                                </div>
                            </div>
                        </div>
                        <div v-show="form.errors.accounttype">
                            <p class="text-sm text-red-500">{{ form.errors.accounttype }}</p>
                        </div>

                        <div>
                            <input
                                class="mx-2 border-slate-300 bg-slate-100 my-2 w-full h-9 rounded-md shadow-xl"
                                type="text"
                                id="firstname"
                                placeholder="First Name"
                                v-model="form.firstname"
                                required
                            />
                            <div v-show="form.errors.firstname">
                                <p class="text-sm text-red-500">{{ form.errors.firstname }}</p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="mx-2 my-2 border-slate-300 bg-slate-100 w-full h-9 rounded-md shadow-xl"
                                type="text"
                                id="lastname"
                                placeholder="Last Name"
                                v-model="form.lastname"
                                required
                            />
                            <div v-show="form.errors.lastname">
                                <p class="text-sm text-red-500">{{ form.errors.lastname }}</p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="mx-2 my-2 w-full border-slate-300 bg-slate-100 h-9 rounded-md shadow-xl"
                                type="text"
                                id="username"
                                placeholder="Username"
                                v-model="form.username"
                                required
                            />
                            <div v-show="form.errors.username">
                                <p class="text-sm text-red-500">{{ form.errors.username }}</p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="mx-2 my-2 w-full border-slate-300 bg-slate-100 h-9 rounded-md shadow-xl"
                                type="text"
                                id="email"
                                placeholder="Email"
                                v-model="form.email"
                                required
                            />
                            <div v-show="form.errors.email">
                                <p class="text-sm text-red-500">{{ form.errors.email }}</p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="mx-2 my-2 w-full border-slate-300 bg-slate-100 h-9 rounded-md shadow-xl"
                                type="password"
                                id="password"
                                placeholder="Password"
                                v-model="form.password"
                                required
                            />
                            <div v-show="form.errors.password">
                                <p class="text-sm text-red-500">{{ form.errors.password }}</p>
                            </div>
                        </div>
                        <div>
                            <input
                                class="mx-2 my-2 w-full border-slate-300 bg-slate-100 h-8 rounded-md shadow-xl"
                                type="password"
                                id="password"
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
                                class="w-full bg-blue-500 mx-2 my-4 px-2 py-1 rounded-md text-white shadow-xl"
                            >
                                Register
                            </button>
                        </div>
                        <Link :href="route('login')"
                            ><p class="text-xs text-left px-4 pt-2">
                                Already a Member? <span class="text-blue-500"> Sign in.</span>
                            </p></Link
                        >
                    </div>
                </form>
            </div>
        </div>
    </GuestLayout>
</template>
