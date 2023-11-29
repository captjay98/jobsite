<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { ref } from "vue";

const { job } = defineProps({
    job: Object,
});

const data = {
    title: ref(job.title),
    salary: ref(job.salary),
    industry: ref(job.industry),
    description: ref(job.description),
    city: ref(job.city),
    created_at: ref(job.created_at),
    status: ref(job.status),
};
</script>
<template>
    <AdminLayout>
        <div
            class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-xl"
        >
            <h1 class="text-2xl text-left font-semibold px-5 py-4">Job Details</h1>
        </div>
        {{ console.log(job) }}
        <div class="py-2 px-2 mt-6 w-full m-auto bg-white flex flex-wrap justify-around rounded-xl">
            <div class="my-4 px- py-1 w-full bg-white rounded-2xl">
                <div class="flex align-middle py-1 w-full h-full rounded-2xl">
                    <form
                        @submit.prevent="createJob"
                        class="w-[99%] m-auto px- py-2 flex flex-wrap"
                    >
                        <div
                            class="py-4 my-4 xl:ml-20 xl:w-[30%] lg:w-[40%] md:w-[53%] h-96 w-full flex flex-wrap justify-around"
                        >
                            <!-- <div class="bg-purple-200 lg:w-[80%] flex-wrap justify-center"> -->
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="title"
                                    ><span class="text-sm px-2">Job Title:</span></label
                                >
                                <input
                                    class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="data.title.value"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="title"><span class="text-sm px-2">Salary:</span></label>
                                <input
                                    class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="data.salary.value"
                                />
                            </div>

                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="title"
                                    ><span class="text-sm px-2">Industry:</span></label
                                >
                                <input
                                    class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="data.industry.value"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="city"><span class="text-sm px-2">City:</span></label>
                                <input
                                    class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="data.city.value"
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
                                    v-model="data.created_at.value"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="status"
                                    ><span class="text-sm px-2">Status:</span></label
                                >
                                <select
                                    class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    id="status"
                                    v-model="data.status.value"
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
                                    v-model="data.description.value"
                                />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
