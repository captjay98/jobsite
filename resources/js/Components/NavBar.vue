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
    <nav class="hidden md:flex space-x-5">
        <ul v-for="link in links" class="flex space-x-5">
            <li
                :class="{
                    'text-slate-700 hover:text-blue-600 hover:underline hover:underline-offset-4':
                        $page.url === '/',
                    'text-slate-200 hover:text-blue-900 hover:underline hover:underline-offset-4':
                        $page.url !== '/',
                }"
                class="ml-2"
            >
                <Link :href="link.path">{{ link.name }}</Link>
            </li>
        </ul>
        {{ console.log("ShowLink", showLink(employer)) }}
        <ul>
            <li class="ml-2 hover:text-yellow-700" v-show="showLink(seeker)">
                <Link :href="route('seeker.dashboard')">SDashboard</Link>
            </li>
            <li class="ml-2 hover:text-black" v-show="showLink(employer)">
                <Link :href="route('employer.dashboard')">EDashboard</Link>
            </li>
        </ul>
    </nav>
    <div class="md:hidden flex space-x-5">
        <button class="absolute right-10" @click="drop = !drop">
            <img
                class="h-8 w-8 py-1 px-1"
                :src="'/storage/icons/hamburger.png'"
                alt="Profile Avatar"
            />
        </button>

        <nav v-show="drop" class="transition ease-in">
            <div
                class="transition ease-in duration-200 bg-blue-500 absolute top-20 right-5 px-4 py-4 rounded-xl"
            >
                <ul v-for="link in links" class="px-2 py-2 text-left">
                    <li>
                        <Link :href="link.path">{{ link.name }}</Link>
                    </li>
                </ul>
                {{ console.log("ShowLink", showLink(employer)) }}
                <ul class="px-2 py-2 text-left">
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
<!-- {{ -->
<!--     // console.log(user.accounttype, "@thenavbar Component") -->
<!--     user ? console.log(user.accounttype, "@thenavbar Component") : console.log("No User") -->
<!-- }} -->
<!-- <li> -->
<!--     <Link :href="route('register')">Register</Link> -->
<!-- </li> -->
<!-- console.log("User", user.accounttype); -->
<!--        console.log("accounttype", accounttype); -->
