<script setup>
import { Head, Link, usePage } from "@inertiajs/vue3";
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";
import Search from "@/Components/Search.vue";
import Faqs from "./Faqs.vue";

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
    <div class="w-screen h-auto bg-blue-100">
        <div
            class="rounded-md bg-[url('/storage/icons/jobsite1.webp')] bg-cover bg-no-repeat border-black w-screen h-screen m-auto"
        >
            <div class="bg-[hsla(0,0%,0%,0.7)] h-full">
                <PageHeader :links="links" />
                <div
                    class="flex flex-row justify-center md:py-20 md:mt-20 text-slate-100"
                >
                    <div
                        class="max-sm:px-2 max-sm:pt-40 lg:w-[90%] xl:w-[60%] mb-[4.5rem] m-auto w-full py-4 max-sm:mb-10"
                    >
                        <div class="px-2">
                            <h1
                                class="tracking-normal leading-tight text-center text-[5.5rem] max-sm:text-[2.6rem]"
                            >
                                Welcome to
                                <span class="text-blue-500">JobSite</span>
                            </h1>
                            <h2
                                class="text-3xl tracking-tight leading-tight text-center max-sm:text-[1.45rem]"
                            >
                                The ultimate hub where talents and opportunities
                                converge.
                            </h2>
                            <p
                                class="my-2 leading-7 text-center text-md max-sm:px-5 max-sm:text-[0.9rem] md:px-[2.2rem]"
                            >
                                Whether you're a job seeker eager to find your
                                perfect role or an employer searching for
                                top-tier talent, our platform is your gateway to
                                success. Job seekers, explore a myriad of
                                openings tailored to your skills, while
                                employers gain access to a pool of qualified
                                candidates.
                            </p>
                        </div>
                        <div class="m-auto md:w-[35rem]">
                            <Search />
                        </div>
                    </div>
                    <!-- <div -->
                    <!--     class="xl:w-[50%] xl:mb-20 l:mb-20 md:px-8 w-full max-sm:pt-0 px-2 py-2 flex justify-center items-center"> -->
                    <!--     <img class="w-full h-full bg-white rounded-lg" :src="'/storage/icons/jobsite1.webp'" alt="Header Image" -->
                    <!--         width="100%" height="100%" /> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <div class="py-28 px-8 my-16 h-auto bg-blue-100 lg:px-28">
            <div class="flex flex-wrap justify-between items-center mb-4">
                <div class="lg:w-[50%] md:px-8 w-full flex justify-center">
                    <img
                        class="w-full h-full bg-white rounded-lg"
                        :src="'/storage/icons/jobsite2.jpg'"
                        alt=""
                        width="100%"
                        height="100%"
                        loading="lazy"
                    />
                </div>
                <div class="lg:w-[50%] md:px-8 w-full lg:px-8 px-2 py-16">
                    <h1 class="text-2xl">Thousands of Jobs</h1>
                    <h2 class="text-4xl">
                        Explore a myriad of openings tailored to your skills
                    </h2>
                    <p class="mt-2 text-md">
                        Choose a Job That Perfectly Fits Your Criteria
                    </p>

                    <Link as="button" :href="route('jobs.all')">
                        <button
                            class="py-2 px-3 my-2 bg-blue-500 rounded-md hover:bg-blue-700 active:bg-blue-900 text-slate-900 hover:text-slate-100"
                            bg-blue-500
                        >
                            Search Jobs
                        </button>
                    </Link>
                </div>
            </div>
        </div>
        <div class="py-36 px-8 my-16 h-auto lg:px-28 bg-slate-100">
            <div class="flex flex-wrap justify-between items-center">
                <div class="lg:w-[50%] md:px-8 w-full lg:px-4 px-2 py-16">
                    <h1 class="text-2xl">Thousands of Applicants</h1>
                    <h2 class="text-4xl">
                        Get Applications From the Right Talents
                    </h2>
                    <p class="mt-2 text-md">
                        Gain access to a pool of qualified candidates.
                    </p>

                    <Link as="button" :href="route('jobs.all')">
                        <button
                            class="py-2 px-3 my-2 bg-blue-500 rounded-md hover:bg-blue-700 active:bg-blue-900 text-slate-900 hover:text-slate-100"
                        >
                            Search Jobs
                        </button>
                    </Link>
                </div>
                <div class="lg:w-[50%] md:px-8 w-full">
                    <img
                        class="w-full h-full bg-white rounded-lg -96"
                        :src="'/storage/icons/jobsite3.webp'"
                        alt=""
                        width="100%"
                        height="100%"
                        loading="lazy"
                    />
                </div>
            </div>
        </div>
        <div class="py-8 px-8 bg-blue-100 min-h-auto">
            <div class="my-4">
                <h1 class="text-3xl font-semibold text-center">
                    Recent Job Postings
                </h1>
            </div>
            <div
                class="flex flex-wrap justify-center py-4 px-1 m-auto w-full rounded-xl"
            >
                <div
                    :key="job.id"
                    v-for="job in jobs"
                    class="py-1 px-1 my-4 mx-4 rounded-xl shadow-sm"
                >
                    <div
                        class="py-1 px-1 my-4 w-60 h-72 rounded-2xl bg-slate-100"
                    >
                        <div
                            class="py-1 px-1 w-full h-full rounded-2xl bg-slate-100"
                        >
                            <div
                                class="py-2 px-2 w-full h-3/4 bg-blue-300 rounded-2xl"
                            >
                                <div
                                    class="py-1 px-2 my-1 w-24 text-sm text-center bg-white rounded-xl"
                                >
                                    2023-10-16
                                </div>
                                <div
                                    class="flex justify-between px-2 mt-4 rounded-xl"
                                >
                                    <p class="text-xs font-semibold">
                                        Company Name
                                    </p>
                                    <div>Logo</div>
                                </div>
                                <div class="px-2 mb-1 font-semibold">
                                    {{ job.title }}
                                </div>
                                <div
                                    class="flex flex-wrap py-1 px-1 pt-6 text-[10px]"
                                >
                                    <p
                                        class="py-1 px-1 my-1 mr-1 rounded-xl border-gray-700 border-[1px]"
                                    >
                                        {{ job.industry }}
                                    </p>
                                    <p
                                        class="py-1 px-1 my-1 mr-1 rounded-xl border-gray-700 border-[1px]"
                                    >
                                        junior-level
                                    </p>
                                    <p
                                        class="py-1 px-1 my-1 mr-1 rounded-xl border-gray-700 border-[1px]"
                                    >
                                        Hybrid
                                    </p>
                                    <p
                                        class="py-1 px-1 my-1 mr-1 rounded-xl border-gray-700 border-[1px]"
                                    >
                                        Full-Time
                                    </p>
                                    <p
                                        class="py-1 px-1 my-1 mr-1 rounded-xl border-gray-700 border-[1px]"
                                    >
                                        Project-work
                                    </p>
                                </div>
                                <div
                                    class="px-1 pt-1 mt-4 text-sm font-semibold"
                                >
                                    {{ job.salary }}
                                </div>
                                <div class="px-1 text-sm">
                                    {{ job.city }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-8 px-2 h-auto min-h-screen bg-slate-100">
        <div class="flex flex-wrap justify-center">
            <div
                class="grid grid-cols-2 justify-center m-auto my-16 md:grid-cols-4"
            >
                <div class="my-4 h-56 max-w-[15rem]">
                    <div class="flex flex-wrap py-4 px-6 justify center">
                        <p class="mt-2 w-full text-5xl text-center">5K+</p>
                        <p class="mt-4 w-full font-semibold text-center">
                            Successful Applicants
                        </p>
                        <p class="mt-4 w-full text-center">
                            Over Five Thousand Succesful Applicants .
                        </p>
                    </div>
                </div>
                <div class="my-4 h-56 max-w-[15rem]">
                    <div class="flex flex-wrap py-4 px-6 justify center">
                        <p class="mt-2 w-full text-5xl text-center">2K+</p>
                        <p class="mt-4 w-full font-semibold text-center">
                            Employers Onboard
                        </p>
                        <p class="mt-4 w-full text-center">
                            Over Two Thousand Employers Currently.
                        </p>
                    </div>
                </div>
                <div class="my-4 h-56 max-w-[15rem]">
                    <div class="flex flex-wrap py-4 px-6 justify center">
                        <p class="mt-2 w-full text-5xl text-center">12K+</p>
                        <p class="mt-4 w-full font-semibold text-center">
                            Jobs Posted.
                        </p>
                        <p class="mt-4 w-full text-center">
                            More than Twelve Thousand Jobs Posted .
                        </p>
                    </div>
                </div>
                <div class="my-4 h-56 max-w-[15rem]">
                    <div class="flex flex-wrap py-4 px-6 justify center">
                        <p class="mt-2 w-full text-5xl text-center">129</p>
                        <p class="mt-4 w-full font-semibold text-center">
                            Committed Staff
                        </p>
                        <p class="mt-4 w-full text-center">
                            One Hundred and Twenty Nine Staff.
                        </p>
                    </div>
                </div>
            </div>

            <div class="my-16">
                <h1 class="text-xl font-semibold text-center">
                    Some of Our Top Recruiters
                </h1>
                <div class="flex flex-wrap justify-center my-8">
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                    <div class="my-4 mx-2 w-44 h-24 bg-blue-300"></div>
                </div>
            </div>
        </div>
    </div>
    <Faqs />
    <PageFooter />
</template>
