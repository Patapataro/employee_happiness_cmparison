<script setup>
    import { computed } from 'vue'
    import GraphColumn from './GraphColumn.vue'
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

    // let barPercent = props.columnData.salesPercent.value ? 1

    const barStyle = computed(() => {
        return {
            backgroundImage: `linear-gradient(${props.columnData.colors[0]}, ${props.columnData.colors[1]})`,
            height: `${props.columnData.salesPercent.value}`
        }
    })
</script>

<template>
    <div class="column">
        <img alt="mood" class="mood" src="../../assets/svg/amazing.svg" width="25" height="25" />
        <div id="grphTitle"><p class="grphTitleText">{{ props.columnData.title }}</p></div>
        <div class="header"><p>{{ columnData.secondTitle}}</p></div>
        <div class="graph">
            <div :id="`bar-${ idx }`" :style="barStyle"></div>
        </div>
        <div class="percent"><p>{{ columnData.salesPercent.value }}</p></div>
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
    /* margin: 0 auto 2rem; */
    }

    #grphTitle{
        background-image: linear-gradient(#008FCF, #081E3F);
        border-radius: 1em 1em 0em 0em;
        text-align: center;
    }

    .grphTitleText {
        margin: .3em;
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

    div[id^='bar-'] {
        background-color: #3153b0;
        width: 90%;
        min-height: 1%;
        align-self: flex-end;
        margin-left: auto;
        margin-right: auto;
        border-radius: 1em 1em 0em 0em;
        /* margin: auto; */
        background-image: linear-gradient(#008FCF, #081E3F);

    }
</style>