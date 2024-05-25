<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';

</script>


<template>
    <Head title="Продажа"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Продажа</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="data" class="p-6 text-gray-900">
                        <div>
                            <div class="mb-10 bg-gray-300 rounded-lg">
                                <div class="px-4 py-2 ">
                                    <div class="mb-2">Продавец: {{ data.worker_name + ' ' + data.worker_surname }}<a
                                        class="ml-9 px-1 py-0.5 text-xs text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black
                                  border border-2 border-gray-700 transition-all"
                                        :href="route('worker.show', data.worker_id)">Прейти в профиль</a></div>
                                    <div>Покупатель: {{ data.buyer_name + ' ' + data.buyer_surname }}<a class="ml-4 px-1 py-0.5 text-xs text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black
                                  border border-2 border-gray-700 transition-all" :href="route('buyer.show', data.buyer_id)">Прейти
                                        в профиль</a></div>
                                    <div>Продукт: {{ data.name_product }}</div>
                                    <div>Количество продуктов: {{ data.count_buy }}</div>
                                    <div>Сумма продажи: {{ data.cost_buy + '(&#x20bd)' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <Link :href="route('sale.index')"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black
                                  border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'sale.index')"><< Вернуться назад
                            </Link>
                            <Link :href="route('sale.edit', data.id)"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'sale.edit')">Редактировать
                            </Link>
                        </div>
                        <p @click="deleteSale(data.id)"
                           class="cursor-pointer mx-auto text-center text-white w-1/2 mt-3 px-2 py-1 text-sm bg-red-500
                               rounded-lg hover:bg-white hover:text-red-500 border border-2 border-red-500 transition-all">
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
        deleteSale(id) {
            this.$inertia.delete(`/sale/${id}/delete`)
        }
    },

    props: [
        'data',
    ],

}
</script>




