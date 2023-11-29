<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { users } = defineProps({
    users: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md py-1 m-auto bg-gray-100">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 bg-white rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All users</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-md">
                    <thead class="bg-gray-200 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-2 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">First Name</th>
                            <th class="px-2 py-2">Last Name</th>
                            <th class="px-2 py-2">User Name</th>
                            <th class="px-2 py-2">Email</th>
                            <th class="px-2 py-2 whitespace-nowrap">Account Type</th>
                            <th class="px-2 py-2">Is SuperUser</th>
                            <th class="px-2 py-2">Is Admin</th>
                            <th class="px-2 py-2">Is Active</th>
                            <th class="px-2 py-2">Date Joined</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="user in users" class="text-[12px] odd:bg-gray-200 rounded-md">
                            <td class="px-2 py-2 font-bold text-blue-800 text-center">
                                {{ user.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link :href="route('admin.users.one', user.id)">
                                    {{ user.firstname }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.lastname }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.username }}
                            </td>

                            <td
                                class="px-2 py-2 min-w-[100px] max-w-[180px] -auto overflow-hidden leading-5"
                            >
                                {{ user.email }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.account_type }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.is_admin }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.is_superuser }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.is_active }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ user.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
