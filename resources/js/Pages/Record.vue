<script setup>
    import DetailsTable from './components/DetailsTable.vue';
    import Navbar from './components/Navbar.vue';

    defineProps({ record: Object });
</script>

<template>
    <Navbar/>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">{{ record.title }}</h1>
        <div>
            <!-- CHARTS ARE HERE -->
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <DetailsTable :record="record"/>
        </div>
    </div>
</template>