@extends('layouts.app')
@section('title', 'News')
@section('content')

    <!-- subheader -->
    <section id="subheader">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>News Carousel</h1>
                    <ul class="crumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="sep"></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top">
        <div id="blog-carousel" class="owl-carousel owl-theme">
            @foreach($all_news as $n)
            <div class="bloglist item">
                <div class="post-content">
                    <div class="post-image">
                        <img src="uploads/news/{{$n->img}}" alt="" />
                    </div>

                    <div class="post-text">
                        <h3><a href="{{route('site.single-news', $n->slug)}}">{{$n->title}}</a></h3>
                        <p>
                            @php
                                $text = explode('.', $n->content)
                            @endphp
                            {!! $text[0] !!}
                        </p>

                        <span class="post-date">{{$n->created_at->translatedFormat('M d, Y')}}</span>
                        <span class="post-comment">{{$n->comments}}</span>
                        <span class="post-like">{{$n->likes}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    @endsection

@push('js')


    @endpush
