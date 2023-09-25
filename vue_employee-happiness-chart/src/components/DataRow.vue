<script setup>
    import { ref } from 'vue'
    import { useGraphStore } from './../stores/GraphStore.js'
    const DataStore = useGraphStore();

    let props = defineProps({
        data: {
            type: Array,
        }
    })
</script>

<template>
    <tr class="dataRow">
        <td>
            <p class="departmentTitle">{{ data.department }}</p>
        </td>
        <td>
            <div class="mood-data">
                <label for="very_happy">Very Happy</label><br>
                <input id="very_happy" type="number" v-model="data.very_happy">
            </div>
        </td>
        <td>
            <div class="mood-data">
                <label for="happy">Happy</label><br>
                <input id="happy" type="number" v-model="data.happy">
            </div>
        </td>
        <td>
            <div class="mood-data">
                <label for="content">Content</label><br>
                <input id="content" type="number" v-model="data.content">
            </div>
        </td>
        <td>
            <div class="mood-data">
                <label for="unhappy">Unhappy</label><br>
                <input id="unhappy" type="number" v-model="data.unhappy">
            </div>
        </td>
        <td>
            <div class="mood-data">
                <label for="very_unhappy">Very Unhappy</label><br>
                <input id="very_unhappy" type="number" v-model="data.very_unhappy">
            </div>
        </td>
    </tr>
</template>

<style scoped>
    .departmentTitle{
        font-size: .8em;
        margin-left: 2em;
    }
    .mood-data {
        border: 1px #BABEC4 solid;
        border-radius: .5em;
        margin: .1em;
        margin-left: 1em;
        /* padding-left: .25em;
        padding-top: .25em;
        padding-bottom: .25em; */
        padding: .25em;
    }

    label {
        /* margin-left: .5em;
        margin-top: .5em; */
        font-size: .7em;
        color: #8B929C;
    }

    input {
        border: none;
        width: 7em;
    }
</style>