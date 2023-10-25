@extends("base")

@section("content")
    @include("navbar")
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
                    @foreach ($records as $record)
                        <tr>
                            <th>{{ $record->id }}</th>
                            <td>
                                <a href="{{ route("record.show", [ "id" => $record->id ]) }}" class="text-decoration-none">{{ $record->title }}</a>
                            </td>
                            <td>{{ $record->created_at->format("d/m/Y h:i") }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection