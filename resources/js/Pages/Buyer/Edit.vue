<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(['buyer']);


const form = useForm({
   buyer_name: props.buyer.buyer_name,
   buyer_surname: props.buyer.buyer_surname,
   buyer_birthday: props.buyer.buyer_birthday,
   buyer_email: props.buyer.buyer_email,
   buyer_phone_number: props.buyer.buyer_phone_number,
});

const submit = () => {
    form.patch(route('buyer.update', props.buyer.id));
};

</script>

<template>
    <Head title="Покупатель"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Отредактируйте покупателя</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="buyer_name" value="Name"/>

                            <TextInput
                                id="buyer_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.buyer_name"
                                required
                                autofocus
                                autocomplete="buyer_name"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_name"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_surname" value="Surname"/>

                            <TextInput
                                id="surname"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.buyer_surname"
                                required
                                autocomplete="buyer_surname"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_surname"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_birthday" value="Birthday"/>

                            <TextInput
                                id="buyer_birthday"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.buyer_birthday"
                                required
                                autocomplete="buyer_birthday"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_birthday"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_email" value="Email"/>

                            <TextInput
                                id="buyer_email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.buyer_email"
                                required
                                autocomplete="email"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_email"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_phone_number" value="Phone Number"/>

                            <TextInput
                                id="buyer_phone_number"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.buyer_phone_number"
                                required
                                autocomplete="buyer_phone_number"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_phone_number"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                Отредактировать покупателя
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
