<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { employers } = defineProps({
    employers: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-1 m-auto bg-gray-100">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 bg-white rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All Employers</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg text-[13px]">
                        <tr>
                            <th class="px-2 py-2 text-blue-800 text-center">ID</th>
                            <th class="px-2 py-2">First Name</th>
                            <th class="px-2 py-2">Last Name</th>
                            <th class="px-2 py-2">User Name</th>
                            <th class="px-2 py-2">Email</th>
                            <th class="px-2 py-2">Account Type</th>
                            <th class="px-2 py-2">Date Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-md">
                        <tr
                            v-for="employer in employers"
                            class="odd:bg-gray-200 text-[12px] rounded-md"
                        >
                            <td class="px-3 py-2 font-bold text-blue-800 text-center">
                                {{ employer.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link :href="route('admin.employers.one', employer.id)">
                                    {{ employer.user.firstname }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ employer.user.lastname }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ employer.user.username }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ employer.user.email }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ employer.user.accounttype }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ employer.user.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
