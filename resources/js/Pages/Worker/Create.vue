<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    worker_name: '',
    worker_surname: '',
    worker_birthday: '',
    worker_phone_number: '',
});

const submit = () => {
    form.post(route('worker.store'));
};

</script>

<template>
    <Head title="Workers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавьте нового рабочего</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="worker_name" value="Name"/>

                            <TextInput
                                id="worker_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.worker_name"
                                required
                                autofocus
                                autocomplete="worker_name"
                            />

                            <InputError class="mt-2" :message="form.errors.worker_name"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="worker_surname" value="Surname"/>

                            <TextInput
                                id="worker_surname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.worker_surname"
                                required
                                autocomplete="worker_surname"
                            />

                            <InputError class="mt-2" :message="form.errors.worker_surname"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="worker_birthday" value="Birthday"/>

                            <TextInput
                                id="worker_birthday"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.worker_birthday"
                                required
                                autocomplete="worker_birthday"
                            />

                            <InputError class="mt-2" :message="form.errors.worker_birthday"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="worker_phone_number" value="Phone Number"/>

                            <TextInput
                                id="worker_phone_number"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.worker_phone_number"
                                required
                                autocomplete="phone_number"
                            />

                            <InputError class="mt-2" :message="form.errors.worker_phone_number"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all" :class="{ 'opacity-25': form.processing }"
                                           :disabled="form.processing">
                                Добавить рабочего
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
