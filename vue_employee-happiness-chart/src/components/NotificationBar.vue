 <script setup>
    let props = defineProps({
        message: String,
        type: {
            type: String,
            default: 'success'
        }
    })

    let show = true

    function close() {
        show = false;
    }

</script>

<template>
    <div v-if="show" :class="['notification', type]" @click="close">
        {{ message }}
    </div>
</template>
  
  <style scoped>
    .notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        color: #fff;
    }
    
    .success {
        background-color: #28a745;
    }
    .error {
        background-color: #a72828;
    }
  </style>