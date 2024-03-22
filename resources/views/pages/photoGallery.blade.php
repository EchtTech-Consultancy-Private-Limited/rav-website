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
            <div class="news-tab common-tab side-tab1 rs-blog main-home">
                <div class="row">

                    <div class="col-md-12 col-lg-12 ">
                        <div class="about">
                            <h1>
                                Photo Gallery
                            </h1>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <a href="{{url('/photo-gallery-details')}}"
                                            title="Shramdan Activities Were Held at CPPRI Saharanpur as Part of The 'Ek Tarikh Ek Ghanta Ek Sath'"
                                            tabindex="0">
                                            <div class="image-part">
                                            <img src="{{ asset('assets/images/gallery/g1.jpg') }}" alt="photo gallery">
                                            </div>
                                            <div class="blog-content b-t">
                                                <h3 class="title" tabindex="0">
                                                    Shramdan Activities Were Held at CPPRI Saharanpur as Part of The 'Ek
                                                    Tarikh Ek Ghanta Ek Sath'
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <a href="{{url('/photo-gallery-details')}}"
                                            title="Under The Ongoing  Special Campaign" tabindex="0">
                                            <div class="image-part">
                                            <img src="{{ asset('assets/images/gallery/g2.jpg') }}" alt="photo gallery">
                                            </div>
                                            <div class="blog-content b-t">
                                                <h3 class="title" tabindex="0">
                                                    Under The Ongoing Special Campaign
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <a href="{{url('/photo-gallery-details')}}"
                                            title="On 02.10.2023 Under The Ongoing Swachhata Hi Sewa (SHS) Campaign"
                                            tabindex="0">
                                            <div class="image-part">
                                                <img src="{{ asset('assets/images/gallery/g3.jpg') }}" alt="photo gallery">
                                            </div>
                                            <div class="blog-content b-t">
                                                <h3 class="title" tabindex="0">
                                                    On 02.10.2023 Under The Ongoing Swachhata Hi Sewa (SHS) Campaign
                                                </h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <a href="{{url('/photo-gallery-details')}}"
                                            title="Shri. M.P. Singh Director, ICFRE IWST, Bangalore and Dr. M.K. Gupta Director ,CPPRI Saharanpur Signed MoU for Technical Collaboration"
                                            tabindex="0">
                                            <div class="image-part">
                                            <img src="{{ asset('assets/images/gallery/g4.jpg') }}" alt="photo gallery">
                                            </div>
                                            <div class="blog-content b-t">
                                                <h3 class="title" tabindex="0">
                                                    Shri. M.P. Singh Director, ICFRE IWST, Bangalore and Dr. M.K. Gupta
                                                    Director ,CPPRI Saharanpur Signed MoU for Technical Collaboration
                                                </h3>
                                            </div>
                                        </a>
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