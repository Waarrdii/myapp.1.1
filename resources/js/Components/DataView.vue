<template>
    <div class="dark:text-gray-400 w-5/6 h-[calc(100vh-65px)] overflow-hidden flex flex-col mx-auto">
        <div class="my-5 overflow-auto w-full scrollbar">
            <table class="table-fixed text-nowrap">
                <thead class="sticky top-0 text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 select-none cursor-pointer">
                            Select
                            <!-- ketik di klik, maka akan select all dan diselect all. -->
                        </th>
                        <th @click="sortColumn(header)"
                            v-show="header !== 'id' && header !== 'created_at' && header !== 'updated_at'" scope="col"
                            class="px-6 py-3 select-none cursor-pointer" v-for="header in headerColumn" :key="header">
                            <div class="flex items-baseline">
                                <span>{{ header }}</span>
                                <div class="relative">
                                    <span class="triangle-up absolute bottom-0 left-0"
                                        :class="sortedColumn === header && ascendingOrder ? 'visible' : 'invisible'"></span>
                                    <span class="triangle-down absolute -top-2 left-0"
                                        :class="sortedColumn === header && !ascendingOrder ? 'visible' : 'invisible'"></span>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="data in dataTable" :key="data.id">
                        <td class="px-6 py-3">
                            <Checkbox name="selectData" :checked="isChecked"></Checkbox>
                        </td>
                        <td 
                        class="px-6 py-3"
                        v-show="header !== 'id' && header !== 'created_at' && header !== 'updated_at'"
                            v-for="header in headerColumn" :key="header">
                            {{ data[header] }}
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</template>

<script setup>
import { ref, reactive } from 'vue';
import Checkbox from './Checkbox.vue';

const props = defineProps({
    dataTable: Array,
    headerColumn: Array,
})

let isChecked = ref(false);
let ascendingOrder = ref(true);
let sortedColumn = ref(null);
const sortableData = ref(null);


const sortColumn = (header) => {
    ascendingOrder.value = !ascendingOrder.value;
    sortedColumn.value = header;
    sortableData.value = reactive(props.dataTable);
    // console.log(ascendingOrder.value);
    // console.log(sortedColumn.value);
    // console.log(sortableData.value);
    sortData();
}

const compareValue = (a, b) => {
    if (typeof a === 'string' && typeof b === 'string') {
        return a.localeCompare(b);
    } else if (typeof a === 'number' && typeof b === 'number') {
        return a - b;
    }
    return 0;
}

const sortData = () => {
    sortableData.value.sort((a, b) => {
        const dataA = a[sortedColumn.value];
        const dataB = b[sortedColumn.value];
        return ascendingOrder.value ? compareValue(dataA, dataB) : compareValue(dataB, dataA);
        // return ascendingOrder.value ? dataA.localeCompare(dataB) : dataB.localeCompare(dataA);
    })
}

</script>

<style lang="scss" scoped>
.triangle-up {
    content: "";
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 8px solid black;
    margin-left: 2px;
}

.triangle-down {
    content: "";
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 8px solid black;
    margin-left: 2px;
}
</style>