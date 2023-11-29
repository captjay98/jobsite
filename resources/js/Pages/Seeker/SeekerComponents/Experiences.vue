<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const { experiences } = defineProps({
    experiences: Object,
});

const form = useForm({
    experience: {
        title: "",
        place: "",
        from: "",
        to: "",
    },
});

const updatedFields = computed(() => {
    const updatedFields = {};
    for (const key in form.value) {
        if (form.value[key] !== seeker.user[key]) {
            updatedFields[key] = form.value[key];
        }
    }
    return updatedFields;
});

const updateExpe = () => {
    if (!updatedFields.value.isEmpty) {
        form.put(route("seeker.update"), {
            ...updatedFields.value,
            preserveScroll: true,
            onFinish: () => form.reset(),
        });
    }
    console.log("EXPERIENCE", updatedFields);
};
</script>
<template>
    <!-- EXPERIENCES -->
    <!-- <div -->
    <!--     class="w-full flex flex-wrap justify-start bg-white rounded-md my-4 px-2 py-2 border-slate-800" -->
    <!-- > -->
    <div class="mx-1 my-4 xl:w-[35%] lg:w-50%">
        <div class="mt-1 m-auto w-[99%] px-2 py-2 bg-white rounded-md">
            <h1 class="text-xl text-center font-semibold py-1">Experiences</h1>
        </div>

        <form class="my-2 bg-white rounded-md" @submit.prevent="updateExpe">
            <div
                :key="expe.id"
                v-for="expe in experiences"
                class="hover:shadow-2xl hover:translate-x-1 border-inherit border-[1px] py-1 px-2 flex my-1 shadow-sm flex-wrap justify-around mt-1 m-auto w-full lg:w-[90%] rounded-md"
            >
                <div
                    class="text-white bg-blue-400 mt-12 w-[130px] h-[28px] px-1 pb-1 rounded-md flex align-middle"
                >
                    <div class="bg-blue-400 text-sm text-left py-2 px-">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            v-model="expe.from"
                        />
                    </div>
                    <div class="bg-slat300 flex items-center">-</div>
                    <div class="text-sm text-left py-2">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="expe.to"
                        />
                    </div>
                </div>
                <div class="-300">
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="expe.title"
                        />
                    </div>
                    <div class="flex items-center justify-center">-</div>
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                            v-model="expe.place"
                        />
                    </div>
                </div>
            </div>
            <!-- UPLOAD -->
            <div
                class="border-inherit border-[1px] py-1 px-2 flex my-1 shadow-sm flex-wrap justify-around mt-1 m-auto w-full lg:w-[90%] rounded-md"
            >
                <div
                    class="text-white bg-blue-400 mt-12 w-[130px] h-[28px] px-1 pb-1 rounded-md flex align-middle"
                >
                    <div class="bg-blue-400 text-sm text-left py-2 px-">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            v-model="form.experience.from"
                        />
                    </div>
                    <div class="bg-slat300 flex items-center">-</div>
                    <div class="text-sm text-left py-2">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="form.experience.place"
                        />
                    </div>
                </div>
                <div class="-300">
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="form.experience.title"
                        />
                    </div>

                    <div class="flex items-center justify-center">-</div>
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                            v-model="form.experience.place"
                        />
                    </div>
                </div>
                <div v-show="form.errors.experience">
                    <p class="text-sm my-2 text-red-500 w-60">
                        {{ form.errors.experience }}
                    </p>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center w-64 m-auto">
                    <Button :disabled="form.processing" type="submit"> Add Experience </Button>
                </div>
            </div>
        </form>
    </div>
    <!-- </div> -->
</template>
