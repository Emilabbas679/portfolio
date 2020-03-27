@extends('layouts.app')
@section('title', $news->title)
@section('content')
    <!-- subheader -->
    <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(/public/images/background/bg-news.jpg) fixed" data-stellar-background-ratio=".2">
        <div class="overlay-bg t80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{$news->title}}</h1>
                        <ul class="crumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="sep"></li>
                            <li>{{$news->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- subheader close -->

    <!-- content begin -->
    <div id="content" class="no-top no-bottom">
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">

                            <img src="/uploads/news/{{$news->img}}" class="img-responsive" alt="">

                            <div class="post-text">

                                <h3><a href="{{route('site.single-news', $news->slug)}}">{{$news->title}}</a></h3>
                                <p>
                                    {!! $news->content !!}
                                </p>


                                <span class="post-date">{{$news->created_at->translatedFormat('M d, Y')}}</span>
                                <span class="post-comment">{{count($news->all_comments)}}</span>
                                <span class="post-like">{{$news->likes}}</span>
                            </div>

                        </div>

                        <div class="spacer-single"></div>

                        <div id="blog-comment">
                            <h3>Comments ({{count($news->all_comments)}})</h3>

                            <div class="spacer-half"></div>

                            <ol>
                                @foreach($news->all_comments as $c)
                                <li>
                                    <div class="avatar">
                                        <img src="/public/images/avatar.jpg" alt=""/></div>
                                    <div class="comment-info">
                                        <span class="c_name">{{$c->user->name}}</span>
                                        <span class="c_date id-color">{{$c->created_at->translatedFormat('d M Y')}}</span>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="comment">
                                        {{$c->comment}}
                                    </div>
                                </li>
                                @endforeach
                            </ol>

                            <div class="spacer-single"></div>

                            @if(\Illuminate\Support\Facades\Auth::check())
                            <div id="comment-form-wrapper">
                                <h3>Leave a Comment</h3>
                                <div class="comment_form_holder">
                                    <form  class="form-border" method="post" action="{{route('site.add_comment', $news->id)}}">
                                        @csrf
                                        <label>Message <span class="req">*</span></label>
                                        <textarea cols="10" rows="10" name="comment" id="message" class="form-control"></textarea>
                                        <div id="error_message" class="error">Please check your message</div>
                                        <div id="mail_success" class="success">Thank you. Your message has been sent.</div>
                                        <div id="mail_failed" class="error">Error, email not sent</div>
                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p id="btnsubmit">
                                            <input type="submit" id="send" value="Send" class="btn btn-custom" /></p>


                                    </form>
                                </div>
                            </div>
                                @endif
                        </div>

                    </div>

                    <div id="sidebar" class="col-md-3">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul>
                                @foreach($recent_posts as $p)
                                    <li><span class="date text-capitalize" >{{$p->created_at->translatedFormat('d M')}}</span><a href="{{route('site.single-news', $p->slug)}}">{{$p->title}}</a></li>
                                @endforeach

                            </ul>
                        </div>

                        <div class="widget widget-text">
                            <h4>About Us</h4>
                            <div class="small-border"></div>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas
                            sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                        </div>
                        <div class="widget widget_tags">
                            <h4>Tags</h4>
                            <div class="small-border"></div>
                            <ul>
                                <li><a href="#link">Art</a></li>
                                <li><a href="#link">Application</a></li>
                                <li><a href="#link">Design</a></li>
                                <li><a href="#link">Entertainment</a></li>
                                <li><a href="#link">Internet</a></li>
                                <li><a href="#link">Marketing</a></li>
                                <li><a href="#link">Multipurpose</a></li>
                                <li><a href="#link">Music</a></li>
                                <li><a href="#link">Print</a></li>
                                <li><a href="#link">Programming</a></li>
                                <li><a href="#link">Responsive</a></li>
                                <li><a href="#link">Website</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    @endsection
