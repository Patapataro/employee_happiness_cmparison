<script setup>
    import { computed } from 'vue'
    import GraphColumn from './GraphColumn.vue'
    import { useGraphStore } from './../../stores/GraphStore.js'

    const DataStore = useGraphStore();

    defineProps({
        data: {
            type: Array,
            // required: true
        }
    })

    // console.log(DataStore.data.value)

    let columnsData = [
        {
            title: 'Amazing',
            secondTitle: 'Very Happy',
            index: 'very_happy',
            colors: ['#008FCF', '#081E3F'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'very_happy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'very_happy'))
        },
        {
            title: 'Good',
            secondTitle: 'Happy',
            index: 'happy',
            colors: ['#07B2FF', '#00557B'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'happy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'happy'))
        },
        {
            title: 'Okay',
            secondTitle: 'Content',
            index: 'content',
            colors: ['#24B5BE', '#265B5F'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'content')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'content'))
        },
        {
            title: 'Risk',
            secondTitle: 'Unhappy',
            index: 'unhappy',
            colors: ['#BBBBBB', '#4F4F4F'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'unhappy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'unhappy'))
        },
        {
            title: 'High Risk',
            secondTitle: 'Very Unhappy',
            index: 'very_unhappy',
            colors: ['#FFA800', '#9A4100'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'very_unhappy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'very_unhappy'))
        }
    ];

</script>

<template>

    <!-- <h1>{{ data }}</h1> -->
    <div id="container">
        <div id="graphPercent">
            <p class="percent-label">100%</p>
            <p class="percent-label">75%</p>
            <p class="percent-label">50%</p>
            <p class="percent-label">25%</p>
            <p class="percent-label">0%</p>
        </div>
        <div id="chartContainer">
            <GraphColumn v-for="(columnData, index) in columnsData" :idx="index" :columnData="columnData" />
        </div>
    </div>

</template>  

<style scoped>
    #container {
        display:flex;
        text-align: center;
        width: 100%;
    }

    #graphPercent {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 4.5em;
        margin-bottom: 1.3em;
        margin: 3em .5em 1.3em 0;
        color: #8B929C;
        font-weight: 400;
    }
    .percent-label{
        font-size: .8em;
    }

    #chartContainer{
        display:flex;
        border: 1px #8B929C solid;
        border-radius: 1em;
        height: 25em;
        border-radius: 1em;
        width: 100%;
    }

    .column {
        display: flex;
        flex-flow: column;
    }

    .graph {
        display: flex;
        flex-direction: column;
        justify-content: end;
        background: repeating-linear-gradient(
            to bottom,
            #BABEC4,
            #BABEC4 1px,
            #fff 1px,
            #fff 25%
        );
        height: 100%;
    }

    .percent-top {
        text-align: center;
    }

    .bar {
        background-color: #3153b0;
        width: 90%;
        height: 70%;
        align-self: flex-end;
        margin-left: auto;
        margin-right: auto;
        border-radius: 1em 1em 0em 0em;
        /* margin: auto; */
        background-image: linear-gradient(#008FCF, #081E3F);

    }

    .mood {
    display: block;
    /* margin: 0 auto 2rem; */
    }
    /* .percent {

    } */
</style>