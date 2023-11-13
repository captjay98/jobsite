<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    sideLinks: { sideLinks: Array },
});
</script>

<template>
    <aside class="bg-white w-[10%] h-screen fixed top-12 pt-12">
        <ul v-for="sidelink in sideLinks" class="py-2">
            <li class="">
                <Link
                    class="flex justify-center w-full m-auto py-1"
                    :class="{
                        'bg-blue-400 w-[80%] text-white rounded-md': $page.url.startsWith(
                            sidelink.url,
                        ),
                    }"
                    :method="sidelink.method"
                    :href="sidelink.path"
                    as="button"
                    ><div class="my-1">
                        <img class="w-7 h-7" :src="sidelink.img" alt="" />
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
    <aside class="hidden lg:block bg-white w-[10%] h-screen fixed top-12 pt-12">
        <ul v-for="sidelink in sideLinks" class="px-1 py-3">
            <li class="px-1">
                <Link
                    class="flex justify-start w-full m-auto px-2 py-2"
                    :class="{
                        'bg-blue-400 text-white rounded-md': $page.url.startsWith(sidelink.url),
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
        <ul class="pl-3 py-3">
            <li class="w-full">
                <Link method="post" :href="route('logout')" as="button">
                    <div class="flex items-center space-x-2">
                        <img class="w-5 h-5 m-auto" :src="'/storage/icons/logout.png'" alt="" />
                        <p>Logout</p>
                    </div>
                </Link>
                <!-- {{ console.log($page.url) }} -->
            </li>
        </ul>
    </aside>
</template>
