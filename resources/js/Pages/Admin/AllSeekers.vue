<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { seekers } = defineProps({
    seekers: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-1 m-auto bg-gray-100">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 bg-white rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All seekers</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-md">
                    <thead class="bg-gray-200 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-3 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">First Name</th>
                            <th class="px-2 py-2">Last Name</th>
                            <th class="px-2 py-2">User Name</th>
                            <th class="px-2 py-2">Email</th>
                            <th class="px-2 py-2">Phone</th>
                            <th class="px-2 py-2">DOB</th>
                            <th class="px-2 py-2">City</th>
                            <th class="px-2 py-2">State</th>
                            <th class="px-2 py-2">Country</th>
                            <th class="px-2 py-2">Ethnicity</th>
                            <th class="px-2 py-2">Date Joined</th>
                            <th class="px-2 py-2">CV</th>
                            <th class="px-2 py-2">Visa</th>
                            <th class="px-2 py-2">Passport</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr
                            v-for="seeker in seekers"
                            class="text-[12px] odd:bg-gray-200 rounded-md"
                        >
                            <td class="px-3 py-2 font-bold text-blue-800 text-center">
                                {{ seeker.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                <Link :href="route('admin.seekers.one', seeker.id)">
                                    {{ seeker.user.firstname }}
                                </Link>
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.user.lastname }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.user.username }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.user.email }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[150px] truncate leading-5">
                                {{ seeker.phone }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.dateofbirth }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.city }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.state }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.country }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] truncate leading-5">
                                {{ seeker.ethnicity }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[150px] truncate leading-5">
                                {{ seeker.user.created_at }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[150px] truncate leading-5">
                                {{ seeker.cv }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[150px] truncate leading-5">
                                {{ seeker.visa }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[150px] truncate leading-5">
                                {{ seeker.passport }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
