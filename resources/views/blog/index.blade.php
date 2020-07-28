@extends('layouts.app')

@section('main-row')

    <!-- Side Area -->
    @include('inc.sideArea')


    <div class="col-md-10 col-md-offset-2">

        <h2 class="text-center"> Blog </h2>
        <br/>

        @if(count($posts) > 0)
        
        <!-- Loop Through Posts -->
        @foreach($posts as $post)

        <div class="card" style="width: 20rem;display:inline-block">
            <!--<img class="card-img-top" src="..." alt="Card image cap">-->
            <div class="card-block">
                <h4 class="card-title">{{ $post->title }}</h4>
                <img style="width:100%" src="/storage/images/{{$post->image}}">

                <p class="card-text">{{ $post->Author }}</p>
                <p class="card-text">{{ $post->post }}</p>
              
                <a href="{{ route('blog.show', ['id' => $post->id]) }}" class="btn btn-primary">Read More</a>
            </div>
        </div>

        @endforeach

        @else 
            <div class="alert alert-danger">No Posts Available</div>
        @endif

    </div>

@endsection