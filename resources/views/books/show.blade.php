@extends('layouts.app')

@section('content') 

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Book</h2>
         </div>
         
         <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('books.index') }}"> Back</a>
         </div>
    </div>
</div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                     <strong>Name of the Book:</strong>
                    {{ $book->name }}
                </div>
            </div>
            <div  class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                 <strong>Detail:</strong>
                {{ $book->detail }}
                </div>
            </div>
            
        </div>

</form>          
    <img src="/storage/images/{{$book->image}}" alt="" style="width:500px"> 

@endsection 