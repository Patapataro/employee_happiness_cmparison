<script setup>
import { ref, onMounted, computed } from 'vue'
// import { getAll } from './services/HappinessChartService.js'
import HappinessGraph from './components/happiness-graph/HappinessGraph.vue'
import DataRow from './components/DataRow.vue'
import { useGraphStore } from './stores/GraphStore.js'

const DataStore = useGraphStore();

onMounted(async () => {
    DataStore.fetchData()
  }
)

</script>

<template>
  <header>
    <!-- <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" /> -->

    <!-- <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div> -->
    <h1 id="title">Employee Happiness Comparison</h1>
    <div id="checkbox">
      <input type="checkbox" v-model="DataStore.compareToWork">
      <p>Compare to Workplace</p>
    </div>
    

  </header>

  <main>
    <!-- <TheWelcome /> -->

    <div v-if="DataStore.isLoading">
      Loading...
    </div>
    
    <!-- <div v-else-if="localData.value.length > 0"> -->
    <div v-else-if="DataStore.data">


      <h2>{{ DataStore.data }}</h2>
      <h2>{{ DataStore.compareToWork }}</h2>

      <HappinessGraph :data="DataStore.data"/>

      <hr>
      <table id="data-input">
        <DataRow v-for="i in DataStore.dataLen" :key="i" :data="DataStore.data[i-1]"/>
        <tr>
          <td colspan="6">
            <hr>
          </td>
        </tr>
        <tr>
          <td colspan="5"></td>
          <td id="save-btn-cell">
            <button id="save-btn">Save</button>
          </td>
        </tr>
      </table>
    </div>

    <div v-else>
      No data available.
    </div>

  </main>
</template>

<style scoped>

  header {
    display: flex;
    justify-content: column;
  }

  #checkbox {
    display: flex;
    margin-right: 0;
  }

  #title {
    display: block;
    margin: auto;
  }

  table {
    table-layout: fixed;
  }

  hr {
    border: 1px solid #D9D9D9;
    margin: 2em 0em 1em 0em;
  }

  #data-input {
    width: 100%;
  }

  #save-btn-cell {
    padding-left: 1em;
  }

  #save-btn {
    border-radius: .5em;
    border: none;
    padding: .75em 3em;
    background-color: #008FCF;
    color: white;
    float: right;
    font-weight: 600;
    width: 100%;
    /* margin-left: 2em; */
  }
</style>
