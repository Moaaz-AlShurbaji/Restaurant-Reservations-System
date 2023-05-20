@extends("layouts.guest")

@php($delay = 0.1)

@section("content")
<h1 class="text-center my-5 wow fadeInUp" data-wow-delay="{{ $delay }}s" >Food Menus</h1>
<div class="container">
    <div class="row">
        @foreach ($menus as $menu)
            <div class="col-sm-12 col-md-3 d-flex">
                <div class="card rounded wow fadeInUp mb-5" data-wow-delay="{{ $delay }}s">
                    @php($delay += 0.2)
                    <img height="200px" src="{{ asset('menus/'.$menu->image) }}" class="card-img-top" alt="...">
                    <div class="card-body flex-fill d-flex flex-column">
                      <h5 class="card-title">{{ $menu->name }}</h5>
                      <p class="card-text">{{ $menu->description }}</p>
                      <p class="btn btn-primary mt-auto" style="color:#fff;">${{ $menu->price }}</p>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
</div>
@endsection