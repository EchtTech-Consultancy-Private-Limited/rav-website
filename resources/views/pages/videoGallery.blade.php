@extends('layout.master')
@section('title')
{{ __('RAV') }}
@endsection
@section('content')

<section class="breadcrumb">
    {{-- banner start --}}
    @if (isset($organizedData['banner']) && $organizedData['banner'] != '')
    <div class="breadcrumb-img">
        <img src="{{ asset('resources/uploads/pagebanner/' . $organizedData['banner']->public_url) ?? '' }}"
            alt="{{ $organizedData['banner']->image_title ?? '' }}"
            title="{{ $organizedData['banner']->image_title ?? '' }}" />
    </div>
    @else
    <div class="breadcrumb-img">
        <img src="{{ asset('assets/images/bredcrumb.jpg') ?? '' }}" alt="" />
    </div>
    @endif
    {{-- banner end --}}
    <div class="breadcrumb-title">
        <h3 class="title">{{ $organizedData['metatag']->meta_title ?? $title_name }}</h3>
    </div>
    </div>
</section>
<div class="main-body">
    <div class="container breadcrumbs-link">
        <div class="breadcrumbs-link-text">
            <ul>
                <li>
                    <a class="active" href="{{ url('/') }}" tabindex="0">
                        @if (Session::get('locale') == 'hi')
                        होम पेज
                        @else
                        Home
                        @endif
                    </a>
                </li>
                @if (isset($finalBred))
                <li><a>{{ ucfirst(strtolower($finalBred)) ?? '' }}</a></li>
                @endif
                @if (isset($lastBred))
                <li><a>{{ ucfirst(strtolower($lastBred)) ?? '' }}</a></li>
                @endif
                @if (isset($middelBred))
                <li><a>{{ ucfirst(strtolower($middelBred)) ?? '' }}</a></li>
                @endif
                <li>{{ $organizedData['metatag']->meta_title ?? $title_name }}</li>
            </ul>
        </div>
    </div>
    <section class="master bg-grey">
        <div class="container">
            <div class="news-tab common-tab side-tab1">
                <div class="row">

                    <div class="col-md-12 col-lg-12 ">
                        <div class="about">
                            <h1>
                                Video Gallery
                            </h1>

                            <div class="rs-blog main-home col-md-12">
                                <div class="container1 row">
                                    <div class="col-md-6 position-relative">
                                        @foreach ($videos as $video)
                                        <div class="mySlides">
                                            <iframe width="100%" height="400"
                                                src="https://www.youtube.com/embed/{{ $video['video_id'] }}?rel=0"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        @endforeach
                                 
                                        
                                        <a class="prev" onclick="plusSlides(-1)" tabindex="0">❮</a>
                                        <a class="next" onclick="plusSlides(1)" tabindex="0">❯</a>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-box-g">
                                            <div class="row ps-0">
                                                @foreach ($videos as $key => $video)
                                                <div class="col-md-3 mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="https://i.ytimg.com/vi/{{ $video['video_id'] }}/maxresdefault.jpg"
                                                        style="width:100%" onclick="currentSlide({{ $key + 1 }})"
                                                        alt="">
                                                </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection