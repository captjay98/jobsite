<script setup>
import EmployerLayout from "@/Layouts/EmployerLayout.vue";
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";

const form = useForm({
    title: "",
    salary: "",
    industry: "",
    description: "",
    city: "",
    created_at: "",
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
                            class="px-4 py-4 mx-2 my-4 flex lg:w-[45%] h-96 w-full flex-wrap justify-center"
                        >
                            <!-- <div class="bg-purple-200 lg:w-[80%] flex-wrap justify-center"> -->
                            <div class="text-sm text-left py-4 px-2">
                                <label for="title"
                                    ><span class="text-sm px-2">Job Title:</span></label
                                >
                                <input
                                    class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    type="text"
                                    id="title"
                                    v-model="form.title"
                                />
                                <div v-show="form.errors.title">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.title }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-sm text-left py-4 px-2">
                                <label for="title"><span class="text-sm px-2">Salary:</span></label>
                                <input
                                    class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    type="text"
                                    id="title"
                                    v-model="form.salary"
                                />
                                <div v-show="form.errors.salary">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.salary }}
                                    </p>
                                </div>
                            </div>

                            <div class="text-sm text-left py-4 px-2">
                                <label for="title"
                                    ><span class="text-sm px-2">Industry:</span></label
                                >
                                <input
                                    class="flex row bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    type="text"
                                    id="title"
                                    v-model="form.industry"
                                />
                                <div v-show="form.errors.industry">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.industry }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-sm text-left py-4 px-2">
                                <label for="city"><span class="text-sm px-2">City:</span></label>
                                <input
                                    class="flex bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    type="text"
                                    id="title"
                                    v-model="form.city"
                                />
                                <div v-show="form.errors.city">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.city }}
                                    </p>
                                </div>
                            </div>

                            <div class="text-sm text-left py-4 px-2">
                                <label for="status"
                                    ><span class="text-sm px-2">Status:</span></label
                                >
                                <select
                                    class="flex w-60 bg-gray-100 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    id="status"
                                    v-model="form.status"
                                    @input="changedFields.status = true"
                                >
                                    <option value="open">Open</option>
                                    <option value="closed">Closed</option>
                                    <option value="archived">Archived</option>
                                </select>
                                <div v-show="form.errors.status">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.status }}
                                    </p>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>

                        <div class="w-full lg:w-[45%] m-auto rounded-lg px-2 py-3 h-96">
                            <div class="text-sm text-left py-4 px-2">
                                <label for="title"
                                    ><span class="text-sm px-2">Description:</span></label
                                >
                                <input
                                    class="flex flex-row bg-gray-100 w-full h-72 px-2 py-2 border-slate-300 shadow-2xl rounded-xl font-bold"
                                    type="textarea"
                                    id="title"
                                    v-model="form.description"
                                    @input="changedFields.description = true"
                                />
                                <div v-show="form.errors.description">
                                    <p class="text-sm my-2 text-red-500">
                                        {{ form.errors.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="my-8 flex justify-center w-64 m-auto">
                                <Button
                                    class="bg-blue-500 text-white px-5 py-1 rounded-md"
                                    type="submit"
                                >
                                    Create
                                </Button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </EmployerLayout>
</template>
