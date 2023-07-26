<script setup>
import axios from "axios";
import { ref , onMounted } from 'vue';

const time = ref([])
const getTime = () => {
    axios.get('/api/time')
    .then((res) => (time.value = res.data))
    .catch(error => console.log(error));
}
onMounted(() => getTime())
</script>
<template>
    {{ time }}
</template>
