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
            <h3 class="title text-capitalize">
                @if (Session::get('locale') == 'hi')
                    {{ $news->title_name_hi }}
                @else
                    {{ $news->title_name_en }}
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
                    <li>{{ $organizedData['metatag']->meta_title ?? Session::get('locale') == 'hi' ? $news->title_name_hi : $news->title_name_en }}
                    </li>
                </ul>
            </div>
        </div>
        <section class="master bg-grey">
            <div class="container">
                <div class="row">
                    {{-- side menu start --}}
                    <div class="col-lg-3 col-md-3">
                        <div class="bg-white">
                            {{-- @dd($tree); --}}
                            @if (isset($displayRsbkMenu) && $displayRsbkMenu == 1)
                                <x-rsbk-directory-menu />
                            @elseif (isset($parentMenut) && $parentMenut != '' && !isset($displayRsbkMenu))
                                <div class="main-sidebar p-2" id="main-sidebar">
                                    <ul>
                                        @if ($parentMenut != '' && isset($parentMenut))
                                            <h3 class="heading-txt-styl">
                                                @if (Session::get('locale') == 'hi')
                                                    {{ $parentMenut->name_hi ?? '' }}
                                                @else
                                                    {{ $parentMenut->name_en ?? '' }}
                                                @endif
                                            </h3>
                                        @endif
                                        @if (isset($tree) && count($tree) > 0)
                                            @foreach ($tree as $index => $trees)
                                                @php
                                                    $parentMenuUrl = $parentMenut->url ?? '';
                                                    $treesUrl = $trees->url ?? '';
                                                @endphp
                                                @if ($trees->url == 'rsbk-directory-qualification-wise')
                                                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) qm-active @endif"
                                                        id="sidebarDropdown_0">
                                                        <div class="accordion-item border-0">
                                                            <div class="list-start" id="flush-headingOne_0">
                                                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne_0"
                                                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                                                    tabindex="0">
                                                                    @if (Session::get('locale') == 'hi')
                                                                        {{ $trees->name_hi ?? '' }}
                                                                    @else
                                                                        {{ $trees->name_en ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div id="flush-collapseOne_0"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingOne_0"
                                                                data-bs-parent="#sidebarDropdown_0">
                                                                <div class="accordion-body p-0">
                                                                    <ul class="p-0 m-0 mt-3">
                                                                        <li><a href="{{ url('m-pharma') }}">M. Pharma</a>
                                                                        </li>
                                                                        <li><a href="{{ url('m-d') }}">M. D</a></li>
                                                                        <li><a href="{{ url('p-g') }}">P. G</a></li>
                                                                        <li><a href="{{ url('ph-d') }}">Ph. D</a></li>
                                                                        <!-- Add more submenu items as needed -->
                                                                    </ul>
                                                                </div>

                                                            </div>


                                                    </li>
                                                @elseif ($trees->url == 'rsbk-directory-state-wise')
                                                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) qm-active @endif"
                                                        id="sidebarDropdown_0">
                                                        <div class="accordion-item border-0">
                                                            <div class="list-start" id="flush-headingOne_0">
                                                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne_1"
                                                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                                                    tabindex="0">
                                                                    @if (Session::get('locale') == 'hi')
                                                                        {{ $trees->name_hi ?? '' }}
                                                                    @else
                                                                        {{ $trees->name_en ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div id="flush-collapseOne_1"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingOne_0"
                                                                data-bs-parent="#sidebarDropdown_0">
                                                                <div class="accordion-body p-0">
                                                                    <ul class="p-0 m-0 mt-3">
                                                                        <li><a href="{{ url('delhi') }}">Delhi</a></li>
                                                                        <li><a href="{{ url('goa') }}">Goa</a></li>
                                                                        <li><a href="{{ url('gujarat') }}">Gujarat</a></li>
                                                                        <li><a href="{{ url('himachal-pradesh') }}">Himachal
                                                                                Pradesh</a></li>
                                                                        <li><a href="{{ url('karnataka') }}">Karnataka</a>
                                                                        </li>
                                                                        <li><a href="{{ url('kerala') }}">Kerala</a></li>
                                                                        <li><a href="{{ url('madhya-pradesh') }}">Madhya
                                                                                Pradesh</a></li>
                                                                        <li><a
                                                                                href="{{ url('chhattisgarh') }}">Chhattisgarh</a>
                                                                        </li>
                                                                        <li><a
                                                                                href="{{ url('maharashtra') }}">Maharashtra</a>
                                                                        </li>
                                                                        <li><a href="{{ url('odisha') }}">Odisha</a></li>
                                                                        <li><a href="{{ url('punjab') }}">Punjab</a></li>
                                                                        <li><a href="{{ url('rajasthan') }}">Rajasthan</a>
                                                                        </li>
                                                                        <li><a href="{{ url('uttar-pradesh') }}">Uttar
                                                                                Pradesh</a></li>
                                                                        <li><a
                                                                                href="{{ url('uttarakhand') }}">Uttarakhand</a>
                                                                        </li>
                                                                        <!-- Add more submenu items as needed -->
                                                                    </ul>
                                                                </div>

                                                            </div>


                                                    </li>
                                                @elseif ($trees->url == 'rsbk-directory-year-wise')
                                                    <li class="accordion accordion-flush position-relative sl-accordion @if (request()->is($parentMenuUrl . '/' . $treesUrl)) qm-active @endif"
                                                        id="sidebarDropdown_0">
                                                        <div class="accordion-item border-0">
                                                            <div class="list-start" id="flush-headingOne_0">
                                                                <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                                                    class="nav-link collapsed" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne_2"
                                                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                                                    tabindex="0">
                                                                    @if (Session::get('locale') == 'hi')
                                                                        {{ $trees->name_hi ?? '' }}
                                                                    @else
                                                                        {{ $trees->name_en ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div id="flush-collapseOne_2"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="flush-headingOne_0"
                                                                data-bs-parent="#sidebarDropdown_0">
                                                                <div class="accordion-body p-0">
                                                                    <ul class="p-0 m-0 mt-3">
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-1951-to-1960') }}">RSBK
                                                                                Directory From 1951 to 1960</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-1961-to-1970') }}">RSBK
                                                                                Directory From 1961 to 1970</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-1971-to-1980') }}">RSBK
                                                                                Directory From 1971 to 1980</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-1981-to-1990') }}">RSBK
                                                                                Directory From 1981 to 1990</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-1991-to-2000') }}">RSBK
                                                                                Directory From 1991 to 2000</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-2001-to-2005') }}">RSBK
                                                                                Directory From 2001 to 2005</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-2006-to-2010') }}">RSBK
                                                                                Directory From 2006 to 2010</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-2011-to-2015') }}">RSBK
                                                                                Directory From 2011 to 2015</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-2016-to-2020') }}">RSBK
                                                                                Directory From 2016 to 2020</a></li>
                                                                        <li><a
                                                                                href="{{ url('rsbk-directory-from-2021-to-2023') }}">RSBK
                                                                                Directory From 2021 to 2023</a></li>
                                                                        <!-- Add more submenu items as needed -->
                                                                    </ul>
                                                                </div>

                                                            </div>


                                                    </li>
                                                @else
                                                    <li class="nav-item @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                                                        role="presentation">
                                                        <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                                            class="nav-link ">
                                                            @if (Session::get('locale') == 'hi')
                                                                {{ $trees->name_hi ?? '' }}
                                                            @else
                                                                {{ $trees->name_en ?? '' }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endif
                            @if (isset($isFooterMenu))
                                @if (isset($footerMenu))
                                    <div class="main-sidebar " id="main-sidebar">
                                        <ul class="" id="newsTab" role="tablist">

                                            <h3 class="heading-txt-styl">
                                                Footer Menu
                                            </h3>

                                            @if (isset($footerMenu) && count($footerMenu) > 0)
                                                @foreach ($footerMenu as $index => $fmenu)
                                                    <li class="nav-item @if (request()->is($fmenu->url)) active @endif"
                                                        role="presentation">
                                                        <a href="{{ url($fmenu->url) }}" class="nav-link">
                                                            @if (Session::get('locale') == 'hi')
                                                                {{ $fmenu->name_hi }}
                                                            @else
                                                                {{ $fmenu->name_en }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            @endif
                            @if (isset($quickLink) && count($quickLink) > 0)
                                <ul class="nav-qm nav-tabs" id="newsTab" role="tablist">
                                    <h3 class=" quick-menu-head-stl text-center mt-1">
                                        @if (Session::get('locale') == 'hi')
                                            जल्दी तैयार होने वाला मेनू
                                        @else
                                            Quick Menu
                                        @endif
                                    </h3>
                                    @foreach ($quickLink as $quickLinks)
                                        @php
                                            $quickLinksurl = $quickLinks->url ?? 'javascript:void(0)';
                                        @endphp
                                        <li class="nav-item nav-item-qm d-flex align-items-center @if (request()->is($quickLinksurl)) active @endif"
                                            role="presentation">
                                            <a href="{{ url($quickLinksurl) ?? '' }}" class="nav-link ">
                                                @if (Session::get('locale') == 'hi')
                                                    {{ $quickLinks->name_hi ?? '' }}
                                                @else
                                                    {{ $quickLinks->name_en ?? '' }}
                                                @endif
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    {{-- side menu end --}}
                    <div class="col-lg-8 col-md-8">
                        <div class="bg-white p-2">
                            <div>
                                <h1 class="text-capitalize">
                                    @if (Session::get('locale') == 'hi')
                                        {{ $news->title_name_hi }}
                                    @else
                                        {{ $news->title_name_en }}
                                    @endif
                                </h1>
                            </div>
                            <div class="news-details">
                                <div class="news-details-content">
                                    <div class="news-details-desc">
                                        @if (Session::get('locale') == 'hi')
                                            {!! $news->description_hi !!}
                                        @else
                                            {!! $news->description_en !!}
                                        @endif
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
