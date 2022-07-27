@extends('layout.master')

@section('content')
    <h1>
        {{ $title }}
    </h1>

    <form class="d-flex" action="{{ route('todos.store') }}" method="post">
        @csrf
        <input class="form-control" type="text" name="title" value="{{ old('title') }}">
        <button class="btn btn-primary ml-4 mb-2">
            Thêm
        </button>
    </form>

    <table class="table table-dark table-striped">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Created_at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($data as $each)
            <tr>
                <td>{{ $each->id }}</td>
                <td>{{ $each->title }}</td>
                <td>{{ $each->all_created_at }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('todos.edit', $each) }}">
                        Edit
                    </a>
                </td>
                <td>
                    <form action="{{ route('todos.destroy', ['todo' => $each->id]) }}"
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
