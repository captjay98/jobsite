<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { applications } = defineProps({
    applications: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                <h1 class="text-xl text-left font-semibold py-4">All Applications</h1>
            </div>
            <div class="py-4 px-2 w-full min-h-screen m-auto bg-white rounded-lg">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg">
                        <tr>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Job</th>
                            <th class="px-2 py-3">Status</th>
                            <th class="px-4 py-3">Date Applied</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-for="application in applications">
                            <!-- <Link :href="route('admin.applications.one', application.id)"> -->
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                <Link :href="route('admin.applications.one', application.id)">
                                    {{ application.seeker.user.firstname }}
                                </Link>
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ application.job.title }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ application.status }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ application.created_at }}
                            </td>
                            <!-- </Link> -->
                        </tr>
                    </tbody>
                </table>

                <!-- <div v-for="application in applicants"> -->
                <!--     <div class="my-4 px-1 py-1 h-72 w- bg-white rounded-2xl"> -->
                <!--         <Link :href="route('employer.applications.show', application.id)"> -->
                <!-- <div -->
                <!--     class="grid grid-cols-1 px-4 py-4 bg-gray-100 w-full h-full rounded-2xl" -->
                <!-- > -->
                <!--     <h1>{{ application.seeker.user.firstname }}</h1> -->
                <!--     <h1>{{ application.job.title }}</h1> -->
                <!--     <h1>{{ application.status }}</h1> -->
                <!--     <h1>{{ application.created_at }}</h1> -->

                <!-- {{ application }} -->
                <!-- </div> -->
                <!-- </Link> -->
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </AdminLayout>
</template>
