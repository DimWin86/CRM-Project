<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";

const props = defineProps(['workers']);

</script>

<template>
    <Head title="Workers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Workers</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                            <p class="w-1/5 mx-auto mb-8 py-2 text-2xl text-center border-4 border-sky-500 rounded-full">Ваши
                                рабочие</p>
                        <div v-if="workers" class="flex flex-col items-center">
                            <div v-for="worker in workers" class="mb-10 bg-gray-300 rounded-lg w-3/4">
                                <div class="px-4 py-2 flex flex-row justify-between">
                                    <div class="p-1">
                                        {{ worker.name + ' ' + worker.surname }}
                                        <div class="mt-2">
                                            <Link :href="route('worker.show', worker.id)"
                                                  class="px-2 py-1 text-sm  bg-sky-500 rounded-lg hover:bg-gray-300 border border-2 border-sky-500 transition-all"
                                                  :active="route().current('worker.show')">Подробнее
                                            </Link>
                                        </div>
                                    </div>
                                    <div class="text-gray-500 self-center">Был добавлен: {{ worker.dateOnAdd }}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="w-1/6 mx-auto mb-5"><Link class="px-2 py-2 text-xl bg-sky-500 rounded-lg hover:bg-gray-300 border border-2 border-sky-500 transition-all" :href="route('worker.create')"
                               :class="route().current('worker.create')">
                        Добавить рабочего
                    </Link></div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>




