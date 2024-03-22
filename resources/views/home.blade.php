@extends('layout.master')
@section('title')
{{ __('RAV') }}
@endsection
@section('content')
<section class="hero-banner">
    <div class="hero-slider">
        <div class="owl-carousel owl-theme" id="heroSlider">
            @if (isset($banner) && count($banner) > 0)
            @foreach ($banner as $banners)
            <div class="item">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="hero-slider-img" data-aos="fade-left" data-aos-duration="3000">
                            @if ($banners->public_url != '')
                            <img src="{{ asset('resources/uploads/banner/' . $banners->public_url) }}"
                                title="{{ $banners->banner_title ?? '' }}" alt="{{ $banners->banner_alt ?? '' }}"
                                class="img-fluid">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h5>No banner available.</h5>
            @endif
        </div>
        <div class="btns">
            <div id="customPreviousBtn">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </div>
            <div id="customPause">
                <i class="fa fa-pause" aria-hidden="true"></i>
            </div>
            <div id="customPlay">
                <i class="fa fa-play" aria-hidden="true"></i>
            </div>
            <div id="customNextBtn">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</section>
{{-- banner end --}}
<section class="latest-update-wrap">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-3 p-0">
                <h3 class="title-white py-2 px-5">
                    @if (Session::get('locale') == 'hi')
                    {{ __('messages.latest_update') }}
                    @else
                    {{ __('messages.latest_update') }}
                    @endif
                </h3>
            </div>
            <div class="col-md-9 p-0">
                <div class="latest-news-slider">
                    <div class="owl-carousel owl-theme" id="latest-news-slider">
                        @if (isset($news_management) && count($news_management) > 0)
                        @foreach ($news_management as $news_managements)
                        <div class="item">
                            <p>
                                @if (Session::get('locale') == 'hi')
                                {{ $news_managements->title_name_hi ?? '' }}
                                @else
                                {{ $news_managements->title_name_en ?? '' }}
                                @endif
                            </p>
                        </div>
                        @endforeach
                        @else
                        <h6>No News available.</h6>
                        @endif
                    </div>
                    <div class="btns">
                        <div id="customPreviousBtn1">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </div>
                        <div id="customPause1">
                            <i class="fa fa-pause" aria-hidden="true"></i>
                        </div>
                        <div id="customPlay1" class="customPlay">
                            <i class="fa fa-play" aria-hidden="true"></i>
                        </div>
                        <div id="customNextBtn1">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-us ptb-100" id="about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12" data-aos="fade-up" data-aos-duration="3000">
                <h2 class="heading-black heading-black-lg text-center pb-4">
                    @if (Session::get('locale') == 'hi')
                    {{ __('messages.About_Us') }}
                    @else
                    {{ __('messages.About_Us') }}
                    @endif
                </h2>
                @if($organizedDatas)
                <p class="desc-grey text-justify">
                    @foreach($organizedDatas as $organizedData)
                    @if($organizedData['metatag']->menu_slug == 'about-us')
                    @if($organizedData['content'])
                    @php
                    $content_hi = $organizedData['content']->page_content_hi;
                    $content_en = $organizedData['content']->page_content_en;
                    $content = Session::get('locale') == 'hi' ? $content_hi : $content_en;
                    $trimmed_content = strlen($content) > 1060 ? substr($content, 0, 1060) . '...' : $content;
                    @endphp

                    {!! $trimmed_content !!}
                    @else
                    <span>Content not available ..</span>
                    @endif
                    @endif
                    @endforeach
                </p>
                @endif

                <div class="btn-wrap d-flex justify-content-center align-items-center">
                    <a href="{{ url('about-us') }}" class="btn btn-org-bdr">
                        @if (Session::get('locale') == 'hi')
                        {{ __('messages.Read_More') }}
                        @else
                        {{ __('messages.Read_More') }}
                        @endif
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                    <div class="about-us-card-front">
                        <div class="img">
                            <img src="{{ asset('assets/images/minister1.png') }}" alt="minister" class="img-fluid">
                        </div>
                        <div class="text-item">
                            <h3 class="title">
                                Shri Sarbananda Sonowal
                            </h3>
                            <p class="desc">
                                <b>Hon’ble Cabinet minister</b>
                                of AYUSH, Government of India
                            </p>
                            <p class="title-org">
                                <a href="#"> Know More</a>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                What is Lorem Ipsum?
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at
                                dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                    <div class="about-us-card-front">
                        <div class="img">
                            <img src="{{ asset('assets/images/minister2.png') }}" alt="minister" class="img-fluid">
                        </div>
                        <div class="text-item">
                            <h3 class="title">
                                Dr. Munjapara Mahendrabhai
                            </h3>
                            <p class="desc">
                                <b>Hon'ble Minister of State Ministry</b>
                                of AYUSH & Ministry of
                                Women
                                and Child
                                Developement
                            </p>
                            <p class="title-org">
                                <a href="#"> Know More</a>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                What is Lorem Ipsum?
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at
                                dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                    <div class="about-us-card-front">
                        <div class="img">
                            <img src="{{ asset('assets/images/minister3.png') }}" alt="minister" class="img-fluid">
                        </div>
                        <div class="text-item">
                            <h3 class="title">
                                Padmashree Vaidya Rajesh Kotecha
                            </h3>
                            <p class="desc">
                                <b>Secretary</b>
                                Ministry of AYUSH
                            </p>
                            <p class="title-org">
                                <a href="#"> Know More</a>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                What is Lorem Ipsum?
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at
                                dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div> -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                    <div class="about-us-card-front">
                        <div class="img">
                            <img src="{{ asset('assets/images/minister4.png') }}" alt="minister" class="img-fluid">
                        </div>
                        <div class="text-item">
                            <h3 class="title">
                                Dr. Vandana Siroha
                            </h3>
                            <p class="desc">
                                <b>Director</b>
                                AIIA, New Delhi
                            </p>
                            <p class="title-org">
                                <a href="#"> Know More</a>
                            </p>
                        </div>
                    </div>
                    <!-- <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                What is Lorem Ipsum?
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at
                                dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div> -->
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="news-wrap">
                    <div class="news-tab common-tab">
                        <ul class="nav nav-tabs" id="newsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="latestNews-tab" data-bs-toggle="tab"
                                    data-bs-target="#latestNews-tab-pane" type="button" role="tab"
                                    aria-controls="latestNews-tab-pane" aria-selected="true">Latest News
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="courses-tab" data-bs-toggle="tab"
                                    data-bs-target="#courses-tab-pane" type="button" role="tab"
                                    aria-controls="courses-tab-pane" aria-selected="false">
                                    Admission to
                                    Courses
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="cme-tab" data-bs-toggle="tab"
                                    data-bs-target="#cme-tab-pane" type="button" role="tab" aria-controls="cme-tab-pane"
                                    aria-selected="false">CME Scheme
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content pt-4" id="newsTabContent">
                            <div class="tab-pane fade show active" id="latestNews-tab-pane" role="tabpanel"
                                aria-labelledby="latestNews-tab" tabindex="0">
                                <div class="row">
                                    <div class="news-content-list">
                                        <ul>
                                            @if (isset($news_management) && count($news_management) > 0)
                                            @foreach ($news_management as $news_managements)
                                            @php
                                            $url = $news_managements->public_url ?? 'javascript:void(0)';
                                            @endphp
                                            <li>
                                                <a @if($news_managements->tab_type == 1)
                                                    target="_blank"
                                                    onclick="return confirm('{{ $alertMessage }}')"
                                                    href="{{ url($url)  }}"
                                                    @else
                                                    href="{{ url($url) }}"
                                                    @endif
                                                    >
                                                    <div class="date-wrap">
                                                        <h3 class="ln_date">
                                                            {{ date('d', strtotime($news_managements->start_date ?? now())) }}
                                                        </h3>
                                                        <span class="month">
                                                            {{ $news_managements->start_date ? date('M', strtotime($news_managements->start_date)) : 'Default Value' }}
                                                            <br>
                                                            {{ $news_managements->start_date ? date('Y', strtotime($news_managements->start_date)) : 'Default Value' }}
                                                        </span>
                                                    </div>
                                                    <p class="desc">
                                                        @if (Session::get('locale') == 'hi')
                                                        {{ $news_managements->title_name_hi ?? '' }}
                                                        @else
                                                        {{ $news_managements->title_name_en ?? '' }}
                                                        @endif
                                                    </p>
                                                </a>
                                            </li>
                                            @endforeach
                                            @else
                                            <h6>No News available.</h6>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="courses-tab-pane" role="tabpanel"
                                aria-labelledby="courses-tab" tabindex="0">
                                <div class="row">
                                    <div class="news-content-list">
                                        @if($organizedDatas)
                                        @foreach($organizedDatas as $organizedData)
                                        @if($organizedData['metatag']->menu_slug == 'admission-to-courses')
                                        @if($organizedData['content'])
                                        @if (Session::get('locale') == 'hi')
                                        {!! $organizedData['content']->page_content_hi !!}
                                        @else
                                        {!! $organizedData['content']->page_content_en !!}
                                        @endif
                                        @else
                                        <span>Content not available ..</span>
                                        @endif
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cme-tab-pane" role="tabpanel" aria-labelledby="cme-tab"
                                tabindex="0">
                                <div class="row">
                                    <!-- removed classs news-content-list -->
                                    <div class=" scrollbar-style">
                                        <!-- removed classs news-content-list -->
                                        <div class="">
                                            @foreach($organizedDatas as $organizedData)
                                            @if($organizedData['metatag']->menu_slug == 'cme-scheme')
                                            @if($organizedData['content'])
                                            @if (Session::get('locale') == 'hi')
                                            {!! $organizedData['content']->page_content_hi !!}
                                            @else
                                            {!! $organizedData['content']->page_content_en !!}
                                            @endif
                                            @else
                                            <span>Content not available ..</span>
                                            @endif
                                            @endif
                                            @endforeach
                                            @if($organizedData['metatag']->menu_slug == 'cme-scheme')
                                            @if($organizedData['pdf'])
                                            @foreach($organizedData['pdf'] as $pdf)
                                            <p class="right-angle-arrow">
                                                <a href="{{ asset('resources/uploads/PageContentPdf/' . $pdf->public_url) }}"
                                                    target="_blank">{{ $pdf->pdf_title }}</a>
                                                <span class="text-primary">
                                                    <i class="fa fa-file-pdf-o" aria-hidden="true">
                                                        {{ $pdf->pdfimage_size }}</i>
                                                </span>
                                            </p>
                                            @endforeach
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="event-card">
                    <h2 class="heading-white mb-2">
                        Our Events
                    </h2>
                    <div class="event-slider">
                        <div class="owl-carousel owl-theme" id="eventSlider">
                            @if(isset($events_managements) && count($events_managements) > 0)
                            @foreach($events_managements as $events_management)
                            <div class="item">
                                <div class="event-list">
                                    @if (Session::get('locale') == 'hi')
                                    <p class="title-white">{!! $events_management->title_name_hi !!}</p>
                                    @else
                                    <p class="title-white">{!! $events_management->title_name_en !!}</p>
                                    @endif
                                    <div class="event-list-content my-2">
                                        <div class="d-flex align-items-center">
                                            <span class="tag">Event Date</span>
                                        </div>
                                        <div class="date-wrap">
                                            <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                class="img-fluid me-3">
                                            <h3 class="ln_date">
                                                {{ date('d-m-Y',strtotime($events_management->start_date))  }}</h3>
                                        </div>
                                    </div>
                                    <div class="event-list-content my-2">
                                        <div class="d-flex align-items-center">
                                            <span class="tag">Venue</span>
                                        </div>
                                        <div class="address-wrap">
                                            <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                class="img-fluid me-3">
                                            <h3 class="address">
                                                @if (Session::get('locale') == 'hi')
                                                {!! $events_management->description_hi !!}
                                                @else
                                                {!! $events_management->description_en !!}
                                                @endif
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <p>No events available..</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="course-wrap">
                    <div class="course-list">
                        <ul>
                            @foreach($quickLinks as $link)
                            <li>
                                {{ $link->name_en }}
                                <a href="{{ url('/'.$link->url) }}" class="read-more">
                                    <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow" class="img-fluid">
                                </a>
                            </li>
                            @endforeach
                            @if(isset($newsLetter))
                            <li>
                                {{ $newsLetter->name_en }}
                                <a href="{{ url('/'.$link->url) }}" class="read-more">
                                    <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow" class="img-fluid">
                                </a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="message-wrap bg-grey ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="message-tab common-tab">
                    <ul class="nav nav-tabs" id="messageTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="latestMassage-tab" data-bs-toggle="tab"
                                data-bs-target="#latestMassage-tab-pane" type="button" role="tab"
                                aria-controls="latestMassage-tab-pane" aria-selected="true">Latest Massage
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="ourMinisters-tab" data-bs-toggle="tab"
                                data-bs-target="#ourMinisters-tab-pane" type="button" role="tab"
                                aria-controls="ourMinisters-tab-pane" aria-selected="false">
                                Meet Our
                                Ministers
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="corner-tab" data-bs-toggle="tab"
                                data-bs-target="#corner-tab-pane" type="button" role="tab"
                                aria-controls="corner-tab-pane" aria-selected="false">Alumni Corner
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tenders-tab" data-bs-toggle="tab"
                                data-bs-target="#tenders-tab-pane" type="button" role="tab"
                                aria-controls="tenders-tab-pane" aria-selected="false">Our Tenders
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="thesis-tab" data-bs-toggle="tab"
                                data-bs-target="#thesis-tab-pane" type="button" role="tab"
                                aria-controls="thesis-tab-pane" aria-selected="false">
                                Thesis by RAV
                                students
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="information-tab" data-bs-toggle="tab"
                                data-bs-target="#information-tab-pane" type="button" role="tab"
                                aria-controls="information-tab-pane" aria-selected="false">
                                Right to
                                Information
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="messageTabContent">
                        <div class="tab-pane fade show active" id="latestMassage-tab-pane" role="tabpanel"
                            aria-labelledby="latestMassage-tab" tabindex="0">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="message-tab-img">
                                        <a href="#" class="video-wrap">
                                            <div class="video-img common-video-img">
                                                <img src="{{ asset('assets/images/massage.png') }}" alt="video"
                                                    class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="message-tab-content">
                                        <h2 class="heading-black heading-black-md">
                                            Message From President,G.B
                                        </h2>
                                        <p class="title">
                                            Vd. Devendra Triguna, President, Governing Body, RAV
                                            <br>
                                            <em>A Padmashree & Padmabhushan Awardee</em>
                                        </p>
                                        <p class="desc">
                                            In present era Ayurveda is torching the new horizon not even in our own
                                            country but across the world as a holistic system of medicine. As per
                                            the calculations, 90% of Asia’s population practice Ayurvedic
                                            therapy....
                                        </p>
                                        <div class="btn-wrap d-flex align-items-center">
                                            <a href="#" class="btn btn-org-bdr">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="ourMinisters-tab-pane" role="tabpanel"
                            aria-labelledby="ourMinisters-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="message-tab-img">
                                        <a href="#" class="video-wrap">
                                            <div class="video-img common-video-img">
                                                <img src="{{ asset('assets/images/sarbanada-sonowal.jpg') }}"
                                                    alt="video" class="img-fluid">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="message-tab-content">
                                        <h2 class="heading-black heading-black-md">
                                            Shri Sarbananda Sonowal
                                        </h2>
                                        <p class="title">
                                            Union Cabinet Minister Ministry of Ayush & Ministry of Ports, Shipping
                                            and Waterways
                                        </p>
                                        <p class="desc">
                                            <b> Party Name:</b>
                                            Bharatiya Janata Party(BJP)
                                            <br>
                                            <b> Father’s Name:</b>
                                            Late Shri Jibeswar Sonowal
                                            <br>
                                            <b>Mother’s Name:</b>
                                            Late Smt. Dineswari Sonowal
                                            <br>
                                            <b> Date of Birth:</b>
                                            31st October, 1962
                                            <br>
                                            <b>Place of Birth:</b>
                                            Mulukgaon, Distt. Dibrugarh (Assam)
                                            <br>
                                            <b> Marital Status:</b>
                                            Unmarried
                                            <br>
                                            <b>Educational Qualifications:</b>
                                            LLB., B.C.J, Educated at Dibrugarh
                                            University and Gauhati University
                                            <br>
                                            <b>Permanent Address:</b>
                                            1 No., Lakhimi Nagar, Near Auniati Sakha
                                            Sattra, Mankatta Road, P.O. & P.S. Dibrugarh, Distt. Dibrugharh, Assam,
                                            Pincode-786003
                                            <br>
                                            <br>
                                            Positions Held
                                            <br>
                                            <b>2001-2004:</b>
                                            Member, Assam Legislative Assembly
                                            (Constituency-Moran)
                                            <br>
                                            <b>2004-2009:</b>
                                            Elected to 14th Lok Sabha (Constituency- Dibrugharh)
                                            <br>
                                        </p>
                                        <div class="btn-wrap d-flex align-items-center">
                                            <a href="#" class="btn btn-org-bdr">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="corner-tab-pane" role="tabpanel" aria-labelledby="corner-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div>
                                        @if (Session::get('locale') == 'hi')
                                        <h2>{{ $dynamicContents->page_title_hi }}</h2>
                                        {!! $dynamicContents->page_content_hi !!}
                                        @else
                                        <h2>{{ $dynamicContents->page_title_en }}</h2>
                                        {!! $dynamicContents->page_content_en !!}
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tenders-tab-pane" role="tabpanel" aria-labelledby="tenders-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="dataTable">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th> Title</th>
                                                <th>Published Date</th>
                                                <th>Submission Date</th>
                                                <th>Opening Date</th>
                                                <th>View/Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tenders as $tender)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if (Session::get('locale') == 'hi')
                                                    {{ $tender->title_name_hi }}
                                                    @else
                                                    {{ $tender->title_name_en }}
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($tender->start_date)->format('d F Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($tender->end_date)->format('d F Y') }}</td>
                                                <td>{{ \Carbon\Carbon::parse($tender->opening_date)->format('d F Y') }}
                                                </td>
                                                <td>
                                                    <a target="{{ $tender->tab_type == 1 ? '_blank' : ''  }}"
                                                        class="link-primary"
                                                        href="{{ asset('resources/uploads/TenderManagement/' . $tender->public_url) }}">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="thesis-tab-pane" role="tabpanel" aria-labelledby="thesis-tab"
                            tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div>
                                            @if(isset($thesisContents))
                                            @if (Session::get('locale') == 'hi')
                                            <h2>{{ $thesisContents->page_title_hi }}</h2>
                                            {!! $thesisContents->page_content_hi !!}
                                            @else
                                            <h2>{{ $thesisContents->page_title_en }}</h2>
                                            {!! $thesisContents->page_content_en !!}
                                            @endif
                                            @else
                                            <div class="text-center">
                                                <h1>Content coming soon...</h1>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="information-tab-pane" role="tabpanel"
                            aria-labelledby="information-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-content">
                                        @if(isset($rightToInfoContents))
                                        @if (Session::get('locale') == 'hi')
                                        <h2>{{ $rightToInfoContents->page_title_hi }}</h2>
                                        {!! $rightToInfoContents->page_content_hi !!}
                                        @else
                                        <h2>{{ $rightToInfoContents->page_title_en }}</h2>
                                        {!! $rightToInfoContents->page_content_en !!}
                                        @endif
                                        @else
                                        <div class="text-center">
                                            <h1>Content coming soon...</h1>
                                        </div>
                                        @endif
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
<section class="our-journey ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="heading-black heading-black-lg text-center pb-5">
                    @if (Session::get('locale') == 'hi')
                    {{ __('messages.Our_Successful_Journey') }}
                    @else
                    {{ __('messages.Our_Successful_Journey') }}
                    @endif
                </h2>
            </div>
            <div class="col-md-3">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/graduation.svg') }}" alt="graduation" class="img-fluid">
                    <span class="total-no">
                        12,458
                    </span>
                    <p class="title">
                        @if (Session::get('locale') == 'hi')
                        {{ __('messages.Number_of_Graduates') }}
                        @else
                        {{ __('messages.Number_of_Graduates') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/programme.svg') }}" alt="programme" class="img-fluid">
                    <span class="total-no">
                        24
                    </span>
                    <p class="title">
                        @if (Session::get('locale') == 'hi')
                        {{ __('messages.Programme_Offerings') }}
                        @else
                        {{ __('messages.Programme_Offerings') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/research.svg') }}" alt="research" class="img-fluid">
                    <span class="total-no">
                        1213
                    </span>
                    <p class="title">
                        @if (Session::get('locale') == 'hi')
                        {{ __('messages.Research_Initiatives') }}
                        @else
                        {{ __('messages.Research_Initiatives') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/presence.svg') }}" alt="presence" class="img-fluid">
                    <span class="total-no">
                        686
                    </span>
                    <p class="title">
                        @if (Session::get('locale') == 'hi')
                        {{ __('messages.Online_Presence') }}
                        @else
                        {{ __('messages.Online_Presence') }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/presence.svg') }}" alt="presence" class="img-fluid">
                    <span class="total-no">
                        1500
                    </span>
                    <p class="title">
                        Total no of CME
                    </p>
                </div>
            </div>
            <div class="col-md-3 mt-4">
                <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                    <img src="{{ asset('assets/images/presence.svg') }}" alt="presence" class="img-fluid">
                    <span class="total-no">
                        61

                    </span>
                    <p class="title">
                        Workshop & Training
                    </p>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="activity-wrap bg-purple ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="activity-tab common-tab">
                    <ul class="nav nav-tabs" id="activityTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="activity-tab" data-bs-toggle="tab"
                                data-bs-target="#activity-tab-pane" type="button" role="tab"
                                aria-controls="activity-tab-pane" aria-selected="true">
                                @if (Session::get('locale') == 'hi')
                                {{ __('messages.Our_Activities') }}
                                @else
                                {{ __('messages.Our_Activities') }}
                                @endif
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="crav-tab" data-bs-toggle="tab" data-bs-target="#crav-tab-pane"
                                type="button" role="tab" aria-controls="crav-tab-pane" aria-selected="false">
                                @if (Session::get('locale') == 'hi')
                                {{ __('messages.CRAV_Gurus') }}
                                @else
                                {{ __('messages.CRAV_Gurus') }}
                                @endif
                            </button>
                        </li>
                    </ul>
                    <p class="title-white py-4">
                        Dynamic activities encompassing holistic education,
                        <br>
                        research, seminars, and community engagement at Rashtriya Ayurveda Vidyapeeth
                    </p>
                    <div class="tab-content pt-4 mb-neg-20" id="activityTabContent">
                        <div class="tab-pane fade show active" id="activity-tab-pane" role="tabpanel"
                            aria-labelledby="activity-tab" tabindex="0">
                            <div class="activity-slider">
                                <div class="owl-carousel owl-theme" id="activitySlider">
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider1.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Gyanganga - Knowledge Voyage - A weekly Webinar Series
                                                        </h3>
                                                        <p class="desc">
                                                            Gyanganga - Knowledge Voyage - A weekly Webinar Series
                                                            Printer-friendly version
                                                            Rashtriya Ayurveda Vidyapeeth (RAV) is organizing
                                                            webinars series named "Gyan Ganga –a knowledge Voyage”
                                                            every Thursday. The purpose of the webinar series is to
                                                            disseminate authentic knowledge, information and doubt
                                                            clearance on various topics among students and Ayurveda
                                                            fraternity.It is our pleasure that on the occasion
                                                            Padmabhushan Vaidya Devinder Triguna, President, G.B. of
                                                            RAV, Vaidya Manoj Nesari, Advisor Ayurveda, Ministry of
                                                            AYUSH, Vaidya Anupam Srivastava, Director RAV and
                                                            eminent scholars of Ayurveda address the webinar and
                                                            share their views.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider2.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Promotion of Ayurvedic Aahar
                                                        </h3>
                                                        <p class="desc">
                                                            Towards achieving the objective of “Ek Bharat Shreshth
                                                            Bharat” campaign by Government of India, Rashtriya
                                                            Ayurved Vidyapeeth , New Delhi under guidance of
                                                            Ministry of AYUSH is promoting “Region specific
                                                            Ayurvediy Aahar”. In this regard Rashtriya Ayurved
                                                            Vidyapeeth is commencing “ Is Saptah ka Aahar “ a weekly
                                                            update series for updating general public on Health
                                                            benefits of popular Ayurvedic Aahar belonging to
                                                            particular state or region of India. The main objective
                                                            of this series is to create awareness in public
                                                            regarding health benefits associated with region
                                                            specific Ayurvedic Aahar so as to enable them achieve &
                                                            maintain good health. So, far the following details and
                                                            videos have been uploaded.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider3.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Gyanganga - Knowledge Voyage - A weekly Webinar Series
                                                        </h3>
                                                        <p class="desc">
                                                            Gyanganga - Knowledge Voyage - A weekly Webinar Series
                                                            Printer-friendly version
                                                            Rashtriya Ayurveda Vidyapeeth (RAV) is organizing
                                                            webinars series named "Gyan Ganga –a knowledge Voyage”
                                                            every Thursday. The purpose of the webinar series is to
                                                            disseminate authentic knowledge, information and doubt
                                                            clearance on various topics among students and Ayurveda
                                                            fraternity.It is our pleasure that on the occasion
                                                            Padmabhushan Vaidya Devinder Triguna, President, G.B. of
                                                            RAV, Vaidya Manoj Nesari, Advisor Ayurveda, Ministry of
                                                            AYUSH, Vaidya Anupam Srivastava, Director RAV and
                                                            eminent scholars of Ayurveda address the webinar and
                                                            share their views.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="crav-tab-pane" role="tabpanel" aria-labelledby="crav-tab"
                            tabindex="0">
                            <div class="activity-slider">
                                <div class="owl-carousel owl-theme" id="cravSlider">
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider1') }}.png"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Exploring the Facts: Covid-19
                                                        </h3>
                                                        <p class="desc">
                                                            Exploring the Facts: Covid-19
                                                            Printer-friendly version
                                                            List of Webinars: Exploring the Facts: Covid-19
                                                            The Corona virus COVID-19 pandemic is an emerging global
                                                            health crisis and the greatest challenge faced so far
                                                            with high rate of mortality throughout the globe. World
                                                            is still scrambling to find a cure. Considering the
                                                            utmost need for an affordable measure to prevent the
                                                            disease as well as to boost the immune system, various
                                                            Researches has been carried out by AYUSH Research
                                                            Council to combat this Covid-19 Pandemic.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider2.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            New Initiative
                                                        </h3>
                                                        <p class="desc">
                                                            Towards achieving the objective of “Ek Bharat Shreshth
                                                            Bharat” campaign by Government of India, Rashtriya
                                                            Ayurved Vidyapeeth , New Delhi under guidance of
                                                            Ministry of AYUSH.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider1.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Conduction of Training Programs
                                                        </h3>
                                                        <p class="desc">
                                                            Conduction of Training Programs
                                                            Printer-friendly version
                                                            In order to cater the specific needs of teachers ,
                                                            students and researchers in Ayurveda , RAV has initiated
                                                            various training programs as per actual demand. Curently
                                                            a training program on samhita based ayurvedic for
                                                            teachers and another on Research Method, manuscript
                                                            writing and career opportunity for PG scholars is
                                                            operational.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider3.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Theses Submitted by RAV Students
                                                        </h3>
                                                        <p class="desc">
                                                            Annexure-I: Thesis Submitted by RAV Students
                                                            The details of thesis, subject wise, submitted by
                                                            students of RAV :
                                                            SUSHRUTA SAMHITA
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider3.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Celebration of International Yoga Day 2023
                                                        </h3>
                                                        <p class="desc">
                                                            Rashtriya Ayurveda Vidyapeet (RAV) Punjabi Bagh, Delhi
                                                            commemorated the 9th International Day for Yoga 2023.
                                                            This year, the theme for International Yoga Day is "Yoga
                                                            for Vasudhaiva Kutumbakam," which beautifully
                                                            encapsulates our collective aspiration for "One Earth,
                                                            One Family, One Future." Dr. Vandana Siroha, Director,
                                                            RAV “Remarked that Yoga is not just performing asanas,
                                                            but a way of living a healthy life. The practice of
                                                            doing yoga every day not only makes our body healthy but
                                                            it even relaxes the mind and oozes out negativity”.
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="activity-slider-card">
                                            <div class="row m-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-img">
                                                        <img src="{{ asset('assets/images/activity-slider3.png') }}"
                                                            alt="activity-slider1" class="img-fluid">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="activity-slider-content">
                                                        <h3 class="title-black-sm">
                                                            Expert Talks Series on Poshan-Nutrition
                                                        </h3>
                                                        <p class="desc">
                                                            Expert Talks Series on Poshan-Nutrition
                                                            Printer-friendly version
                                                            Every year “National Nutrition Month” is celebrated in
                                                            the month of September. Poshan Abhiyaan was launched by
                                                            Hon. Prime Minister in the year 2018 on the occasion of
                                                            International Women’s Day with an objective to combat
                                                            malnutrition among pregnant women, lactating mothers,
                                                            school childrens & adolescent girls.RAV is also
                                                            celebrating Poshan Maah from “1st to 30th September
                                                            2021.”
                                                        </p>
                                                        <a href="#" class="read-more">
                                                            <img src="{{ asset('assets/images/read-more.svg') }}"
                                                                alt="read-more" class="img-fluid">
                                                        </a>
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
            </div>
        </div>
    </div>
</section>
<section class="photo-wrap mt-pos-14">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="photo-tab common-tab">
                    <ul class="nav nav-tabs" id="photoTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="twitter-tab" data-bs-toggle="tab"
                                data-bs-target="#twitter-tab-pane" type="button" role="tab"
                                aria-controls="twitter-tab-pane" aria-selected="false">Twitter Updates
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="photo-tab" data-bs-toggle="tab"
                                data-bs-target="#photo-tab-pane" type="button" role="tab" aria-controls="photo-tab-pane"
                                aria-selected="true">Our Photos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="video-tab" data-bs-toggle="tab"
                                data-bs-target="#video-tab-pane" type="button" role="tab" aria-controls="video-tab-pane"
                                aria-selected="false">Videos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="awards-tab" data-bs-toggle="tab"
                                data-bs-target="#awards-tab-pane" type="button" role="tab"
                                aria-controls="awards-tab-pane" aria-selected="false">Awards
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-grey ptb-100 mt-pos-8">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content mt-neg-18" id="photoTabContent">
                        <div class="tab-pane fade show active" id="photo-tab-pane" role="tabpanel"
                            aria-labelledby="photo-tab" tabindex="0">
                            <div class="photo-gallery-wrap">
                                <div class="row">
                                    <div class="col-md-4 p-0">
                                        <div class="photo-gallery-img me-2">
                                            <img src="{{ asset('assets/images/photo1.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                        <div class="photo-gallery-img me-2">
                                            <img src="{{ asset('assets/images/photo2.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-0">
                                        <div class="photo-gallery-img img-auto">
                                            <img src="{{ asset('assets/images/photo3.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-0">
                                        <div class="photo-gallery-img ms-2">
                                            <img src="{{ asset('assets/images/photo4.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                        <div class="photo-gallery-img ms-2">
                                            <img src="{{ asset('assets/images/photo5.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-tab-pane" role="tabpanel" aria-labelledby="video-tab"
                            tabindex="0">
                            <!-- ************************************************ -->
                            <div class="gallery-section p-32">
                                <div class="">
                                    <div class="container">
                                        <div class="row px-0">
                                            <div class="col-md-6">
                                                <div class="gallery-lbox new_gall_boxhead_change">
                                                    <div class="content">
                                                        <div class="sec-title3 text-center  ">
                                                            <h2 class="title mb-10">
                                                                Photo gallery
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="rs-carousel owl-carousel nav-style2 gallery-carausel owl-theme"
                                                            id="photoGallerySlider">
                                                            @if (isset($imageWithCategory))
                                                                @foreach ($imageWithCategory as $item)
                                                                
                                                                <div class="item team-item">
                                                                    <div class="gallery-box">
                                                                    <img src="{{ asset('resources/uploads/GalleryManagement/' . $item['image']) ?? '' }}" alt="photo" class="img-fluid">
                                                                        <div class="text-gallery">
                                                                            @if (Session::get('locale') == 'hi')
                                                                            {{ $item['title_name_hi'] }}
                                                                            @else
                                                                            {{ $item['title_name_en'] }}
                                                                            @endif
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endif


                                                        </div>

                                                        <!-- *************************** -->

                                                    </div>
                                                    <div class="btn-view_play">
                                                        <div class="btn-part  text-center">
                                                            <a class="readon2" href="{{url('/photo-gallery')}}" rel="noopener noreferrer">
                                                                view all
                                                            </a>
                                                        </div>
                                                        <div class="btns">
                                                            <div id="customPreviousBtn3"><i class="fa fa-angle-left"
                                                                    aria-hidden="true"></i>
                                                            </div>
                                                            <div id="customPause3"><i class="fa fa-pause"
                                                                    aria-hidden="true"></i></div>
                                                            <div id="customPlay3" class="customPlay2"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                            </div>
                                                            <div id="customNextBtn3"><i class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6">
                                                <div class="gallery-lbox video-sec new_gall_boxhead_change">
                                                    <div class="content">
                                                        <div class="sec-title3 text-center ">
                                                            <h2 class="title mb-10">
                                                                Video Gallery
                                                            </h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <div class="rs-carousel owl-carousel nav-style2 gallery-carausel owl-theme"
                                                            id="videoGallerySlider">
                                                            @if (isset($videosWithCategories))
                                                                @foreach ($videosWithCategories as $item)
                                                                <div class="item team-item">
                                                                    <div class="gallery-box">
                                                                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $item['video_id'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            @endif
                                                            
                                                          


                                                        </div>

                                                    </div>
                                                    <div class="btn-view_play">
                                                        <div class="btn-part  text-center">
                                                            <a class="readon2 mt-2" href="{{url('/video-gallery')}}" rel="noopener noreferrer"
                                                                tabindex="0">
                                                                View All
                                                            </a>
                                                        </div>
                                                        <div class="btns">
                                                            <div id="customPreviousBtn4"><i class="fa fa-angle-left"
                                                                    aria-hidden="true"></i>
                                                            </div>
                                                            <div id="customPause4"><i class="fa fa-pause"
                                                                    aria-hidden="true"></i></div>
                                                            <div id="customPlay4" class="customPlay2"><i
                                                                    class="fa fa-play" aria-hidden="true"></i>
                                                            </div>
                                                            <div id="customNextBtn4"><i class="fa fa-angle-right"
                                                                    aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ************************************************ -->

                           
                        </div>
                        <div class="tab-pane fade" id="twitter-tab-pane" role="tabpanel" aria-labelledby="twitter-tab"
                            tabindex="0">
                            <div class="photo-gallery-wrap">
                                <div class="row">
                                    <div class="col-md-4 p-0 ">
                                        <div class="photo-gallery-img me-2">
                                            <img src="{{ asset('assets/images/photo1.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                        <div class="photo-gallery-img me-2">
                                            <img src="{{ asset('assets/images/photo2.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-0">
                                        <div class="photo-gallery-img img-auto">
                                            <img src="{{ asset('assets/images/photo3.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-4 p-0 ">
                                        <div class="photo-gallery-img ms-2">
                                            <img src="{{ asset('assets/images/photo4.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                        <div class="photo-gallery-img ms-2">
                                            <img src="{{ asset('assets/images/photo5.png') }}" alt="photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="awards-tab-pane" role="tabpanel" aria-labelledby="awards-tab"
                            tabindex="0">
                            <div class="photo-gallery-wrap">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="text-content">

                                            @if(isset($awardsContents))
                                            @if (Session::get('locale') == 'hi')
                                            <h2>{{ $awardsContents->page_title_hi }}</h2>
                                            {!! $awardsContents->page_content_hi !!}
                                            @else
                                            <h2>{{ $awardsContents->page_title_en }}</h2>
                                            {!! $awardsContents->page_content_en !!}
                                            @endif
                                            @else
                                            <div class="text-center">
                                                <h1>Content coming soon...</h1>
                                            </div>
                                            @endif
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
<section class="client-wrap ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="client-slider">
                    <div class="owl-carousel owl-theme" id="clientSlider">
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/india-gov.svg') }}" alt="india-gov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/data-gov.svg') }}" alt="data-gov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/mygov.svg') }}" alt="mygov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/digital-india.svg') }}" alt="digital-india"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/ministry-of-ayush.svg') }}" alt="ministry-of-ayush"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/india-gov.svg') }}" alt="india-gov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/data-gov.svg') }}" alt="data-gov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/mygov.svg') }}" alt="mygov" class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/digital-india.svg') }}" alt="digital-india"
                                    class="img-fluid">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#" class="client-slider-img">
                                <img src="{{ asset('assets/images/ministry-of-ayush.svg') }}" alt="ministry-of-ayush"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection