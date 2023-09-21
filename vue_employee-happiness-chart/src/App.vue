<script setup>
import { ref } from 'vue'
import { getAll } from './services/HappinessChartService.js'
import HappinessGraph from './components/happiness-graph/HappinessGraph.vue'
import DataRow from './components/DataRow.vue'
import { useGraphStore } from './stores/GraphStore.js'

useGraphStore();

const departments = ref(null)

getAll().then(response => {
  departments.value = response
})

</script>

<template>
  <header>
    <!-- <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" /> -->

    <!-- <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div> -->
    <h1 id="title">Employee Happiness Comparison</h1>
    <div id="checkbox">
      <input type="checkbox">
      <p>Compare to Workplace</p>
    </div>
    

  </header>

  <main>
    <!-- <TheWelcome /> -->
    <HappinessGraph :data="departments" />

    <hr>

    <DataRow v-for="department in departments" :data="department" :key="department.id"/>


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

  .dataRow{
    display: flex;
    justify-content: space-between;
  }

  .departmentTitle{
    display: inline;
  }

</style>
