<script setup>
    defineProps({ parameters: Array, entries: Array });
</script>

<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="row" v-for="parameter in parameters">
                    {{ parameter.title }}<span v-if="parameter.unit != null"> ({{ parameter.unit }})</span>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="entry in entries">
                <td v-for="detail in entry.entry_details">{{ detail.value }}</td>
                <td><a :href="'/edit-entry/' + entry.id">Edit</a></td>
            </tr>
        </tbody>
    </table>
</template>