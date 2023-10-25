<script setup>
import { useForm } from '@inertiajs/vue3';
import Navbar from './components/Navbar.vue';

const props = defineProps({ user: Object, record: Object, parameters: Array, entry: Object, details: Array });

const initForm = function() {
    let table = {
        "created_at": props.entry.created_at.substring(0, props.entry.created_at.lastIndexOf(":")),
        "details": props.details
    }; return table;
};

const form = useForm(initForm());

const handleSubmit = function() {
    form.post("/edit-entry/" + props.entry.id);
};
</script>

<template>
    <Navbar :user="user"/>
    <div class="container d-flex flex-column align-items-center">
        <h1 class="mt-5 mb-5">{{ record.title }}</h1>
        <div class="col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10 col-xxl-8">
            <form @submit.prevent="handleSubmit">
                <div class="mb-3">
                    <label class="form-label fw-bold">Creation date</label>
                    <input type="datetime-local" class="form-control" v-model="form.created_at"/>
                </div>
                <div v-for="(parameter, index) in parameters" class="mb-3">
                    <label class="form-label fw-bold">
                        {{ parameter.title }}<span v-if="parameter.unit != null"> ({{ parameter.unit }})</span>
                    </label>
                    <input type="number" step="any" class="form-control" v-model="form.details[index].value"/>
                </div>
                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary fw-bold text-uppercase">Edit Entry</button>
                </div>
            </form>
        </div>
    </div>
</template>