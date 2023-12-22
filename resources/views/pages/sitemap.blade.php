@extends('layout.master')
@section('title')
    {{ __('Site Map') }}
@endsection
@section('content')
    <section class="breadcrumb">
        <div class="page-breadcrumb">
            <div class="breadcrumb-img">
                <img src="{{ asset('assets/images/bredcrumb.jpg') }}" alt="" />
            </div>
            <div class="breadcrumb-title">
                <h3 class="title"> Sitemap</h3>
            </div>
        </div>
    </section>
    <div class="main-body">
        <div class="container breadcrumbs-link">
            <div class="breadcrumbs-link-text">
                <ul>
                    <li>
                        <a class="active" href="{{ route('/') }}" tabindex="0"> Home </a>
                    </li>
                    <li>Sitemap</li>
                </ul>
            </div>
        </div>
        <section class="sitemap bg-grey" id="about">
            <div class="container">
                <div class="master">
                    <h1>RAV Website Link</h1>
                    <h2>Main menu</h2>
                    <ul class="site-map-menu">
                        @if (isset($headerMenu) && count($headerMenu) > 0)
                            @foreach ($headerMenu as $headerMenus)
                                @php
                                    $url = $headerMenus->url ?? 'javascript:void(0)';
                                @endphp
                                @if (isset($headerMenus->children) && count($headerMenus->children) > 0)
                                    <li class="expanded">
                                        <a href="javascript:void(0)">
                                            @if (Session::get('locale') == 'hi')
                                                {{ $headerMenus->name_hi ?? '' }}
                                            @else
                                                {{ $headerMenus->name_en ?? '' }}
                                            @endif
                                        </a>
                                        <ul class="site-map-menu">
                                            @if (isset($headerMenus->children) && count($headerMenus->children) > 0)
                                                @foreach ($headerMenus->children as $subMenus)
                                                    @php
                                                        $suburl = $subMenus->url ?? 'javascript:void(0)';
                                                    @endphp

                                                    <li class="first leaf">
                                                        @if ($subMenus->tab_type == 1)
                                                            <a onclick="return confirm('{{ $alertMessage }}')"
                                                                target="_blank" href="{{ url($suburl) }}">
                                                                @if (Session::get('locale') == 'hi')
                                                                    {{ $subMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $subMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                        @else
                                                            <a href="{{ url($suburl) }}">
                                                                @if (Session::get('locale') == 'hi')
                                                                    {{ $subMenus->name_hi ?? '' }}
                                                                @else
                                                                    {{ $subMenus->name_en ?? '' }}
                                                                @endif
                                                            </a>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            @else
                                                <h5>No menu available.</h5>
                                            @endif
                                        </ul>
                                    </li>
                                @else
                                    <li class="first leaf">
                                        @if ($headerMenus->tab_type == 1)
                                            <a onclick="return confirm('{{ $alertMessage }}')" target="_blank"
                                                href="{{ url($url) }}">
                                                @if (Session::get('locale') == 'hi')
                                                    {{ $headerMenus->name_hi ?? '' }}
                                                @else
                                                    {{ $headerMenus->name_en ?? '' }}
                                                @endif
                                            </a>
                                        @else
                                            <a href="{{ url($url) }}">
                                                @if (Session::get('locale') == 'hi')
                                                    {{ $headerMenus->name_hi ?? '' }}
                                                @else
                                                    {{ $headerMenus->name_en ?? '' }}
                                                @endif
                                            </a>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <h5>No menu available.</h5>
                        @endif
                    </ul>

                    {{-- <h2>
                        Left Side Menu
                    </h2> --}}

                    {{-- <ul class="site-map-menu">
                        <li class="first leaf"><a href="/en/message-presidentgb" title="Message From President,G.B">Message
                                From
                                President,G.B</a></li>
                        <li class="leaf"><a href="/en/cme-scheme" title="CME Scheme">CME Scheme</a></li>
                        <li class="leaf"><a href="/en/guru-shishya-parampara"
                                title="Courses Under Guru Shishya Parampara">Courses
                                Under Guru Shishya Parampara</a></li>
                        <li class="leaf"><a href="/en/tender" title="">Tenders</a></li>
                        <li class="leaf"><a href="/en/vacancy" title="">Vacancy</a></li>
                        <li class="leaf"><a href="/en/theses-submitted-rav-students" title="RAV Students">Thesis Submitted
                                by RAV
                                Students</a></li>
                        <li class="leaf"><a href="/en/right-information" title="Right to Information Act (RTI)">Right to
                                Information
                                Act (RTI)</a></li>
                        <li class="leaf"><a href="/en/admission-courses" title="Admission to Courses">Admission to
                                Courses</a></li>
                        <li class="last leaf"><a href="/en/publication-vidyapeeth" title="">Publication of
                                Vidyapeeth</a></li>
                    </ul> --}}
                    <h2>
                        Footer Menu
                    </h2>
                    @if (isset($footerMenu) && count($footerMenu) > 0)
                        <ul class="site-map-menu">
                            @foreach ($footerMenu->slice(0, 8) as $footerMenus)
                                @php
                                    $footerMenusurl = $footerMenus->url ?? 'javascript:void(0)';
                                @endphp
                                @if ($footerMenus->tab_type == 1)
                                    <li class="first leaf">
                                        <a onclick="return confirm('{{ $alertMessage }}')" target="_blank"
                                            href="{{ url($footerMenusurl) ?? '' }}">
                                            @if (Session::get('locale') == 'hi')
                                                {{ $footerMenus->name_hi ?? '' }}
                                            @else
                                                {{ $footerMenus->name_en ?? '' }}
                                            @endif
                                        </a>
                                    </li>
                                @else
                                    <li class="first leaf"><a href="{{ url($footerMenusurl) ?? '' }}">
                                            @if (Session::get('locale') == 'hi')
                                                {{ $footerMenus->name_hi ?? '' }}
                                            @else
                                                {{ $footerMenus->name_en ?? '' }}
                                            @endif
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @else
                        <h5>No menu available.</h5>
                    @endif

                </div>
            </div>
        </section>
    @endsection
