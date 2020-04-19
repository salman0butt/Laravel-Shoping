@extends('admin.app')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.category.create') }}" class="btn btn-info" style="float: right;color: #fff;">Add Category</a>
        @section('title')
            Categories
        @endsection
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Parent Category</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if (count($categories) > 0)
                    @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>@if ($category->childrens()->count() > 0)
                            @foreach($category->childrens as $childern)
                                {{ $childern->title }},
                            @endforeach
                    @else
                            <strong>Parent</strong>
                    @endif</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="#" class="btn btn-info">Edit</a> | <a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
                    @endforeach
                @else
                    <h2 class="text-center">No Catgories Found</h2>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
