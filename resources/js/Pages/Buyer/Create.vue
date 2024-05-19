<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    surname: '',
    birthday: '',
    email: '',
    phone_number: '',
});

const submit = () => {
    form.post(route('buyer.store'));
};

</script>

<template>
    <Head title="Create-Sale"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавление покупателя</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Имя"/>

                            <TextInput
                                id="worker_id"
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
                            <InputLabel for="surname" value="Фамилия"/>

                            <TextInput
                                id="surname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.surname"
                                required
                                autocomplete="product_id"
                            />

                            <InputError class="mt-2" :message="form.errors.surname"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_id" value="День рождения"/>

                            <TextInput
                                id="birthday"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.birthday"
                                autocomplete="birthday"
                            />

                            <InputError class="mt-2" :message="form.errors.birthday"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="email" value="Email"/>

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="email"
                            />

                            <InputError class="mt-2" :message="form.errors.email"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="phone_number" value="Номер телефона"/>

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

                            <button class="px-2 py-1 text-sm text-white bg-gray-700
                            rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                Добавить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
