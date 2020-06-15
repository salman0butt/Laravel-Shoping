@extends('admin.app')
@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories</li>

@stop
@section('content')
    <div class="container-fluid">
        <a href="{{ route('admin.category.create') }}" class="btn btn-info" style="float: right;color: #fff;">Add
            Category</a>
        @section('title')
            Categories
        @endsection
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
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
                            <td>{!!  Str::limit($category->description, 20, '...'); !!}</td>
                            <td>{{ $category->slug }}</td>
                            <td>@if ($category->childrens()->count() > 0)
                                    @foreach($category->childrens as $childern)
                                        {{ $childern->title }},
                                    @endforeach
                                @else
                                    <strong>Parent</strong>
                                @endif</td>
                            <td>{{ $category->created_at }}</td>
                            @if(!$category->trashed())
                                <td><a href="{{ route('admin.category.edit',$category->id) }}"
                                       class="btn btn-info">Edit</a> | <a
                                        href="{{ route('admin.category.remove',$category->id) }}" class="btn btn-dark">Trash</a>
                                    | <a href="javascript::void(0);"
                                         class="btn btn-danger" onclick="confirmDelete({{ $category->id }})">Delete</a>
                                    <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST"
                                          id="del-category-{{ $category->id }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </td>
                            @else
                                <td><a href="{{ route('admin.category.recover',$category->id) }}"
                                       class="btn btn-success">Restore</a> <a href="javascript::void(0);"
                                                                        class="btn btn-danger"
                                                                        onclick="confirmDelete({{ $category->id }})">Delete</a>
                                    <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST"
                                          id="del-category-{{ $category->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <h2 class="text-center">No Catgories Found</h2>
                @endif
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            {{ $categories->links() }}
        </div>
    </div>
@section('scripts')
    <script>
        function confirmDelete(id) {
            let choice = confirm('Are you sure,You want to delete Catgory? '+id);
            if (choice) {

                document.getElementById('del-category-' + id).submit();
            }

        }
    </script>
@stop
@endsection
