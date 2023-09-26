<script setup>
    import { computed } from 'vue'
    import { useGraphStore } from './../../stores/GraphStore.js'

    const DataStore = useGraphStore();

    const props = defineProps({
        columnData: {
            type: Object
        },
        idx: {
            type: Number
        }
    })


    const gradient = computed(() => {
        return {
            backgroundImage: `linear-gradient(${props.columnData.colors[0]}, ${props.columnData.colors[1]})`,
        }
    })
    
    const barStyle = computed(() => {
        return {
            // backgroundImage: gradient,
            height: `${props.columnData.salesPercent.value}%`,
            width: DataStore.compareToWork ? "45%" : "90%"
        }
    })

    const percentWidth = computed(() => {
        return  {
            width: DataStore.compareToWork ? "55%" : "100%",
            textAlign: DataStore.compareToWork ? "right" : "center"
        }
    })

    const secondBarStyle = computed(() => {
        return {
            height: `${props.columnData.workPercent.value}%`
        }
    })

    const themeColor = computed(() => {
        return {
            color: `${props.columnData.colors[0]}`
        }
    })

    const borderSplit = computed(() => {
        return {
            borderRight: props.idx === 2 ? "1px #BABEC4 solid" : "none"
        }
    })
</script>

<template>
    <div class="column">
        <div class="titles-containet">
            <img alt="mood" class="mood" :src="props.columnData.img" width="75" height="75" />
            <div id="grphTitle" :style="gradient"><p class="grphTitleText">{{ props.columnData.title }}</p></div>
        </div>
        <div class="header" :style="[themeColor, borderSplit]"><p class="grph-second-title-text">{{ columnData.secondTitle}}</p></div>
        <div class="graph" :style="borderSplit">
            <!-- <div class="bar-container"> -->
                <div :id="`bar-${ idx }`" class="bar first-bar" :style="[barStyle, gradient]"></div>
                <div v-if="DataStore.compareToWork" class="bar second-bar" :style="secondBarStyle"></div>
            <!-- </div> -->
        </div>
        <div class="percent-container">
            <p class="percent first-percent percent-bold" :style="[themeColor, percentWidth]">{{ columnData.salesPercent.value }}%</p>
            <p v-if="DataStore.compareToWork" class="percent second-percent">{{ columnData.workPercent.value }}%</p>
        </div>
    </div>
</template>

<style scoped>
    .column {
        display: flex;
        flex-flow: column;
        width: 8em;
        width: 100%;
    }

    .mood {
        display: block;
        margin: 0 auto;
        position: relative;
        top: 1em;
        z-index: -1;
    }

    #grphTitle{
        /* background-image: linear-gradient(#008FCF, #081E3F); */
        border-radius: 1em 1em 0em 0em;
        text-align: center;
        color: white;
        padding: .3em;
        z-index: 1;
    }

    .grphTitleText {
        margin: 0;
        font-weight: 400;
    }

    .header {
        border-top: 1px #8B929C solid;
    }

    .grph-second-title-text {
        font-weight: 700;
        margin-bottom: .5em;
    }

    .graph {
        display: flex;
        flex-direction: row;
        justify-content: end;
        background: repeating-linear-gradient(
            to bottom,
            #BABEC4,
            #BABEC4 .5px,
            #fff .5px,
            #fff 25%
        );
        height: 100%;
        padding-left: 1.5em;
        padding-right: 1.5em;
    }

    .percent-container {
        /* text-align: center; */
        display: flex;
        flex-direction: row;
        border-bottom: 1px #BABEC4 solid;
        border-top: 1px #BABEC4 solid;
    }

    /* .percent {
        width: 40%;
    } */

    /* .first-percent {
        text-align: right;
    } */

    .percent-bold {
        font-weight: 700;
    }

    .second-percent {
        width: 45%;
        font-size: .8em;
        align-self: center;
        text-align: left;
        margin-left: 1em;
    }


    /* div[id^='bar-'] { */
    .bar {
        min-height: 1%;
        align-self: flex-end;
        margin-left: auto;
        margin-right: auto;
        border-radius: .5em .5em 0em 0em;
        transition: height 0.5s ease-out, width 0.5s ease-out;
    }

    /* .first-bar {
        width: 60%;
    } */

    .second-bar {
        width: 25%;
        background-color: #162438
    }
</style>