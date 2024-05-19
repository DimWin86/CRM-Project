<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Продажи"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Продажи</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="w-1/5 mx-auto mb-8 py-2 text-2xl text-center border-4 border-gray-700 rounded-full">
                            Продажи</p>
                        <div v-if="sales" class="flex flex-col items-center">
                            <div v-for="sale in sales" class="mb-10 bg-gray-300 rounded-lg w-3/4">
                                <div class="px-4 py-2 flex flex-row justify-between">
                                    <div class="p-1">
                                        <div v-for="worker in workers" class="pb-1">
                                            <p v-if="worker.id === sale.worker_id">{{ 'Продавец: ' + worker.name }}</p>
                                        </div>
                                        <div v-for="product in products">
                                            <p v-if="product.id === sale.product_id">{{ 'Продукт: ' + product.name_product}}</p>
                                        </div>
                                        <div class="mt-2">
                                            <Link :href="route('sale.show', sale.id)"
                                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-gray-300 hover:text-black border border-2 border-gray-700 transition-all"
                                                  :active="route().current('worker.show')">Подробнее
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 self-center">Была оформлена: {{ sale.date_on_sale }}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-center mb-5">
                        <Link
                            class="px-2 py-2 text-xl text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                            :href="route('sale.create')"
                            :class="route().current('sale.create')">
                            Оформить продажу
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    props: [
        'sales',
        'products',
        'workers'
    ]
}

</script>




