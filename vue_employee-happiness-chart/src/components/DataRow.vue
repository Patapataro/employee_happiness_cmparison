<script setup>
    defineProps({
        data: {
            type: Object,
        }
    })
</script>

<template>
    <div class="dataRow">
      <p class="departmentTitle">{{ data.department }}</p>
      <input type="text" :value="data.very_happy">
      <input type="text" :value="data.happy">
      <input type="text" :value="data.content">
      <input type="text" :value="data.unhappy">
      <input type="text" :value="data.very_unhappy">
    </div>
</template>

<style scoped>

</style>