@extends("layouts.admin")

@section("content")
<h1>Edit Menu</h1>
<div class="my-form">
    <form method="POST" action="{{ url('admin/menus/edit/'.$menu->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Menu Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ $menu->name }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3 input-group">
            <span class="input-group-text">Description</span>
            <textarea class="form-control" name="description" aria-label="Description">{{ $menu->description }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
        <label for="price" class="form-label">Price</label>
          <input type="number" name="price" class="form-control" id="price" value="{{ $menu->price }}">
            @error('price')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="mb-3 form-control" name="image" type="file" id="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <img class="img-thumbnail" width="200px" src="{{ asset('menus/'.$menu->image) }}" />
          </div>

          <div class="mb-3">
            <label class="form-label">Select Category</label>
            <select name="categories" class="form-select" multiple aria-label="multiple select example">
                @foreach ($categories as $category)
                    <option value={{ $category->id }} @selected($menu->categories->contains($category))>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-outline-primary float-end px-3">Update</button>
    </form>
</div>

@endsection