<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    salary: "",
    industry: "",
    description: "",
    city: "",
    company: "",
    status: "",
});

const createJob = () => {
    form.post(route("employer.jobs.create"));
};
</script>
<template>
    <EmployerLayout>
        <div
            class="flex justify-between items-center mb-8 mt-4 m-auto w-[99%] px-4 py-4 bg-white rounded-xl"
        >
            <h1 class="text-2xl text-left font-semibold px-5 py-4">Create Job</h1>
        </div>
        <div class="py-2 px-2 w-full m-auto bg-white flex flex-wrap justify-around rounded-xl">
            <div class="my-4 px-1 py-1 w-full bg-white rounded-2xl">
                <div class="px-1 py-1 w-full h-full rounded-2xl">
                    <form
                        @submit.prevent="createJob"
                        class="w-[99%] m-auto px-2 py-2 flex flex-wrap"
                    >
                        <div
                            class="py-4 my-4 lg:w-[40%] md:w-[53%] h-96 w-full flex flex-wrap justify-around"
                        >
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="title"
                                    ><span class="text-sm px-2">Job Title:</span></label
                                >
                                <input
                                    class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="title"><span class="text-sm px-2">Salary:</span></label>
                                <input
                                    class="flex row text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="form.salary"
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
                                    v-model="form.industry"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="city"><span class="text-sm px-2">City:</span></label>
                                <input
                                    class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    v-model="form.city"
                                />
                            </div>

                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="company"
                                    ><span class="text-sm px-2">Company:</span></label
                                >
                                <input
                                    class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    type="text"
                                    id="title"
                                    fillable="false"
                                    v-model="form.company"
                                />
                            </div>
                            <div class="text-sm text-left py-4 px-2 w-[150px]">
                                <label for="status"
                                    ><span class="text-sm px-2">Status:</span></label
                                >
                                <select
                                    class="flex text-[13px] h-8 w-full bg-gray-100 border-slate-300 shadow-2xl rounded-md font-semibold"
                                    id="status"
                                    v-model="form.status"
                                >
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                    <option value="archived">Archived</option>
                                </select>
                            </div>
                            <div class="w-full max-sm:hidden">
                                <div class="my-8 flex justify-center w-64 m-auto">
                                    <Button
                                        class="mb-8 bg-blue-500 text-white px-6 py-2 rounded-md"
                                        type="submit"
                                        >Create JOB
                                    </Button>
                                </div>
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
                                    v-model="form.description"
                                />
                            </div>
                        </div>
                        <div class="md:hidden w-full">
                            <div class="my-8 flex justify-center w-64 m-auto">
                                <Button
                                    class="mb-8 bg-blue-500 text-white px-6 py-2 rounded-md"
                                    type="submit"
                                    >Create JOB
                                </Button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </EmployerLayout>
</template>
