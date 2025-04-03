@extends('layouts.admin')
@section('titletab','products')
@section('titlepage','products')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}
        </div>
    @endif

<a href="{{route('admin.products.create')}}" class="btn btn-primary btn-sm my-4 p-2">Add new Product</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a href="{{route('admin.products.edit',$product)}}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{route('admin.products.destroy',$product)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="mt-4">
            {{ $products->links() }}
        </div>
@endsection
