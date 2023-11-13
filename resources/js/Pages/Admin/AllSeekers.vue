<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { seekers } = defineProps({
    seekers: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                <h1 class="text-xl text-left font-semibold py-4">All seekers</h1>
            </div>
            <div class="py-4 px-2 w-full min-h-screen m-auto bg-white rounded-lg overflow-x-auto">
                <table
                    class="min-w-full table-auto divide-y divide-gray-500 divide-solid rounded-lg"
                >
                    <thead class="bg-gray-200 text-left rounded-lg">
                        <tr class="text-center">
                            <th class="px-2 py-3 border-black border-2">ID</th>
                            <th class="px-2 py-3 border-black border-2">First Name</th>
                            <th class="px-2 py-3 border-black border-2">Last Name</th>
                            <th class="px-2 py-3 border-black border-2">User Name</th>
                            <th class="px-2 py-3 border-black border-2">Email</th>
                            <th class="px-2 py-3 border-black border-2">Phone</th>
                            <th class="px-2 py-3 border-black border-2">DOB</th>
                            <th class="px-2 py-3 border-black border-2">City</th>
                            <th class="px-2 py-3 border-black border-2">State</th>
                            <th class="px-2 py-3 border-black border-2">Country</th>
                            <th class="px-2 py-3 border-black border-2">Ethnicity</th>
                            <th class="px-2 py-3 border-black border-2">CV</th>
                            <th class="px-2 py-3 border-black border-2">Visa</th>
                            <th class="px-2 py-3 border-black border-2">Passport</th>
                            <th class="px-2 py-3 border-black border-2">Date Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="seeker in seekers">
                            <td
                                class="px-2 py-3 border-black border-2 black whitespace-nowrap text-sm text-center leading-5"
                            >
                                {{ seeker.id }}
                            </td>

                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                <Link :href="route('admin.seekers.one', seeker.id)">
                                    {{ seeker.user.firstname }}
                                </Link>
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.user.lastname }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.user.username }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.user.email }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.phone }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.dateofbirth }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.city }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.state }}
                            </td>

                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.country }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.ethnicity }}
                            </td>

                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black truncate whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.cv }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.visa }}
                            </td>

                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.passport }}
                            </td>
                            <td
                                class="px-2 py-3 border-r-black border-2 border-b-black whitespace-nowrap text-sm leading-5"
                            >
                                {{ seeker.user.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
