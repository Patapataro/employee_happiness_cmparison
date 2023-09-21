import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useGraphStore = defineStore('GraphStore', () => {
    const data = ref([])
    const compareToWork = ref(true)
    function getPercent(departmentName, groupName) {
        let idx = 0;
        data.value.forEach((item, index) => {
            if(departmentName === item.departmentName) {
                idx = index
            }
        });
        const departmen = data.value[idx];
        const total = departmen['very_happy'] + departmen['happy'] + departmen['content'] + departmen['unhappy'] + departmen['very_unhappy']
        const groupCount = departmen[groupName]
        const percent = groupCount/total * 100
        // Check if the percentage is a whole number
        if (Number.isInteger(percent)) {
            return `${percent}%`;
        } else {
            // Return the percentage rounded to the first decimal
            return `${percent.toFixed(1)}%`;
        }
    }

    function setData(newData) {
        data.value = newData;
    }

    function setCompareToWork(newCompareToWork) {
        compareToWork.value = newCompareToWork;
    }

    return {data, compareToWork, getPercent, setData, setCompareToWork}

});