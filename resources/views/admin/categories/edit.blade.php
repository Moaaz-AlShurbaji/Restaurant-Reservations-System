@extends("layouts.admin")

@section("content")
<h1>Edit Category</h1>
<div class="my-form">
    <form method="POST" action="{{ url('admin/categories/edit/'.$category->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Category Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ $category->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" name="description" aria-label="Description">{{ $category->description }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="mb-3 form-control" name="image" type="file" id="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <img class="img-thumbnail" width="200px" src="{{ asset('categories/'.$category->image) }}" />
          </div>
        
        <button type="submit" class="btn btn-outline-primary float-end px-3">Update</button>
    </form>
</div>

@endsection