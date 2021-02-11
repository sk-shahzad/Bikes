@extends('layouts.app')
@section('content')
<div class="col-sm-6">
<h1>Edit Details</h1>
<form method="post" action="../edit/{{$data->id}}" enctype="multipart/form-data">
@csrf
{{ method_field('Put') }}


<div class="form-group">
<label>Name Model</label>
    <input type="text" name="Name_model" class="form-control" value="{{$data->Name_model}}" placeholder="Enter Name">
</div>
<div class="form-group">
<label>Description</label>
    <input type="text" name="Description" class="form-control" value="{{$data->Description}}" placeholder="Enter Email">
</div>
<!-- <div class="form-group"> -->

<!-- <div class="card" style="width:18rem; text-align:center;"> -->
        <!-- <div id="{{$data->id}}" class="carousel slide" data-ride="carousel" alt="card image" class="img-fluid">
        <div class="card-body">
        <div class="carousel-inner"> -->
    @if($data->photo->count()>0)
        @for($i=0; $i< count($images = $data->photo()->get()); $i++)
        <!-- @if($i==0) -->
        <!-- <div class="carousel-item active"> -->
        </div>
        <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <img class="d-block w-100" width="200px" height="170px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        <!-- @else -->
        <div class="col-sm-4 col-md-4 col-lg-4">
       <!-- <div class="carousel-item active"> -->
            <img class="d-block w-100" width="200px" height="170px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
            
        @endif
        @endfor
        @endif
        </div>
        <!-- </div>
        </div> 
         </div> -->
         <input type="hidden" name="old_photos" value="{{$data->photo()->get()}}">
<h3>Change picture</h3>
<input type="file" name="photo_id[]" multiple class="">


<button type="submit" class="btn btn-primary">Submit</button>
</div>

@stop