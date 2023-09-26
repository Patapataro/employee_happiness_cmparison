<script setup>
import { ref, onMounted, computed } from 'vue'
// import { getAll } from './services/HappinessChartService.js'
import HappinessGraph from './components/happiness-graph/HappinessGraph.vue'
import Notification from './components/NotificationBar.vue';
import DataRow from './components/DataRow.vue'
import { useGraphStore } from './stores/GraphStore.js'

const DataStore = useGraphStore();

let showNotification = ref(false)
let notificationMessage = ref('')
let notificationType = ref('success')

onMounted(async () => {
    DataStore.fetchData()
  }
)

function saveData() {
  DataStore.saveData().then((result)=> {
    // console.log(result)
    if(result.status === 'success') {
        notificationMessage.value = 'Update successful!'
        notificationType.value = 'success'
        showNotification.value = true

        setTimeout(() => {
            showNotification.value = false
        }, 3000);
    } 
  }).catch(error => {
      console.error(error);
      notificationMessage.value = 'Update failed!';
      notificationType.value = 'error';
      showNotification.value = true;

      setTimeout(() => {
        showNotification.value = false;
      }, 3000);
  });
}

</script>

<template>
  <header>
    <!-- <img alt="Vue logo" class="logo" src="./assets/logo.svg" width="125" height="125" /> -->

    <!-- <div class="wrapper">
      <HelloWorld msg="You did it!" />
    </div> -->

    <Notification
      v-if="showNotification"
      :message="notificationMessage"
      :type="notificationType"
    />

    <h2 id="title">Employee Happiness Comparison</h2>
    <div id="checkbox">
      <input type="checkbox" v-model="DataStore.compareToWork">
      <p id="compareP">Compare to Workplace</p>
    </div>
    

  </header>

  <main>
    <!-- <TheWelcome /> -->

    <div v-if="DataStore.isLoading">
      Loading...
    </div>
    
    <!-- <div v-else-if="localData.value.length > 0"> -->
    <div v-else-if="DataStore.data">


      <!-- <h2>{{ DataStore.data }}</h2>
      <h2>{{ DataStore.compareToWork }}</h2> -->

      <HappinessGraph />

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
            <button id="save-btn" @click="saveData">Save</button>
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
  #title {
    text-align: center;
  }

  #checkbox {
    display: flex;
    float: right;
    position: relative;
    bottom: 2.5em;
  }

  #title {
    display: block;
    margin: auto;
  }

  table {
    table-layout: fixed;
    width:100%;
  }

  hr {
    border: 1px solid #D9D9D9;
    margin: 2em 0em 1em 0em;
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
  }

  @media (max-width: 1024px) {
    #checkbox {
      position: static;
    }
  }
</style>
