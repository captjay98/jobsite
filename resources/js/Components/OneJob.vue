<script setup>
import { useForm } from "@inertiajs/vue3";

const { job } = defineProps({
    job: Object,
});

const form = useForm({ job_id: job.id });

const apply = () => {
    form.post(route("seeker.apply"));
};
</script>
<template>
    <div
        class="flex justify-between items-center mb-8 mt-4 m-auto w-full px-4 py-4 bg-white rounded-xl"
    >
        <h1 class="text-2xl text-left font-semibold px-5 py-4">Job Details</h1>
        <div class="px-6 py-2 mx-4 bg-blue-500 text-white rounded-md">
            <form @submit.prevent="apply"><button>Apply</button></form>
        </div>
    </div>
    {{ console.log(job) }}
    <div class="py-2 px-2 mt-6 w-full m-auto bg-white flex flex-wrap justify-around rounded-xl">
        <div class="my-4 px- py-1 w-full bg-white rounded-2xl">
            <div class="flex align-middle py-1 w-full h-full rounded-2xl">
                <form class="w-[99%] m-auto px- py-2 flex flex-wrap">
                    <div
                        class="py-4 my-4 lg:w-[40%] md:w-[53%] h-96 w-full flex flex-wrap justify-around"
                    >
                        <!-- <div class="bg-purple-200 lg:w-[80%] flex-wrap justify-center"> -->
                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="title"><span class="text-sm px-2">Job Title:</span></label>
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="title"
                                v-model="job.title"
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="title"><span class="text-sm px-2">Salary:</span></label>
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="title"
                                v-model="job.salary"
                            />
                        </div>

                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="title"><span class="text-sm px-2">Industry:</span></label>
                            <input
                                class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="title"
                                v-model="job.industry"
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="city"><span class="text-sm px-2">City:</span></label>
                            <input
                                class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="title"
                                v-model="job.city"
                            />
                        </div>

                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="created_at"
                                ><span class="text-sm px-2">Date Created:</span></label
                            >
                            <input
                                class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                type="text"
                                id="title"
                                fillable="false"
                                v-model="job.created_at"
                            />
                        </div>
                        <div class="text-sm text-left py-4 px-2 w-[150px]">
                            <label for="status"><span class="text-sm px-2">Status:</span></label>
                            <select
                                class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                id="status"
                                v-model="job.status"
                            >
                                <option value="open">Open</option>
                                <option value="closed">Closed</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-full lg:w-[45%] md:w-[47%] m-auto rounded-md px-2 py-3 h-96">
                        <div class="text-sm text-left py-4 px-2">
                            <label for="title"
                                ><span class="text-sm px-2">Description:</span></label
                            >
                            <input
                                class="bg-gray-100 w-full h-72 px-2 py-2 border-inherit shadow-2xl rounded-md font-semibold"
                                type="textarea"
                                id="title"
                                v-model="job.description"
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
