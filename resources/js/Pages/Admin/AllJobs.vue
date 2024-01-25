<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { jobs } = defineProps({
    jobs: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-1 m-auto bg-gray-100">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 bg-white rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All Jobs</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg text-[13px]">
                        <tr>
                            <th class="px-3 py-2 text-blue-800 text-center">ID</th>
                            <th class="px-2 py-2">Title</th>
                            <th class="px-2 py-2">Employer Name</th>
                            <th class="px-2 py-2">Company</th>
                            <th class="px-2 py-2">Salary</th>
                            <th class="px-2 py-2">Industry</th>
                            <th class="px-2 py-2">Description</th>
                            <th class="px-2 py-2">City</th>
                            <th class="px-2 py-2">Status</th>
                            <th class="px-2 py-2">Date Posted</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="job in jobs" class="odd:bg-gray-200 text-[12px] rounded-md">
                            <td class="px-3 py-2 text-center text-blue-800 font-bold leading-5">
                                {{ job.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link :href="route('admin.jobs.one', job.id)">
                                {{ job.title }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.employer.user.firstname }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.comapany }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.salary }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.industry }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] truncate max-w-[180px] leading-5">
                                {{ job.description }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.city }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.status }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ job.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
