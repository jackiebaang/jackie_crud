
@extends('layouts.app')

@section('content')
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Book Table</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('books.create') }}"> Add New Book</a>
        </div>
    </div>
</div>



<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Details</th>
        <th>Image</th>
        <th width="280px">Action</th> 
    </tr>

    @foreach ($books as $book)
    <tr>
        <td>{{$book->id}}</td>
        <td>{{$book->name}}</td>
        <td>{{$book->detail}}</td>
        <td><img src="/storage/images/{{$book->image}}" alt="" style="width:75px"></td>
        <td>
            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('books.show', $book->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
{{ $books->links() }}

@endsection 