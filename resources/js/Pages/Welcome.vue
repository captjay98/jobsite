<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,

        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
    jobs: {
        type: Array,
    },
    // user: {
    //     type: Array,
    // },
});
/* const user = usePage().props.auth.user; */

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "Login", path: "/login", url: "" },
    { name: "Register", path: "/register", url: "" },
];
</script>

<template>
    <Head title="Welcome To JobSite" />
    {{ console.log(jobs) }}
    <PageHeader :links="links" />
    <div class="h-auto w-screen bg-blue-100 mt-12">
        <div class="bg-slate-100 min-h-auto">
            <div class="lg:py-20 g-blue-500 mt-36 px-8 flex flex-wrap justify-between items-end">
                <div class="lg:w-[50%] w-full px-10 py-4 mb-16">
                    <h1 class="text-5xl tracking-tight">
                        Welcome to <span class="text-blue-500">JobSite</span>
                    </h1>
                    <h2 class="text-3xl tracking-tight">The Easiest Way To Find A Job</h2>
                    <p class="text-md leading-relaxed">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur
                        assumenda maiores delectus amet similique adipisci quaerat impedit in maxime
                        hic repudiandae tempore nihil excepturi commodi pariatur cum, dignissimos
                        molestiae beatae!
                    </p>
                    <form
                        class="g-blue-200 flex flex-wrap justify-center mt-4 px-1 py-1 rounded-md"
                    >
                        <input
                            class="w-28 bg-blue-100 h-8 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                            type="text"
                            value=""
                            id=""
                            placeholder="Industry"
                        />
                        <input
                            class="w-28 bg-blue-100 h-8 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                            type="text"
                            value=""
                            id=""
                            placeholder="Location"
                        />
                        <input
                            class="w-28 bg-blue-100 h-8 rounded-sm text-sm text-center focus:outline-slate-100 focus:ring-slate-100 border-none"
                            type="text"
                            value=""
                            id=""
                            placeholder="Keyword"
                        />
                        <button
                            class="w-28 bg-blue-500 px-3 py-1 rounded-sm text-slate-200 hover:bg-blue-700 active:bg-blue-900"
                            bg-blue-500
                        >
                            Search
                        </button>
                    </form>
                </div>
                <div class="lg:w-[50%] w-full px-4 py-4 flex justify-center items-center">
                    <!-- <h1>This is going to be an image</h1> -->
                    <img
                        class="bg-white rounded-lg h-full w-full"
                        :src="'/storage/icons/jobsite1.jpg'"
                        alt=""
                    />
                </div>
            </div>
        </div>
        <div class="h-auto bg-blue-100 my-16 lg:px-28 px-8 py-28">
            <div class="flex flex-wrap justify-between items-center mb-4">
                <div class="lg:w-[50%] w-full flex justify-center">
                    <img
                        class="bg-white rounded-lg h-full w-full"
                        :src="'/storage/icons/jobsite2.jpg'"
                        alt=""
                    />
                </div>
                <div class="lg:w-[50%] w-full lg:px-8 px-2 py-16">
                    <h4 class="text-2xl">Thousands of Jobs</h4>
                    <h2 class="text-4xl">Choose a Job That Perfectly Fits Your Criteria</h2>
                    <p class="text-md">
                        Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum
                        sint consectetur cupidatat.
                    </p>
                    <button class="bg-blue-500 px-3 py-2 my-4 rounded-md text-white">
                        Search Jobs
                    </button>
                </div>
            </div>
        </div>
        <div class="h-auto bg-slate-100 my-16 lg:px-28 px-8 py-36">
            <div class="flex flex-wrap justify-between items-center">
                <div class="lg:w-[50%] w-full lg:px-4 px-2 py-16">
                    <h4 class="text-2xl">Thousands of Applicants</h4>
                    <h2 class="text-4xl">Get Applications From the Right Talents</h2>
                    <p class="text-md">
                        Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum
                        sint consectetur cupidatat.
                    </p>
                    <button class="bg-blue-500 px-3 py-2 my-4 rounded-md text-white">
                        Search Jobs
                    </button>
                </div>
                <div class="lg:w-[50%] w-full">
                    <img
                        class="-96 -96 bg-white rounded-lg h-full w-full"
                        :src="'/storage/icons/jobsite3.png'"
                        alt=""
                    />
                </div>
            </div>
        </div>
        <div class="min-h-auto bg-blue-100 px-8 py-8">
            <div class="my-4">
                <h1 class="text-center text-3xl font-semibold">Recent Job Postings</h1>
            </div>
            <div class="w-full rounded-xl m-auto px-1 py-4 flex flex-wrap justify-center">
                <div v-for="job in jobs" class="my-4 px-1 py-1 mx-4 rounded-xl shadow-sm">
                    <div class="my-4 px-1 py-1 h-72 w-60 bg-slate-100 rounded-2xl">
                        <div class="px-1 py-1 bg-slate-100 w-full h-full rounded-2xl">
                            <div class="px-2 py-2 bg-blue-300 w-full h-3/4 rounded-2xl">
                                <div
                                    class="bg-white px-2 py-1 w-24 my-1 rounded-xl text-sm text-center"
                                >
                                    2023-10-16
                                </div>
                                <div class="flex justify-between px-2 mt-4 rounded-xl">
                                    <p class="text-xs font-semibold">Comoany Name</p>
                                    <div>Logo</div>
                                </div>
                                <div class="mb-1 font-semibold px-2">
                                    {{ job.title }}
                                </div>
                                <div class="flex flex-wrap pt-6 py-1 px-1 text-[10px]">
                                    <p
                                        class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl"
                                    >
                                        {{ job.industry }}
                                    </p>
                                    <p
                                        class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl"
                                    >
                                        junior-level
                                    </p>
                                    <p
                                        class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl"
                                    >
                                        Hybrid
                                    </p>
                                    <p
                                        class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl"
                                    >
                                        Full-Time
                                    </p>
                                    <p
                                        class="border-gray-700 border-[1px] px-1 py-1 my-1 mr-1 rounded-xl"
                                    >
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
                </div>
            </div>
        </div>
    </div>
    <div class="bg-slate-100 min-h-screen h-auto px-2 py-8">
        <div class="flex flex-wrap justify-center">
            <div class="flex flex-wrap justify-center my-16">
                <div class="w-56 h-56 mx-4 my-4">
                    <div class="flex flex-wrap justify center px-6 py-4">
                        <p class="w-full text-5xl text-center mt-2">5K+</p>
                        <p class="w-full text-center mt-4 font-semibold">Successful Applicants</p>
                        <p class="w-full text-center mt-4">
                            Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint
                        </p>
                    </div>
                </div>
                <div class="w-56 h-56 mx-4 my-4">
                    <div class="flex flex-wrap justify center px-6 py-4">
                        <p class="w-full text-5xl text-center mt-2">2K+</p>
                        <p class="w-full text-center mt-4 font-semibold">Employers</p>
                        <p class="w-full text-center mt-4">
                            Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint
                        </p>
                    </div>
                </div>
                <div class="w-56 h-56 mx-4 my-4">
                    <div class="flex flex-wrap justify center px-6 py-4">
                        <p class="w-full text-5xl text-center mt-2">12K+</p>
                        <p class="w-full text-center mt-4 font-semibold">Jobs Posted</p>
                        <p class="w-full text-center mt-4">
                            Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint
                        </p>
                    </div>
                </div>
                <div class="w-56 h-56 mx-4 my-4">
                    <div class="flex flex-wrap justify center px-6 py-4">
                        <p class="w-full text-5xl text-center mt-2">129</p>
                        <p class="w-full text-center mt-4 font-semibold">Committed Staff</p>
                        <p class="w-full text-center mt-4">
                            Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint
                        </p>
                    </div>
                </div>
            </div>

            <div class="my-16">
                <h3 class="text-center font-semibold text-xl">Some of Our Top Recruiters</h3>
                <div class="flex flex-wrap justify-center my-8">
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                    <div class="h-24 w-44 mx-2 my-4 bg-blue-300"></div>
                </div>
            </div>
        </div>
    </div>
    <PageFooter />
</template>
