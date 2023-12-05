@extends('layout.master')
@section('title')
    {{ __('RAV') }}
@endsection
@section('content')
    <section class="breadcrumb">
        <div class="page-breadcrumb">

            @if (isset($organizedData['banner']) && $organizedData['banner'] != '')
                <div class="breadcrumb-img">
                    <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" title="" />
                </div>
            @else
                <div class="breadcrumb-img">
                    <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" />
                </div>
            @endif


            <div class="breadcrumb-title"> 
                <h3 class="title">{{ $title_name ?? '' }}</h3>
            </div>
        </div>
    </section>
    <div class="main-body">
        <div class="container breadcrumbs-link">
            <div class="breadcrumbs-link-text">
                <ul>
                    <li>
                        <a class="active" href="" tabindex="0"> Home </a>
                    </li>
                    <li>{{ $title_name ?? '' }}</li>
                </ul>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="master bg-grey">

            <div class="container">
                <div class="news-tab common-tab side-tab1">
                    <div class="row">
                        {{-- side menu start --}}
                        <div class="col-lg-3 col-md-3">

                            @if ($sideMenuParent != '')
                                <ul class="nav nav-tabs" id="newsTab" role="tablist">
                                    @if ($sideMenuParent != '' && isset($sideMenuParent))
                                        <h3 class="heading-txt-styl">{{ $sideMenuParent->name_en ?? '' }}</h3>
                                    @endif

                                    @if (isset($sideMenuChild) && count($sideMenuChild) > 0)
                                        @foreach ($sideMenuChild as $sideMenuChilds)
                                            <li class="nav-item" role="presentation">
                                                <a href="{{ url($sideMenuChilds->url) }}"
                                                    class="nav-link @if (request()->is($sideMenuChilds->url)) active @endif">{{ $sideMenuChilds->name_en ?? '' }}</a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            @endif

                            <ul class="nav-qm nav-tabs mt-3" id="newsTab" role="tablist">
                                <h3 class=" quick-menu-head-stl text-center mt-1">Quick Menu</h3>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i> <a title="link"
                                        href="../pages/message-presidentgb.html" class="nav-link">Message From President,
                                        G.B</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/cme-scheme.html" class="nav-link">CME Scheme</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/guru-shishya-parampara.html" class="nav-link "> Courses
                                        Under Guru Shishya Parampara</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/tender.html" class="nav-link"> Tenders</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/vacancy.html" class="nav-link"> Vacancy</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/thesis-submit-rav-student.html" class="nav-link">
                                        Thesis Submitted by RAV Studnts</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/right-information.html" class="nav-link"> Right to
                                        Information Act(RTI)</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/admission-courses.html" class="nav-link"> Admission
                                        to courses</a>
                                </li>
                                <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                    <a title="link" href="../pages/publication-of-vidyapeeth.html" class="nav-link">
                                        Publication of vidyapeeth</a>
                                </li>


                            </ul>
                        </div>
                        {{-- side menu end --}}
                        <div class="col-md-8 col-lg-8 ">
                            <div class="about">
                                <h1>
                                    @if (isset($organizedData['metatag']->page_title_en) && !blank($organizedData['metatag']->page_title_en))
                                        {{ $organizedData['metatag']->page_title_en ?? '' }}
                                    @endif
                                </h1>


                                @if (isset($organizedData['content']->page_content_en) && !blank($organizedData['content']->page_content_en))
                                    <p> {!! $organizedData['content']->page_content_en ?? '' !!} </p>
                                @endif

                                {{-- Photo Gallery start --}}
                                @if (isset($organizedData['gallery']) && count($organizedData['gallery']) > 0)
                                    <div class="lightbox-photo-gallery">
                                        <div class="gallery">
                                            <div class="row">
                                                <h1>Photo Gallery</h1>
                                                @foreach ($organizedData['gallery'] as $data)
                                                    <div class="col-lg-3 col-md-3">
                                                        <div class="images__item"><a class="images__link" name="img3"
                                                                href="{{ asset('resources/uploads/PageContentGallery/' . $data->public_url) }}">
                                                                <img src="{{ asset('resources/uploads/PageContentGallery/' . $data->public_url) }}"
                                                                    alt="{{ $data->image_title ?? '' }}"
                                                                    title="{{ $data->image_title ?? '' }}" /></a></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                {{-- Photo Gallery end --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection


{{-- @foreach ($organizedData['content'] as $data) 
                     
                     <h2>{!! $data->page_content_en !!}</h2>
                    
                     @endforeach --}}
