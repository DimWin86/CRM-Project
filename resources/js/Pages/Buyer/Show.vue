<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';

const props = defineProps(['buyer']);
</script>


<template>
    <Head title="Workers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Покупатель</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div v-if="buyer">
                            <div class="mb-10 bg-gray-300 rounded-lg">
                                <div class="px-4 py-2 ">
                                    <div>Имя: {{ buyer.buyer_name }}</div>
                                    <div>Фамилия: {{ buyer.buyer_surname }}</div>
                                    <div>День рождения: {{ buyer.buyer_birthday }}</div>
                                    <div>Email: {{ buyer.buyer_email }}</div>
                                    <div>Номер телефона: {{ buyer.buyer_phone_number }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between mb-10">
                            <Link :href="route('buyer.index')"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'buyer.index')"><< Вернуться назад
                            </Link>

                            <Link :href="route('buyerSales.show', buyer.id)"
                                  class="px-2 py-1 mr-7 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'buyerSales.show')">Все продажи
                            </Link>

                            <Link :href="route('buyer.edit', buyer.id)"
                                  class="px-2 py-1 text-sm text-white bg-gray-700 rounded-lg hover:bg-white hover:text-black border border-2 border-gray-700 transition-all"
                                  :active="route().current('\'buyer.edit')">Редактировать
                            </Link>
                        </div>
                            <p @click="deleteBuyer(buyer.id)"
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
        deleteBuyer(id) {
            this.$inertia.delete(`/buyer/${id}/delete`)
        }
    }
}
</script>




