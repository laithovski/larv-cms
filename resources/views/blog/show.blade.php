@extends('layouts.app')

@section('main-row')
 
@include('inc.sideArea')

<div class="col-md-8 col-md-offset-2">

<h3 class="text-center">{{$post->title}}</h3> 

<img style="width:100%" src="/storage/images/{{$post->image}}">

<small class="text-muted">{{$post->Author}}</small>

<p class="card-text">{{$post->post}}</p>

</div>    
@endsection