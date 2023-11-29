<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import { Link } from "@inertiajs/vue3";

const { applications } = defineProps({
    applications: Array,
});
</script>
<template>
    <SeekerLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-md">
                <h1 class="text-xl text-left font-semibold py-4">All applications</h1>
            </div>
            <div class="py- px- w-full min-h-screen m-auto bg-white rounded-md overflow-auto">
                <div class="text-center my-8 mx-4 text-xl" v-show="applications.length < 1">
                    <h1>You Haven't Applied to Any Jobs Yet!</h1>
                </div>
                <table class="min-w-full divide-y divide-gray-500 divide-solid rounded-md">
                    <thead class="bg-gray-200 text-[14px] text-left rounded-md">
                        <tr>
                            <th class="px-3 py-2">ID</th>
                            <th class="px-2 py-2">Name</th>
                            <th class="px-2 py-2">Job</th>
                            <th class="px-2 py-2">Status</th>
                            <th class="px-2 py-2">Date Applied</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-solid rounded-md">
                        <tr v-for="application in applications" class="text-[13px]">
                            <td class="px-3 py-2 font-bold whitespace-nowrap leading-5">
                                {{ application.id }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap leading-5">
                                <Link :href="route('seeker.applications.one', application.id)">
                                    {{ application.seeker.user.firstname }}
                                    {{ application.seeker.user.lastname }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap leading-5">
                                {{ application.job.title }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap leading-5">
                                {{ application.status }}
                            </td>

                            <td class="px-2 py-2 whitespace-nowrap leading-5">
                                {{ application.created_at }}
                            </td>
                            <!-- </Link> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </SeekerLayout>
</template>
