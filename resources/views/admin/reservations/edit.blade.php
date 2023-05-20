@extends("layouts.admin")

@section("content")
<h1>Edit Reservation</h1>
<div class="my-form">
    @if(session("message"))
      <div class="alert alert-danger">{{ session("message") }}</div>
    @endif

    <form method="POST" action="{{ url('admin/reservations/edit/'.$reservation->id) }}">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="mb-3 col-sm-12 col-lg-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ $reservation->first_name}}">
                  @error('first_name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ $reservation->last_name }}">
                  @error('last_name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value={{ $reservation->email }}>
                  @error('email')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value={{ $reservation->phone }}>
                  @error('phone')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="res_date" class="form-label">Reservation Date</label>
                <input type="datetime-local" name="res_date" class="form-control" id="res_date" value="{{ $reservation->res_date }}">
                  @error('res_date')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="guest_number" class="form-label">Guest Number</label>
                <input type="number" name="guest_number" class="form-control" id="guest_number" value="{{ $reservation->guest_number }}">
                  @error('guest_number')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label class="form-label">Table</label>
                <select name="table_id" class="form-select" aria-label="Default select example">
                    <option>--Select Table--</option>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}" @selected($table->id == $reservation->table_id)>{{ $table->name }} ({{ $table->guest_number }} Guests)</option>
                    @endforeach
                  </select>
                  @error('table_id')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
            </div>

        </div>
        
        
        <button type="submit" class="btn btn-outline-primary float-end px-3">Update</button>
    </form>
</div>

@endsection