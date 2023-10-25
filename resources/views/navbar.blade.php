<div class="container-fluid bg-primary d-flex flex-row justify-content-between align-items-center custom-navbar">
    <a href="/" class="text-light text-decoration-none fw-bold fs-3">Darevis</a>
    <form action="{{ route("search") }}" method="POST" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-4">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search"/>
            <button type="submit" class="btn btn-outline-light">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form>
    <div class="d-flex flex-row">
        <div>
            <a href="{{ route("add_record.form") }}" class="text-light text-decoration-none me-2">
                <i class="bi bi-plus-circle fs-4"></i>
            </a>
        </div>
        <div class="dropdown">
            <a href="#" class="text-light text-decoration-none" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="dropdown-item text-center text-primary">{{ $user->name }}</li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-center" href="#">Settings</a></li>
                <li><a class="dropdown-item text-center text-danger" href="{{ route("logout") }}">Log out</a></li>
            </ul>
        </div>
    </div>
</div>