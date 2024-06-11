<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex gap-4 justify-center">
                    <button v-if="$page.props.user.permissions.includes('create roles')" class="bg-slate-400 p-2">Admin</button>
                    <button v-if="$page.props.user.permissions.includes('read roles')" class="bg-slate-400 p-2">Editor</button>
                    <button class="bg-slate-400 p-2">Todos</button>
                </div>
                {{ $page.props }}
            </div>
        </div>
    </AppLayout>
</template>
