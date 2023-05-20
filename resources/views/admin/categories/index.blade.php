@extends("layouts.admin")

@section("content")
    <div class="">
        <h1>Categories</h1>
    </div>
    <a href="{{ url('admin/categories/create') }}" class="btn btn-outline-success">Create Category</a>
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
                <th scope="col">Image</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                <tr>
                  <td>{{ $category->name }}</td>
                  <td>{{ $category->description }}</td>
                  <td><img width="75px" src="{{ asset('/categories/'.$category->image) }} " /></td>
                  <td>
                    <a href="{{ url('/admin/categories/edit/'.$category->id) }}" class="btn btn-outline-success">Edit</a>
                    <form style="display:inline" method="GET" action="{{ url('admin/categories/delete/'.$category->id) }}" onsubmit="return confirm('Are you sure?')";>
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