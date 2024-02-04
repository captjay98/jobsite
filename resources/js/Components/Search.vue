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
    <div
        class="flex justify-center items-center m-auto my-2 w-full h-auto rounded-md 2"
    >
        <form
            class="flex flex-wrap justify-center mt-4 rounded-md text-slate-700"
            @submit.prevent="Search"
        >
            <label for="industry" class="sr-only">Industry</label>
            <select
                class="w-40 h-10 text-sm text-center bg-blue-100 border-none md:rounded-l-md max-sm:rounded-tl-md focus:outline-slate-100 focus:ring-slate-100"
                name="industry"
                id="industry"
                v-model="form.industry"
            >
                <option value="" disabled>Industry</option>
                <option
                    class="py-2 px-1"
                    v-for="industry in industries"
                    :key="industry"
                    :value="industry"
                >
                    {{ industry }}
                </option>
            </select>
            <label for="profession" class="sr-only">Profession</label>
            <select
                class="w-40 h-10 text-sm text-center bg-blue-100 border-none md:rounded-sm max-sm:rounded-tr-md focus:outline-slate-100 focus:ring-slate-100"
                name="profession"
                id="profession"
                v-model="form.profession"
            >
                <option value="" disabled>Profession</option>
                <option
                    class="py-2 px-1"
                    v-for="profession in professions"
                    :key="profession"
                    :value="profession"
                >
                    {{ profession }}
                </option>
            </select>
            <label for="salary" class="sr-only">Salary</label>
            <select
                class="w-40 h-10 text-sm text-center bg-blue-100 border-none md:rounded-r-md max-sm:rounded-bl-md focus:outline-slate-100 focus:ring-slate-100"
                name="salary"
                id="salary"
                v-model="form.salary"
            >
                <option value="" disabled>Salary</option>
                <option
                    class="py-2 px-1"
                    v-for="salary in salaries"
                    :key="salary"
                    :value="salary"
                >
                    {{ salary }}
                </option>
            </select>

            <button
                class="py-1 px-3 w-40 bg-blue-500 shadow-2xl md:rounded-md lg:mt-1 hover:bg-blue-700 active:bg-blue-900 max-sm:rounded-br-md shadow-blue-500 text-slate-900 hover:text-slate-100"
                bg-blue-500
            >
                Search
            </button>
        </form>
    </div>
</template>
