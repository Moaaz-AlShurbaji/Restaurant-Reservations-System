@extends("layouts.guest")

@section("content")

@if(session("message"))
    <div class="alert alert-success mt-5">{{ session("message") }}</div>
@endif

<h1 class="text-center my-5">Make Reservation</h1>
<!-- Reservation Start -->
<div class="container px-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="row">
        <div class="col-md-12 bg-dark d-flex align-items-center">
            <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                <h1 class="text-white mb-4">Book A Table Online</h1>
                <form method="POST" action="{{ url("reservations/create") }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="first name">
                                <label for="first_name">First Name</label>
                                @error('first_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="last name">
                                <label for="last_name">Last Name</label>
                                @error('last_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                <label for="phone">Phone Number</label>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="guest_number" id="guest_number" placeholder="guest_number">
                                <label for="guest_number">Guest Number</label>
                                @error('guest_number')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating date" id="res_date">
                                <input type="datetime-local" name="res_date" class="form-control datetimepicker-input" id="res_date" placeholder="Date & Time" />
                                <label for="datetime">Date & Time</label>
                                @error('res_date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="table_id" class="form-select" id="table_id">
                                    <option>--Select Table--</option>
                                    @foreach($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }} ({{ $table->guest_number }} guests)</option>
                                    @endforeach
                                </select>
                                <label for="table_id">Table</label>
                                @error('table_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                              </div>
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        

</div>

@endsection