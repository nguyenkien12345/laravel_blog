@extends('admin.layout.master')

@section('title')
Post - Create
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Post - <small>Create</small></h1>
            </div>

            @include('admin.validation')

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : ''
                                }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Please Enter Title: "
                            value="{{old('title')}}" />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description"
                            placeholder="Please Enter Description: " value="{{old('description')}}" />
                    </div>

                    <div class="form-group">
                        <label>New Post</label>
                        <input type="checkbox" name="new_post" {{ old('new_post') ? 'checked' : '' }}>
                    </div>

                    <div class="form-group">
                        <label>Highlight Post</label>
                        <input type="checkbox" name="highlight_post" {{ old('highlight_post') ? 'checked' : '' }} />
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" value="{{old('image')}}" />
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="content" class="ckeditor" name="content">{{old('content')}}</textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Create</button>
                    <form>
            </div>

        </div>

    </div>

</div>
@endsection
