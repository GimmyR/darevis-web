<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from './components/Navbar.vue';

const add0b = function(nb) {
    if(nb < 10)
        nb = "0" + nb;
    return nb;
};

const getDatetime = function(datetime) {
    return datetime.getFullYear() + "-" + add0b(datetime.getMonth()) + "-" + add0b(datetime.getDate()) + "T" + add0b(datetime.getHours()) + ":" + add0b(datetime.getMinutes());
};

const form = useForm({
    "created_at": getDatetime(new Date()),
    "title": null,
    "parameters": []
});

const addParameter = function() {
    form.parameters.push({ title: null, unit: null });
};

const removeParameter = function(index) {
    form.parameters.splice(index, 1);
};

const handleSubmit = function() {
    form.post("/add-record");
};
</script>

<template>
    <Navbar/>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">Create Record</h1>
        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-8 col-xxl-8">
            <form @submit.prevent="handleSubmit">
                <div class="mb-3">
                    <label class="form-label fw-bold">Creation Date</label>
                    <input type="datetime-local" class="form-control" v-model="form.created_at"/>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Record Title</label>
                    <input type="text" class="form-control" v-model="form.title"/>
                </div>
                <div class="mt-4 mb-3">
                    <div v-for="(parameter, index) in form.parameters" class="mb-3 d-flex flex-row">
                        <div class="col-6 col-sm-6 col-md-8 col-lg-8 col-xl-8 col-xxl-9 pe-3">
                            <label class="form-label fw-bold">Parameter Title #{{ index + 1 }}</label>
                            <input type="text" class="form-control" v-model="form.parameters[index].title"/>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 col-xxl-2">
                            <label class="form-label fw-bold">Parameter Unit #{{ index + 1 }}</label>
                            <input type="text" class="form-control" v-model="form.parameters[index].unit"/>
                        </div>
                        <div class="col-2 col-sm-2 col-md-1 col-lg-1 col-xl-1 col-xxl-1 d-flex flex-row justify-content-end align-items-end">
                            <button type="button" @click="removeParameter(index)" class="btn btn-warning">
                                <i class="bi bi-dash-lg"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="button" @click="addParameter" class="btn btn-light text-uppercase fw-bold d-flex flex-row justify-content-center align-items-center">
                            <i class="bi bi-plus-lg me-3 fs-5"></i>Add parameter
                        </button>
                    </div>
                </div>
                <div class="mt-4 mb-3 d-grid">
                    <button type="submit" class="btn btn-primary text-uppercase fw-bold d-flex flex-row justify-content-center align-items-center">
                        <i class="bi bi-save me-3 fs-5"></i>Save Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>