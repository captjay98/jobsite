<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SeekerLayout from "@/Layouts/SeekerLayout.vue";
import { useForm, Link } from "@inertiajs/vue3";
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

const form = useForm({ job_id: job.id });

const apply = () => {
    form.post(route("seeker.apply"));
};
</script>
<template>
    <AuthenticatedLayout>
        <SeekerLayout>
            <div
                class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-xl"
            >
                <h1 class="text-2xl text-left font-semibold px-5 py-4">Job Details</h1>
                <div class="px-6 py-2 mx-4 bg-blue-500 text-white rounded-md">
                    <form @submit.prevent="apply"><button>Apply</button></form>
                </div>
            </div>
            {{ console.log(job) }}
            <div
                class="py-2 px-2 mt-16 w-full m-auto bg-white flex flex-wrap justify-around rounded-xl"
            >
                <div class="my-4 px-1 py-1 w-full bg-white rounded-2xl">
                    <div class="px-1 py-1 w-full h-full rounded-2xl">
                        <form class="w-[99%] m-auto flex flex-wrap justify-center">
                            <div class="flex flex-wrap justify-center lg:w-[50%] m-auto mx-2 my-4">
                                <div class="text-sm text-left py-4 px-2">
                                    <label for="title"
                                        ><span class="text-sm px-2">Job Title:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        type="text"
                                        id="title"
                                        v-model="data.title.value"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-2">
                                    <label for="title"
                                        ><span class="text-sm px-2">Salary:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        type="text"
                                        id="title"
                                        v-model="data.salary.value"
                                    />
                                </div>

                                <div class="text-sm text-left py-4 px-2">
                                    <label for="title"
                                        ><span class="text-sm px-2">Industry:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        type="text"
                                        id="title"
                                        v-model="data.industry.value"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-2">
                                    <label for="city"
                                        ><span class="text-sm px-2">City:</span></label
                                    >
                                    <input
                                        class="flex bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        type="text"
                                        id="title"
                                        v-model="data.city.value"
                                    />
                                </div>

                                <div class="text-sm text-left py-4 px-2">
                                    <label for="created_at"
                                        ><span class="text-sm px-2">Date Created:</span></label
                                    >
                                    <input
                                        class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        type="text"
                                        id="title"
                                        fillable="false"
                                        v-model="data.created_at.value"
                                    />
                                </div>
                                <div class="text-sm text-left py-4 px-2">
                                    <label for="status"
                                        ><span class="text-sm px-2">Status:</span></label
                                    >
                                    <select
                                        class="flex w-60 bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                        id="status"
                                        v-model="data.status.value"
                                    >
                                        <option value="open">Open</option>
                                        <option value="closed">Closed</option>
                                        <option value="archived">Archived</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w-full m-auto rounded-lg px-1 py-1 lg:w-[45%]">
                                <div class="text-sm text-left py-4 px-2">
                                    <label for="title"
                                        ><span class="text-sm px-2">Description:</span></label
                                    >
                                    <input
                                        class="flex flex-row bg-gray-100 w-full h-32 px-2 py-2 border-slate-300 shadow-2xl rounded-xl font-bold"
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
        </SeekerLayout>
    </AuthenticatedLayout>
</template>
