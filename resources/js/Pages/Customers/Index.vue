<template>
    <Head title="Customers" />
    <AuthenticatedLayout>
        <DataView :dataTable="customers" :headerColumn="headerColumn"> </DataView>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import {Head} from '@inertiajs/vue3';
    import { ref } from 'vue';
    import DataView from '@/Components/DataView.vue'

    
    const dataTable = defineProps({
        customers:Array,
    })
    const headerColumn = Object.keys(dataTable.customers[0]);
</script>

<style lang="scss" scoped>

</style>
