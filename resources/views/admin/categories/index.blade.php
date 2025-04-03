@extends('layouts.admin')
@section('titletab', 'categories')
@section('titlepage', 'categories')


@section('content')


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="content">
        <a href="{{route('admin.categories.create')}}" class="btn btn-primary btn-sm my-4 p-2">Add new Category</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('admin.categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{route('admin.categories.destroy',$category->id)}}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
        <div>
            {{$categories->links()}}
        </div>
    </div>




@endsection
