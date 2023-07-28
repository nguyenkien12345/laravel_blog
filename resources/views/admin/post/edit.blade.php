@extends('admin.layout.master')

@section('title')
Post - Edit
@endsection

@section('content')
<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Post - <small>Edit</small></h1>
            </div>

            @include('admin.validation')

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{route('admin.post.update', [$post->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($post->category_id ===
                                $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$post->title}}" />
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" value="{{$post->description}}" />
                    </div>

                    <div class="form-group">
                        <label>New Post</label>
                        <input type="checkbox" name="new_post" @if($post->new_post) checked @endif/>
                    </div>

                    <div class="form-group">
                        <label>Highlight Post</label>
                        <input type="checkbox" name="highlight_post" @if($post->highlight_post) checked @endif/>
                    </div>

                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image" />
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="content" class="ckeditor" name="content">{!! $post->content !!}</textarea>
                    </div>
                    {{-- !! !! => Nó sẽ lấy cả thẻ html luôn mà không bị đưa thành text --}}

                    <button type="submit" class="btn btn-default">Update</button>
                    <form>
            </div>

        </div>

    </div>

</div>
@endsection
