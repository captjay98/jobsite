<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const data = defineProps({
    links: Array,
});

const seeker = "seeker";
const employer = "employer";

const user = usePage().props.auth.user;

const showLink = (accounttype) => {
    if (user) {
        return user.accounttype == accounttype;
    }
};

const drop = ref(false);
</script>

<template>
    <nav class="hidden space-x-5 md:flex">
        <ul :key="link.name" v-for="link in links" class="flex space-x-5">
            <li
                :class="{
                    'text-slate-200 hover:text-blue-600 hover:underline hover:underline-offset-4':
                        $page.url === '/',
                    'text-slate-200 hover:text-blue-900 hover:underline hover:underline-offset-4':
                        $page.url !== '/',
                }"
                class="ml-2"
            >
                <Link :href="link.path">{{ link.name }}</Link>
            </li>
        </ul>
        <ul>
            <li class="ml-2 hover:text-yellow-700" v-show="showLink(seeker)">
                <Link :href="route('seeker.dashboard')">SDashboard</Link>
            </li>
            <li class="ml-2 hover:text-black" v-show="showLink(employer)">
                <Link :href="route('employer.dashboard')">EDashboard</Link>
            </li>
        </ul>
    </nav>
    <div class="flex space-x-5 md:hidden">
        <button class="absolute right-10" @click="drop = !drop">
            <img
                class="py-1 px-1 w-8 h-8"
                :src="'/storage/icons/hamburger.png'"
                alt="Profile Avatar"
            />
        </button>

        <nav v-show="drop" class="transition-all duration-300 ease-in-out">
            <div
                class="absolute right-5 top-20 py-4 px-4 tracking-wider text-white bg-blue-500 rounded-md transition-all duration-300 ease-in-out"
            >
                <ul
                    :key="link.name"
                    v-for="link in links"
                    class="py-2 px-2 text-left"
                >
                    <li>
                        <Link :href="link.path">{{ link.name }}</Link>
                    </li>
                </ul>
                <ul class="py-2 px-2 text-left">
                    <li v-show="showLink(seeker)">
                        <Link href="/seeker">SDashboard</Link>
                    </li>
                    <li v-show="showLink(employer)">
                        <Link href="/employer">EDashboard</Link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
