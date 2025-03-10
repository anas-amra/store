@extends('layouts.admin')
@section('titletab','Edit Product')
@section('titlepage','Edit Product')
@section('content')
<form action="{{ route('admin.products.update',$product) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group m-2">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}" >
    </div>

    <div class="form-group m-2">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" value="{{$product->price}}" >
    </div>

    <div class="form-group m-2">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" name="quantity" min="0" value="{{$product->quantity}}" >
    </div>
    <div class="form-group m-2">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="description" value="{{$product->description}}" >
    </div>

    <div class="form-group m-2">
        <label for="category_id">Select Category</label>
        <select name="category_id" class="form-control">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                {{-- Wrong way dont do that
                 <option value="{{$category->id}}" {{$product->id==$category->id ?'selected':''}} >{{$category->name}}</option> --}}
                <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Update Product</button>
</form>
@endsection
