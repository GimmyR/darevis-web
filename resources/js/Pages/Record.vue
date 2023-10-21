<script setup>
    import { Line } from 'vue-chartjs';
    import DetailsTable from './components/DetailsTable.vue';
    import Navbar from './components/Navbar.vue';
    import { CategoryScale, Chart as ChartJS, Legend, LineElement, LinearScale, PointElement, Title, Tooltip } from 'chart.js';

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
    <Navbar/>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">{{ record.title }}</h1>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 mb-5">
            <div v-for="parameter in record.parameters" class="mb-5">
                <div>
                    <h2 class="fs-3">{{ parameter.title }}</h2>
                </div>
                <div class="chartWrapper">
                    <Line :data="getData(parameter)" :options="options"/>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <DetailsTable :record="record"/>
        </div>
    </div>
</template>

<style>
    .chartWrapper {
        overflow-x: scroll;
    }
</style>