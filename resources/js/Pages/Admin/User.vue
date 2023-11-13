<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const { user } = defineProps({
    user: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-4 m-auto bg-ray-100">
            <div class="mb-8 mt-4 ml-2 px-4 py-4 bg-white w-[98%] rounded-md">
                <h1 class="text-xl text-left font-semibold py-4">User Details</h1>
            </div>
            <div class="bg-white mx-2 my-8 w-[98%] rounded-md">
                <form class="my-8 rounded-md">
                    <div class="pt-8 mx-4 my-4 flex align-middle justify-center">
                        <h1 class="h-36 w-36 m-auto bg-blue-300 rounded-full">
                            <img class="w-full h-full" :src="'/storage/icons/avatar.png'" alt="" />
                        </h1>
                    </div>

                    <div
                        class="flex flex-wrap my-8 m-auto justify-center w-[99%] md:w-[90%] lg:w-[50%] rounded-md"
                    >
                        <div class="text-sm text-left py-4 px-4">
                            <label for="firstname"
                                ><span class="text-sm px-2">First Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="firstname"
                                v-model="user.firstname"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="lastname"
                                ><span class="text-sm px-2">Last Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="lastname"
                                v-model="user.lastname"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="username"
                                ><span class="text-sm px-2">User Name:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="username"
                                v-model="user.username"
                                disabled
                            />
                        </div>

                        <div class="text-sm text-left py-4 px-4">
                            <label for="email"><span class="text-sm px-2">Email:</span></label>
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="email"
                                v-model="user.email"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-4">
                            <label for="accounttype"
                                ><span class="text-sm px-2">Account Type:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="accountype"
                                v-model="user.accounttype"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-4 mb-8">
                            <label for="created_at"
                                ><span class="text-sm px-2">Date Joined:</span></label
                            >
                            <input
                                class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
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
