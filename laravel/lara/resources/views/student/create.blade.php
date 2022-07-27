@extends('layout.master')

@section('content')
    <h1>
        {{ $title }}
    </h1>
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        Name
        <input type="text" name="name" value="{{ old('name') }}">
        <br>
        <div class="form-group mt-2">
            Gender
            <input class="mr-1" type="radio" name="gender" value="0" checked>Name
            <input class="mr-1" type="radio" name="gender" value="1">Nữ
            <br>
            Birthdate
            <input type="date" name="birth_date">
            <br>
            Status
            @foreach($arrStudentStatus as $key => $value)
                <input class="mr-1" type="radio" name="status" value="{{ $value }}"
                @if ($loop->first)
                    checked
                @endif
                >
                {{ $key }}
            @endforeach
            <br>
            Course
            <select name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary mt-2">Add</button>
    </form>
@endsection
