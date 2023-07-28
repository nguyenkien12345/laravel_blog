@extends('web.layout.master')

@section('content')
<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <div class="trend-videos">
                            <div class="blog-box">
                                <div class="blog-meta">
                                    @foreach ($categories as $category)
                                    <h4>
                                        <a href="{{route('category.post', [$category->slug])}}">{{$category->name}}</a>
                                    </h4>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end sidebar -->
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-grid-system">
                        <div class="row">

                            @foreach ($posts as $post)
                            <div class="col-md-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{route('post.detail', [$post->slug])}}">
                                            <img src="{{$post->imageUrl()}}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="blog-meta big-meta">
                                        <span class="color-orange">
                                            <a href="{{route('category.post', [$post->category->slug])}}">{{$post->category->name}}
                                            </a>
                                        </span>
                                        <h4><a href="{{route('post.detail', [$post->slug])}}">{{$post->title}}</a></h4>
                                        <p>{{$post->description}}</p>
                                        <small>{{date("d/m/Y",strtotime($post->created_at))}}</small>
                                        <small>{{$post->user->name}}</small>
                                        <small><i class="fa fa-eye"></i> {{$post->view_counts}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <hr class="invis3">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
