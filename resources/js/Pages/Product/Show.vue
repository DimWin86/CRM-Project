<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';

const props = defineProps(['product']);
</script>


<template>
    <Head title="Продукт"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ product.name_product }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div v-if="product">
                            <div class="mb-10 bg-gray-300 rounded-lg">
                                <div class="px-4 py-2 ">
                                    <div>Название продукта: {{ product.name_product }}</div>
                                    <div>Цена: {{ product.cost_product + ' &#x20bd/шт'}}</div>
                                    <div>Количество на складе: {{ product.count_product + ' шт'}}</div>
                                    <div>Дата последней поставки: {{ product.date_receiving }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mb-10">
                            <Link :href="route('product.index')"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'product.index')"><< Вернуться назад
                            </Link>

                            <Link :href="route('productAddCount.edit', product.id)"
                                  class="px-2 py-1 mr-7 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('productAddCount.edit')">Добавить продукты на склад
                            </Link>

                            <Link :href="route('product.edit', product.id)"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'product.edit')">Редактировать
                            </Link>
                        </div>
                            <p @click="deleteProduct(product.id)"
                               class="cursor-pointer mx-auto text-center text-white w-1/2 mt-3 px-2 py-1 text-sm bg-red-500 rounded-lg hover:bg-white hover:text-red-500 border border-2 border-red-500 transition-all">
                                Удалить</p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
export default {
    methods: {
        deleteProduct(id) {
            this.$inertia.delete(`/product/${id}/delete`)
        }
    }
}
</script>




