<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { employers } = defineProps({
    employers: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                <h1 class="text-xl text-left font-semibold py-4">All employers</h1>
            </div>
            <div class="py-4 px-2 w-full min-h-screen m-auto bg-white rounded-lg">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg">
                        <tr>
                            <th class="px-4 py-3">First Name</th>
                            <th class="px-4 py-3">Last Name</th>
                            <th class="px-2 py-3">User Name</th>
                            <th class="px-2 py-3">Email</th>
                            <th class="px-4 py-3">Account Type</th>
                            <th class="px-4 py-3">Date Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="employer in employers">
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                <Link :href="route('admin.employers.one', employer.id)">
                                    {{ employer.user.firstname }}
                                </Link>
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ employer.user.lastname }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ employer.user.username }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ employer.user.email }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ employer.user.accounttype }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ employer.user.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
