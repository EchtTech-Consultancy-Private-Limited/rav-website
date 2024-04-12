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
                <h3 class="title">
                    @if (Session::get('locale') == 'hi')
                        साइटमैप
                    @else
                    Sitemap
                    @endif
                </h3>
            </div>
        </div>
    </section>
    <div class="main-body">
        <div class="container breadcrumbs-link">
            <div class="breadcrumbs-link-text">
                <ul>
                    <li>
                        <a class="active" href="{{ route('/') }}" tabindex="0"> 
                            @if (Session::get('locale') == 'hi')
                                होम
                            @else
                                Home
                            @endif
                        </a>
                    </li>
                    <li>
                        @if (Session::get('locale') == 'hi')
                        साइटमैप
                    @else
                    Sitemap
                    @endif
                    </li>
                </ul>
            </div>
        </div>
        <section class="sitemap bg-grey" id="main-content">
            <div class="container">
                <div class="master">
                    <h1>
                        @if (Session::get('locale') == 'hi')
                            आरएवी वेबसाइट लिंक
                        @else
                        RAV Website Link
                        @endif
                    </h1>
                    <h2>
                        @if (Session::get('locale') == 'hi')
                            मुख्य मेनू
                        @else
                        Main Menu
                        @endif
                    </h2>
                    <ul class="site-map-menu">
                        <li class="first leaf">
                            <a href="{{ url('/') }}">
                                @if (Session::get('locale') == 'hi')
                                    {{ __('messages.Home') }}
                                @else
                                    {{ __('messages.Home') }}
                                @endif
                            </a>
                        </li>
                        {{-- @dd($headerMenu) --}}
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
                                                            <a
                                                                href="@if ($subMenus->name_en == 'RSBK Directory Qualification Wise') {{ url('m-pharma') }}
                                                                @elseif($subMenus->name_en == 'RSBK Directory State Wise')
                                                                {{ url('delhi') }}
                                                                @elseif($subMenus->name_en == 'RSBK Directory Year Wise')
                                                                {{ url('rsbk-directory-from-1951-to-1960') }}
                                                                @else
                                                                {{ url($url . '/' . $suburl) }} @endif">
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
                    <h2>
                        @if (Session::get('locale') == 'hi')
                            फुटर मेनू
                        @else
                        Footer Menu
                        @endif
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
                    <h2>
                        @if (Session::get('locale') == 'hi')
                            टॉगल मेनू
                        @else
                        Toggle Menu
                        @endif
                    </h2>
                    @if (isset($toogleMenu) && count($toogleMenu) > 0)
                        <ul class="site-map-menu">
                            @foreach ($toogleMenu as $toogleMenus)
                                @php
                                    $toogleMenuurl = $toogleMenus->url ?? 'javascript:void(0)';
                                @endphp
                                <li class="first leaf">
                                    <a href="{{ url($toogleMenuurl) ?? '' }}">
                                        @if (Session::get('locale') == 'hi')
                                            {{ $toogleMenus->name_hi ?? '' }}
                                        @else
                                            {{ $toogleMenus->name_en ?? '' }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    @endif
                </div>
            </div>
        </section>
    @endsection
