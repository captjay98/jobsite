<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { jobs } = defineProps({
    jobs: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                <h1 class="text-xl text-left font-semibold py-4">All jobs</h1>
            </div>
            <div class="py-4 px-2 w-full min-h-screen m-auto bg-white rounded-lg">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg">
                        <tr>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Employer Name</th>
                            <th class="px-2 py-3">Salary</th>
                            <th class="px-2 py-3">Industry</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">City</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date Posted</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="job in jobs">
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                <Link :href="route('admin.jobs.one', job.id)">
                                    {{ job.title }}
                                </Link>
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.employer.user.firstname }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.salary }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.industry }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.description }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.city }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.status }}
                            </td>
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ job.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
