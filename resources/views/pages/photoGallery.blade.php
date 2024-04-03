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
                                @if (isset($imageWithCategory))
                                    @foreach ($imageWithCategory as $item)
                                    <div class="col-md-4">
                                        <div class="blog-item">
                                            <a href="{{url('/photo-gallery-details/'.$item['uid'])}}"
                                                title="@if (Session::get('locale') == 'hi')
                                                {{ $item['title_name_hi'] }}
                                                @else
                                                {{ $item['title_name_en'] }}
                                                @endif"
                                                tabindex="0">
                                                <div class="image-part">
                                                <img src="{{ asset('resources/uploads/GalleryManagement/' . $item['image']) ?? '' }}" alt="photo gallery">
                                                </div>
                                                <div class="blog-content b-t">
                                                    <h3 class="title" tabindex="0">
                                                        @if (Session::get('locale') == 'hi')
                                                        {{ $item['title_name_hi'] }}
                                                        @else
                                                        {{ $item['title_name_en'] }}
                                                        @endif
                                                    </h3>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection