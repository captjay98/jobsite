<script setup>
import Button from "@/Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import { useToast } from "vue-toastification";

const toast = useToast()

const { experiences } = defineProps({
    experiences: Object,
});

const form = useForm({
    experience: {
        from: "",
        to: "",
        title: "",
        place: "",
    },
});


const isAnyFieldEmpty = () => {
    return Object.values(form.experience).some(value => !value);
};


const updateExpe = () => {
    if (isAnyFieldEmpty()) {
        toast.error('Please fill in all required fields before submitting.');
    } else {
        form.put(route('seeker.update'), {
            preserveScroll: true,
            onSuccess: () => {
                toast.success('Form submitted successfully.');
                form.reset();
            },
            onError: () => {
                toast.error('There was an issue submitting the form.');
            }
        });
    }
};

const deleteExpe = () => {

    form.delete()//experience to delete
}
</script>
<template>
    <!-- EXPERIENCES -->
    <div class="my-4 xl:w-[35%] lg:w-[50%] w-full">
        <div class="mt-1 m-auto w-[99%] px-2 py-2 bg-white rounded-md">
            <h1 class="text-xl text-center font-semibold py-1">Experiences</h1>
        </div>
        <form class=" w-full grid grid-cols-2 gap-x-5 bg-white rounded-md" @submit.prevent="updateExpe">
            <div :key="expe.id" v-for="expe in experiences"
                class=" border-inherit  m-auto w-[12rem] max-sm:w-auto rounded-md">

                <div class="">
                    <div class="bg-blue-400  text-white mt-12 w-full h-[2rem] px-1 pb-1 rounded-md flex align-middle">
                        <div class="text-sm  py-2 ">
                            <input
                                class="bg-blue-400 text-center text-[0.8rem] h-full flex w-full border-none shadow-sm rounded-md font-semibold"
                                disabled type="text" id="from" v-model="expe.from" />
                        </div>
                        <div class="pt-1">-</div>
                        <div class="text-sm text-left py-2">
                            <input
                                class="bg-blue-400 text-center text-[0.8rem] h-full flex w-full border-none shadow-sm rounded-md font-semibold"
                                disabled type="text" id="to" v-model="expe.to" />
                        </div>
                    </div>
                    <div class="m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            disabled type="text" id="title" v-model="expe.title" />
                    </div>
                    <!-- <div class="flex items-center justify-center">-</div> -->
                    <div class=" m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            disabled type="text" id="place" v-model="expe.place" />
                    </div>
                </div>
            </div>
        </form>
        <form class="w-full grid grid-cols-1 my-2 bg-white rounded-md" @submit.prevent="updateExpe">
            <!-- UPLOAD -->
            <div class="">
                <div class="text-center font-semibold mt-10">ADD ANOTHER</div>
            </div>

            <div
                class="grid  border-inherit border-[1px] py-1 px-2 flex my-1 shadow-sm flex-wrap justify-around mt-1 m-auto w-[12rem] max-sm:w-[10rem]  rounded-md">


                <div class="">
                    <div
                        class="text-white bg-blue-400 mt-12  w-[11rem] m-auto  h-[2rem] px-1 pb-1 rounded-md flex align-middle">
                        <div class="bg-blue-400 text-sm text-left py-2 px-">
                            <input
                                class="bg-blue-400 text-center  text-[0.8rem] h-full flex w-full border-none shadow-sm rounded-md font-semibold"
                                type="text" id="from" v-model="form.experience.from" />
                        </div>
                        <div class="flex items-center">-</div>
                        <div class="text-sm text-left py-2">
                            <input
                                class="bg-blue-400 text-center  text-[0.8rem] h-full flex w-full border-none shadow-sm rounded-md font-semibold"
                                type="text" id="to" v-model="form.experience.to" />
                        </div>
                    </div>
                    <div class=" w-[11rem] m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text" id="title" v-model="form.experience.title" placeholder="title" />
                    </div>


                    <div class=" w-[11rem]  m-auto text-sm text-left py-2 px-">
                        <input
                            class="text-center h-8 w-full text-[14px] flex border-inherit shadow-sm rounded-md font-semibold"
                            type="text" id="place" placeholder="comapny" v-model="form.experience.place" />
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
</template>
