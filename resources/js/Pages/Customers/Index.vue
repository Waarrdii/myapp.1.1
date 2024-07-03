<template>
    <Head title="Customers" />
    <AuthenticatedLayout>
        <DataView :dataTable="customers"> </DataView>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {
        Head
    } from '@inertiajs/vue3';
    import DataView from '@/Components/DataView.vue'

    const dataTable = defineProps([
        'customers'
    ])
</script>

<style lang="scss" scoped>

</style>
