<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";

const { user } = defineProps({
    user: Object,
});

const form = useForm({
    isactive: "",
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-1 m-auto bg-gray-100">
            <div
                class="flex justify-between items-center mb-2 mt-1 m-auto w-[99%] px-4 py-1 bg-white rounded-md"
            >
                <h1 class="text-xl text-left font-semibold py-4">User Details</h1>
                <!-- <form @submit.prevent="updateApplication"> -->
                <form>
                    <div class="text-sm text-left py-8 px-2 grid">
                        <select
                            class="focus:outline-0 ring-0 focus:ring-0 text-sm flex w- bg-gray-100 border-inherit shadow-2xl rounded-md font-"
                            :class="{
                                'bg-green-200': user.isactive == 'true',
                                'bg-red-400': user.isactive == 'false',
                            }"
                            id="status"
                            v-model="user.isactive"
                        >
                            <option value="true">Active</option>
                            <option value="false">InActive</option>
                        </select>
                        <div v-show="form.errors.isactive">
                            <p class="text-sm my-2 text-red-500">
                                {{ form.errors.isactive }}
                            </p>
                        </div>
                        <Link
                            :href="route('admin.users.deactivate', user.id)"
                            as="button"
                            method="put"
                            type="button"
                            :data="{ isactive: user.isactive }"
                        >
                            <p class="bg-blue-500 px-1 py-1 my-1 rounded-md text-center text-white">
                                Update Status
                            </p>
                            <!-- {{ console.log({ user: user.isactive }) }} -->
                        </Link>
                    </div>
                </form>
            </div>

            <div class="bg-white my-8 w-[99%] m-auto rounded-md">
                <form class="my-10 rounded-md pb-8">
                    <div class="pt-12 pb-4 mx-4 my-6 flex align-middle justify-center">
                        <h1 class="h-36 w-36 m-auto bg-blue-300 rounded-full">
                            <img class="w-full h-full" :src="'/storage/icons/avatar.png'" alt="" />
                        </h1>
                    </div>

                    <div
                        class="flex flex-wrap my-4 m-auto justify-around w-[99%] md:w-[90%] lg:w-[50%] rounded-md"
                    >
                        <div class="text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="firstname"
                                ><span class="text-[12px] px-2">First Name:</span></label
                            >
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="firstname"
                                v-model="user.firstname"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="lastname"
                                ><span class="text-[12px] px-2">Last Name:</span></label
                            >
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="lastname"
                                v-model="user.lastname"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="username"
                                ><span class="text-[12px] px-2">User Name:</span></label
                            >
                            <input
                                class="flex text-[13px] h-8 w-full row bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="username"
                                v-model="user.username"
                                disabled
                            />
                        </div>

                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="email"><span class="text-[12px] px-2">Email:</span></label>
                            <input
                                class="flex text-[13px] h-8 w-full row bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="email"
                                v-model="user.email"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="accounttype"
                                ><span class="text-[12px] px-2">Account Type:</span></label
                            >
                            <input
                                class="flex text-[13px] h-8 w-full row bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="accountype"
                                v-model="user.accounttype"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-1 mb-8 max-sm:w-[140px]">
                            <label for="created_at"
                                ><span class="text-[12px] px-2">Date Joined:</span></label
                            >
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="created_at"
                                v-model="user.created_at"
                                disabled
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
