<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
</script>

<template>
    <Head title="Продукты"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="w-1/5 mx-auto mb-8 py-2 text-2xl text-center border-4 border-gray-700 rounded-full">
                            Ваши
                            продукты</p>
                        <div v-if="products" class="flex flex-col items-center">
                            <div v-for="product in products" class="mb-10 bg-gray-300 rounded-lg w-3/4">
                                <div class="px-4 py-2 flex flex-row justify-between">
                                    <div class="p-1">
                                        <div>{{ product.name_product }}</div>
                                        <div class="mt-2">
                                            <Link :href="route('product.show', product.id)"
                                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-gray-300 hover:text-black border border-2 border-gray-700 transition-all"
                                                  :active="route().current('product.show')">Подробнее
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 self-center">Остаток на складе: {{ product.count_product }}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="flex justify-center mb-5">
                        <Link
                            class="px-2 py-2 text-xl text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                            :href="route('product.create')"
                            :class="route().current('product.create')">
                            Добавить продукт
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
        'products'
    ]
}
</script>




