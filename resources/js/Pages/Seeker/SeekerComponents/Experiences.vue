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
            onSuccess: () => form.reset("from", "place", "to", "title"),
        });
    }
    console.log("EXPERIENCE", updatedFields);
};
</script>
<template>
    <!-- EXPERIENCES -->
    <div
        class="w-full flex flex-wrap justify-center bg-white rounded-md my-4 px-2 py-2 border-slate-800"
    >
        <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
            <h1 class="text-xl text-left font-semibold py-2">Experiences</h1>
        </div>

        <div class="mx-1 my-4 lg:w-[80%] bg-white">
            <form class="my-4 bg-white rounded-md" @submit.prevent="updateExpe">
                <div
                    :key="expe.id"
                    v-for="expe in experiences"
                    class="py-2 flex my-4 shadow-sm flex-wrap justify-center mt-2 m-auto w-full lg:w-[90%] rounded-md"
                >
                    <div class="max-sm:w-[80%] m-auto text-sm text-left py-2 px-2">
                        <input
                            class="text-center h-8 flex border-gray-100 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="expe.title"
                        />
                    </div>
                    <div class="max-sm:w-full flex items-center justify-center">at</div>
                    <div class="max-sm:w-[80%] m-auto text-sm text-left py-2 px-2">
                        <input
                            class="text-center h-8 flex border-gray-100 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                            v-model="expe.place"
                        />
                    </div>
                    <div class="text-sm text-left py-2 px-2">
                        <input
                            class="text-center h-8 flex w-[62px] border-gray-100 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            v-model="expe.from"
                        />
                    </div>
                    <div class="bg-slat300 flex items-center">to</div>
                    <div class="text-sm text-left py-2 pl-2">
                        <input
                            class="text-center h-8 flex w-[62px] border-gray-100 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="expe.to"
                        />
                    </div>
                </div>
                <!-- UPLOAD -->
                <div
                    class="lg:pl-10 w-full flex flex-wrap justify-center mt-2 m-auto space-x-2 lg:w-[90%] rounded-md"
                >
                    <div class="text-sm text-left py-4 px-2">
                        <label for="title"><span class="text-sm px-2">Title:</span></label>
                        <input
                            class="flex h-8 bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="form.experience.title"
                        />
                    </div>

                    <div class="max-sm:w-[80%] m-auto text-sm text-left py-4 px-2">
                        <label for="at"><span class="text-sm px-2">at:</span></label>
                        <input
                            class="flex h-8 bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                            v-model="form.experience.place"
                        />
                    </div>

                    <div class="text-sm text-left py-4 px-2">
                        <label for="from"><span class="text-sm px-2">From:</span></label>
                        <input
                            class="flex h-8 w-36 bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="date"
                            id="from"
                            v-model="form.experience.from"
                        />
                    </div>

                    <div class="text-sm text-left py-4 px-2">
                        <label for="to"><span class="text-sm px-2">To:</span></label>
                        <input
                            class="flex h-8 w-36 bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="date"
                            id="to"
                            v-model="form.experience.to"
                        />
                    </div>
                </div>
                <div v-show="form.errors.experience">
                    <p class="text-sm my-2 text-red-500 w-60">
                        {{ form.errors.experience }}
                    </p>
                </div>
                <div class="flex justify-center">
                    <div class="flex justify-center w-64 m-auto">
                        <Button :disabled="form.processing" type="submit"> Add Experience </Button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
