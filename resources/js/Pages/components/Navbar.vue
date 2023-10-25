<script setup>

</script>

<template>
    <div class="container-fluid bg-primary d-flex flex-row justify-content-between align-items-center custom-navbar">
        <a href="/" class="text-light text-decoration-none fw-bold fs-3">Darevis</a>
        <form class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search"/>
                <button type="submit" class="btn btn-outline-light">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <div>
            <a href="/add-record" class="text-light text-decoration-none me-2">
                <i class="bi bi-plus-circle fs-4"></i>
            </a>
            <a href="/logout" class="text-light text-decoration-none">
                <i class="bi bi-person-circle fs-4"></i>
            </a>
        </div>
    </div>
</template>

<style>
    .custom-navbar {
        height: 50px;
    }
</style>