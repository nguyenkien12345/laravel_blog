@extends('web.layout.master')

@section('content')
<section class="section single-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <ol class="breadcrumb hidden-xs-down">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item"><a href="/category">Blog</a></li>
                            <li class="breadcrumb-item active">{{$post->title}}</li>
                        </ol>

                        <span class="color-orange">
                            <a href="{{route('category.post', [$post->category->slug])}}">
                                {{$post->category->name}}
                            </a>
                        </span>

                        <h3>{{$post->title}}</h3>

                        <div class="blog-meta big-meta">
                            <small>{{date("d/m/Y",strtotime($post->created_at))}}</small>
                            <small>{{$post->user->name}}</small>
                            <small>
                                <<i class="fa fa-eye"></i> {{$post->view_counts}}
                            </small>
                        </div>

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="single-post-media">
                        <img src="{{ $post->imageUrl() }}" alt="" class="img-fluid">
                    </div>

                    <div class="blog-content">
                        <div class="pp">
                            <p>{{ $post->description }}</p>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>

                    <div class="blog-title-area">
                        <div class="tag-cloud-single">
                            <span>Tags</span>
                            <small><a href="#" title="">lifestyle</a></small>
                            <small><a href="#" title="">colorful</a></small>
                            <small><a href="#" title="">trending</a></small>
                            <small><a href="#" title="">another tag</a></small>
                        </div><!-- end meta -->

                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a>
                                </li>
                            </ul>
                        </div><!-- end post-sharing -->
                    </div><!-- end title -->

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">You may also like</h4>
                        <div class="row">
                            @foreach ($relatedPost as $rPost)
                            <div class="col-lg-6">
                                <div class="blog-box">
                                    <div class="post-media">
                                        <a href="{{route('post.detail', [$rPost->slug])}}">
                                            <img src="{{$rPost->imageUrl()}}" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span class=""></span>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="blog-meta">
                                        <h4>
                                            <a href="{{route('post.detail', [$rPost->slug])}}">{{$post->title}}</a>
                                        </h4>
                                        <small>{{date("d/m/Y",strtotime($rPost->created_at))}}</small>
                                        <small>{{$rPost->user->name}}</small>
                                        <small>
                                            <<i class="fa fa-eye"></i> {{$rPost->view_counts}}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <hr class="invis1">

                    <div class="custombox clearfix">
                        <h4 class="small-title">{{$post->comments()->count()}} comments</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="comments-list">
                                    @foreach ($post->comments as $comment)
                                    <div class="media">
                                        <div class="media-body">
                                            <h4 class="media-heading user_name" {{ $comment->user->name }}
                                                <small>{{date("d/m/Y",strtotime($comment->created_at))}}</small>
                                            </h4>
                                            <p>{{ $comment->content }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end custom-box -->

                    <hr class="invis1">

                    @if (Auth::check())
                    <div class="custombox clearfix">
                        <h4 class="small-title">Leave a Reply</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper" method="POST"
                                    action="{{route('post.comment', [$post->id])}}">
                                    @csrf
                                    <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div><!-- end page-wrapper -->
            </div>

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">

                    <div class="widget">
                        <h2 class="widget-title">Trend Videos</h2>
                        <div class="trend-videos">
                            @foreach ($hlPost as $item)
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="{{route('post.detail', [$item->slug])}}">
                                        <img src="{{$item->imageUrl()}}" alt="" class="img-fluid">
                                        <div class="hovereffect">
                                            <span class="videohover"></span>
                                        </div>
                                    </a>
                                </div>
                                <div class="blog-meta">
                                    <h4><a href="{{route('post.detail', [$item->slug])}}">{{$item->title}}</a></h4>
                                </div>
                            </div>
                            <hr class="invis">
                            @endforeach
                        </div>
                    </div>

                </div><!-- end sidebar -->
            </div>

        </div>
    </div>
</section>
@endsection
