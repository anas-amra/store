@extends('layouts.admin')
@section('titletab','create category')
@section('titlepage','Add category')


@section('content')

<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" name="name"  >
    </div>
<br><br>
    <button type="submit" class="btn btn-primary">Add Category</button>
</form>


@endsection
