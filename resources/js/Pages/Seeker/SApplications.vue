<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { applications } = defineProps({
    applications: Array,
});

const apps = applications.map((application) =>
    // console.log(
    //     "seeker:-",
    //     application.seeker,
    //     "job:-",
    //     applicant.job,
    //     "status:-",
    //     applicant.status,
    // ),
    console.log(application),
);
</script>
<template>
    <AuthenticatedLayout>
        <SeekerLayout>
            <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
                <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                    <h1 class="text-xl text-left font-semibold py-4">All applications</h1>
                </div>
                <div class="py-4 px-2 w-full min-h-screen m-auto bg-white rounded-lg">
                    <div v-show="applications.length < 1">
                        <h1>You Haven't Applied to Any Jobs Yet!</h1>
                    </div>
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
                                <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                    <Link :href="route('seeker.applications.one', application.id)">
                                        {{ application.seeker.user.firstname }}</Link
                                    >
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
                </div>
            </div>
        </SeekerLayout>
    </AuthenticatedLayout>
</template>
