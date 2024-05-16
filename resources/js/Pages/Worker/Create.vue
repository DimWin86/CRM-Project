<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    surname: '',
    birthday: '',
    phone_number: '',
    sale_id: '',
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
                            <InputLabel for="name" value="Name"/>

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError class="mt-2" :message="form.errors.name"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="surname" value="Surname"/>

                            <TextInput
                                id="surname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.surname"
                                required
                                autocomplete="surname"
                            />

                            <InputError class="mt-2" :message="form.errors.surname"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="birthday" value="Birthday"/>

                            <TextInput
                                id="birthday"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.birthday"
                                required
                                autocomplete="birthday"
                            />

                            <InputError class="mt-2" :message="form.errors.birthday"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="phone_number" value="Phone Number"/>

                            <TextInput
                                id="phone_number"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.phone_number"
                                required
                                autocomplete="phone_number"
                            />

                            <InputError class="mt-2" :message="form.errors.phone_number"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }"
                                           :disabled="form.processing">
                                Add worker
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
