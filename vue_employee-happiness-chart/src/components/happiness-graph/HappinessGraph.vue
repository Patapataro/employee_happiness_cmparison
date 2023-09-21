<script setup>
    import GraphColumn from './GraphColumn.vue'

    defineProps({
        data: {
            type: Array,
            // required: true
        }
    })
    let titleOnes = ['Amazing', 'Good', 'Okay', 'Risk', 'High Risk']
    let titleTwos = ['Very Happy', 'happy', 'content', 'Unhappy', 'Very Unhappy']
    // let dataLen = data.value.length
</script>

<template>

    <h1>{{ data }}</h1>
    <div id="container">
        <div id="graphPercent">
            <p>100%</p>
            <p>75%</p>
            <p>50%</p>
            <p>25%</p>
            <p>0%</p>
        </div>
        <div id="chartContainer">
            <!-- <GraphColumn /> -->
            <!-- <div class="column">
                <img alt="mood" class="mood" src="../../assets/svg/amazing.svg" width="25" height="25" />
                <div><p>Goal: 100%</p></div>
                <div class="header"><p>Very Happy + Happy</p></div>
                <div class="graph">
                    <p class="percent-top">77%</p>
                    <div class="bar"></div>
                </div>
                <div class="percent"><p>77%</p></div>
            </div> -->


            <!-- <GraphColumn :titleOne="'Amazing'" /> -->
            <GraphColumn v-for="key in data" />
            <GraphColumn />
            <GraphColumn />
            <GraphColumn />
            <GraphColumn />
            <GraphColumn />


            <!-- <div class="column">
                <img alt="mood" class="mood" src="../../assets/svg/amazing.svg" width="25" height="25" />
                <div><p>Take Action</p></div>
                <div class="header"><p>Very Happy + Happy</p></div>
                <div class="graph">
                    <p class="percent-top">77%</p>
                    <div class="bar"></div>
                </div>
                <div class="percent"><p>77%</p></div>
            </div> -->

        </div>
    </div>

</template>  

<style scoped>
    #container {
        display:flex;
        text-align: center;
    }

    #chartContainer{
        display:flex;
        border: 1px #8B929C solid;
        border-radius: 1em;
        height: 25em;
        border-radius: 1em;
    }

    #graphPercent {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        margin-top: 4.5em;
        margin-bottom: 1.3em;
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