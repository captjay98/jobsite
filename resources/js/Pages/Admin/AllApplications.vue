<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { applications } = defineProps({
    applications: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-2xl py-1 m-auto bg-gray-100">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 bg-white rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">
                    All Applications
                </h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-lg">
                    <thead class="bg-gray-200 text-left rounded-lg text-[13px]">
                        <tr>
                            <th class="px-1 py-2 text-blue-800 text-center">ID</th>
                            <th class="px-2 py-2">Name</th>
                            <th class="px-2 py-2">Job</th>
                            <th class="px-2 py-2">Status</th>
                            <th class="px-2 py-2">Date Applied</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-lg">
                        <tr v-if="applications" v-for="application in applications"
                            class="odd:bg-gray-200 text-[12px] rounded-md">
                            <!-- <Link :href="route('admin.applications.one', application.id)"> -->
                            <td class="px-1 py-2 text-center text-blue-800 font-bold leading-5">
                                {{ application.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link :href="route('admin.applications.one', application.id)">
                                {{ application.seeker.user.firstname }}
                                {{ application.seeker.user.lastname }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ application.job.title }}
                            </td>

                            <td class="px-2 py-2 min-w-[80px] max-w-[180px] leading-5">
                                {{ application.status }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
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
