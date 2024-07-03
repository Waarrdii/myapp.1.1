<template>
<div class="dark:text-gray-400 w-5/6 h-[calc(100vh-65px)] overflow-hidden flex flex-col">
    
{{ dataTable }}
</div>
    
</template>

<script setup>
import { ref, reactive } from 'vue';


const props = defineProps({
    dataTable: Array,
})
</script>

<style lang="scss" scoped>

</style>