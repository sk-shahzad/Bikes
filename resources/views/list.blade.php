@extends('layouts.app')
@section('content')
<h1>Uploaded items</h1>
@if(Session::get('status'))
<div class="alert alert-success alert-dismissible">
{{Session::get('status')}}
    <button type="button" class="close" data-dismiss="alert">&times;</button>

  </div>
@endif
<div class="row" id="posts">
@if ($data->count()>0)
@foreach ($data as $item)

<!-- <a href="details/{{$item->id}}" target="_blank" style="text-decoration:none;color:black;"> -->
<div class="col-md-4 mb-5">


        <div class="card" style="width:18rem; text-align:center;">
        <div id="{{$item->id}}" class="carousel slide" data-ride="carousel" alt="card image" class="img-fluid">
        <div class="card-body">
               <h5 class="card-title mb5">{{$item->created_at->diffForhumans()}}</h5>
               <h5 class="card-title mb5">{{$item->Name_model}}</h5>
               <h5 class="card-title mb5">{{$item->Description}}</h5>
                <h5><a style="text-decoration:none;margin-right:30px;" href="delete/{{$item->id}}"><i class="fa fa-trash"></i></a>
                
                <a  href="edit/{{$item->id}}"><i class="fa fa-edit"></i></a></h5>
                <!-- <h5><a href="delete/{{$item->id}}">Delete</a></h5> -->
                <!-- <h5><a href="edit/{{$item->id}}"><i class="fa fa-edit"></i></a></h5> -->
                <!-- <h5><a href="edit/{{$item->id}}">Edit</a></h5> -->
               <hr>
        <div class="carousel-inner">
        @if($item->photo->count()>0)
        @for($i=0; $i< count($images = $item->photo()->get()); $i++)
        @if($i==0)
            <div class="carousel-item active">
            <img class="d-block w-100" width="200px" height="170px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        @else
            <div class="carousel-item">
            <img class="d-block w-100" width="200px" height="170px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        
            @endif
        @endfor
        
        
        @endif
    
                
                    
              
              </div>
          </div>
          </div>
    </div>
 
   
    <!-- </a> -->
   </div>
@endforeach

@else
<h1 class="container">There are no posts</h1>

@endif
</div> 


@stop