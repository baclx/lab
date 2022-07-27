@extends('layout.master')

@section('content')
    <h1>
        {{ $title }}
    </h1>
    <form class="d-flex" action="{{ route('todos.update', $each) }}" method="post">
        @csrf
        @method('PUT')
        <input class="form-control mr-4" type="text" name="title" value="{{ $each->title }}">
        <br>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
