@extends('web.layout.master')

@section('content')
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            @foreach ($highLightPost as $key => $hlPost)
            @if ($key == 0)
            <div class="first-slot">
                @elseif ($key == 1)
                <div class="second-slot">
                    @elseif ($key == 2)
                    <div class="last-slot">
                        @endif
                        <div class="masonry-box post-media">
                            <img src="{{$hlPost->imageUrl()}}" alt="" class="img-fluid">
                            <div class="shadoweffect">
                                <div class="shadow-desc">
                                    <div class="blog-meta">
                                        <span class="bg-orange"><a
                                                href="{{route('category.post', [$hlPost->category->slug])}}">{{$hlPost->category->name}}</a></span>
                                        <h4><a href="{{route('post.detail', [$hlPost->slug])}}">{{$hlPost->title}}</a>
                                        </h4>
                                        <small>{{date("d/m/Y",strtotime($hlPost->created_at))}}</small>
                                        <small>{{$hlPost->user->name}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div>

                    @foreach ($newPost as $key => $nPost)
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{route('post.detail', [$nPost->slug])}}">
                                        <img src="{{$nPost->imageUrl()}}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div>
                            </div>

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{route('post.detail', [$nPost->slug])}}">{{$nPost->title}}</a></h4>
                                <p>{{$nPost->description}}</p>
                                <small class="firstsmall">
                                    <a
                                        href="{{route('category.post', [$nPost->category->slug])}}">{{$nPost->category->name}}</a>
                                </small>
                                <small>{{date("d/m/Y",strtotime($nPost->created_at))}}</small>
                                <small>{{$nPost->user->name}}</small>
                                <small>
                                    <<i class="fa fa-eye"></i> {{$nPost->view_counts}}
                                </small>
                            </div><!-- end meta -->
                        </div>
                        <hr class="invis">
                    </div>
                    <hr class="invis">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
