@extends('layouts.app')
@section('content')
<div class="col-sm-6">
<form method="post" action="add" enctype="multipart/form-data">
@csrf
<div class="form-group">
<input type="hidden" name="id" class="form-control">
<label>Name Model</label>
    <input type="text" name="Name_model" class="form-control" placeholder="Name and model">
</div>
<div class="form-group">
<label>Description</label>
    <input type="text" name="Description" class="form-control" placeholder="Full details">
</div>
<div class="form-group">
<label>Bike pic</label>
    <input type="file" name="photo_id[]" multiple class="form-control" >
</div>
<!-- <input type="hidden" name="user_id"> -->
<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

@stop