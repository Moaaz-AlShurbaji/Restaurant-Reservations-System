@extends("layouts.admin")

@section("content")
<h1>Create Category</h1>
<div class="my-form">
    <form method="POST" action="{{ url('admin/categories/create') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" name="name" class="form-control" id="name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" name="description" aria-label="Description"></textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        
        <button type="submit" class="btn btn-outline-primary float-end px-3">Save</button>
    </form>
</div>

@endsection