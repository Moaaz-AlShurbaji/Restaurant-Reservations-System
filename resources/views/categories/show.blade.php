@extends("layouts.guest")

@section("content")
    <h1 class="text-center my-5">{{ $category->name }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($category->menus as $menu)
                <div class="col-sm-12 col-md-3 d-flex">
                    <div class="card rounded wow fadeInUp mb-5" data-wow-delay="0.1s">
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