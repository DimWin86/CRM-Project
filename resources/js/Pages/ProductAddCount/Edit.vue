<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(['product']);


const form = useForm({
    count_product: '',
    date_receiving: '',
});

const submit = () => {
    form.patch(route('productAddCount.update', props.product.id));
};

</script>

<template>
    <Head title="Добавление поставки"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Добавление новой поставки продукта на склад</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">

                        <div class="mt-4">
                            <InputLabel for="count_product" value="Количество пришедшее (шт)"/>

                            <TextInput
                                id="count_product"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.count_product"
                                required
                                autocomplete="count_product"
                            />

                            <p class="mt-2 text-gray-700">{{ 'Сейчас на складе: ' + product.count_product}}</p>

                            <InputError class="mt-2" :message="form.errors.count_product"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="date_receiving" value="Дата поставки"/>

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

                        <div class="flex items-center justify-end mt-4">

                            <button class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black
                             border border-2 border-gray-700 transition-all" :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing">
                                Добавить продукт
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
