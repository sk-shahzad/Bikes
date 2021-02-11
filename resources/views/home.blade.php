@extends('layouts.app')
@section('content')
<head>
<!-- <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
     <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"/>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>  -->
<style>
#im{background-size: cover;
   width:100%;
   height:400px;
   border:9px solid black;
   border-radius: 15px;}
   /* #posts{
     backface-visibility: hidden;  lightbox plugin needed here for image transform
     transition: all .5s;
   }
  #posts: hover{
    transform: scale(1.05);
  } */
</style>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>
<div class="">
<div class="row">
<div class="col-md-12">
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img id="im" src="pics/7.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img id="im" src="pics/5.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img id="im" src="pics/8.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
</div>


<div class="row" id="posts">
@if ($data->count()>0)
@foreach ($data as $item)

<a href="details/{{$item->id}}" target="_blank" style="text-decoration:none;color:black;">
<div class="col-md-4 mb-5">


        <div class="card" style="width:18rem; text-align:center;">
        <div id="{{$item->id}}" class="carousel slide" data-ride="carousel" alt="card image" class="img-fluid">
        <div class="card-body">
               <h5 class="card-title mb5">{{$item->created_at->diffForhumans()}}</h5>
               <h5 class="card-title mb5">{{$item->Name_model}}</h5>
               <h5 class="card-title mb5">{{$item->Description}}</h5>
               <hr>
        <div class="carousel-inner">
        @if($item->photo->count()>0)
        @for($i=0; $i< count($images = $item->photo()->get()); $i++)
        @if($i==0)
            <div class="carousel-item active">
            <img class="d-block w-100" width="200px" height="180px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        @else
            <div class="carousel-item">
            <img class="d-block w-100" width="200px" height="180px" src="/laravel/bikes/public/images/{{$images[$i]['file'] }}">
            </div>
        
            @endif
        @endfor
        
        
        @endif
                
                    
              
              </div>
          </div>
          </div>
    </div>
  
   
    </a>
   </div>
@endforeach

@else
<h1 class="container">There are no posts</h1>

@endif
<!-- footer -->
</div>  
        <div class="container" style="height:200px; width:100%; background-color:black;">
        </div> 
@stop
