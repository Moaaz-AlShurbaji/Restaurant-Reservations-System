@extends("layouts.admin")

@section("content")
    <h1>Menus</h1>
    <a href="{{ url('admin/menus/create') }}" class="btn btn-outline-success">Create Menu</a>
    <hr>

    @if(session("message"))
      <div class="alert alert-success">{{ session("message") }}</div>
    @endif
    
    <div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach($menus as $menu)
                <tr>
                  <td>{{ $menu->name }}</td>
                  <td>{{ $menu->description }}</td>
                  <td>${{ $menu->price }}</td>
                  <td><img width="75px" src="{{ asset('/menus/'.$menu->image) }}" /></td>
                  <td>
                    <a href="{{ url('/admin/menus/edit/'.$menu->id) }}" class="btn btn-outline-success">Edit</a>
                    <form style="display:inline" method="GET" action="{{ url('admin/menus/delete/'.$menu->id) }}" onsubmit="return confirm('Are you sure?')";>
                        @csrf
                        <button class="btn btn-outline-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection