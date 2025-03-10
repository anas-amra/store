@extends('layouts.admin')
@section('titletab','Edit category')
@section('titlepage','Edit category')


@section('content')

<form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" name="name"  value="{{$category->name}}">
    </div>
<br><br>
    <button type="submit" class="btn btn-primary">Update Category</button>
</form>


@endsection
