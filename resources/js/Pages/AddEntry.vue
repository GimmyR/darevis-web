<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from './components/Navbar.vue';

const props = defineProps({ record: Object });

const add0b = function(nb) {
    if(nb < 10)
        nb = "0" + nb;
    return nb;
};

const getDatetime = function(datetime) {
    return datetime.getFullYear() + "-" + add0b(datetime.getMonth()) + "-" + add0b(datetime.getDate()) + "T" + add0b(datetime.getHours()) + ":" + add0b(datetime.getMinutes());
};

const initForm = function() {
    let table = {
        "created_at": getDatetime(new Date()),
        "details": []
    };
    props.record.parameters.forEach(param => {
        table.details.push({ parameter_id: param.id, value: null });
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
                <div class="mb-3">
                    <label class="form-label fw-bold">Creation date</label>
                    <input type="datetime-local" class="form-control" v-model="form.created_at"/>
                </div>
                <div v-for="(parameter, index) in record.parameters" class="mb-3">
                    <label class="form-label fw-bold">
                        {{ parameter.title }}<span v-if="parameter.unit != null"> ({{ parameter.unit }})</span>
                    </label>
                    <input type="number" step="any" class="form-control" v-model="form.details[index].value"/>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary fw-bold text-uppercase">Add Entry</button>
                </div>
            </form>
        </div>
    </div>
</template>