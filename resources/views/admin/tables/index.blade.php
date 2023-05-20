@extends("layouts.admin")

@section("content")
    <h1>Tables</h1>
    <a href="{{ url('admin/tables/create') }}" class="btn btn-outline-success">Add Table</a>
    <hr>

    @if(session("message"))
      <div class="alert alert-success">{{ session("message") }}</div>
    @endif

    <div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Guest Number</th>
                <th scope="col">Status</th>
                <th scope="col">Location</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach($tables as $table)
                <tr>
                  <td>{{ $table->name }}</td>
                  <td>{{ $table->guest_number }}</td>
                  <td>{{ $table->status }}</td>
                  <td>{{ $table->location }}</td>
                  <td>
                    <a href="{{ url('/admin/tables/edit/'.$table->id) }}" class="btn btn-outline-success">Edit</a>
                    <form style="display:inline" method="GET" action="{{ url('admin/tables/delete/'.$table->id) }}" onsubmit="return confirm('Are you sure?')";>
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