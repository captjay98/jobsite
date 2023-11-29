<script setup>
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const { seeker, applications } = defineProps({
    seeker: Object,
    applications: Array,
    jobs: Array,
});

console.log(applications);

const user = {
    firstname: ref(seeker.user.firstname),
    lastname: ref(seeker.user.lastname),
    username: ref(seeker.user.username),
    email: ref(seeker.user.email),
};
</script>
<template>
    <SeekerLayout>
        <div class="mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-xl">
            <h1 class="text-2xl text-center font-semibold py-4">Seeker Dashboard</h1>
        </div>

        <div class="h- bg-white rounded-md px-4 py-4 my-8">
            <div class="mb-6">
                <h1 class="text-semibold text-xl text-center">Recent Applications</h1>
            </div>
            <div
                class="h-60 my-4 flex justify-center items-center align-middle"
                v-show="applications.length < 1"
            >
                <h1 class="text-2xl text-center mx-8 my-8">
                    You currently do not have an Application.
                </h1>
            </div>
            <div class="my-4 w-full h-auto px-4 py-4">
                <div class="flex flex-wrap justify-around">
                    <div
                        v-for="application in applications"
                        class="bg-blue-200 shadow-2xl h-48 w-48 mx-2 my-4 px-2 py-2 grid grid-cols-1 rounded-md"
                        :class="{
                            'bg-yellow-500': application.status === 'reviewing',
                            'bg-red-500': application.status === 'rejected',
                            'bg-green-500': application.status === 'accepted',
                        }"
                    >
                        <Link :href="route('seeker.applications.one', application.id)">
                            <div class="flex flex-wrap justify-evenly py-1 my-1 w-full text-center">
                                <div class="w-full text-sm mx-8">Job:</div>
                                <div class="w-full text-sm font-semibold">
                                    {{ application.job.title }}
                                </div>
                            </div>
                            <div
                                class="flex flex-wrap justify-evenly px-2 py-1 my-1 w-full text-center"
                            >
                                <span class="w-full text-sm mx-8">Status:</span>
                                <span class="w-full text-sm font-semibold">{{
                                    application.status.toUpperCase()
                                }}</span>
                            </div>
                            <div
                                class="flex flex-wrap justify-center px-2 py-1 my-1 w-full text-center"
                            >
                                <span class="w-full text-sm mx-8">Date Applied: </span>
                                <span class="w-full text-sm font-semibold">{{
                                    application.created_at.split("T")[0]
                                }}</span>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <div class="h- bg-white rounded-md px-4 py-4 my-8">
            <div class="mb-6">
                <h1 class="text-semibold text-xl text-center">Jobs you might be Interested in</h1>
            </div>
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
                        <Link :href="route('seeker.jobs.one', job.id)">
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
        </div>
        <div class="h-56 bg-white px-8 py-8 my-8">Latest news and Updates</div>
    </SeekerLayout>
</template>
