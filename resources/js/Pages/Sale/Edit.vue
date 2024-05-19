<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(['sale']);


const form = useForm({
    worker_id: props.sale.worker_id,
    product_id: props.sale.product_id,
    buyer_id: props.sale.buyer_id,
    count_buy: props.sale.count_buy,
    cost_buy: props.sale.cost_buy,
});

const submit = () => {
    form.patch(route('worker.update', props.sale.id));
};

</script>

<template>
    <Head title="Workers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Отредактируйте рабочего</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="worker_id" value="Продавец"/>

                            <TextInput
                                id="worker_id"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.worker_id"
                                required
                                autofocus
                                autocomplete="worker_id"
                            />

                            <InputError class="mt-2" :message="form.errors.worker_id"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="product_id" value="Продукт"/>

                            <TextInput
                                id="product_id"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.product_id"
                                required
                                autocomplete="product_id"
                            />

                            <InputError class="mt-2" :message="form.errors.product_id"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="buyer_id" value="Покупатель"/>

                            <TextInput
                                id="buyer_id"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.buyer_id"
                                autocomplete="buyer_id"
                            />

                            <InputError class="mt-2" :message="form.errors.buyer_id"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="count_buy" value="Количество купленного товара (шт)"/>

                            <TextInput
                                id="count_product"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.count_buy"
                                required
                                autocomplete="count_product"
                            />

                            <InputError class="mt-2" :message="form.errors.count_buy"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="cost_buy" value="Сумма покупки"/>

                            <TextInput
                                id="cost_buy"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.cost_buy"
                                required
                                autocomplete="cost_buy"
                            />

                            <InputError class="mt-2" :message="form.errors.cost_buy"/>
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
