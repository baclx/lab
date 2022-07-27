@extends('layout.master')

@section('content')
    <h1>
        {{ $title }}
    </h1>
    <a class="btn btn-primary mb-2" href="{{ route('students.create') }}">
        Thêm
    </a>
    <form class="float-right d-flex" action="">
        <label class="control-label mr-2 d-flex align-items-center">Search: </label>
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Status</th>
            <th>Course Name</th>
            <th>Create at</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
        @foreach($students as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->name }}</td>
                <td>{{ $each->gender_name }}</td>
                <td>{{ $each->age }}</td>
                <td>{{ \App\Enums\StudentStatusEnum::getKeyByValue($each->status) }}</td>
                <td>{{ $each->course->name }}</td>
                <td>{{ $each->all_created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('students.edit', $each) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('students.destroy', ['student' => $each->id]) }}"
                          method="post"
                    >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
