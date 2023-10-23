<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from './components/Navbar.vue';

const props = defineProps({ record: Object });

const initForm = function() {
    let table = [];
    props.record.parameters.forEach(param => {
        table.push({ parameter_id: param.id, value: null });
    }); return table;
};

const form = useForm(initForm());

const handleSubmit = function() {
    form.post("/add-entry/" + props.record.id);
};
</script>

<template>
    <Navbar/>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">{{ record.title }}</h1>
        <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl-6">
            <form @submit.prevent="handleSubmit">
                <div v-for="(parameter, index) in record.parameters" class="mb-3">
                    <label :for="parameter.title" class="form-label fw-bold">
                        {{ parameter.title }}<span v-if="parameter.unit != null"> ({{ parameter.unit }})</span>
                    </label>
                    <input type="number" step="any" class="form-control" v-model="form[index].value"/>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary fw-bold text-uppercase">Add Entry</button>
                </div>
            </form>
        </div>
    </div>
</template>