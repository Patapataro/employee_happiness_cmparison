<script setup>
    import { computed } from 'vue'
    import GraphColumn from './GraphColumn.vue'
    import GraphEndColumn from './GraphEndColumn.vue'
    import { useGraphStore } from './../../stores/GraphStore.js'

    const DataStore = useGraphStore();

    let columnsData = [
        {
            componentName: GraphEndColumn,
            img: '/src/assets/svg/goal.svg',
            title: 'Goal: 100%',
            secondTitle: ['Very Happy', '+', 'Happy'],
            titleColors: ['#008FCF', '#8B929C', '#24B5BE'],
            index: 'very_happy',
            titleGradient: ['#008FCF', '#081E3F'],
            colors: ['#008FCF', '#081E3F'],
            salesPercent: computed(() =>  DataStore.getHappyPercent('Sales Team')),
            workPercent: computed(() =>  DataStore.getHappyPercent('Workplace'))
        },
        {
            componentName: GraphColumn,
            img: '/src/assets/svg/amazing.svg',
            title: 'Amazing',
            secondTitle: 'Very Happy',
            index: 'very_happy',
            colors: ['#07B2FF', '#00557B'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'very_happy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'very_happy'))
        },
        {
            componentName: GraphColumn,
            img: '/src/assets/svg/good.svg',
            title: 'Good',
            secondTitle: 'Happy',
            index: 'happy',
            colors: ['#24B5BE', '#265B5F'],
            salesPercent: computed(() =>  parseInt(DataStore.getPercent('Sales Team', 'happy'))),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'happy'))
        },
        {
            componentName: GraphColumn,
            img: '/src/assets/svg/okay.svg',
            title: 'Okay',
            secondTitle: 'Content',
            index: 'content',
            colors: ['#BBBBBB', '#4F4F4F'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'content')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'content'))
        },
        {
            componentName: GraphColumn,
            img: '/src/assets/svg/risk.svg',
            title: 'Risk',
            secondTitle: 'Unhappy',
            index: 'unhappy',
            colors: ['#FFA800', '#9A4100'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'unhappy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'unhappy'))
        },
        {            
            componentName: GraphColumn,
            img: '/src/assets/svg/high-risk.svg',
            title: 'High Risk',
            secondTitle: 'Very Unhappy',
            index: 'very_unhappy',
            colors: ['#FF5C00', '#9A4100'],
            salesPercent: computed(() =>  DataStore.getPercent('Sales Team', 'very_unhappy')),
            workPercent: computed(() =>  DataStore.getPercent('Workplace', 'very_unhappy'))
        },
        {
            componentName: GraphEndColumn,
            img: '/src/assets/svg/take-action.svg',
            title: 'Take Action',
            secondTitle: ['Not Happy'],
            titleColors: ['#545454'],
            index: 'very_unhappy',
            titleGradient: ['#FF4D00', '#4F0000'],
            colors: ['#FFA800', '#FF5C00'],
            salesPercent: computed(() =>  DataStore.getUnhappyPercent('Sales Team', 'very_unhappy')),
            workPercent: computed(() =>  DataStore.getUnhappyPercent('Workplace', 'very_unhappy'))
        }
    ];

    const getComponent = (index) => {
        console.log(index)
        if (index === 0 || index === columnsData.length - 1) {
            return GraphEndColumn;
        }
        return GraphColumn;
    };
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
            <component 
                v-for="(columnData, index) in columnsData" 
                :is="columnData.componentName" 
                :key="index" 
                :idx="index" 
                :columnData="columnData"
                />
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
        margin: 7em .5em 1.3em 0;
        color: #8B929C;
        font-weight: 400;
    }
    .percent-label{
        font-size: .8em;
    }

    #chartContainer{
        display:flex;
        /* border: 1px #8B929C solid; */
        border-top: none;
        border-radius: 1em;
        height: 25em;
        width: 100%;
        min-height: 30em;
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