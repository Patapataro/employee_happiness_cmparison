<script setup>
    import GraphColumn from './GraphColumn.vue'

    defineProps({
        percent: {
            type: Number,
            // required: true
        },
        titleOne: {
            type: String
        },
        title2: {
            type: String
        },
        colors:{
            type: Array
        }
    })
</script>

<template>
    <div class="column">
        <img alt="mood" class="mood" src="../../assets/svg/amazing.svg" width="25" height="25" />
        <div class="grphTitle"><p class="grphTitleText">{{ titleOne }}</p></div>
        <div class="header"><p>Very Happy</p></div>
        <div class="graph">
            <div class="bar"></div>
        </div>
        <div class="percent"><p>77%</p></div>
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

    .grphTitle{
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


</style>