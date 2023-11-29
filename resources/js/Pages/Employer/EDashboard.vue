<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const { employer, applications, jobs } = defineProps({
    employer: Object,
    applications: Array,
    jobs: Array,
});

const emps = ref(employer);
const jbs = ref(jobs);
const apps = ref(applications);
</script>
<template>
    <EmployerLayout>
        <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 rounded-xl">
            <h1 class="text-2xl text-center font-semibold py-4">Employer Dashboard</h1>
        </div>
        <div class="shadow-sm w-full rounded-xl px-1 py-4 flex flex-wrap justify-evenly">
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px- py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-4 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/applicants.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px- bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">
                            {{ apps.length }}
                        </p>
                        <p class="text-sm text-left">Active Candidates</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-24 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-2 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">{{ jbs.length }}</p>
                        <p class="text-sm text-left">Published Jobs</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-28 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-3 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">6</p>
                        <p class="py-1 text-sm text-left">Open Jobs</p>
                    </div>
                </div>
            </div>
            <div class="px-1 py-1 w-56 h-28 my-4 m-auto bg-gray-100 rounded-lg">
                <div
                    class="px-1 py-1 h-full w-full flex justify-between bg-gray-100 rounded-lg shadow-lg"
                >
                    <div class="w-2/5 px-3 py-3 rounded-lg">
                        <div
                            class="w-full h-full bg-blue-300 flex justify-center px-3 py-4 rounded-lg"
                        >
                            <img :src="'/storage/icons/jobs2.png'" alt="" />
                        </div>
                    </div>
                    <div class="w-7/12 py-4 px-1 bg-gray-100 rounded-lg">
                        <p class="py-1 text-left font-semibold">19</p>
                        <p class="py-1 text-sm text-left">Archived Jobs</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg- mb-4 mt-4 m-auto w-[99%] px-4 py-1 rounded-xl">
            <h1 class="text-xl text-center font-semibold py-4">Recent Applicants</h1>
            <div v-show="apps.length < 1" class="text-center font-semibold text-lg my-8">
                You do not have any Applicants
            </div>
            <div class="w-full rounded-xl m-auto px-1 py-4 flex flex-wrap justify-center">
                <div
                    v-for="app in apps"
                    class="w-44 m-auto h-52 mx-3 my-4 px-1 py-1 bg-gray-100 rounded-xl shadow-md"
                >
                    <div class="px-1 py-1 w-full h-full rounded-xl flex flex-wrap justify-center">
                        <!-- {{ app.seeker }} -->
                        <div class="w-full h-24 flex justify-center items-center">
                            <img class="h-full" :src="'/storage/icons/avatar.png'" />
                        </div>
                        <div
                            class="w-full whitespace-nowrap mb-2 flex flex-wrap justify-center items-center"
                        >
                            <p class="px-1 font-semibold text-[14px] w-full text-center">
                                {{ app.seeker.user.firstname }}
                            </p>

                            <p class="text-[12px]">{{ app.job.title }}</p>
                        </div>
                        <div class="w-full mb-1 flex text-[13px] justify-center items-center">
                            <Link :href="route('employer.applications.jobs.one', app.id)"
                                ><p
                                    class="bg-blue-100 hover:bg-blue-300 px-2 py-1 rounded-md shadow-md"
                                >
                                    View Details
                                </p></Link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 mt-4 m-auto w-[99%] px-4 py-4 rounded-xl">
            <h1 class="text-xl text-center font-semibold py-4">Recent Jobs</h1>
            <div
                class="h-60 my-4 flex justify-center items-center align-middle"
                v-show="jobs.length < 1"
            >
                <h1 class="text-2xl text-center">Sorry, no Jobs to show at the Moment.</h1>
            </div>
            <div class="my-4 w-full h-auto px-4 py-4">
                <div class="flex flex-wrap justify-around">
                    <div
                        v-for="job in jobs"
                        class="bg-slate-200 shadow-2xl h-48 w-48 mx-2 my-4 px-2 py-2 flex flex-wrap rounded-md"
                    >
                        <Link :href="route('jobs.one', job.id)">
                            <div
                                class="flex flex-wrap justify-center px-2 py-1 my-1 w-full text-center"
                            >
                                <span class="text-sm mx-8">Job:</span>
                                <span class="text-sm font-semibold">{{ job.title }}</span>
                            </div>
                            <div
                                class="flex flex-wrap justify-center px-2 py-1 my-1 w-full text-center"
                            >
                                <span class="text-sm mx-8">Industry:</span>
                                <span class="text-sm font-semibold">{{ job.industry }}</span>
                            </div>
                            <div
                                class="flex flex-wrap justify-center px-2 py-1 my-1 w-full text-center"
                            >
                                <span class="text-sm mx-8">Salary: </span>
                                <span class="text-sm font-semibold">{{ job.salary }}</span>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>

            <!-- <div class="px-4 w-full rounded-xl m-auto flex flex-wrap justify-between"> -->
            <!--     <div class="w-[95%] m-auto h-16 my-4 bg-slate-200 rounded-xl">box</div> -->
            <!--     <div class="w-[95%] m-auto h-16 my-4 bg-slate-200 rounded-xl">box</div> -->
            <!--     <div class="w-[95%] m-auto h-16 my-4 bg-slate-200 rounded-xl">box</div> -->
            <!--     <div class="w-[95%] m-auto h-16 my-4 bg-slate-200 rounded-xl">box</div> -->
            <!-- </div> -->
        </div>
    </EmployerLayout>
</template>
