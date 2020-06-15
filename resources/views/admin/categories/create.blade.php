@extends('admin.app')
@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        @if(Request::is('*/edit')) Edit @else Add @endif Category</li>

@stop
@section('content')
    <div class="container-fluid">
        @section('title')
            Add Category
        @endsection
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        </div>
        <form action="@if(Request::is('*/edit')) {{ route('admin.category.update',$category->id) }} @else {{ route('admin.category.store') }} @endif" method="POST">
            @csrf
            @if(Request::is('*/edit'))
                @method('PATCH')
            @endif
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="txturl" name="title" value="{{ $category->title ?? '' }}">
                <p class="small">{{ config('app.url') }}/<span id="url">{{ $category->slug ?? '' }}</span></p>
                <input type="hidden" name="slug" id="slug" value="{{ $category->slug ?? '' }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="10">{{ $category->description ?? '' }}</textarea>
            </div>
            <div class="form-group">
                @php $ids = (isset($category->childrens) && $category->childrens()->count() > 0) ? array_pluck($category->childrens, 'id') : null; @endphp
                <label for="parent_id">Parent Category</label>
                <select name="parent_id[]" id="parent_id" class="form-control parent_id" multiple>
                    <option value="">Select Category</option>
                    <option value="1">Test</option>
                    @if (count($categories) > 0)
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ isset($ids) && in_array($cat->id,$ids) ? 'selected' : '' }}>{{ $cat->title }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <button type="submit" class="btn btn-primary">@if(Request::is('*/edit')) Update @else Add @endif Category</button>
        </form>

    </div>
@section('scripts')
    <script>
        $(function () {
            try {
                $(".parent_id").select2({
                    placeholder: "Select a Parent Category",
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });
            } catch (e) {
                console.log(e.message);
            }
        });
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberList', 'blockQuote', 'undo', 'redo'],
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error('There was a problem initializing the editor.', error);
            });
        $('#txturl').keyup(function () {
            var url = slugify($(this).val());
            $('#url').html(url);
            $('#slug').val(url);
        });
    </script>

@endsection
@endsection
