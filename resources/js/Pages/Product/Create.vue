<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name_product: '',
    cost_product: '',
    count_product: '',
    date_receiving: '',
});

const submit = () => {
    form.post(route('product.store'));
};

</script>

<template>
    <Head title="Create-Product"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавьте новый продукт</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="name_product" value="Название продукта"/>

                            <TextInput
                                id="name_product"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name_product"
                                required
                                autofocus
                                autocomplete="name_product"
                            />

                            <InputError class="mt-2" :message="form.errors.name_product"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="cost_product" value="Цена продукта (&#x20bd/шт)"/>

                            <TextInput
                                id="cost_product"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.cost_product"
                                required
                                autocomplete="surname"
                            />

                            <InputError class="mt-2" :message="form.errors.cost_product"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="date_receiving" value="Последняя дата поставки"/>

                            <TextInput
                                id="date_receiving"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.date_receiving"
                                required
                                autocomplete="date_receiving"
                            />

                            <InputError class="mt-2" :message="form.errors.date_receiving"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="count_product" value="Количество на складе (шт)"/>

                            <TextInput
                                id="count_product"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.count_product"
                                required
                                autocomplete="count_product"
                            />

                            <InputError class="mt-2" :message="form.errors.count_product"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button class="px-2 py-1 text-sm text-white bg-gray-700
                            rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all" :class="{ 'opacity-25': form.processing }"
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
