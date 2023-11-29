<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    sideLinks: { sideLinks: Array },
});
</script>

<template>
    <aside class="bg-white w-[11%] h-screen fixed top-12 pt-12 z-1000">
        <ul v-for="sidelink in sideLinks" class="py-2 px-1">
            <li class="">
                <Link
                    class="flex justify-center w-full m-auto py-1"
                    :class="{
                        'bg-blue-500 w-full text-white rounded-md shadow-2xl': $page.url.startsWith(
                            sidelink.url,
                        ),
                    }"
                    :method="sidelink.method"
                    :href="sidelink.path"
                    as="button"
                    ><div class="my-1">
                        <img class="w-5 h-5" :src="sidelink.img" alt="" />
                        <!-- <p>{{ sidelink.name }}</p> -->
                    </div>
                </Link>
            </li>
        </ul>
        <ul class="pl-1 py-3">
            <li class="flex flex-wrap justify-center items-center">
                <Link method="post" :href="route('logout')" as="button">
                    <div class="my-1">
                        <img class="w-6 h-6 m-auto" :src="'/storage/icons/logout.png'" alt="" />
                    </div>
                </Link>
            </li>
        </ul>
    </aside>
    <aside
        class="hidden lg:block bg-white font-medium tracking-wide w-[12%] h-screen fixed top-12 pt-12 text-[13px] z-1000"
    >
        <ul v-for="sidelink in sideLinks" class="px- py-3">
            <li class="px-1">
                <Link
                    class="flex xl:px-8 justify-start w-full m-auto px-1 py-[6px]"
                    :class="{
                        'bg-blue-400  text-white rounded-md': $page.url.startsWith(sidelink.url),
                    }"
                    :href="sidelink.path"
                    as="button"
                >
                    <div class="flex items-center space-x-2">
                        <img class="w-5 h-5 m-auto" :src="sidelink.img" alt="" />
                        <p>{{ sidelink.name }}</p>
                        <!-- {{ console.log(sidelink.url) }} -->
                    </div>
                </Link>
            </li>
        </ul>
        <ul class="pl-2 py-3">
            <li class="w-full">
                <Link method="post" :href="route('logout')" as="button">
                    <div class="xl:px-8 flex items-center space-x-2">
                        <img class="w-5 h-5 m-auto" :src="'/storage/icons/logout.png'" alt="" />
                        <p>Logout</p>
                    </div>
                </Link>
                <!-- {{ console.log($page.url) }} -->
            </li>
        </ul>
    </aside>
</template>
