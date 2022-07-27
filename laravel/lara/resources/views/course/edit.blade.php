@extends('layout.master')

@section('content')
<h1>
    {{ $title }}
</h1>
<form action="{{ route('courses.update', $each) }}" method="post">
    @csrf
    @method('PUT')
    Name
    <input type="text" name="name" value="{{ $each->name }}">
    @if($errors->has('name'))
        <span>
            {{ $errors->first('name') }}
        </span>
    @endif
    <br>
    <button class="btn btn-primary mt-2">Update</button>
</form>
@endsection
