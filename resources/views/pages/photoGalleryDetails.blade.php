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
        <h3 class="title">{{ $organizedData['metatag']->meta_title ?? '' }}</h3>
    </div>
    </div>
</section>
<div class="main-body">
    <div class="container breadcrumbs-link">
        <div class="breadcrumbs-link-text">
            <ul>
                <li>
                    <a class="active" href="" tabindex="0">
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
                <li>{{ $organizedData['metatag']->meta_title ?? '' }}</li>
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
                                Photo gallery 
                            </h1>

                            <div class="rs-blog main-home col-md-12">
                                <div class="container1 row">
                                    <div class="col-md-6 position-relative">
                                        <div class="mySlides" >
                                       <img src="{{ asset('assets/images/gallery/g1.jpg') }}" alt="gallery image"/>
                                        </div>
                                      
                                        <div class="mySlides" >
                                        <img src="{{ asset('assets/images/gallery/g2.jpg') }}" alt="gallery image"/>
                                             
                                        </div>
                                        
                                        <div class="mySlides" >
                                        <img src="{{ asset('assets/images/gallery/g3.jpg') }}" alt="gallery image"/>
                                        </div>
                                       
                                        
                                        <div class="mySlides" >
                                        <img src="{{ asset('assets/images/gallery/g4.jpg') }}" alt="gallery image"/>
                                        </div>
                                       
                                        
                                      
                                        <a class="prev" onclick="plusSlides(-1)" tabindex="0">❮</a>
                                        <a class="next" onclick="plusSlides(1)" tabindex="0">❯</a>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-box-g">
                                           

                                                <div class="column mb-2">
                                                    <img class="demo cursor fancybox-close active"
                                                        src="{{ asset('assets/images/gallery/g1.jpg') }}"
                                                         onclick="currentSlide(1)" alt="">
                                                </div>

                                                <div class="column mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="{{ asset('assets/images/gallery/g1.jpg') }}"
                                                         onclick="currentSlide(2)" alt="">
                                                </div>

                                                <div class="column mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="{{ asset('assets/images/gallery/g2.jpg') }}"
                                                         onclick="currentSlide(3)" alt="">
                                                </div>

                                                <div class="column mb-2">
                                                    <img class="demo cursor fancybox-close"
                                                        src="{{ asset('assets/images/gallery/g3.jpg') }}"
                                                         onclick="currentSlide(4)" alt="">
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

<script>
    

@endsection