@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">Details</h1>


   <div class=" container row">            
<div class="col-sm-6">
<form method="post" action="edit">
@csrf
<input type="hidden" name="id" value="{{$data->id}}">
<div class="form-group">
<label>Name Model</label>
    <!-- <input type="text" name="Name_model" class="form-control" value="{{$data->Name_model}}" placeholder="Enter Name"> -->
<h3>{{$data->Name_model}}</h3>
</div>
<div class="form-group">
<label>Description</label>
    <!-- <input type="text" name="Description" class="form-control" value="{{$data->Description}}" placeholder="Enter Email"> -->
    <h3>{{$data->Description}}</h3>
</div>
<hr>
<h2>Contact with seller</h2>
<div>Email: {{$data->user_id ? $data->user->email : 'no data'}}</div>
<div>Phone no: {{$data->user_id ? $data->user->contact : 'no data'}}</div>
</div>

<div class="col-sm-6">
</br>
        
        <div id="{{$data->id}}" class="carousel slide" data-ride="carousel" alt="card image" class="img-fluid">
        <div class="card-body">
        <div class="carousel-inner">
        @if($data->photo->count()>0)
        @for($i=0; $i< count($images = $data->photo()->get()); $i++)
        @if($i==0)
            <div class="carousel-item active">
            <img class="d-block w-100" width="300px" height="300px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        @else
            <div class="carousel-item">
            <img class="d-block w-100" width="300px" height="300px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        
            @endif
        @endfor
        @endif
        
        </div>
        </div>


</div>
</div>



                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
