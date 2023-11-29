<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const { employer } = defineProps({
    employer: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 px-4 py-4 bg-white w-full rounded-md">
                <h1 class="text-xl text-center font-semibold py-4">Employer Details</h1>
            </div>
            <div class="bg-white my-8 w-[99%] m-auto rounded-md">
                <form class="my-8 pb-8 rounded-md">
                    <div class="pt-12 pb-4 mx-4 my-4 flex align-middle justify-center">
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
                                v-model="employer.user.firstname"
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
                                v-model="employer.user.lastname"
                                disabled
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="employer.user.ame"
                                ><span class="text-[12px] px-2">employer.user.Name:</span></label
                            >
                            <input
                                class="flex text-[13px] h-8 w-full row bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="employer.user.ame"
                                v-model="employer.user.username"
                                disabled
                            />
                        </div>

                        <div class="text-sm text-left py-4 px-1 max-sm:w-[140px]">
                            <label for="email"><span class="text-[12px] px-2">Email:</span></label>
                            <input
                                class="flex text-[13px] h-8 w-full row bg-gray-100 border-inherit shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="email"
                                v-model="employer.user.email"
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
                                v-model="employer.user.accounttype"
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
                                v-model="employer.user.created_at"
                                disabled
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
