<script setup>
import Navbar from './components/Navbar.vue';

const props = defineProps({ user: Object, records: Array });

const add0b = function(nb) {
    if(nb < 10)
        nb = "0" + nb;
    return nb;
};

const formatDatetime = function(datetime) {
    let d = new Date(datetime);
    return add0b(d.getDate()) + "/" + add0b(d.getMonth() + 1) + "/" + d.getFullYear() + " " + add0b(d.getUTCHours()) + ":" + add0b(d.getMinutes());
};
</script>

<template>
    <Navbar :user="user"/>
    <div class="container d-flex flex-row justify-content-center mt-3">
        <div class="col-12 col-sm-12 col-md-10 col-lg-6">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Record</th>
                        <th scope="col">Creation date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="record in records">
                        <th>{{ record.id }}</th>
                        <td>
                            <a :href="'/record/' + record.id + '/show'" class="text-decoration-none">{{ record.title }}</a>
                        </td>
                        <td>{{ formatDatetime(record.created_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>