<script setup>
    import { Line } from 'vue-chartjs';
    import { CategoryScale, Chart as ChartJS, LineElement, LinearScale, PointElement, Title, Tooltip } from 'chart.js';

    ChartJS.register(CategoryScale, LinearScale, PointElement, LineElement, Title, Tooltip);

    const props = defineProps({ record: Object });

    const getLabels = function() {
        let labels = [];

        props.record.entries.forEach(entry => {
            let d = new Date(entry.created_at);
            labels.push(d.toLocaleDateString());
        });

        return labels;
    };

    const getDetails = function(parameter) {
        let details = [];

        props.record.entries.forEach(entry => {
            entry.entry_details.forEach(detail => {
                if(detail.parameter_id == parameter.id)
                    details.push(detail.value);
            });
        });

        return details;
    };

    const getData = function(parameter) {
        return {
            labels: getLabels(),
            datasets: [
                { 
                    backgroundColor: "#4A59FF",
                    data: getDetails(parameter)
                }
            ]
        };
    };

    const options = { 
        responsive: true,
        maintainAspectRatio: false
    };
</script>

<template>
    <div v-for="parameter in record.parameters" class="mb-5">
        <div>
            <h2 class="fs-5">{{ parameter.title }}</h2>
        </div>
        <div class="chartWrapper">
            <Line :data="getData(parameter)" :options="options" class="line-chart"/>
        </div>
    </div>
</template>

<style>
    .chartWrapper {
        overflow-x: scroll;
    }

    .line-chart {
        height: 300px;
        min-width: 800px;
    }
</style>