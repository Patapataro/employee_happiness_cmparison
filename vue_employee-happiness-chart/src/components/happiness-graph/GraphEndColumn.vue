<script setup>
    import { computed } from 'vue'
    import { useGraphStore } from './../../stores/GraphStore.js'

    const DataStore = useGraphStore();

    const props = defineProps({
        columnData: {
            type: Object,
            required: true
        },
        idx: {
            type: Number,
            required: true
        }
    })

    const titleGradient = computed(() => {
        return {
            backgroundImage: `linear-gradient(${props.columnData.titleGradient[0]}, ${props.columnData.titleGradient[1]})`,
        }
    })

    const barStyle = computed(() => {
        return {
            backgroundImage: `linear-gradient(${props.columnData.colors[0]}, ${props.columnData.colors[1]})`,
            height: `${props.columnData.salesPercent.value}%`,
            width: DataStore.compareToWork ? "60%" : "90%"
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

    const percentWidth = computed(() => {
        return  {
            width: DataStore.compareToWork ? "50%" : "100%",
            textAlign: DataStore.compareToWork ? "right" : "center"
        }
    })

    const topRoundedBorder = computed(() => {
        return {
            borderRadius: props.idx === 0 ? "1em 0 0 0 " : "0 1em 0 0"
        }
    })

    const bottomRoundedBorder = computed(() => {
        return {
            borderRadius: props.idx === 0 ? "0 0 0 1em " : "0 0 1em 0"
        }
    })

    const topBarPercent = computed(() => {
        return {
            display: props.columnData.salesPercent.value < 80 ? "block" : "none"
        }
    })
</script>

<template>
    <div class="column">
        <div class="titles-containet-end">
            <img alt="mood" class="mood" :src="props.columnData.img" width="75" height="75" />
            <div class="grphEndTitle" :style="titleGradient">
                <p class="grph-end-title-text">{{ props.columnData.title }}</p>
            </div>
        </div>
        <div class="header" :style="topRoundedBorder">
            <!-- <p>{{ columnData.secondTitle}}</p> -->
            <p v-for="(item, i) in props.columnData.secondTitle" :style="{ color: props.columnData.titleColors[i] }" class="grph-end-second-title-text">{{ item }}</p>
        </div>
        <div class="graph end-graph">
            <!-- <div class="bar-container"> -->
                <div :id="`bar-${ idx }`" class="bar" :style="barStyle">
                    <p class="percent top-bar-percent bold" :style="topBarPercent">{{ columnData.salesPercent.value }}%</p>
                </div>
                <div v-if="DataStore.compareToWork" class="bar second-end-bar" :style="secondBarStyle"></div>
            <!-- </div> -->
        </div>
        <div class="percent-container" :style="bottomRoundedBorder">
            <p class="percent bold" :style="[themeColor, percentWidth]">{{ columnData.salesPercent.value }}%</p>
            <p v-if="DataStore.compareToWork" class="percent second-end-percent">{{ columnData.workPercent.value }}%</p>
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

    .titles-containet-end {
        padding-top: .15em;
    }
    .mood {
        display: block;
        margin: 0 auto;
        position: relative;
        top: 1.6em;
        z-index: -1;
    }

    .grphEndTitle{
        background-image: linear-gradient(#008FCF, #081E3F);
        border-radius: 1em 1em 0em 0em;
        text-align: center;
        color: white;
        font-weight: 700;
        width: 70%;
        padding: .3em;
        margin: auto;
        z-index: 1;
    }

    .grph-end-title-text {
        margin: .05em;
        font-size: .8em;
    }

    .dataBorder {
        flex-grow: 4;
    }

    .header {
        display: flex;
        justify-content: space-around;
        border: 1px #BABEC4 solid;
        border-bottom: 0;
        font-size: 1em;
    }

    .header > :first-child {
        margin-left: 1em;

    }

    .header > :last-child {
        margin-right: 1em;
    }

    .grph-end-second-title-text {
        margin: 1.4em auto;
        margin-bottom: .78em;
        font-size: 0.8em;
        white-space: nowrap;
        font-weight: 700;
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
        padding-left: 1em;
        padding-right: 1em;
    }

    .end-graph {
        border-left: 1px #BABEC4 solid;
        border-right: 1px #BABEC4 solid;
    }

    .percent-container {
        text-align: center;
        justify-content: center;
        display: flex;
        flex-direction: row;
        border: 1px #BABEC4 solid;
    }

    /* .percent {
        width: 20%;
    } */

    .second-end-percent {
        font-size: .8em;
        align-self: center;
        width: 50%;
        text-align: center;
    }

    .bold {
        font-weight: 700;
    }

    /* div[id^='bar-'] { */
    .bar {
        min-height: 1%;
        max-height: 100%;
        align-self: flex-end;
        margin-left: auto;
        margin-right: auto;
        border-radius: .5em .5em 0em 0em;
        transition: height 0.5s ease-out, width 0.5s ease-out;
    }

    .top-bar-percent {
        margin: 0 auto;
        position: relative;
        bottom: 2em;
    }

    .second-end-bar {
        width: 20%;
        background-color: #162438
    }
</style>