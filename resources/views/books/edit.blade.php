@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Product</h2>
         </div> 
         
         <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
         </div>
    </div>
</div>

@if ($errors->any())
    <div class="aler alert-danger">
        <strong>Huy!</strong>Kag kah?<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>

    </div>
@endif

<form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name of the Book:</strong>
                <input type="text>" name="name" value= "{{ $book->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
    
    
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control" style="height: 150px" name="detail" placeholder="Detail">{{ $book->detail }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control-file">
            </div>
        <div class="col--xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


@endsection  