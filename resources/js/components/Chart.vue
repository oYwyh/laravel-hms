<script setup></script>
<template>
<aside>
    <Line
        class="active"
        id="my-chart-id"
        :options="chartOptions"
        :data="chartData"
    />
</aside>
</template>
<script>

import { Line } from 'vue-chartjs'

import { Chart as ChartJS, CategoryScale,BarElement,ArcElement ,LinearScale, PointElement, LineElement, Title, Tooltip, Legend } from 'chart.js'

ChartJS.register(  CategoryScale,LinearScale,PointElement,BarElement,ArcElement,LineElement,Title,Tooltip,Legend)

export default {
props: ['label','datas'],
name: 'LineCharts',
components: { Line },
data() {
    return {
    chartData: {
        labels: (this.label).split(','),
        datasets: [
            {
                label: 'Patients',
                backgroundColor: 'blue',
                data: (this.datas).split(','),
            },
        ]
    },
    chartOptions: {
        responsive: true
    }
    }
},
mounted() {
    // window.axios.get('/api/chart').then(res => {
    //     let response = res.data
    //     window.label = response.labels;
    //     window.datas = response.data;
    // })
}
}


</script>
