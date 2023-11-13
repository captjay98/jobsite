<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const { applicants } = defineProps({
    applicants: Object,
});

const apps = applicants.map((applicant) =>
    console.log("seeker:-", applicant.seeker, "job:-", applicant.job, "status:-", applicant.status),
);
console.log(apps);
</script>
<template>
    <EmployerLayout>
        <div class="w-full rounded-2xl py-4 m-auto bg-gray-100">
            <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-lg">
                <h1 class="text-xl text-left font-semibold py-4">All Applicants</h1>
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
                        <tr v-for="applicant in applicants">
                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                <Link :href="route('employer.applications.jobs.one', applicant.id)">
                                    {{ applicant.seeker.user.firstname }}
                                </Link>
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ applicant.job.title }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ applicant.status }}
                            </td>

                            <td class="px-2 py-3 whitespace-nowrap text-sm leading-5">
                                {{ applicant.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- <div v-for="applicant in applicants"> -->
                <!--     <div class="my-4 px-1 py-1 h-72 w- bg-white rounded-2xl"> -->
                <!--         <Link :href="route('employer.applications.show', applicant.id)"> -->
                <!-- <div -->
                <!--     class="grid grid-cols-1 px-4 py-4 bg-gray-100 w-full h-full rounded-2xl" -->
                <!-- > -->
                <!--     <h1>{{ applicant.seeker.user.firstname }}</h1> -->
                <!--     <h1>{{ applicant.job.title }}</h1> -->
                <!--     <h1>{{ applicant.status }}</h1> -->
                <!--     <h1>{{ applicant.created_at }}</h1> -->

                <!-- {{ applicant }} -->
                <!-- </div> -->
                <!-- </Link> -->
                <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </EmployerLayout>
</template>
