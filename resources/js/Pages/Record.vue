<script setup>
import Navbar from './components/Navbar.vue';
import DetailsTable from './components/DetailsTable.vue';
import DetailsCharts from './components/DetailsCharts.vue';
import { Link } from '@inertiajs/vue3';

defineProps({ user: Object, record: Object });
</script>

<template>
    <Navbar :user="user"/>
    <div class="container d-flex flex-column align-items-center">
        <div class="d-flex flex-row align-items-center">
            <Link :href="'/add-entry/' + record.id" title="Add Entry">
                <i class="bi bi-plus-circle fs-3 me-3"></i>
            </Link>
            <h1 class="mt-5 mb-5 me-3">{{ record.title }}</h1>
            <a :href="'/edit-record/' + record.id">
                <i class="bi bi-pencil-square fs-3"></i>
            </a>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8 mb-5">
            <DetailsCharts :record="record"/>
        </div>
        <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-8">
            <DetailsTable :record="record"/>
        </div>
    </div>
</template>