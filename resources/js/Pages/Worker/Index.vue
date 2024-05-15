<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/vue3';
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <Head title="Workers" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Workers</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">Тут воркеры</div>
                    <Link class="p-6 backdrop-blur" :href="route('worker.create')" :class="route().current('worker.create')">
                        Создать рабочего
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
