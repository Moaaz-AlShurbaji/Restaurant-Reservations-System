@extends("layouts.admin")

@section("content")
    <h1>Reservations</h1>
    <a href="{{ url('admin/reservations/create') }}" class="btn btn-outline-success">Create Reservation</a>
    <hr>

    @if(session("message"))
      <div class="alert alert-success">{{ session("message") }}</div>
    @endif

    <div class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Reservation Date</th>
                <th scope="col">Table</th>
                <th scope="col">Guest Number</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reservations as $reservation)
                <tr>
                  <td>{{ $reservation->first_name }}</td>
                  <td>{{ $reservation->last_name }}</td>
                  <td>{{ $reservation->email }}</td>
                  <td>{{ $reservation->phone }}</td>
                  <td>{{ $reservation->res_date }}</td>
                  <td>{{ $reservation->table->name }}</td>
                  <td>{{ $reservation->guest_number }}</td>
                  <td>
                    <a href="{{ url('/admin/reservations/edit/'.$reservation->id) }}" class="btn btn-outline-success">Edit</a>
                    <form style="display:inline" method="GET" action="{{ url('admin/reservations/delete/'.$reservation->id) }}" onsubmit="return confirm('Are you sure?')";>
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