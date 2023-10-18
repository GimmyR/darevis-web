@extends("base")

@section("content")
    <div class="container">
        <div class="row d-flex flex-row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 col-xxl-6 mt-3">
                <div class="card px-5 pb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-center my-3">
                            <h1 class="text-primary fs-1">Login</h1>
                        </div>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="you@example.com" value="{{ old("email") }}"/>
                                @error("email")
                                    <p class="text-secondary px-3 py-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <div class="d-flex flex-row justify-content-between">
                                    <label for="password" class="form-label fw-bold">Password</label>
                                    <a href="#" class="text-decoration-none">Forgotten ?</a>
                                </div>
                                <input type="password" name="password" class="form-control" placeholder="Enter 8 characters or more"/>
                                @error("password")
                                    <p class="text-secondary px-3 py-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5 d-grid">
                                <button type="submit" class="btn btn-primary text-uppercase fw-bold">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection