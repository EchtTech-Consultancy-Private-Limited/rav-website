@extends('layout.master')
@section('title')
    {{ __('RAV') }}
@endsection
@section('content')

    <section class="hero-banner">
        <div class="container-fluid">
            <div class="hero-slider">
                <div class="owl-carousel owl-theme" id="heroSlider">
            
                    @if (isset($banner) && count($banner) > 0)
                    
                        @foreach ($banner as $banners)
                          
                            <div class="item">
                                <div class="row">
                                    @if($banners->description_en  != '' )
                                    <div class="col-md-6 mobile-width-80">
                                        <div class="hero-slider-content" data-aos="fade-right" data-aos-duration="3000">
                                            <h2 class="heading-red">
                                                @if (Session::get('locale') == 'hi')
                                                    {{ $banners->title_name_hi ?? '' }}
                                                @else
                                                    {{ $banners->title_name_en ?? '' }}
                                                @endif
                                            </h2>
                                            <p class="title-black">

                                                @if (Session::get('locale') == 'hi')
                                                    {!! $banners->description_hi ?? '' !!}
                                                @else
                                                    {!! $banners->description_en ?? '' !!}
                                                @endif

                                            </p>
                                            <div class="btn-wrap d-flex align-items-center">
                                                <button class="btn btn-org me-4">

                                                    @if (Session::get('locale') == 'hi')
                                                        {{ __('messages.know_more') }}
                                                    @else
                                                        {{ __('messages.know_more') }}
                                                    @endif

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col mobile-width-30">
                                        <div class="hero-slider-img" data-aos="fade-left" data-aos-duration="3000">
                                            @if ($banners->public_url != '')
                                                <img src="{{ asset('resources/uploads/banner/' . $banners->public_url) }}"
                                                    title="{{ $banners->banner_title ?? '' }}"
                                                    alt="{{ $banners->banner_alt ?? '' }}" class="img-fluid">
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
                        About Us
                    </h2>
                    <p class="desc-grey text-justify">
                        <span class="desc-grey-bold"> Rashtriya Ayurveda Vidyapeeth</span>
                        was established on 11th
                        Feb., 1988 with one of the objectives of promoting knowledge of Ayurveda and started functioning
                        since 1991. The Vidyapeeth initiated the course of Member of RAV with an effort to revive the
                        traditional method of Gurukula system of informal education of India i.e., Guru Shishya
                        Parampara to Ayurvedic graduates after formal education. As people are aware, the present
                        classical texts of Ayurveda, Charaka Samhita, Sushruta Samhita, Ashtanga Hridaya etc. are
                        believed to be the outcome of such informal education. This kind of study is lacking at present
                        in the modern educational institutions where the courses are bound by fixed syllabus, duration
                        of time and many subjects to learn.
                    </p>
                    <div class="btn-wrap d-flex justify-content-center align-items-center">
                        <a href="#" class="btn btn-org-bdr">
                            Read More
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                        <div class="about-us-card-front">
                            <div class="img">
                                <img src="{{ asset('assets/images/minister1.png') }}" alt="minister" class="img-fluid">
                            </div>
                            <h3 class="title">
                                Shri Sarbananda Sonowal
                            </h3>
                            <p class="desc">
                                <b>Hon’ble Cabinet minister</b>
                                of AYUSH, Government of India
                            </p>
                        </div>
                        <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                this is the title
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                        <div class="about-us-card-front">
                            <div class="img">
                                <img src="{{ asset('assets/images/minister2.png') }}" alt="minister" class="img-fluid">
                            </div>
                            <h3 class="title">
                                Dr. Munjapara Mahendrabhai
                            </h3>
                            <p class="desc">
                                <b>Hon'ble Minister of State Ministry</b>
                                of AYUSH & Ministry of
                                <br>
                                Women
                                <br>
                                and Child
                                Developement
                            </p>
                        </div>
                        <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                this is the title
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                        <div class="about-us-card-front">
                            <div class="img">
                                <img src="{{ asset('assets/images/minister3.png') }}" alt="minister" class="img-fluid">
                            </div>
                            <h3 class="title">
                                Padmashree Vaidya Rajesh Kotecha
                            </h3>
                            <p class="desc">
                                <b>Secretary</b>
                                Ministry of AYUSH
                            </p>
                        </div>
                        <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                this is the title
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="about-us-card mtb-100" data-aos="flip-right" data-aos-duration="3000">
                        <div class="about-us-card-front">
                            <div class="img">
                                <img src="{{ asset('assets/images/minister4.png') }}" alt="minister" class="img-fluid">
                            </div>
                            <h3 class="title">
                                Dr. Vandana Siroha
                            </h3>
                            <p class="desc">
                                <b>Director</b>
                                AIIA, New Delhi
                            </p>
                            <p class="title-org">
                                Message from Director
                            </p>
                        </div>
                        <div class="about-us-card-back">
                            <h3 class="title-black-sm">
                                this is the title
                            </h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae mollitia nostrum at dolorem
                                optio ad ipsam suscipit harum molestias? Laudantium, ipsa! Molestiae reiciendis beatae,
                                veniam cumque expedita rem at harum?</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="news-wrap">
                        <div class="news-tab common-tab">
                            <ul class="nav nav-tabs" id="newsTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="latestNews-tab" data-bs-toggle="tab"
                                        data-bs-target="#latestNews-tab-pane" type="button" role="tab"
                                        aria-controls="latestNews-tab-pane" aria-selected="true">Latest News</button>
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
                                        data-bs-target="#cme-tab-pane" type="button" role="tab"
                                        aria-controls="cme-tab-pane" aria-selected="false">CME Scheme</button>
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
                                                            <a    
                                                            @if($news_managements->tab_type == 1)    
                                                                target="_blank"
                                                                onclick="return confirm('{{ $alertMessage }}')"
                                                                href="{{ url($url)  }}"
                                                            @else
                                                                href="{{ url($url) }}"
                                                            @endif
                                                                >
                                                                <div class="date-wrap">
                                                                    <h3 class="date">
                                                                        {{ date('d', strtotime($news_managements->start_date ?? now())) }}
                                                                    </h3>
                                                                    <span class="month">
                                                                        {{ $news_managements->start_date ? date('M Y', strtotime($news_managements->start_date)) : 'Default Value' }}
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
                                            <ul></ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="cme-tab-pane" role="tabpanel" aria-labelledby="cme-tab"
                                    tabindex="0">
                                    <div class="row">
                                        <div class="news-content-list">
                                            <div class="new-content-list-content">
                                                <p class="desc">
                                                    CME (Continuing Medical Education) scheme is a central sector scheme
                                                    implemented in 11th Plan to give training to AYUSH personnel for
                                                    upgrading their professional competence & skills and their capacity
                                                    building. The Scheme is run by Ministry of AYUSH, Government of
                                                    India.
                                                </p>
                                                <p class="right-angle-arrow">
                                                    Proposals for CME program under capacity building and CME component
                                                    of Ayurgyan scheme will be accepted through NGO portal i.e
                                                    <a href="http://www.ngo.ayush.gov.in/" target="_blank">
                                                        www.ngo.ayush.gov.in(link is external)
                                                    </a>
                                                    <span class="text-primary">
                                                        <i class="fa fa-share-square-o" aria-hidden="true"></i>
                                                    </span>
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="http://ravdelhi.nic.in/sites/default/files/AYURGYAN-Scheme-CME-Guidelines-07.4.2021.pdf "
                                                        target="_blank">
                                                        Revised Guidelines of CME (For fresh proposals)
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    ( 978.98 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="http://ravdelhi.nic.in/sites/default/files/Hindi-AYURGYAN-Scheme-CME.pdf"
                                                        target="_blank">
                                                        Ayurgyan Scheme CME in Hindi
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (761.09 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" http://ravdelhi.nic.in/sites/default/files/AYUSH%20CME%20GUIDELINES.pdf"
                                                        target="_blank">
                                                        CME Scheme Guidelines
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (575.93 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" http://ravdelhi.nic.in/sites/default/files/Upcoming%20CME%20program%202023-24%20%281%29%20%281%29.pdf"
                                                        target="_blank">
                                                        Upcoming CME Programmes 2023-24
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (84.84 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" http://www.ravdelhi.nic.in/en/circulars-orders-cme"
                                                        target="_blank">
                                                        Circulars/ Orders
                                                    </a>
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="Modules of Ayurveda " target="_blank">
                                                        Modules of Ayurveda
                                                    </a>
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="http://www.ravdelhi.nic.in/en/old-modules-ayurveda "
                                                        target="_blank">
                                                        Modules
                                                    </a>
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="{{ asset('assets/pdf/home-page/cme-scheme/AYURGYAN-Scheme-CME-Guidelines-07.4.2021.pdf') }}"
                                                        target="_blank">
                                                        Revised Feedback Form of CME
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (166.02 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="{{ asset('assets/pdf/home-page/cme-scheme/Instruction%20for%20Air%20travel.pdf') }}"
                                                        target="_blank">
                                                        Instructions for Air Travel
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (35.58 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="{{ asset('assets/pdf/home-page/cme-scheme/CME%20Calendar%20for%202023-24%20%281%29.pdf') }} "
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2023-24
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (138.59 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="{{ asset('assets/pdf/home-page/cme-schem/CME%20Calendar%202022-23_%20.pdf') }}"
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2022-23
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (476.93 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="./{{ asset('assets/pdf/home-page/cme-schem/CME%20Calendar%20for%202021-22_0.pdf') }}"
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2021-22
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (483.65 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href="./{{ asset('assets/pdf/home-page/cme-schem/CME%20Calender%202%20%202020-21.pdf') }} "
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2020-21
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (12.4 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" ./{{ asset('assets/pdf/home-page/cme-schem/Calndar%20for%20CME%202019-20-converted.pdf') }}"
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2019-20
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (87.37 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" ./{{ asset('assets/pdf/home-page/cme-schem/Calendar%20for%20CME%20%202018-19_2.pdf') }}"
                                                        target="_blank">
                                                        Calender of the programme of CME for the year 2018-19
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (68.63 KB)
                                                </p>
                                                <p class="right-angle-arrow">
                                                    <a href=" ./{{ asset('assets/pdf/home-page/cme-schem/CME%20calender%20%2017-18.pdf') }}"
                                                        target="_blank">
                                                        Calendar of the programme of CME for the year 2017-18
                                                        <span class="text-danger">
                                                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                        </span>
                                                    </a>
                                                    (219.07 KB)
                                                </p>
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
                        <h2 class="heading-white">
                            Our Events
                        </h2>
                        <div class="event-slider">
                            <div class="owl-carousel owl-theme" id="eventSlider">
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            Two days Interactive Training Programme on Agni Karma & Rakta Mokshana with
                                            organization of free health camp
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    8-9
                                                    <span>June 2023</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    AIAC Hall, Punjabi Bagh, New Delhi
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            5 workshops of one day training of AYUSH doctors on Patient Trauma Care
                                            (PTC) (Total Programme -5)
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    26
                                                    <span>June, 2023</span>
                                                </h3>
                                                <h3 class="date">
                                                    1
                                                    <span>July, 2023</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    AIAC Hall, Punjabi Bagh, New Delhi
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            6 Days Complete Residential Samhita based Training programme for
                                            undergraduate/postgraduate (Total Programme- 3)
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    <span>July, 2023</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    Deendayal Research Institute, Arogyadham, Chitrakoot, Satna, Madhya
                                                    Pradesh -485331
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            5 Days Hands on Training Programme on “Ready to eat (RTE), Ayurveda Bakery
                                            Products, Food fortification based on Ayurveda”
                                            (Total Programme- 3)
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    <span>September, 2023/</span>
                                                    <span>December , 2023/</span>
                                                    <span>January , 2023/</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    NIFTEM, Kundali, Sonipat
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            One Day Sensitization programme of Ayurvedic Training Accreditation
                                            Programme(ATAB) (Total Programme- 4)
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    <span>July, 2023/</span>
                                                    <span>July, 2023</span>
                                                    <span>November, 2023/</span>
                                                    <span>November, 2023/</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    New Delhi, Pune, Chitrakoot, Pune, Thrissur, Kerala
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="event-list">
                                        <p class="title-white">
                                            Two day Training Programme for Teachers of Kaya Chikitsa, Shalakya Tantra
                                            and Asthi Marma
                                            (Total Programme- 6)
                                        </p>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Event Date</span>
                                            </div>
                                            <div class="date-wrap">
                                                <img src="{{ asset('assets/images/calendar.svg') }}" alt="calendar"
                                                    class="img-fluid me-3">
                                                <h3 class="date">
                                                    <span>July, 2023/</span>
                                                    <span>August, 2023/</span>
                                                    <span>September, 2023/</span>
                                                    <span>December, 2023/</span>
                                                    <span>February, 2023</span>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="event-list-content my-3">
                                            <div class="d-flex align-items-center">
                                                <span class="tag">Venue</span>
                                            </div>
                                            <div class="address-wrap">
                                                <img src="{{ asset('assets/images/location.svg') }}" alt="location"
                                                    class="img-fluid me-3">
                                                <h3 class="address">
                                                    New Delhi, Pune, Chitrakoot, Pune, Thrissur, Kerala
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="course-wrap">
                        <div class="course-list">
                            <ul>
                                <li>
                                    Courses Under Guru Shishya Parampara
                                    <a href="#" class="read-more">
                                        <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                            class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    Publications
                                    <a href="#" class="read-more">
                                        <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                            class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    Vacancy
                                    <a href="#" class="read-more">
                                        <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                            class="img-fluid">
                                    </a>
                                </li>
                                <li>
                                    E-Newsletters
                                    <a href="#" class="read-more">
                                        <img src="{{ asset('assets/images/arrow.svg') }}" alt="arrow"
                                            class="img-fluid">
                                    </a>
                                </li>
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
                                    aria-controls="latestMassage-tab-pane" aria-selected="true">Latest Massage</button>
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
                                    aria-controls="corner-tab-pane" aria-selected="false">Alumni Corner</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tenders-tab" data-bs-toggle="tab"
                                    data-bs-target="#tenders-tab-pane" type="button" role="tab"
                                    aria-controls="tenders-tab-pane" aria-selected="false">Our Tenders</button>
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
                                    <div class="col-md-4">
                                        <div class="message-tab-img">
                                            <a href="#" class="video-wrap">
                                                <div class="video-img common-video-img">
                                                    <img src="{{ asset('assets/images/massage.png') }}" alt="video"
                                                        class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                                    <div class="col-md-4">
                                        <div class="message-tab-img">
                                            <a href="#" class="video-wrap">
                                                <div class="video-img common-video-img">
                                                    <img src="{{ asset('assets/images/sarbanada-sonowal.jpg') }}"
                                                        alt="video" class="img-fluid">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                                        <div class="table">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No.</th>
                                                        <th>Candidate Name</th>
                                                        <th>Father's Name</th>
                                                        <th>Date of Birth</th>
                                                        <th>Gender</th>
                                                        <th>Email</th>
                                                        <th>Permanent Address</th>
                                                        <th>Passing Year of CRAV</th>
                                                        <th>CRAV Subject</th>
                                                        <th>CRAV Guru's Name and Place</th>
                                                        <th>Qualification</th>
                                                        <th>Current Job Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Dr pankaj patidar</td>
                                                        <td>Rambabu patidar</td>
                                                        <td>01/01/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:mrpankaj8982pat@gmail.com">mrpankaj8982pat@gmail.com</a>
                                                        </td>
                                                        <td>Villege amlar th pachore dist Rajgarh pin 465680</td>
                                                        <td>2017</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Ramdas m avhard</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Dr. Abhiranjan</td>
                                                        <td>Vijay Singh</td>
                                                        <td>11-08-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:abhiranjankumar85@gmail.com">abhiranjankumar85@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Vill- Bansgaon, PO- Mangalpur, Bagaha-2, West Champaran,
                                                            Bihar-845104
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd. Panchabhai V Damaniya, Una Gujarat</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Anumol P G</td>
                                                        <td>Gopi P R</td>
                                                        <td>07/11/1989</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a href="mailto:anmolzz630@gmail.com">anmolzz630@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Madassery house, vembilly p o,pallikkara Ernakulam, pin
                                                            683565, kerala
                                                        </td>
                                                        <td>2021</td>
                                                        <td>KAYACHIKITSA</td>
                                                        <td>Dr Ravishankar Pervaje, Dakshina Kannada, puttur</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>Dr.Madhu Sharma</td>
                                                        <td>Mr.Ajit Singh Sharma</td>
                                                        <td>25-05-1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:doc.ms.eleven@gmail.com">doc.ms.eleven@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            19-D,patal nagar manna ka road,near Rajasthan academy
                                                            school,Alwar Rajasthan
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Asthi Marma chikitsa</td>
                                                        <td>Dr.Vijayan Nangelil , Kothamngalam,kerela</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Dr. Pooja Rana</td>
                                                        <td>Mr. Sunder Singh Rana</td>
                                                        <td>08/07/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:ranapooja947@gmail.com">ranapooja947@gmail.com</a>
                                                        </td>
                                                        <td>Village - Dobhan,Po - Sarot, Distt.- Tehri Garhwal</td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsha</td>
                                                        <td>Vaidya Achyut kumar tripathi , Noida</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>Vandna</td>
                                                        <td>Mr. Vijay Kumar Garg</td>
                                                        <td>27/12/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:vandanagarg874@gmail.com">vandanagarg874@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village Mitrol, Teh hodal, PO Aurangabad, District palwal ,
                                                            Haryana pin code 121105
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr.Raman Singh Sushrut hospital sunderpur Varanasi</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Dr. Muhammed Riyas KP</td>
                                                        <td>Veeran KP (Late )</td>
                                                        <td>26/05/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:riyaskp786@gmail.com">riyaskp786@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Kalamparambil (House), Nattukal (Po), Near PHC, Mannarkkad
                                                            college (Via), Palakkad (Dt), Kerala -India 678583(Pin)
                                                        </td>
                                                        <td>2018</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Dr. Ravi Sankar Pervaje</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>Dr.Kailash Kumar</td>
                                                        <td>Prabhu Ram</td>
                                                        <td>15-08-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drkailashkumar9680@gmail.com">drkailashkumar9680@gmail.com</a>
                                                        </td>
                                                        <td>M.P.- Deriya .Teh- Balesar Dist.- Jodhpur Rajasthan</td>
                                                        <td>2020</td>
                                                        <td>Ksharshutra</td>
                                                        <td>Dr K V.S.Rao</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Anjali nagpal</td>
                                                        <td>Suresh nagpal</td>
                                                        <td>10/04/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Anjalinagpal325@gmail.com">Anjalinagpal325@gmail.com</a>
                                                        </td>
                                                        <td>124 singla colony, rajpura town, Punjab</td>
                                                        <td>2019</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>Vd. Achyut tripathi, Noida</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>Dr. Tanvi Sharma</td>
                                                        <td>Mr. Vijay Sharma</td>
                                                        <td>02/10/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:tanvisharma0292@gmail.com">tanvisharma0292@gmail.com</a>
                                                        </td>
                                                        <td>H.no 85/1 bhagwati nagar canal road jammu (J&amp;k)</td>
                                                        <td>2020</td>
                                                        <td>Netra chikitsa</td>
                                                        <td>Dr. N. Narayanan Namboothiri , Ernakulam Kerala</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>11</td>
                                                        <td>Chandara Prakash Swami</td>
                                                        <td>Sri Ram lal Swami</td>
                                                        <td>07/08/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:chandara528@gmail.com">chandara528@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village Gudha khurd, Via. Palsana, Dist. Sikar, Rajasthan
                                                            32402
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kshar sutra</td>
                                                        <td>Devendra shah</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>12</td>
                                                        <td>Dr Ajay Chauhan</td>
                                                        <td>Sardar singh chauhan</td>
                                                        <td>29-05-1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drajaychauhan2529@gmail.com">drajaychauhan2529@gmail.com</a>
                                                        </td>
                                                        <td>200 B manavta nager indore madhya pradesh</td>
                                                        <td>2020</td>
                                                        <td>Asthi- Marma chikitsa</td>
                                                        <td>Dr Vijayan Nangelil,kothamangalam Kerala</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>13</td>
                                                        <td>Vd Atula Gaur</td>
                                                        <td>Tulsi Narayan gaur</td>
                                                        <td>27/7/1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:atulagaur.ap@gmail.com">atulagaur.ap@gmail.com</a>
                                                        </td>
                                                        <td>57bhagatkikothi vistar yojana jodhpur rajasthan</td>
                                                        <td>2019</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Maa shrishri Anantananda</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>14</td>
                                                        <td>Dr Yuvraj Meena</td>
                                                        <td>Jagdish narayan meena</td>
                                                        <td>10/03/1996</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:Yraj600@gmail.com">Yraj600@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            GARH KI KOTHIYA , POST-GARH ,TEH-BASSI District-Jaipur ,
                                                            Rajasthan, Pin code- 303302
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Ashwani Kumar Sharma , Karol Bagh, New Delhi</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>15</td>
                                                        <td>Dr. Pooja Chokhandre</td>
                                                        <td>Mr. Ganpat chokhandre</td>
                                                        <td>27 march 1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Pchokhandre03@gmail.com">Pchokhandre03@gmail.com</a>
                                                        </td>
                                                        <td>323, subhash colony Chhindwada</td>
                                                        <td>2022</td>
                                                        <td>Kay chikitsa</td>
                                                        <td>Dr. Ram kumar, AVCRI coimbatore</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>16</td>
                                                        <td>Dr rashmi ravindra motegaonkar</td>
                                                        <td>Ravindra bhangwan motegaonkar</td>
                                                        <td>15/6/94</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:rashmimotegaonkar7@gmail.com">rashmimotegaonkar7@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Bhagwan niwas new renapur naka bhakti nagar Latur 413512
                                                        </td>
                                                        <td>2020- 2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Jayant Yashwant Deopujari</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>17</td>
                                                        <td>Sneha s</td>
                                                        <td>N suresan</td>
                                                        <td>15/05/1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:snehasuresan@gmail.com">snehasuresan@gmail.com</a>
                                                        </td>
                                                        <td>Noopuram,po chokli, Thalassery,kannur kerala,670672</td>
                                                        <td>2021</td>
                                                        <td>Asthi marma, shalya</td>
                                                        <td>Dr.Mathews Joseph, Moovaatupuza, Kerala</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>18</td>
                                                        <td>Dr Dharmendra Kumar Verma</td>
                                                        <td>Ram Sabad Verma</td>
                                                        <td>07/07/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dkverma7791@gmail.com">dkverma7791@gmail.com</a>
                                                        </td>
                                                        <td>34, Patel Nagar Post-Mankapur District-Gonda Pin 271302</td>
                                                        <td>2021</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr.Manoranjan Sahu</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>19</td>
                                                        <td>Dr.Rajpal Dhaka</td>
                                                        <td>Ghanshyam Singh Dhaka</td>
                                                        <td>15/05/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drrajpalsinghdhaka@gmail.com">drrajpalsinghdhaka@gmail.com</a>
                                                        </td>
                                                        <td>WARD NO 03 , VPO BHADHADAR SIKAR RAJASTHAN 332315</td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr. Ramkumar,
                                                            <br>
                                                            The arya vaidya chikitsalayam and Research Institute
                                                            Coimbatore tamil nadu
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>20</td>
                                                        <td>Dr Vinayak Tiwari</td>
                                                        <td>Mr Bholaram Tiwari</td>
                                                        <td>05/05/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:vinayakdadu92@gmail.com">vinayakdadu92@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            241 panigaon, tech - kannod, District- Dewas, madhya
                                                            pradesh, pin code - 455332
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Vd S P Sardeshmukh</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>21</td>
                                                        <td>Dr Mukesh Kumar Sagar</td>
                                                        <td>Hanuman Ram Sagar</td>
                                                        <td>10/12/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drmukeshkumarsagar@gmail.com">drmukeshkumarsagar@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            VPO- Ghatwa, Teh-Nawa, District-Nagaur Rajasthan, 341509
                                                        </td>
                                                        <td>2019</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd Namadhar Sharma, Rohini Sector-24, New Delhi 110042</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>22</td>
                                                        <td>Dr Mahendra Kumar Sablania</td>
                                                        <td>Mr. Babu Lal Sablania</td>
                                                        <td>27/11/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drmksablania@gmail.com">drmksablania@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            VPO- Bilonchi, Vaia- Morija, Tah- Amber, District- Jaipur,
                                                            Rajasthan pincode 303805
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Ramkumar, AVCRI Coimbatore Tamilnadu</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>23</td>
                                                        <td>SARAN RAJ MG</td>
                                                        <td>MULK RAJ R</td>
                                                        <td>01/09/1989</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:saranrajmg2013@gmail.com">saranrajmg2013@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            SNV SADANAM , CHAKKUVARAKKAL PO ,KOTTARAKKARA,KOLLAM (DIST)
                                                            KERALA .PIN 691508
                                                        </td>
                                                        <td>2018</td>
                                                        <td>KAYACHIKITSA</td>
                                                        <td>DR. P.M VARIER (KOTTAKKAL ARYA VAIDYA SALA)</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>24</td>
                                                        <td>Dr jitendra Malviya</td>
                                                        <td>Mrs parsram ji Malviya</td>
                                                        <td>11/03/1989</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:jeetmalviwa11@gmail.com">jeetmalviwa11@gmail.com</a>
                                                        </td>
                                                        <td>Vill ban post bokrata the pati dist Barwani mp 451551</td>
                                                        <td>2019</td>
                                                        <td>NETRA chikitsa</td>
                                                        <td>Dr N Narayanan Namboothiri koothattukulam ( Kerala )</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>25</td>
                                                        <td>Dr Brajesh Kumar Malviya</td>
                                                        <td>Mr. Kaluram Malviya</td>
                                                        <td>01/09/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drbrajmalviya@gmail.com">drbrajmalviya@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Near govt. primary school, Village Kari, post Piplaj, tehsil
                                                            and distt. Barwani, M.P. (pincode - 451551)
                                                        </td>
                                                        <td>2019</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Dr. Madhusudan Deshpande, Bhopal</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>26</td>
                                                        <td>Dr Varsha</td>
                                                        <td>Han Raj Jajewal</td>
                                                        <td>10/11/1996</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:varshajajewal96@gmail.com">varshajajewal96@gmail.com</a>
                                                        </td>
                                                        <td>House no 141, sector 12/5, Hanumangarh junction</td>
                                                        <td>2022</td>
                                                        <td>Asthi &amp; Marma Chikitsa</td>
                                                        <td>Dr N V Sreevaths</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>27</td>
                                                        <td>Dr. Shubham Shandilya</td>
                                                        <td>D k shandilya</td>
                                                        <td>28/03/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:shubhamshandilya25@gmail.com">shubhamshandilya25@gmail.com</a>
                                                        </td>
                                                        <td>1284,bhrampuri, meerut</td>
                                                        <td>2018</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>DR. C M Sreekrishnan</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>28</td>
                                                        <td>Dr. Narendra yogi</td>
                                                        <td>Mr. Babu lal yogi</td>
                                                        <td>01/03/1992</td>
                                                        <td>Male</td>
                                                        <td>Yogi0192 @gmail.com</td>
                                                        <td>
                                                            Rani ka chowk ,vill. Samod, Tah. Chomu,Dist. Jaipur
                                                            Rajasthan
                                                        </td>
                                                        <td>2020-21</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr. M. Bhaskar rao</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>29</td>
                                                        <td>Dr Manish verma</td>
                                                        <td>Rakesh Verma</td>
                                                        <td>5-11-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:verma.manu786@gmail.com">verma.manu786@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            R-58 Parwana Vihar Gajsinghpura Ajmer Road Jaipur
                                                            <br>
                                                            302021Rajasthan
                                                        </td>
                                                        <td>2020-21</td>
                                                        <td>Ksharsutra Surgery</td>
                                                        <td>
                                                            Dr Raman Singh Sir
                                                            <br>
                                                            Banaras UP
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>30</td>
                                                        <td>Dr. Aakanksha Kushwaha</td>
                                                        <td>Mr. Om Prakash Kushwaha</td>
                                                        <td>04/01/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:aakanksha3455@gmail.com">aakanksha3455@gmail.com</a>
                                                        </td>
                                                        <td>A 35/ 39 B Jalalipura Varanasi Uttar Pradesh</td>
                                                        <td>2020</td>
                                                        <td>Stri Rog Evum Prasuti Tantra</td>
                                                        <td>Dr. L. Sucharitha , Bangaluru</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>31</td>
                                                        <td>Dr. Gunjan</td>
                                                        <td>Gopal Prasad</td>
                                                        <td>08/ 07/ 1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a href="mailto:gunjan3466@gmail.com">gunjan3466@gmail.com</a>
                                                        </td>
                                                        <td>Gandhi Market Shamir Takya near T.O.P Gaya Bihar 823001</td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr. P.R. KRISHNAKUMAR JI</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>32</td>
                                                        <td>Sneha S</td>
                                                        <td>N suresan</td>
                                                        <td>15/05/1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:snehasuresan@gmail.com">snehasuresan@gmail.com</a>
                                                        </td>
                                                        <td>Noopuram,po chokli, Thalassery, Kannur, kerala</td>
                                                        <td>2022</td>
                                                        <td>Asthi marma and sports injury</td>
                                                        <td>Dr Mathews Joseph, Moovaatupuza, Kerala</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>33</td>
                                                        <td>dr.kamal sisodiya</td>
                                                        <td>ramesh chandra</td>
                                                        <td>19,03,1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:sisodiyakamal32@gmail.com">sisodiyakamal32@gmail.com</a>
                                                        </td>
                                                        <td>amlavad bika post .palsoda ujjain mp. 456337</td>
                                                        <td>2019-20</td>
                                                        <td>kaychikitsa</td>
                                                        <td>dr.manoj kumar sharma .kota rajsthan</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>34</td>
                                                        <td>Dr. Meha Sharma</td>
                                                        <td>Sh. Paramveer Sharma</td>
                                                        <td>30July1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:sharma07meha@gmail.com">sharma07meha@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            82-B, 10/1, DABAR ENCLAVE, RAWTA MORE, JAFFARPUR KALAN, NEW
                                                            DELHI-110073
                                                        </td>
                                                        <td>2020</td>
                                                        <td>KAYACHIKITSA</td>
                                                        <td>Dr. Manoj Kumar Sharma</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>35</td>
                                                        <td>Dr. Ramveer Singh Meena</td>
                                                        <td>Ramesh chand meena</td>
                                                        <td>20/03/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drrsmeena89@gmail.com">drrsmeena89@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Vivek vihar colony , Behind mathur stadium,karauli Rajasthan
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr. Lalta Prasad , Bareilly U.P.</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>36</td>
                                                        <td>Dr Sumayya M A</td>
                                                        <td>Abdul hakkim</td>
                                                        <td>12/02/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:sumayyamumina9@gmail.com">sumayyamumina9@gmail.com</a>
                                                        </td>
                                                        <td>Kizhakke mannara house ayathil p o kollam 691021 kerala</td>
                                                        <td>2020</td>
                                                        <td>Pharmacy</td>
                                                        <td>Vaidya Surya Prakash Sharma</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>37</td>
                                                        <td>Vd Nitin Ranakoti</td>
                                                        <td>PARMANAND RANAKOTI</td>
                                                        <td>01/03/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Nitinranakoti@gmail.com">Nitinranakoti@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            35, Village- BHUTLI, P.O Shantipur, Saundi, Tehri Garhwal,
                                                            Uttarakhand
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Vd Suvinay Vinayak Damle, Kudal , Sindhudurg, Maharashtra
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>38</td>
                                                        <td>Kathiravan.T</td>
                                                        <td>Thangaraj.J</td>
                                                        <td>21-05-1996</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kathirkarthi96@gmail.com">kathirkarthi96@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            91/Kannugapuram street, Cheyyar, Thiruvannamalai district,
                                                            Tamilnadu
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Netra Chikitsa</td>
                                                        <td>VD I Bhavadasan Namboothiri</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>39</td>
                                                        <td>Dr.Vivek Singh</td>
                                                        <td>Sri RAKESH SINGH</td>
                                                        <td>18-03-1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dr.viveksinghrajavat@gmail.com">dr.viveksinghrajavat@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Vill-khanapana Post-Manethu City-Kanpur Dehat Uttar Pradesh
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr.P.R.Krishanakumar
                                                            <br>
                                                            Coimbatore Tamilnadu
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>40</td>
                                                        <td>DR PRERNA ARYA</td>
                                                        <td>SUNIL KUMAR</td>
                                                        <td>03/08/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drprernarkp@gmail.com">drprernarkp@gmail.com</a>
                                                        </td>
                                                        <td>H.NO. 1056/7 RK PURAM NEW DELHI 110022</td>
                                                        <td>2022</td>
                                                        <td>KAYACHIKITSA</td>
                                                        <td>VAIDYA JAGJIT SINGH, CHANDIGARH</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>41</td>
                                                        <td>Dr. Ritika</td>
                                                        <td>Mr. Rohitash Kumar</td>
                                                        <td>15/03/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:ritikakaswa830@gmail.com">ritikakaswa830@gmail.com</a>
                                                        </td>
                                                        <td>Vop- Nayasar JHUNJHUNU Rajasthan pin code 333001</td>
                                                        <td>2020-21</td>
                                                        <td>Kayachikitsha</td>
                                                        <td>
                                                            Dr. C. N. Jani ( smt. Maniben govt. Ayurveda hospital
                                                            ahmdabad gujrat)
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>42</td>
                                                        <td>Dr. Pushpendra mishra</td>
                                                        <td>Mr. Ramawtar mishra</td>
                                                        <td>17/06/1994</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:pushpen7232@gmail.com">pushpen7232@gmail.com</a>
                                                        </td>
                                                        <td>A-124, Murlipura scheme, Jaipur 302039</td>
                                                        <td>2022</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Dr. Ramkumar kutty, AVCRI Coimbatore</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>43</td>
                                                        <td>Dr Indra jeet prajapati</td>
                                                        <td>Shri chandrabali prajapati</td>
                                                        <td>11/11/1988</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:ijp55560@gmail.com">ijp55560@gmail.com</a>
                                                        </td>
                                                        <td>Vpo -nariyaion distt. Ambedkar nagar up 224147</td>
                                                        <td>2019</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr. Lalta prasad, bareilly up</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>44</td>
                                                        <td>Dr. Surbhi Agrawal</td>
                                                        <td>Dinesh agrawal</td>
                                                        <td>10-01-1996</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:surbhiagrawal1096@gmail.com">surbhiagrawal1096@gmail.com</a>
                                                        </td>
                                                        <td>C-61, ansal town, alwar</td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Smt. Maniben govt ayurveda hospital, ahmedabad, Gujarat (
                                                            Dr. C. N. Jani)
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>45</td>
                                                        <td>Parul kalia</td>
                                                        <td>Om Mahabir Singh</td>
                                                        <td>20-02-1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Parulkalia7174@gmail.com">Parulkalia7174@gmail.com</a>
                                                        </td>
                                                        <td>78/13, sikka colony, sonipat</td>
                                                        <td>2020</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Vaidya . Binod Joshi</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>46</td>
                                                        <td>LAXMAN SINGH</td>
                                                        <td>AMAR SINGH</td>
                                                        <td>19/10/1989</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Sand3456739@gmail.com">Sand3456739@gmail.com</a>
                                                        </td>
                                                        <td>Ward no-9,guraniyo ki gali pokaran,Jaisalmer,Rajasthan</td>
                                                        <td>2020</td>
                                                        <td>Kay chikitsa</td>
                                                        <td>
                                                            Vd Tarachand Sharma
                                                            <br>
                                                            Sri Sai Arogay Niketan,B-4,sector-7,Rohini,new Delhi
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>47</td>
                                                        <td>Praveen</td>
                                                        <td>Mahendra Singh</td>
                                                        <td>20/02/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:rajputpraveen1966@gmail.com">rajputpraveen1966@gmail.com</a>
                                                        </td>
                                                        <td>Defence colony, near uma vatika, Agra, U.P.</td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vaidya Jagjit Singh, Chandigarh</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>48</td>
                                                        <td>Dr. Himanshu Upadhyay</td>
                                                        <td>Jitendra Upadhyay</td>
                                                        <td>12/09/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:himanshuupadhyay123@gmail.com">himanshuupadhyay123@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            74, Matri kripa , Vishnu Sagar road -Merta City pin-341510
                                                            Dist-Nagaur (Rajasthan)
                                                        </td>
                                                        <td>2020-21</td>
                                                        <td>Ksharasutra &amp; Marma Chikitsa</td>
                                                        <td>
                                                            Dr. A.R. Aacharya - Dhanvantri Clinic Adi-Udupi (Karnataka)
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>49</td>
                                                        <td>Dr. Manish Choudhary</td>
                                                        <td>Shri Tilok Chand Choudhary</td>
                                                        <td>10 Dec. 1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:manishpushker@gmail.com">manishpushker@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village- chawandiya, vaya- pushkar, Post- pushkar ,
                                                            District- Ajmer , rajasthan 305022
                                                        </td>
                                                        <td>2020-21</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Prof. Lalta prasad, bareilly</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>50</td>
                                                        <td>Dr Manu Bairwa</td>
                                                        <td>Ratan Lal Bairwa</td>
                                                        <td>29/12/1994</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:bairwamanu1@gmail.com">bairwamanu1@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            VPO Boraj ,Via Phulera, Teh - Mauzamabad, Dist- Jaipur
                                                            Rajasthan Pin - 303338
                                                        </td>
                                                        <td>2020-21</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd. Pravin Prabhakar Joshi sir , Dhule Maharashtra</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>51</td>
                                                        <td>KARTHIKA M</td>
                                                        <td>MURALITHARAN G</td>
                                                        <td>22-07-1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kmkarthika93@gmail.com">kmkarthika93@gmail.com</a>
                                                        </td>
                                                        <td>M G NILAYAM KALADY SOUTH KARAMANA PO TRIVANDRUM -02</td>
                                                        <td>2019</td>
                                                        <td>KAYACHIKITHSA</td>
                                                        <td>DR V SREEKUMAR , CHALAKUDY , THRISSUR</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>52</td>
                                                        <td>Dr Pooja Vasure</td>
                                                        <td>Mr Devram Vasure</td>
                                                        <td>29/03/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drpoojavasure@gmail.com">drpoojavasure@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            376 , Triveni nagar (Tilli khala) zirniya
                                                            <br>
                                                            teh zirniya Dist - khargone (MP) 451332
                                                        </td>
                                                        <td>2019</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Dr Dhanraj V Gahukar</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>53</td>
                                                        <td>Dr. Narendra yogi</td>
                                                        <td>Babu lal yogi</td>
                                                        <td>01/03/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:Yogi0192@gmail.com">Yogi0192@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Rani Ka Chowk , vill. Samod, Tah. Chomu, Dist. Jaipur 303806
                                                        </td>
                                                        <td>2022</td>
                                                        <td>KSHARSUTRA</td>
                                                        <td>Dr. M. Bhaskar rao</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>54</td>
                                                        <td>SNEHALATA</td>
                                                        <td>MR. VIRAM BHARTI</td>
                                                        <td>15/04/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:snehalatabharti2321@gmail.com">snehalatabharti2321@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            RADHA KRISHNA ENCLAVE, PITHHUWALA KHURD, NEAR CHANDRBANI
                                                            DEHRADUN, PIN-248002
                                                        </td>
                                                        <td>2021</td>
                                                        <td>PHARMACOLOGY</td>
                                                        <td>DR. VIJAY VISHWANATH DOIPHODE</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>55</td>
                                                        <td>Dr Anil Kumar</td>
                                                        <td>Mr Barakhoo ram</td>
                                                        <td>03/04/1989</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:doctoranil3489@gmail.com">doctoranil3489@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Vill-Badauna post-saraimohaddinpur
                                                            <br>
                                                            Tahsil-Shahganj Dist- Jaunpur up [223103]
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>
                                                            Dr Ravindra vatsyayan
                                                            <br>
                                                            Lodhiana panjab
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>56</td>
                                                        <td>Vd Atula Gaur</td>
                                                        <td>Tulsi Narayan gaur</td>
                                                        <td>27071990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:atulagaur.ap@gmail.com">atulagaur.ap@gmail.com</a>
                                                        </td>
                                                        <td>57bhagat ki kothi vistar yojana jodhpur</td>
                                                        <td>2019</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Maa shrishri Anantananda., Ahmedabad</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>57</td>
                                                        <td>Aarti Devi</td>
                                                        <td>Devi Shankar</td>
                                                        <td>29 January 1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a href="mailto:Bkaartid@gmail.com">Bkaartid@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            #1259 AMARPURI COLONY NEAR GOD BLESSING SCHOOL LALRU MANDI
                                                            DIST-SAS NAGAR MOHALI TEHSIL-DERABASSI PINCODE-140501 PUNJAB
                                                        </td>
                                                        <td>2019</td>
                                                        <td>OPTHALMOLOGY</td>
                                                        <td>Dr N NARAYANAN NAMBOOTHIRI, ERNAKULAM KERALA</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>58</td>
                                                        <td>Dr. Kailash Kumar</td>
                                                        <td>Prabhu Ram</td>
                                                        <td>15-08-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drkailashkumar9680@gmail.com">drkailashkumar9680@gmail.com</a>
                                                        </td>
                                                        <td>Jodhpur</td>
                                                        <td>20</td>
                                                        <td>Ksharshutra</td>
                                                        <td>Dr K.V.S. RAO</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>59</td>
                                                        <td>Chandara Prakash Swami</td>
                                                        <td>Sri Ram lal Swami</td>
                                                        <td>07/08/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:chandara57.cp@gmail.com">chandara57.cp@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village Gudha khurd, Via Palsana, Dist. Sikar, Rajasthan
                                                            332402
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kshar sutra</td>
                                                        <td>Devendra shah</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>60</td>
                                                        <td>DR. DIVYA DHURVEY</td>
                                                        <td>MR. MAHESH DHURVEY</td>
                                                        <td>05/09/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:divyadhurvey707@gmail.com">divyadhurvey707@gmail.com</a>
                                                        </td>
                                                        <td>G 37 CI COLONY JANHAGIRABAD BHOPAL</td>
                                                        <td>2020-2021</td>
                                                        <td>KAYACHIKITSA AND PANCHKARMA</td>
                                                        <td>DR. RAMDAS MHALUJI AVHAD</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>61</td>
                                                        <td>Dr Manisha</td>
                                                        <td>Mohan lal kumar</td>
                                                        <td>14-03-1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="http://manishapraj9gmail.com/">manishapraj9gmail.com</a>
                                                        </td>
                                                        <td>VP post Pachar,teh-dantaramgarh,dis-sikar(Rajasthan)</td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Guru name-Dr mani bhushan Kumar place -Dr Mani bhusan
                                                            panchkarma research center kdamkuan Patna bihar
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>62</td>
                                                        <td>Dr Akash Kumar</td>
                                                        <td>Sri prakash Ahirwar</td>
                                                        <td>15/07/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drakashkumar1991@gmail.com">drakashkumar1991@gmail.com</a>
                                                        </td>
                                                        <td>Village and post saidnagar jalaun up</td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Namadhar Sharma delhi</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>63</td>
                                                        <td>Pratibha Ramola</td>
                                                        <td>Birendra Singh Ramola</td>
                                                        <td>13 January 1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:pratibha.ramola93@gmail.com">pratibha.ramola93@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Padampur sukhrow near Radha swami satsang , kotdwara
                                                            ,Uttarakhand
                                                        </td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Madhusudan Deshpande ,Bhopal ,M.P</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>64</td>
                                                        <td>Dr Anjali Subhash Rajput</td>
                                                        <td>Subhash Rajput</td>
                                                        <td>03/11/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:anjali03rajput@gmail.com">anjali03rajput@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Flat no 101,A-6 Sydney chs,Murbad road,Yogidham, Kalyan
                                                            west,Dist-Thane,Maharashtra-421301
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Dhanraj Vishweshwar Gahukar, Nagpur(MS)</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>65</td>
                                                        <td>Dr Anjaly Kumari</td>
                                                        <td>Rohtash</td>
                                                        <td>10/01/1996</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:rahar.anjaly@gmail.com">rahar.anjaly@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            H/no -110,village Bambulia, P.O -Matanhail, Dist-Jhajja
                                                            ,124106
                                                        </td>
                                                        <td>2021</td>
                                                        <td>Kayachiktsha</td>
                                                        <td>Dr .P.MADHAVANKUTTY VARIER, KOTTAKKAL</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>66</td>
                                                        <td>Phoolchandra prajapati</td>
                                                        <td>Bandi lal Prajapati</td>
                                                        <td>20/04/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:phoolchandraprajapati1276@gmail.com">phoolchandraprajapati1276@gmail.com</a>
                                                        </td>
                                                        <td>Gram thara post karri district chhatarpur pm</td>
                                                        <td>2020-21</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr.c.m sreekrishnan thrissure Kerala</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>67</td>
                                                        <td>Dr Lakhan Trivedi</td>
                                                        <td>Balram Trivedi</td>
                                                        <td>09/07/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:lakhantrivedi9793@gmail.com">lakhantrivedi9793@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village-Sarsana house number 37 tehsil-Barnagar District
                                                            Ujjain Madhya Pradesh
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr M Bhaskar Rao Tirupati</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>68</td>
                                                        <td>Dr.Rajpal Dhaka</td>
                                                        <td>Ghanshyam Singh Dhaka</td>
                                                        <td>15/05/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drrajpalsinghdhaka@gmail.com">drrajpalsinghdhaka@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            172, ward. No.03 , V.P.O. Bhadhadar ,Sikar Rajasthan 332315
                                                        </td>
                                                        <td>2020-2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr. Ramkumar, The Arya Vaidya Chikitsalayam and Research
                                                            Institute, Coimbatore, Tamil nadu
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>69</td>
                                                        <td>Dr Hemendra Kalal</td>
                                                        <td>Mr Bhogilala Kalal</td>
                                                        <td>26/11/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kalalhemendra38@gmail.com">kalalhemendra38@gmail.com</a>
                                                        </td>
                                                        <td>Jhinjhawa check with barothi dungarpur Rajasthan</td>
                                                        <td>2020-21</td>
                                                        <td>KSHAR SUTRA</td>
                                                        <td>Dr K.V.S. RAO BHILAI C.G.</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>70</td>
                                                        <td>Dr Tarun bhargava</td>
                                                        <td>Vijay bhargava</td>
                                                        <td>21/02/1995</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:bhargavatarun44@gmail.com">bhargavatarun44@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Ward no 13 purani basti shahganj sehore madhya pradesh
                                                            466554
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Dr mahesh madhusudan thakur thane maharashtra</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>71</td>
                                                        <td>Dr Manish Verma</td>
                                                        <td>Mr Rakesh Verma</td>
                                                        <td>5-11-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:verma.manu786@gmail.com">verma.manu786@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            R-58 Parwana Vihar Gajsinghpura Ajmer Road Jaipur Rajasthan
                                                            302021
                                                        </td>
                                                        <td>2020-2021</td>
                                                        <td>Ksharsutra Surgery</td>
                                                        <td>
                                                            Dr Raman Singh Sir (MS shalya PH.D laparoscopic )
                                                            <br>
                                                            218B Brij enclave colony Sunderpur Varanasi UP 221005
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>72</td>
                                                        <td>HARDIK DESAI</td>
                                                        <td>MUKESHBHAI DESAI</td>
                                                        <td>08/03/1997</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:hardikdesai370@gmail.com">hardikdesai370@gmail.com</a>
                                                        </td>
                                                        <td>Rabarivas At Post-Katarva Ta-Lakhani Dist-Banaskantha</td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Vd. Dinesh Chandra D Goradia,Mumbai
                                                            <br>
                                                            Vd. Mahesh M Thakur, Dombivli
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>73</td>
                                                        <td>Dr.Muhammed Riyas KP</td>
                                                        <td>Veeran KP</td>
                                                        <td>26/05/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:riyaskp786@gmail.com">riyaskp786@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Kalamparambil (House ), Nattukal (po), Mannarkkad college
                                                            (via ), Palakkad (Dt), Kerala 678583(Pin)
                                                        </td>
                                                        <td>2018</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Dr. Ravi Sankar Pervaje</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>74</td>
                                                        <td>Dr Atul kumar</td>
                                                        <td>Shri Rampal singh</td>
                                                        <td>20-03-1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:gautamatul90@gmail.com">gautamatul90@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village puranpur Post office Sugar mill Nadehi jaspur uddham
                                                            singh nagar
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachiksta</td>
                                                        <td>Dr. Ramkumar</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>75</td>
                                                        <td>Manjeet Singh Rawat</td>
                                                        <td>Prem Singh Rawat</td>
                                                        <td>12 January 1995</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drmanjeetrawat12@gmail.com">drmanjeetrawat12@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Hiuse no. - 2, Village - Binau, Post office - Pantwari,
                                                            District - Tehari Garhwal, Uttarakhand
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr. Binod Joshi,
                                                            <br>
                                                            Haldwani, nainital, Uttarakhand
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>76</td>
                                                        <td>Dr. Ashok Kumar Prajapati</td>
                                                        <td>Bholaram Prajapati</td>
                                                        <td>22/04/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dr.ashokprajapat@gmail.com">dr.ashokprajapat@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            C-159 Kirti Nagar, magra punjla, k.u.m.m. road, jodhpur
                                                            (Rajasthan)
                                                        </td>
                                                        <td>2021</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>
                                                            Vd.Anant sadanand nimkar
                                                            <br>
                                                            Satara, Maharashtra
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>77</td>
                                                        <td>Dr.Nikhil Singh Jamwal</td>
                                                        <td>Sh.Karnail Singh</td>
                                                        <td>22/12/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:nikjam6@gmail.com">nikjam6@gmail.com</a>
                                                        </td>
                                                        <td>Toll Post Tehsil Kandoli Nagrota Jammu (J&amp;K)</td>
                                                        <td>2018</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Dr.Ramdas Mhaluji Avhad, Ahmed Nagar (Maharashtra)</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>78</td>
                                                        <td>SNEHALATA</td>
                                                        <td>VIRAM BHARTI</td>
                                                        <td>15/04/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:snehalatabharti2321@gmail.com">snehalatabharti2321@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            RADHA KRISHNA ENCLAVE, PITHHUWALA KHURD, NEAR CHANDRBANI,
                                                            DEHRADUN
                                                        </td>
                                                        <td>2022</td>
                                                        <td>PHARMACY</td>
                                                        <td>DR. VIJAY VISHVANATH DOIPHODE</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>79</td>
                                                        <td>Shveta kumari sharma</td>
                                                        <td>Heera lal sharma</td>
                                                        <td>20/08/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:shvetasharma8094@gmail.com">shvetasharma8094@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            VPO.DORAI
                                                            <br>
                                                            TEH.BEGUN , CHITTORGARH RAJ.
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Vd.suvinay damle
                                                            <br>
                                                            Kudal sindhudurg maharashtra
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>80</td>
                                                        <td>Neha sharma</td>
                                                        <td>Om prakash sharma</td>
                                                        <td>25/08/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a href="mailto:bjns0825@gmail.com">bjns0825@gmail.com</a>
                                                        </td>
                                                        <td>Near apex school,Shivaji Nagar baran, Rajasthan</td>
                                                        <td>2022</td>
                                                        <td>Kaya Chikitsha</td>
                                                        <td>Dr. Namadhar Sharma, New delhi</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>81</td>
                                                        <td>Ahmed Shabbir Savani</td>
                                                        <td>Shabbir</td>
                                                        <td>22-10-1994</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dr.savani94@gmail.com">dr.savani94@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            A-701 Al-Amin Residency New Rander Road Causeway Surat
                                                            Gujarat 395009
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Pharmacy</td>
                                                        <td>
                                                            Vd Vivek Sane; Punarvasu Aushadhshala Pvt. Ltd Shivane Pune,
                                                            Maharashtra
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>82</td>
                                                        <td>Kamayani mourya</td>
                                                        <td>Dr. Hajari lal maurya</td>
                                                        <td>27/03/1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kamayanimaurya1998@gmail.com">kamayanimaurya1998@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Viil- jodhpura, vaya- pragpura, teh- paota, dist- jaipur
                                                            rajshthan, pin code - 303107
                                                        </td>
                                                        <td>2020-2021</td>
                                                        <td>Pharmacy</td>
                                                        <td>Dr. Vijay vishwnath doiphode</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>83</td>
                                                        <td>Dr. Palak Porwal</td>
                                                        <td>Mr. Dinesh Porwal</td>
                                                        <td>08/06/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:palakporwal54@gmail.com">palakporwal54@gmail.com</a>
                                                        </td>
                                                        <td>424 14/2 vikas nagar Neemuch (M. P)</td>
                                                        <td>2022</td>
                                                        <td>Pharmacy</td>
                                                        <td>Dr. Vijay Vishwanath. Doiphode (Pune)</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>84</td>
                                                        <td>Kamlesh Kumar</td>
                                                        <td>Heera Lal</td>
                                                        <td>22-12-1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kamleshsingaria@gmail.com">kamleshsingaria@gmail.com</a>
                                                        </td>
                                                        <td>289 PRATAP NAGAR PALI RAJASTHAN 306401</td>
                                                        <td>2022</td>
                                                        <td>BALROGA</td>
                                                        <td>N. KRISHNAIAH AND TIRUPATI ANDHRA PRADESH</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>85</td>
                                                        <td>Mangi lal</td>
                                                        <td>Shyopat Ram</td>
                                                        <td>27/01/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:mangi.mangi120@gmail.com">mangi.mangi120@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Ward 4 , Sardarpura khalsa, Rawatsar, Hanumangarh 335524
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd. Tarachand sharma, Rohini , DELHI</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>86</td>
                                                        <td>Dr Hitesh Prajapat</td>
                                                        <td>Khangara ram ji</td>
                                                        <td>15/08/2022</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a href="mailto:plrocks15@gmail.com">plrocks15@gmail.com</a>
                                                        </td>
                                                        <td>V+P Golana, tehsil Jaswantpura jalore rajasthan 307515</td>
                                                        <td>2022</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Dr Devendra k Shah ji , Ahmedabad</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>87</td>
                                                        <td>Dr Meet Patel</td>
                                                        <td>Mahendrakumar</td>
                                                        <td>21/10/95</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:meetpatel1509@gmail.com">meetpatel1509@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            139,yash vihar ,near ambaji nagar road,patan, gujarat
                                                            (384265)
                                                        </td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd Panchabhai damaniya - Una, Gujarat</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>88</td>
                                                        <td>SHOAIB AHAMED</td>
                                                        <td>GULAM MOHAMMED</td>
                                                        <td>14 DEC 1987</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:ahamad.shoaib1987@gmail.com">ahamad.shoaib1987@gmail.com</a>
                                                        </td>
                                                        <td>HN 430A EASTERN BAZAR PDDU NAGAR MUGHALSARAI</td>
                                                        <td>2022</td>
                                                        <td>KSHAR-SUTRA</td>
                                                        <td>
                                                            DR. HEMRAJ SHARMA, JAGAT HOSPITAL,
                                                            <br>
                                                            UNA, HIMANCHAL PRADESH 174303
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>89</td>
                                                        <td>ANSEELA A</td>
                                                        <td>P. V. ABDULKHADHER</td>
                                                        <td>08/10/1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:anseelakadher19@gmail.com">anseelakadher19@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            PUTHENKALAM ( HO) , CHENGANNIYUR KAVU, MATHUR AGRAHARAM (Po)
                                                            , PALAKKAD, KERALA-678571
                                                        </td>
                                                        <td>2020</td>
                                                        <td>ASTHI MARMA CHIKITSA</td>
                                                        <td>
                                                            Dr. C. SURESH KUMAR- TRIVENI AYURVEDA NURSING HOME,
                                                            VANCHIYOOR, TRIVANDRUM
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>90</td>
                                                        <td>Dr. Pregya Upadhyay</td>
                                                        <td>Mr.Aditya Narayan Upadhyay</td>
                                                        <td>05/02/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:raghavdiwan015@gmail.com">raghavdiwan015@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            C/O Vipul bhatt ,223, Poorabaxrai,Brahimpur Churawan,
                                                            Ambedkar Nagar,Uttar Pradesh-224230
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachiktisa</td>
                                                        <td>Dr.P.M.Varier</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>91</td>
                                                        <td>Dr. Sheeba khan</td>
                                                        <td>Mohammed Akram khan</td>
                                                        <td>24/07/1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:khansheeba.sk65@gmail.com">khansheeba.sk65@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            28, Mastana enclave behind mastan baba dargah, Rani Road,
                                                            Udaipur, Rajasthan
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr. C. N. Jani (smt. Maniben govt Ayurveda hospital, Asarwa,
                                                            Ahemdabad)
                                                        </td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>92</td>
                                                        <td>Aswathy Ravi</td>
                                                        <td>V V Ravi</td>
                                                        <td>17/05/1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:aswathyekm007@gmail.com">aswathyekm007@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Veliyathuparambil, Puliyanam P O, Puliyanam ,
                                                            Ernakulam,Kerala 683572
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Agada Thanthra</td>
                                                        <td>B.Prabhakaran, Kannur,Kerala</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>93</td>
                                                        <td>Mubarak ali</td>
                                                        <td>Asirudeen ali</td>
                                                        <td>10/02/1991</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:attarialimubarak315@gmail.com">attarialimubarak315@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Veer Teja colony, harsolaw road gotan, nagaur rajasthan
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Ksharsutra</td>
                                                        <td>Mukul patel, Surat</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>94</td>
                                                        <td>Dr Anoop Kumar Srivastava</td>
                                                        <td>Ashok Kumar Srivastava</td>
                                                        <td>02/05/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:anoopshrivastava98@gmail.com">anoopshrivastava98@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Near District Ayush officer office, Jhanshi Bypass Datia, MP
                                                        </td>
                                                        <td>2021</td>
                                                        <td>BALROG</td>
                                                        <td>Dr. N. Krishnaiah, Tirupati AP</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>95</td>
                                                        <td>Dr. Anjali Sharma</td>
                                                        <td>Mr. Yogender Sharma</td>
                                                        <td>19/08/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:vaidyaanjalisharma@gmail.com">vaidyaanjalisharma@gmail.com</a>
                                                        </td>
                                                        <td>New Delhi</td>
                                                        <td>2019</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>Vd. Anil Bhardwaj</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>96</td>
                                                        <td>Dr vikas mukati</td>
                                                        <td>Mohanlal mukati</td>
                                                        <td>03031990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:VIKASMUKATI66@GMAIL.COM">VIKASMUKATI66@GMAIL.COM</a>
                                                        </td>
                                                        <td>mangla colony, manawar, dist-dhar, m.p., pin code454446</td>
                                                        <td>2018</td>
                                                        <td>Medicine</td>
                                                        <td>Dr ramdas m avhad</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>97</td>
                                                        <td>Dr Betsy Varghese</td>
                                                        <td>M.G Varghese</td>
                                                        <td>18.03.1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:betsyvarghese2017@gmail.com">betsyvarghese2017@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Saino Bhavanam, changankulangara,Vavvakavu P.O ,Kollam
                                                            district,Kerala
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Dr Ramkumar,The Arya Vaidya Chikitsalayam and Research
                                                            Institute, Coimbatore
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>98</td>
                                                        <td>Vd. Dipa Ashok Jain</td>
                                                        <td>Ashok jain</td>
                                                        <td>10-12-1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dipajain4114@gmail.com">dipajain4114@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Durgesh-30, govid nagar, shahada;Tal- shahada, Dist-
                                                            Nandurbar
                                                        </td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vd. Vinay Welankar, Thane-Maharashtra</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>99</td>
                                                        <td>Vd.Amruta kalaskar</td>
                                                        <td>Gangakumar</td>
                                                        <td>04/09/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dr.amrutakalaskar@gmail.com">dr.amrutakalaskar@gmail.com</a>
                                                        </td>
                                                        <td>Matoshree niwas, bhaktapur road, degloor, dist- nanded</td>
                                                        <td>2020</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>
                                                            Vd. Suvinay vinayak damle. Kudal, sindhudurga, Maharashtra
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>100</td>
                                                        <td>VARSHA KUNIYAL</td>
                                                        <td>NARAYAN DUTT KUNIYAL</td>
                                                        <td>13-01-1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:dr.varshakuniyal@gmail.com">dr.varshakuniyal@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            House no.48,P.O.-Nandkeshri
                                                            (GWALDAM),sarkot,CHAMOLI,UTTARAKHAND-246441
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kayachikitsha</td>
                                                        <td>Dr.Mani Bhushan Kumar, PATNA,BIHAR</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>101</td>
                                                        <td>Dr jogendra kumar</td>
                                                        <td>vajaram</td>
                                                        <td>06/07/91</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:jogendra.Chauhan.2012@gmail.com">jogendra.Chauhan.2012@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village post hemawas distt pali
                                                            <br>
                                                            ( Rajasthan)
                                                        </td>
                                                        <td>Jan2021</td>
                                                        <td>Kayachikitsha</td>
                                                        <td>Dr N C dash ' Puri ( Odisha)</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>102</td>
                                                        <td>Saroj Ghosliya</td>
                                                        <td>Nemichand</td>
                                                        <td>25/02/1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:srojghosliya@gmail.com">srojghosliya@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Village - Rampura, post - Nathawatpura,Sikar , Rajasthan
                                                            pin- 332001
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Vd Upendra Dixit, ponda Goa</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>103</td>
                                                        <td>Alok maurya</td>
                                                        <td>Santosh kumar maurya</td>
                                                        <td>16/05/1992</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Alok.kushawaha92@gmail.com">Alok.kushawaha92@gmail.com</a>
                                                        </td>
                                                        <td>C 7 292 C keshav puram delhi 35</td>
                                                        <td>2022</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>Vaidya j P mishra</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>104</td>
                                                        <td>Meemansa gaur</td>
                                                        <td>Vinod kumar gaur</td>
                                                        <td>09/10/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Meemansagaur09@gmail.com">Meemansagaur09@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            House no 119,gali number 20,upper ganga nagar
                                                            rishikesh,dehradun,Uttarakhand
                                                        </td>
                                                        <td>2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Vaidh tarachand sharma</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>105</td>
                                                        <td>Dr. Rupendra rawat</td>
                                                        <td>Shersingh rawat</td>
                                                        <td>02/06/1990</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:rup.rawat11@gmail.com">rup.rawat11@gmail.com</a>
                                                        </td>
                                                        <td>61 near of court tehsil road sanawad</td>
                                                        <td>2018-2019</td>
                                                        <td>Kaychikitsa</td>
                                                        <td>Vaidhya tarachand sharma, rohini new delhi</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>106</td>
                                                        <td>Ruchika chaudhary</td>
                                                        <td>Ashok kumar</td>
                                                        <td>01/09/1994</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drruchikachoudhary@gmail.com">drruchikachoudhary@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Vill sarnooh post office sukhar teh nurpur distt kangra
                                                            Himachal Pradesh pin code 176051
                                                        </td>
                                                        <td>2018-2019</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr Ramdas Mhaluji Avhad / kopergaon maharashtra</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>107</td>
                                                        <td>Dr.Priyanka Ramola</td>
                                                        <td>Mr.Gokul Chand Ramola</td>
                                                        <td>02/02/1992</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:priyankaramola07@gmail.com">priyankaramola07@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Ramola bhawan,near hero showroom gyansu,Barahat
                                                            Range,Uttarkashi,Uttarakhand-249193
                                                        </td>
                                                        <td>2020-2021</td>
                                                        <td>Kayachikitsa</td>
                                                        <td>Dr.Satya Prakash Gupta (Moradabad U.P)</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>108</td>
                                                        <td>Dr. Renu Swami</td>
                                                        <td>Mr. Jagdish Swami</td>
                                                        <td>10/08/1991</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:renuswamibaj@gmail.com">renuswamibaj@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Out side usta bari , Near sutharo ki talayee, Bikaner
                                                            (Rajasthan)-334001
                                                        </td>
                                                        <td>2022</td>
                                                        <td>Kaya Chikitsa</td>
                                                        <td>Vaidhya Shri Krishan Khandel Sir , Jaipur</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>109</td>
                                                        <td>Dr. RAMESHA HS</td>
                                                        <td>SIDDAIAH</td>
                                                        <td>27/07/1995</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:drrameshahs@gmail.com">drrameshahs@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Hulibele janatha colony Village Horalagallu post Kasaba
                                                            hobli Kanakapura Tallluk Ramanagaram District Karnataka
                                                            state 562117
                                                        </td>
                                                        <td>2019</td>
                                                        <td>KAYACHIKITSA</td>
                                                        <td>
                                                            Dr. P. MADHAVANKUTTY VARIER ARYA VAIDYA SALA KOTTAKKAL
                                                            MALAPPURAM KERALA
                                                        </td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>110</td>
                                                        <td> deepika</td>
                                                        <td>Sundar singh</td>
                                                        <td>30/09/1993</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:Deepikagusain42@gmail.com">Deepikagusain42@gmail.com</a>
                                                        </td>
                                                        <td>Dehradun</td>
                                                        <td>2021</td>
                                                        <td>Kayachiktsha</td>
                                                        <td>Vaidhya ashwani kumar sharma Karol bagh delhi</td>
                                                        <td>BAMS</td>
                                                        <td>Government Job</td>
                                                    </tr>
                                                    <tr>
                                                        <td>111</td>
                                                        <td>Dr DEEPAK K</td>
                                                        <td>KUNHIRAMAN K V</td>
                                                        <td>16/12/1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:deepakwarrier4401@gmail.com">deepakwarrier4401@gmail.com</a>
                                                        </td>
                                                        <td>Sreedeepam, Kuthanur P O, Palakkad, Kerala - 678721</td>
                                                        <td>2021</td>
                                                        <td>Pharmacy</td>
                                                        <td>Dr SURYA PRAKASH SHARMA, KOLKATA</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>112</td>
                                                        <td>DR. HONEY V</td>
                                                        <td>VIJAYAN K</td>
                                                        <td>25-05-1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:honeychindu14@gmail.com">honeychindu14@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            MANGALASSERI, PATTARA, KALLARA P. O, THIRUVANANTHAPURAM,
                                                            KERALA.
                                                            <br>
                                                            PIN. 695606
                                                        </td>
                                                        <td>2019</td>
                                                        <td>PHARMACY</td>
                                                        <td>Dr. D Ramanathan, Thrissur, Kerala.</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>113</td>
                                                        <td>Kaushal saini</td>
                                                        <td>Naresh kumar</td>
                                                        <td>19 July 1993</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:kaushsaini84@gmail.com">kaushsaini84@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            C/O saini hospital, kutipur road , vill. Kishanpura ,
                                                            yamunanagar ,haryana
                                                        </td>
                                                        <td>2019</td>
                                                        <td>Kaya chikitsa</td>
                                                        <td>Dr Binod Joshi , haldwani</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>114</td>
                                                        <td>shaisa nassim</td>
                                                        <td>shaisa nassim</td>
                                                        <td>31.05.1990</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:shaisanassim33@gmail.com">shaisanassim33@gmail.com</a>
                                                        </td>
                                                        <td>
                                                            Anaputhayil, thazamel, R O junction Anchal PO Anchal,
                                                            Kollam(dist),Kerala pin 691306
                                                        </td>
                                                        <td>2019-20</td>
                                                        <td>Kayachiktsa</td>
                                                        <td>Dr.P Maadhavankutti Varier, Malappuram , Kerala</td>
                                                        <td>PG/MS/MD</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>115</td>
                                                        <td>SHUBHAS BAHUGUNA</td>
                                                        <td>MANI RAM BAHUGUNA</td>
                                                        <td>07/07/1989</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:KALPATARUAYURVEDA99@GMAIL.COM">KALPATARUAYURVEDA99@GMAIL.COM</a>
                                                        </td>
                                                        <td>
                                                            S/O MR. MANI RAM BAHUGUNA, POST OFFICE - DHAUNTRI, VILLAGE -
                                                            DHAUNTRI, BHETIYARA, UTTARKASHI, UTTARAKHAND.
                                                            <br>
                                                            PIN CODE - 249193
                                                        </td>
                                                        <td>2019</td>
                                                        <td>KAYA CHIKITSA</td>
                                                        <td>DR BINOD JOSHI, HALDWANI , NAINITAL, UTTARAKHAND.</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>116</td>
                                                        <td>Dr. Prateek Tailor</td>
                                                        <td>Kanhaiya Lal Tailor</td>
                                                        <td>28-08-1995</td>
                                                        <td>Male</td>
                                                        <td>
                                                            <a
                                                                href="mailto:tailorprateek@gmail.com">tailorprateek@gmail.com</a>
                                                        </td>
                                                        <td>Bai Sahab Darwaja Gangapur Bhilwara Rajasthan 311801</td>
                                                        <td>2020</td>
                                                        <td>Kshar sutra</td>
                                                        <td>Dr. Mukul Patel</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                    <tr>
                                                        <td>117</td>
                                                        <td>SHILPA KUMARI</td>
                                                        <td>RATAN SINGH</td>
                                                        <td>29/12/1995</td>
                                                        <td>Female</td>
                                                        <td>
                                                            <a
                                                                href="mailto:shilpa291295@gmail.com">shilpa291295@gmail.com</a>
                                                        </td>
                                                        <td>Pilani Rajasthan</td>
                                                        <td>2022</td>
                                                        <td>Pharmacy</td>
                                                        <td>Dr Vijay Vishwanath Doiphode</td>
                                                        <td>BAMS</td>
                                                        <td>Self/Own Clinic</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tenders-tab-pane" role="tabpanel"
                                aria-labelledby="tenders-tab" tabindex="0">
                                <div class="row">
                                    <h2 class="heading-black heading-black-lg text-center pb-5">
                                        Content coming soon...
                                    </h2>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thesis-tab-pane" role="tabpanel" aria-labelledby="thesis-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>S.No.</th>
                                                        <th>Topic</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            commentary of Dalhana on Sutra Sthana. Chapters 1 - 18.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            important points of commentary of Dalhana on Sutra Sthan.
                                                            Chapters 19 - 39.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            important points of commentary of Dalhana on Sutra Sthan
                                                            Chapters 40 - 46.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Sharir Sthan. Chapters 1 - 5.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Sharir Sthan. Chapters 6 - 10.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>6.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Sharir Sthan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>7.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chapters 1 - 10 of Nidana Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>8.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Nidana Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>9.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on 11-16 Chapters of Nidana Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>10.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chikitsa Sthana. Chapters 1 - 10.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>11.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chikitsa Sthana. Chapters 11 - 20.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>12.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chikitsa Sthana. Chapters 21 - 30.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>13.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chikitsa Sthana. Chapters 5 - 14.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>14.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Chikitsa Sthana. Chapters 15 - 24.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>15.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on Kalpa Sthan. All 8 chapters.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>16.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on 1 - 15 chapters of Shalakya Tantra of
                                                            Uttar Tantra.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>17.</td>
                                                        <td>
                                                            Hindi Translation of main text of Sushrut Samhita and
                                                            Dalhana commentary on 16 chapters on Shalakya Tantra of
                                                            Uttar Tantra.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>18.</td>
                                                        <td>
                                                            Hindi Translation of Kaumara Bhritya portion in Uttar Tantra
                                                            of Sushruta Samhita Chapters 27-38 including Dalhanas
                                                            Commentary with special remarks.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>19.</td>
                                                        <td>
                                                            Status of Sanjnaharan in Ayurveda with special reference to
                                                            Sushruta Samhita.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>20.</td>
                                                        <td>
                                                            Arishtha Vigyan in Ayurveda with special reference to
                                                            Sushruta Samhita.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>21.</td>
                                                        <td>
                                                            Clinical study of Kanchnara Guggulu with Dashamula Kwatha in
                                                            the management of Tundikeri (Tonsillitis)
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">SHARIRA RACHANA (ANATOMY):</td>
                                                    </tr>
                                                    <tr>
                                                        <td>22.</td>
                                                        <td>Sushruta’s approach to applied and surgical anatomy.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>23.</td>
                                                        <td>
                                                            Study on anatomical considerations of endocrine glands in
                                                            Ayurveda.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">CHARAKA SAMHITA:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>24.</td>
                                                        <td>
                                                            Charak Samhita with Chakrapani Dutta commentary (2 vols).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>25.</td>
                                                        <td>
                                                            Translation with Anvaya of main text and commentary of
                                                            Chakrapani Dutta on 11-20 chapters of Sutra Sthan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>26.</td>
                                                        <td>
                                                            Critical Study and translation of 21-30 chapters of Sutra
                                                            Sthana with Commentary of Chakrapanidatta.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>27.</td>
                                                        <td>
                                                            Translation of main text and commentary of Chakrapani Dutta
                                                            on 17 to 28 chapters of Sutra Sthan.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>28.</td>
                                                        <td>
                                                            Translation of main text and commentary of Chakrapani
                                                            Duttaon 29 - 30 chapters of Sutra Sthana and total Nidana
                                                            Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>29.</td>
                                                        <td>
                                                            Hindi Translation of Nidana sthana Chapters 1-8 with gist of
                                                            Commentaries of Chakrapanidatta and Gangadhara.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>30.</td>
                                                        <td>
                                                            Translation and gist of commentaries of Chakrapanidatta and
                                                            Gangadhara on Viman Sthan
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>31</td>
                                                        <td>
                                                            Translation of text and Commentary of Chakrapanidatta on
                                                            Sarira Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>32.</td>
                                                        <td>
                                                            Translation of text and Commentary of Chakrapanidatta on all
                                                            12 Chapters of Indriya Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>33.</td>
                                                        <td>
                                                            Translation of text and Commentary of Chakrapanidatta on
                                                            1,2,4-10 chapters of Chikitsa Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>34.</td>
                                                        <td>
                                                            Translation of text and Commentary of Chakrapanidatta on 3rd
                                                            chapter (Jwar) of Chikitsa Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>35.</td>
                                                        <td>
                                                            Translation of text and Commentary of Chakrapanidatta on
                                                            11-29 chapters of Chikitsa Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">VAGBHAT (ASHTANGA HRIDAYA):</td>
                                                    </tr>
                                                    <tr>
                                                        <td>36.</td>
                                                        <td>
                                                            Explanation on text of Ashtanga Hridaya and commentaries of
                                                            Arun Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>37.</td>
                                                        <td>
                                                            Translation of 1 - 10 chapters of Sutra Sthana of Ashtanga
                                                            Hridaya and Sarvangasundara commentary of Arundutta.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>38.</td>
                                                        <td>
                                                            Commentary in the form of Tantra Bodhika on chapters 11 - 20
                                                            of Sutra Sthana of Ashtanga Hridaya and commentaries of Arun
                                                            Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>39.</td>
                                                        <td>
                                                            Commentary in the form of Tantra Bodhika on text of Ashtanga
                                                            Hridaya and Commentaries of Arun Dutta and Hemadri on
                                                            chapters 21 - 30 of Sutra Sthana.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>40</td>
                                                        <td>
                                                            Translation of chapters 11 - 20 of Sutra Sthana of Ashtanga
                                                            Hridaya.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>41.</td>
                                                        <td>
                                                            Translation of chapters 21 - 30 of Sutra Sthana of Ashtanga
                                                            Hridaya.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>42.</td>
                                                        <td>
                                                            Translation of 1 - 6 Chapters of Sharira Sthana and 1 - 4
                                                            chapters of Nidana Sthana text and commentary of Arun Dutta
                                                            of Ashtanga Hridaya.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>43.</td>
                                                        <td>
                                                            Commentary on 1 - 12 chapters of Nidana Sthana of Ashtanga
                                                            Hridaya and commentaries of Arun Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>44.</td>
                                                        <td>
                                                            Translation of 5 - 16 chapters of Nidana Sthana of Ashtanga
                                                            Hridaya and commentaries of Arun Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>45.</td>
                                                        <td>
                                                            Translation of chapters 1 - 10 of Chikitsa Sthana of of
                                                            Ashtanga Hridaya and commentaries of Arun Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>46.</td>
                                                        <td>
                                                            Translation of chapters 11 - 20 of Chikitsa Sthana of of
                                                            Ashtanga Hridaya and commentaries of Arun Dutta and Hemadri
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>47.</td>
                                                        <td>
                                                            Translation of chapters 21 - 22 of Chikitsa Sthana, 1 - 6
                                                            chapters of Kalpa and Siddhi Sthana and 1 - 2 chapters of
                                                            Uttara Sthana of of Ashtanga Hridaya and commentaries of
                                                            Arun Dutta and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>48.</td>
                                                        <td>
                                                            Critical study in the form of Tantra Bodhika on 13 -16
                                                            chapters of Nidana Sthana and 1 - 7 chapters of Uttara
                                                            Sthana of Ashtanga Hridaya and commentaries of Arun Dutta
                                                            and Hemadri.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>49.</td>
                                                        <td>
                                                            Translation of 3 - 12 Chapters of Uttara Sthana of text and
                                                            commentaries of Arun Dutta.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>50.</td>
                                                        <td>Aphorisms of Vagbhat on Panchakarma Therapy.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>51.</td>
                                                        <td>Aphorisms of Vagbhat on Swasthavritta.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">PANCHAKARMA:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>52.</td>
                                                        <td>
                                                            Comparative study of Panchkarma during Samhita Kala (Charak
                                                            Samhita, Sushrut Samhita and Ashtang Hridaya).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>53.</td>
                                                        <td>
                                                            Comparative study of Panchkarma during Madhya Kala (Vrinda
                                                            Madhav, Chakradatta and Vanga Sena).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>54.</td>
                                                        <td>
                                                            Comparative study of Panchkarma during the period of
                                                            Laghutrayi (Sharangdhara, Bhavaprakash and Yog Ratnakar).
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>55.</td>
                                                        <td>
                                                            A study on Panchakarma described in Bhaishajya Ratnavali and
                                                            texts of Rasashastra of Medieval period.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>56.</td>
                                                        <td>
                                                            A study on Panchakarma in Bhela Samhita, Kashyapa Samhita
                                                            and Ashtanga Sangraha.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>57.</td>
                                                        <td>
                                                            A study of administration of Panchakarma in the diseases of
                                                            Vyana Vayu and Samana Vayu.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>58.</td>
                                                        <td>
                                                            A study on administration of Panchakarma in diseases of
                                                            Apana vayu.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>59.</td>
                                                        <td>
                                                            A study on administration of Panchakarma in diseases of
                                                            Prana vayu and Udana Vayu.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">DRAVYAGUNA:</td>
                                                    </tr>
                                                    <tr>
                                                        <td>60.</td>
                                                        <td>
                                                            Critical study of Dravyaguna Sapta Adhyayi of Sushrut
                                                            Samhita.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>61.</td>
                                                        <td>
                                                            Critical study of Dravyaguna Sapta Adhyayi of Charak
                                                            Samhita.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>62.</td>
                                                        <td>Critical study of vegetable drugs of Sushruta Samhita.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>63.</td>
                                                        <td>
                                                            Critical study of vegetable drugs of Sharangadhara Samhita.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>64.</td>
                                                        <td>Critical study of vegetable drugs of Bhavaprakasha.</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">RASA SHASTRA</td>
                                                    </tr>
                                                    <tr>
                                                        <td>65.</td>
                                                        <td>Paribhashika Shabda of Rasa Shastra.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>66.</td>
                                                        <td>Parad and Jarana.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>67.</td>
                                                        <td>
                                                            Andhra’s contribution to Rasa Chikitsa with special
                                                            reference to Vaishnavirasa.
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>68.</td>
                                                        <td>Study on Bhasma Kalpana.</td>
                                                    </tr>
                                                    <tr>
                                                        <td>69.</td>
                                                        <td>
                                                            Physico-chemical analysis and standardisation of Abhraka
                                                            Sattva)
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="information-tab-pane" role="tabpanel"
                                aria-labelledby="information-tab" tabindex="0">
                                <div class="row">
                                    <div class="text-content">
                                        <h2 class="heading-black heading-black-md">
                                            Right to Information
                                        </h2>
                                        <p class="desc">
                                            <b>
                                                Right to Information
                                                Printer-friendly version
                                                BRINGING INFORMATION TO THE CITIZENS
                                            </b>
                                        </p>
                                        <p class="desc">
                                            Right to Information Act 2005 mandates timely response to citizen requests
                                            for government information. It is an initiative taken by Department of
                                            Personnel and Training, Ministry of Personnel, Public Grievances and
                                            Pensions to provide a– RTI Portal Gateway to the citizens for quick search
                                            of information on the details of first Appellate Authorities,PIOs etc.
                                            amongst others, besides access to RTI related information / disclosures
                                            published on the web by various Public Authorities under the government of
                                            India as well as the State Governments.
                                        </p>
                                        <p class="desc">
                                            <b>
                                                OBJECTIVE OF THE RTI ACT
                                            </b>
                                        </p>
                                        <p class="desc">
                                            The basic object of the Right to Information Act is to empower the
                                            citizens,promote transparency and accountability in the working of the
                                            Government,contain corruption, and make our democracy work for the people in
                                            real sense.It goes without saying that an informed citizen is better
                                            equipped to keep necessary vigil on the instruments of governance and make
                                            the government more accountable to the governed.The Act is a big step
                                            towards making the citizens informed about the activities of the Government.
                                            For more details on RTI
                                            <a href="http://rti.gov.in/" target="_blank">
                                                Click
                                                here
                                            </a>
                                            .
                                        </p>
                                        <ol>
                                            <li>
                                                <a href="{{ asset('assets/pdf/home-page/rti-act.pdf') }}"
                                                    target="_blank">Right To Information Act, 2005[PDF](810.29 KB).</a>
                                            </li>
                                            <li>
                                                To submit RTI request online
                                                <a href="https://rtionline.gov.in/" target="_blank">Click here</a>
                                                .
                                            </li>
                                        </ol>
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
                        Our Successful Journey
                    </h2>
                </div>
                <div class="col-md-3">
                    <div class="our-journey-card my-md-0 my-2" data-aos="flip-left" data-aos-duration="3000">
                        <img src="{{ asset('assets/images/graduation.svg') }}" alt="graduation" class="img-fluid">
                        <span class="total-no">
                            12,458
                        </span>
                        <p class="title">
                            Number of Graduates
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
                            Programme Offerings
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
                            Research Initiatives
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
                            Online Presence
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
                                    aria-controls="activity-tab-pane" aria-selected="true">Our Activities</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="crav-tab" data-bs-toggle="tab"
                                    data-bs-target="#crav-tab-pane" type="button" role="tab"
                                    aria-controls="crav-tab-pane" aria-selected="false">CRAV Gurus</button>
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
                                    aria-controls="twitter-tab-pane" aria-selected="false">Twitter Updates</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="photo-tab" data-bs-toggle="tab"
                                    data-bs-target="#photo-tab-pane" type="button" role="tab"
                                    aria-controls="photo-tab-pane" aria-selected="true">Our Photos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="video-tab" data-bs-toggle="tab"
                                    data-bs-target="#video-tab-pane" type="button" role="tab"
                                    aria-controls="video-tab-pane" aria-selected="false">Videos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="awards-tab" data-bs-toggle="tab"
                                    data-bs-target="#awards-tab-pane" type="button" role="tab"
                                    aria-controls="awards-tab-pane" aria-selected="false">Awards</button>
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
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo1.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo2.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo3.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo4.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo5.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="video-tab-pane" role="tabpanel"
                                aria-labelledby="video-tab" tabindex="0">
                                <h2 class="text-center pt-4">Content coming soon...</h2>
                            </div>
                            <div class="tab-pane fade" id="twitter-tab-pane" role="tabpanel"
                                aria-labelledby="twitter-tab" tabindex="0">
                                <div class="photo-gallery-wrap">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo1.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo2.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo3.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo4.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                            <div class="photo-gallery-img">
                                                <img src="{{ asset('assets/images/photo5.png') }}" alt="photo"
                                                    class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="awards-tab-pane" role="tabpanel"
                                aria-labelledby="awards-tab" tabindex="0">
                                <div class="photo-gallery-wrap">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="text-content">
                                                <h2 class="heading-black heading-black-md">
                                                    Awards
                                                </h2>
                                                <p class="desc">
                                                    <b>Institution of awards in recognition of merit</b>
                                                </p>
                                                <p class="desc">
                                                    Rashtriya Ayurveda Vidyapeeth has instituted various awards and
                                                    fellowships in recognition of merit in Ayurveda.
                                                </p>
                                                <p class="desc">
                                                    <b>
                                                        Award of Fellow of R.A.V.( FRAV)
                                                    </b>
                                                </p>
                                                <p class="desc">
                                                    and to felicitate eminent scholars and Vaidyas with Fellow of
                                                    Rashtriya Ayurveda Vidyapeeth (FRAV) for their significant
                                                    contribution for the progress of Ayurveda in the fields of
                                                    education, research, literature and health care.
                                                </p>
                                                <p>
                                                    For achieving one of its objectives, the Vidyapeeth awards
                                                    Fellowship to the eminent scholars of Ayurveda and practitioners of
                                                    various traditional Ayurvedic techniques in recognition of their
                                                    scholarly expertise and contribution in the field of education,
                                                    research, patient care and literature. In the year 1992 the
                                                    Vidyapeeth awarded 50 Foundation Fellowships to eminent Vaidyas.
                                                    Thereafter, a maximum of 30 fellowships are being awarded every
                                                    year. This is an honorary recognition and a felicitation with a
                                                    citation, a shawl and a kalash/memento presented to each awardee
                                                    during the Convocation ceremony of RAV. As per the rules of the
                                                    Vidyapeeth, the total number of fellows at any time shall not exceed
                                                    300. Every year the Governing Body determines these fellowships on
                                                    the basis of the bio-data of scholars. So far, 294 scholars have
                                                    been awarded Fellow of Rashtriya Ayurveda Vidyapeeth (FRAV).
                                                </p>
                                                <p class="desc">
                                                    <b>Award for popular and scientific writing in Ayurveda</b>
                                                </p>
                                                <p class="desc">
                                                    In pursuance of its objective of recognition of merit, Rashtriya
                                                    Ayurveda Vidyapeeth has established following awards on yearly basis
                                                    for popular and scientific writing in Ayurveda. These awards are
                                                    instituted to promote the popular writing in ayurveda for common
                                                    people in the common language as well as scientific writing in
                                                    Ayurveda for academicians and researchers in the scientific
                                                    language. Initially the awards are started in following categories.
                                                </p>
                                                <p class="desc">
                                                    <b>Category A: Award for Popular Writing in Ayurveda</b>
                                                </p>
                                                <p class="desc">
                                                    Two awards are instituted for popular writing in Ayurveda
                                                    respectively in Hindi and English .
                                                </p>
                                                <p class="desc">
                                                    Each award carry a cash prize of Rs.10000/- , a citation and a
                                                    certificate from RAV. These awards are given to a best piece of
                                                    writing/ featured article appeared in any national daily,
                                                    weekly/monthly or quarterly news paper/ periodical during the
                                                    preceding calendar year. The published article should have a minimum
                                                    length of 1000 words.
                                                </p>
                                                <p class="desc">
                                                    <b>
                                                        Category B: Award for Scientific Writing in Ayurveda
                                                    </b>
                                                </p>
                                                <p class="desc"></p>
                                                This award is given in following three categories
                                                <ol type="a">
                                                    <li>
                                                        <b>Student scientific writing award :</b>
                                                        isgiven to MD / PhD/ M
                                                        Phil students of ayurveda for their published research work in a
                                                        national /international scientific journal of repute. This award
                                                        carry a cash prize of Rs. 20000/- , a citation and a certificate
                                                        from RAV.
                                                    </li>
                                                    <li>
                                                        <b>Senior scientific writing award :</b>
                                                        is given to a faculty
                                                        member, physician, independent researcher or practitioner who
                                                        hashis scientific research published in a national/
                                                        international scientific journal of repute. This award may carry
                                                        a cash prize of Rs. 25000/- , a citation and a certificate from
                                                        RAV.
                                                    </li>
                                                    <li>
                                                        <b>
                                                            Scientific writing award for best book / monograph in
                                                            Ayurveda :
                                                        </b>
                                                        This award is given to the best monograph/
                                                        book on Ayurveda published during the preceding year. The book
                                                        should contain a minimum of 100 pages.This award carry a cash
                                                        prize of Rs. 50000/- , a citation and a certificate from RAV.
                                                    </li>
                                                </ol>
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
                                    <img src="{{ asset('assets/images/india-gov.svg') }}" alt="india-gov"
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="client-slider-img">
                                    <img src="{{ asset('assets/images/data-gov.svg') }}" alt="data-gov"
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="client-slider-img">
                                    <img src="{{ asset('assets/images/mygov.svg') }}" alt="mygov"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/ministry-of-ayush.svg') }}"
                                        alt="ministry-of-ayush" class="img-fluid">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="client-slider-img">
                                    <img src="{{ asset('assets/images/india-gov.svg') }}" alt="india-gov"
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="client-slider-img">
                                    <img src="{{ asset('assets/images/data-gov.svg') }}" alt="data-gov"
                                        class="img-fluid">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="client-slider-img">
                                    <img src="{{ asset('assets/images/mygov.svg') }}" alt="mygov"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/ministry-of-ayush.svg') }}"
                                        alt="ministry-of-ayush" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
