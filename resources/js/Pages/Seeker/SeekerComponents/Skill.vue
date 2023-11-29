<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";

const { skills } = defineProps({
    skills: Object,
});
console.log(skills);
const form = useForm({
    skill: "",
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

const updateSkill = () => {
    if (!updatedFields.value.isEmpty) {
        form.put(route("seeker.update"), updatedFields.value);
    }
    console.log("UPDATED", updatedFields);
};
</script>
<template>
    <!-- SKILLS -->
    <div
        class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-2 py-2 border-slate-800"
    >
        <div class="lg:w-[48%] mx-3 m-auto h-auto">
            <div class="m-auto w-[99%] px-4 py-4 rounded-md">
                <h1 class="text-xl text-center font-semibold">Skills</h1>
            </div>
            {{ console.log(skills) }}
            <form class="flex flex-wrap justify-center" @submit.prevent="updateSkill">
                <div class="h-5 my-4" v-show="!skills">
                    <p class="text-center">No Skills Added Yet</p>
                </div>
                <div
                    v-for="skill in skills"
                    class="flex flex-wrap mt-8 m-auto justify-center rounded-md"
                >
                    <div class="text-sm text-left pt-2 px-2">
                        <input
                            class="flex w-16 border-slate-200 shadow-sm rounded-md font-semibold"
                            id="from"
                            v-model="skill.from"
                        />
                    </div>
                </div>
                <div class="mx-2 w-full mb-4 flex flex-wrap justify-around">
                    <div class="text-sm text-left pt-2 px-2">
                        <label for="skill"><span class="text-sm px-2">Skill Name:</span></label>
                        <input
                            class="flex h-8 w-56 bg-gray-100 border-slate-300 shadow-xl rounded-md font-semibold"
                            type="text"
                            id="from"
                            @input="updatedFields.skill.from = true"
                        />
                    </div>
                </div>

                <div class="mt-6 flex justify-center">
                    <div v-show="form.errors.skill">
                        <p class="text-sm my-2 text-red-500 w-60">
                            {{ form.errors.skill }}
                        </p>
                    </div>
                </div>
                <div class="flex justify-center w-64 m-auto mb-6">
                    <Button :disabled="form.processing" type="submit"> Add Skill </Button>
                </div>
            </form>
        </div>
    </div>
</template>
