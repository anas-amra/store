@extends('layouts.admin')
@section('titletab','Add Product')
@section('titlepage','Add Product')
@section('content')
<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf
    <div class="form-group m-2">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name"  >
    </div>

    <div class="form-group m-2">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price"  >
    </div>

    <div class="form-group m-2">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" name="quantity" min="0"  >
    </div>
    <div class="form-group m-2">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description"  >
    </div>

    <div class="form-group m-2">
        <label for="category_id">select category</label>
         <select name="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach ($categories as $category )
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
         </select>
    </div>
    <!-- Category Dropdown -->
    {{-- <div class="form-group">
        <label for="category_id">Select Category</label>
        <select name="category_id" class="form-control"  >
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div> --}}

    <button type="submit" class="btn btn-primary mt-4">Add Product</button>
</form>
@endsection
