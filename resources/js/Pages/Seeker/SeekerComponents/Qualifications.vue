<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const { qualifications } = defineProps({
    qualifications: Object,
});

const form = useForm({
    qualification: {
        title: "",
        to: "",
        from: "",
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

const updateQuali = () => {
    if (!updatedFields.value.isEmpty) {
        form.put(route("seeker.update"), {
            ...updatedFields.value,
            preserveScroll: true,
            onFinish: () => form.reset("from", "to", "title"),
        });
    }
    console.log("UPDATED", updatedFields);
};
</script>
<template>
    <!-- QUALIFICATIONS -->
    <div class="mx-1 my-4 xl:w-[35%] lg:w-50%">
        <div class="mt-1 m-auto w-[99%] px-2 py-2 bg-white rounded-md">
            <h1 class="text-xl text-center font-semibold py-2">Qualifications</h1>
        </div>

        <form class="my-2 bg-white rounded-md" @submit.prevent="updateQuali">
            <div
                :key="quali.id"
                v-for="quali in qualifications"
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
                            v-model="quali.from"
                        />
                    </div>
                    <div class="bg-slat300 flex items-center">-</div>
                    <div class="text-sm text-left py-2">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="quali.to"
                        />
                    </div>
                </div>
                <div class="-300">
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="quali.title"
                        />
                    </div>
                    <div class="flex items-center justify-center">-</div>
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                            v-model="quali.place"
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
                            v-model="form.qualification.from"
                        />
                    </div>
                    <div class="bg-slat300 flex items-center">-</div>
                    <div class="text-sm text-left py-2">
                        <input
                            class="bg-blue-400 text-center text-[11px] h-full flex w-[50%] border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="form.qualification.to"
                        />
                    </div>
                </div>
                <div class="-300">
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="form.qualification.title"
                        />
                    </div>
                    <div class="flex items-center justify-center">-</div>
                    <div class="max-sm:w-[150px] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text"
                            id="place"
                        />
                    </div>
                </div>
            </div>

            <div v-show="form.errors.qualification">
                <p class="text-sm my-2 text-red-500 w-60">
                    {{ form.errors.qualification }}
                </p>
            </div>
            <div class="flex justify-center">
                <div class="flex justify-center w-64 m-auto">
                    <Button :disabled="form.processing" type="submit"> Add qualification </Button>
                </div>
            </div>
        </form>
    </div>
</template>
