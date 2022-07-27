@extends('layout.master')

{{-- datatables --}}
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
@endpush

@section('content')
    <h1>
        {{ $title }}
    </h1>
    <a class="btn btn-primary mb-2" href="{{ route('courses.create') }}">
        Thêm
    </a>
    <form class="float-right d-flex" action="">
        <label class="control-label mr-2 d-flex align-items-center">Search: </label>
        <input class="border border-none form-control mb-2" name="q" value="{{ $search }}">
    </form>
    <table class="table table-dark table-striped">
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Number count</th>
            <th>Create at</th>
            <th>Edit</th>
            <th>Del</th>
        </tr>
        @foreach($data as $each)
           <tr>
               <td>{{ $each->id }}</td>
               <td>{{ $each->name }}</td>
               <td>{{ $each->student_count }}</td>
               <td>{{ $each->all_created_at }}</td>
               <td>
                   <a class="btn btn-primary" href="{{ route('courses.edit', $each) }}">
                        Edit
                   </a>
               </td>
               <td>
                   <form action="{{ route('courses.destroy', ['course' => $each->id]) }}"
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
    <br>
    <nav class="Page navigation example">
        <ul class="pagination pagination-rounded justify-content-center">
            {{ $data->links() }}
        </ul>
    </nav>
@endsection

{{-- datatables --}}
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/datatables.min.js"></script>
@endpush
