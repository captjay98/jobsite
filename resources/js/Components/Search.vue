<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    industry: "",
    location: "",
    profession: "",
    salary: "",
});

const professions = [
    "Industry",
    "Software Developer",
    "Web Developer",
    "Front-end Developer",
    "Back-end Developer",
    "Full-stack Developer",
    "Mobile App Developer",
    "DevOps Engineer",
    "Software Engineer",
    "UI/UX Designer",
    "QA Engineer",
];

const industries = [
    "Information Technology",
    "Software Development",
    "E-commerce",
    "Healthcare",
    "Finance",
    "Gaming",
    "Telecommunications",
    "Education",
    "Entertainment",
    "Consulting",
];

const salaries = [
    "$60,000 - $80,000",
    "$80,000 - $100,000",
    "$100,000 - $120,000",
    "$120,000 - $140,000",
    "$140,000 - $160,000",
    "$160,000 - $180,000",
    "$180,000 - $200,000",
    "$200,000 - $220,000",
    "$220,000 - $240,000",
    "Above $240,000",
];

const Search = () => {
    form.post(route("jobs.search"));
};
</script>

<template>
    <div class="flex justify-center items-center w-full h-auto py-2 m-auto my-2 rounded-md">
        <form class="flex flex-wrap justify-center mt-4 rounded-md" @submit.prevent="Search">
            <select
                class="w-40 bg-blue-100 h-10 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                name="industry"
                id="industry"
                v-model="form.industry"
            >
                <option
                    class="px-1 py-2"
                    v-for="industry in industries"
                    :key="industry"
                    :value="industry"
                >
                    {{ industry }}
                </option>
            </select>

            <select
                class="w-40 bg-blue-100 h-10 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                name="profession"
                id="profession"
                v-model="form.profession"
            >
                <option
                    class="px-1 py-2"
                    v-for="profession in professions"
                    :key="profession"
                    :value="profession"
                >
                    {{ profession }}
                </option>
            </select>
            <select
                class="w-40 bg-blue-100 h-10 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                name="salary"
                id="salary"
                v-model="form.salary"
            >
                <option class="px-1 py-2" v-for="salary in salaries" :key="salary" :value="salary">
                    {{ salary }}
                </option>
            </select>

            <!-- <input -->
            <!--     class="w-40 bg-blue-100 h-10 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none" -->
            <!--     type="text" -->
            <!--     v-model="form.location" -->
            <!--     id="location" -->
            <!--     placeholder="Location" -->
            <!-- /> -->
            <button
                class="w-40 bg-blue-500 px-3 py-1 rounded-sm text-slate-200 hover:bg-blue-700 active:bg-blue-900"
                bg-blue-500
            >
                Search
            </button>
        </form>
    </div>
</template>
