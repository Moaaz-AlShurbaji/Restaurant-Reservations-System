@extends("layouts.guest")

@php($delay = 0.1)

@section("content")
<h1 class="text-center my-5 wow fadeInUp" data-wow-delay="{{$delay}}s">Food Categories</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-12 col-md-4">
                <div class="card rounded wow fadeInUp mb-5" data-wow-delay="{{$delay}}s">
                    @php($delay += 0.2)
                    <img height="200px" src="{{ asset('categories/'.$category->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $category->name }}</h5>
                      <p class="card-text">{{ $category->description }}</p>
                      <a href="{{ url("category/".$category->id) }}" class="btn btn-primary">View Category</a>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection