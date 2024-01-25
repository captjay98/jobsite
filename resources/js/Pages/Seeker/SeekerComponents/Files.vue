<script setup>
import Button from "@/Components/Button.vue";
import { useForm, router } from "@inertiajs/vue3";
import { computed } from "vue";
import { useToast } from "vue-toastification";


const { files } = defineProps({ files: Object });
const toast = useToast()

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
    router.post(route("seeker.update"), {
        _method: "put",
        ...updatedFields.value,
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            toast.info('File Uploaded.');
        },
    });

};
</script>
<template>
    <div class="w-full bg-white flex flex-wrap justify-center rounded-md my-4 px-2 py-2 border-slate-800">
        <div class="mt-2 m-auto w-[99%] px-4 py-2 bg-white rounded-md">
            <h1 class="text-xl text-left font-semibold py-2">CV, Visa & Passport</h1>
        </div>

        <div class="mx-4 my-4 lg:w-[80%] bg-white">
            <form class="my-4 bg-white rounded-md" enctype="multipart/form-data" @submit.prevent="updateFile">
                <div class="flex flex-wrap bg-white mt-2 m-auto justify-around w-11/12 sm:w-10/12 rounded-md">
                    <input type="hidden" name="_method" value="PUT" />
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4 overflow-hidden">
                        <a v-if="files.cv" :href="'storage/' + files.cv" download>
                            <embed :src="'storage/' + files.cv" class="w-full h-[95%]">
                            <p class=" text-center py-1 hover:bg-blue-400">Download</p>
                        </a>
                    </div>
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4 overflow-clip">

                        <a v-if="files.visa" :href="'storage/' + files.visa" download>
                            <embed :src="'storage/' + files.visa" class="w-full h-[95%]">
                            <p class=" text-center py-1 hover:bg-blue-400">Download</p>
                        </a>
                    </div>
                    <div class="shadow-md w-56 h-72 text-sm text-left py-4 px-4">
                        <a v-if="files.passport" :href="'storage/' + files.passport" download>
                            <embed :src="'storage/' + files.passport" class="w-full h-[95%]">
                            <p class=" text-center py-1 hover:bg-blue-400">Download</p>
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap bg-white mt-4 m-auto justify-around w-11/12 sm:w-10/12 rounded-md">
                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">CV:</span></label>
                        <input class="flex w-44 border-slate-300 shadow-sm rounded-md font-semibold" type="file" id="cv"
                            @input="updatedFields.cv = $event.target.files[0]" />
                        <div v-show="form.errors.cv">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.cv }}
                            </p>
                        </div>
                    </div>

                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">Visa:</span></label>
                        <input class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold" type="file"
                            id="visa" @input="updatedFields.visa = $event.target.files[0]" />
                        <div v-show="form.errors.visa">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.visa }}
                            </p>
                        </div>
                    </div>

                    <div class="text-center bg-slate-00 w-56 text-sm py-4 px-4">
                        <label for="from"><span class="text-sm px-2">Passport:</span></label>
                        <input class="flex bg-gray-100 border-slate-300 shadow-sm rounded-md font-semibold" type="file"
                            id="passport" @input="updatedFields.passport = $event.target.files[0]" />
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
