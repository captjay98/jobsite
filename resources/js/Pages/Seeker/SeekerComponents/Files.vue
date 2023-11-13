<script setup>
import Button from "@/Components/Button.vue";
import { useForm, router } from "@inertiajs/vue3";
import { computed } from "vue";
// import VuePdfEmbed from "vue-pdf-embed";
// import VuePdfApp from "vue3-pdf-app";

const { files } = defineProps({ files: Object });

const form = useForm({
    cv: "",
    visa: "",
    passport: "",
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

const updateFile = () => {
    // if (!updatedFields.value.isEmpty) {
    // form.post(route("seeker.update"), updatedFields.value);
    router.post(route("seeker.update"), {
        _method: "put",
        ...updatedFields.value,
        forceFormData: true,
        preserveScroll: true,
    });

    // }
    console.log("FILES", updatedFields);
};
</script>
<template>
    {{ console.log("FORM", form) }}
    {{ console.log("UPDATED FIELDS", updatedFields) }}
    <div
        class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-2 py-2 border-slate-800"
    >
        <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
            <h1 class="text-xl text-left font-semibold py-2">CV, Visa & Passport</h1>
        </div>

        <div class="mx-4 my-4 lg:w-[80%] bg-white">
            <form
                class="my-4 bg-white rounded-md"
                enctype="multipart/form-data"
                @submit.prevent="updateFile"
            >
                <div
                    class="flex flex-wrap bg-white mt-2 m-auto justify-around w-11/12 sm:w-10/12 rounded-md"
                >
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                        <input
                            class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            :placeholder="files.cv"
                        />

                        <!-- <vue-pdf-app :pdf="files.cv"> </vue-pdf-app> -->
                    </div>
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                        <input
                            class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="from"
                            :placeholder="files.visa"
                        />
                    </div>
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                        <input
                            class="w-full h-full border-none shadow-sm rounded-md font-semibold"
                            type="text"
                            id="to"
                            :placeholder="files.passport"
                        />
                    </div>
                </div>

                <div
                    class="flex flex-wrap bg-white mt-4 m-auto justify-around w-11/12 sm:w-10/12 rounded-md"
                >
                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">CV:</span></label>
                        <input
                            class="flex w-44 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="file"
                            id="cv"
                            @input="updatedFields.cv = $event.target.files[0]"
                        />
                        <div v-show="form.errors.cv">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.cv }}
                            </p>
                        </div>
                    </div>

                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">Visa:</span></label>
                        <input
                            class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="file"
                            id="visa"
                            @input="updatedFields.visa = $event.target.files[0]"
                        />
                        <div v-show="form.errors.visa">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.visa }}
                            </p>
                        </div>
                    </div>

                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">Passport:</span></label>
                        <input
                            class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold"
                            type="file"
                            id="passport"
                            @input="updatedFields.passport = $event.target.files[0]"
                        />
                        <div v-show="form.errors.passport">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.passport }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center w-64 m-auto">
                    <Button :disabled="form.processing" type="submit"> Upload File </Button>
                </div>
            </form>
        </div>
    </div>
</template>
