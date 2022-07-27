{{--@if ($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}
@extends('layout.master')

@section('content')
<h1>
    {{ $title }}
</h1>
<form action="{{ route('courses.store') }}" method="post">
    @csrf
    Name
    <input type="text" name="name" value="{{ old('name') }}">
    @if($errors->has('name'))
        <span>
            {{ $errors->first('name') }}
        </span>
    @endif
    <br>
    <button class="btn btn-primary mt-2">Add</button>
</form>
@endsection
