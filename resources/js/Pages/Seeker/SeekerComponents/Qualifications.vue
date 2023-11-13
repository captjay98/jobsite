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
    <div class="lg:w-[48%] mx-3 m-auto">
        <div class="m-auto w-[99%] px-4 py-4 rounded-md">
            <h1 class="text-xl text-center font-semibold">Qualifications</h1>
        </div>
        <form class="" @submit.prevent="updateQuali">
            <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                <div
                    v-for="quali in qualifications"
                    :key="quali.id"
                    class="flex flex-wrap mt-8 m-auto justify-center lg:w-full rounded-md"
                >
                    <div class="text-sm text-left pt-2 px-2">
                        <input
                            class="flex h-8 w-16 border-slate-200 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            v-model="quali.from"
                        />
                    </div>
                    <div class="text-sm text-left pt-2 px-2">
                        <input
                            class="flex h-8 w-16 border-gray-200 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            v-model="quali.to"
                        />
                    </div>
                    <div class="text-sm text-left pt-2 px-2">
                        <input
                            class="flex h-8 w-28 border-gray-100 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="quali.title"
                        />
                    </div>
                </div>
                <!-- UPLOAD -->
                <div class="flex flex-wrap bg-white mt-8 m-auto justify-center w-full rounded-md">
                    <div class="text-sm text-left pt-2 px-2">
                        <label for="from"><span class="text-sm px-2">From:</span></label>
                        <input
                            class="flex h-8 bg-gray-100 border-slate-300 shadow-xl rounded-md font-semibold"
                            type="date"
                            id="from"
                            v-model="form.qualification.from"
                        />
                    </div>
                    <div class="text-sm text-left pt-2 px-2">
                        <label for="to"><span class="text-sm px-2">To:</span></label>
                        <input
                            class="flex h-8 bg-gray-100 border-slate-300 shadow-xl rounded-md font-semibold"
                            type="date"
                            id="to"
                            v-model="form.qualification.to"
                        />
                    </div>
                    <div class="text-sm text-left pt-2 px-2">
                        <label for="title"><span class="text-sm px-2">Title:</span></label>
                        <input
                            class="flex h-8 w-44 bg-gray-100 border-slate-300 shadow-xl rounded-md font-semibold"
                            type="text"
                            id="title"
                            v-model="form.qualification.title"
                        />
                    </div>
                </div>
                <div v-show="form.errors.qualification">
                    <p class="text-sm my-2 text-red-500 w-60">
                        {{ form.errors.qualification }}
                    </p>
                </div>

                <div class="mt-6 flex justify-center">
                    <!-- <Link -->
                    <!--     type="button" -->
                    <!--     as="button" -->
                    <!--     method="put" -->
                    <!--     :href="route('seeker.update')" -->
                    <!--     :data="{ -->
                    <!--         qualification: { -->
                    <!--             title: form.qualifications.title, -->
                    <!--             to: form.qualifications.to, -->
                    <!--             from: form.qualifications.from, -->
                    <!--         }, -->
                    <!--     }" -->
                    <!-- > -->
                    <div class="flex justify-center w-64 m-auto">
                        <Button :disabled="form.processing" type="submit">
                            Add Qualification
                        </Button>
                    </div>
                    <!-- </Link> -->
                </div>
            </div>
        </form>
    </div>
</template>
