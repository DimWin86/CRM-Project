<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
const props = defineProps(['worker']);

</script>

<template>
    <Head title="Workers"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Worker</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="mb-8" >Тут воркеры</p>
                        <div v-if="worker">
                            <div class="mb-10 bg-gray-300 rounded-lg" >
                                <div class="px-4 py-2 ">
                                    <div>Имя: {{worker.name}}</div>
                                    <div>Фамилия: {{worker.surname}}</div>
                                    <div>День рождения: {{worker.birthday}}</div>
                                    <div>Номер телефона: {{worker.phone_number}}</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <Link class="p-6 backdrop-blur" :href="route('worker.index')"
                          :class="route().current('worker.index')">
                        Вернуться
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>




