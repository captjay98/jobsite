<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const { jobs } = defineProps({
    jobs: Object,
});
</script>
<template>
    <EmployerLayout>
        <div class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-xl">
            <h1 class="text-2xl text-left font-semibold py-4">Jobs</h1>
            <Link
                class="mr-4 px-2 py-1 rounded-md bg-blue-300 hover:bg-blue-600 hover:text-white active:bg-blue-800 active:text-white"
                :href="'/employer/jobs/create'">Create Job</Link>
        </div>
        {{ console.log(jobs) }}

        <div class="min-h-screen py-4 px-4 w-full m-auto bg-white flex flex-wrap justify-around rounded-xl">
            <div class="flex justify-center items-center" v-show="jobs.length < 1">
                <h1 class="text-xl font-semibold">You currently do not have any Jobs</h1>
            </div>
            <div v-for="job in jobs">
                <!-- <div class="my-4 h-72 w-60 bg-gray-400 rounded-xl">{{ job.title }}</div> -->
                <Link :href="route('employer.jobs.one', job.id)">
                <div class="my-4 px-1 py-1 h-72 w-60 bg-white rounded-2xl">
                    <div class="px-1 py-1 bg-gray-100 w-full h-full rounded-2xl">
                        <div class="px-2 py-2 bg-blue-300 w-full h-3/4 rounded-2xl">
                            <div class="bg-white px-2 py-1 w-24 my-1 rounded-xl text-sm text-center">
                                2023-10-16
                            </div>
                            <div class="flex justify-between px-2 mt-4 rounded-xl">
                                <p class="text-xs font-semibold">{{ job.company }}</p>
                                <div>Logo</div>
                            </div>
                            <div class="mb-1 font-semibold px-2">
                                {{ job.title }}
                            </div>
                            <div class="flex flex-wrap pt-6 py-1 px-1 text-[10px]">
                                <p class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl">
                                    {{ job.industry }}
                                </p>
                                <p class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl">
                                    junior-level
                                </p>
                                <p class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl">
                                    Hybrid
                                </p>
                                <p class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl">
                                    Full-Time
                                </p>
                                <p class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl">
                                    Project-work
                                </p>
                            </div>
                            <div class="pt-1 px-1 mt-4 text-sm font-semibold">
                                {{ job.salary }}
                            </div>
                            <div class="px-1 text-sm">
                                {{ job.city }}
                            </div>

                            <!-- <h1>{{ job.title }}</h1> -->
                        </div>
                    </div>
                </div>
                </Link>
            </div>
        </div>
    </EmployerLayout>
</template>
