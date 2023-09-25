import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import { getAll } from './../services/HappinessChartService.js'


export const useGraphStore = defineStore('GraphStore', () => {
    const _data = ref([])
    const _compareToWork = ref(true) 
    let isLoading = ref(false);
    const dataLen = computed(()=> _data.value.length)


    function getPercent(departmentName, groupName) {
        if(_data.value.length === 0){
            return "0%"
        }
        let idx = 0;
        _data.value.forEach((item, index) => {
            if(departmentName === item.department) {
                idx = index
            }
        });
        // console.log(_data.value)
        const department = _data.value[idx];
        const total = department['very_happy'] + department['happy'] + department['content'] + department['unhappy'] + department['very_unhappy']
        const groupCount = department[groupName]
        const percent = groupCount/total * 100
        // Check if the percentage is a whole number
        if (Number.isInteger(percent)) {
            return `${percent}%`;
        } else {
            // Return the percentage rounded to the first decimal
            return `${percent.toFixed(1)}%`;
        }
    }

    const compareToWork = computed({
        get: () => _compareToWork.value,
        set: (value) => setCompareToWork(value)
    })

    const data = computed({
        get: () => _data.value,
        set: (value) => setData(value)
    })

    function fetchData() {
        isLoading.value = true
        return getAll().then(response => {
            data.value = response
        }).finally(() => {
            isLoading.value = false
        });
    }

    function setCompareToWork(value) {
        _compareToWork.value = value
    }

    function setData(value) {
        _data.value = value
    }


    return {data, compareToWork, dataLen, isLoading, getPercent, fetchData}

});