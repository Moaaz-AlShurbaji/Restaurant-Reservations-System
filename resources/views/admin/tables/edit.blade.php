@extends("layouts.admin")

@section("content")
<h1>Update Table</h1>
<div class="my-form">
    <form method="POST" action="{{ url('admin/tables/edit/'.$table->id) }}">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="mb-3 col-12-sm">
                <label for="name" class="form-label">Table Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $table->name }}">
                  @error('name')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label for="guest_number" class="form-label">Number of guests</label>
                <input type="number" name="guest_number" class="form-control" id="guest_number" value="{{ $table->guest_number }}">
                  @error('guest_number')
                      <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="mb-3 col-sm-12 col-lg-6">
                <label class="form-label">Table Status</label>
                <select name="status" class="form-select" aria-label="Default select example" >
                    <option>--Select Table Status--</option>
                    @foreach (App\Enums\TableStatus::cases() as $status)
                        <option value="{{ $status->value }}" @selected($table->status->value == $status->value)>{{ $status->name }}</option>
                    @endforeach
                  </select>
            </div>

            <div class="mb-3 col-sm-12 col-lg-6">
                <label class="form-label">Table Location</label>
                <select name="location" class="form-select" aria-label="Default select example" >
                    <option>--Select Table Location--</option>
                    @foreach (App\Enums\TableLocation::cases() as $location)
                        <option value="{{ $location->value }}" @selected($table->location->value == $location->value)>{{ $location->name }}</option>
                    @endforeach
                  </select>
            </div>


        </div>
        
        
        <button type="submit" class="btn btn-outline-primary float-end px-3">Update</button>
    </form>
</div>

@endsection