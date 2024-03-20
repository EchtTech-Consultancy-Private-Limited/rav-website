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
                    {{-- side menu start --}}
                    <div class="col-lg-3 col-md-3">
                        {{-- @dd($tree); --}}
                        @if (isset($parentMenut) && $parentMenut != '')
                        <div class="main-sidebar" id="main-sidebar">
                            <ul class="" id="newsTab" role="tablist">
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
                                @if (count($trees->children) > 0)
                                <li class="accordion accordion-flush position-relative sl-accordion"
                                    id="sidebarDropdown_{{ $index }}">
                                    <div class="accordion-item">
                                        <div class="list-start" id="flush-headingOne_{{ $index }}">
                                            <a class="nav-link collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne_{{ $index }}" aria-expanded="false"
                                                aria-controls="flush-collapseOne" tabindex="0">
                                                @if (Session::get('Lang') == 'hi')
                                                {{ $trees->name_hi ?? '' }}
                                                @else
                                                {{ $trees->name_en ?? '' }}
                                                @endif
                                            </a>
                                        </div>
                                        <div id="flush-collapseOne_{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne_{{ $index }}"
                                            data-bs-parent="#sidebarDropdown_{{ $index }}">
                                            <div class="accordion-body p-0">
                                                <ul class='p-0 m-0 mt-3'>
                                                    @foreach ($trees->children as $k => $childTree)
                                                    @php
                                                    $chiltreeUrl = $childTree->url ?? '';
                                                    @endphp
                                                    @if (isset($childTree->children) && count($childTree->children) > 0)
                                                    <li class="accordion accordion-flush position-relative fl-accordion"
                                                        id="fl_sidebarDropdown_{{ $k }}">
                                                        <div class="accordion-item">
                                                            <div class="list-start" id="fl_flush_headingOne_{{ $k }}">
                                                                <a class="nav-link collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#fl_flush_collapseOne_{{ $k }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="fl_flush_collapseOne_{{ $k }}"
                                                                    tabindex="0">
                                                                    @if (Session::get('Lang') == 'hi')
                                                                    {{ $childTree->name_hi ?? '' }}
                                                                    @else
                                                                    {{ $childTree->name_en ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div id="fl_flush_collapseOne_{{ $k }}"
                                                                class="accordion-collapse collapse"
                                                                aria-labelledby="fl_flush_headingOne_{{ $k }}"
                                                                data-bs-parent="#fl_sidebarDropdown_{{ $k }}">
                                                                <div class="accordion-body p-0">
                                                                    <ul class="p-0 m-0 mt-3">
                                                                        @foreach ($childTree->children as $finalChild)
                                                                        @php
                                                                        $finalChildUrl = $finalChild->url ?? '';
                                                                        @endphp
                                                                        <li
                                                                            class="@if (request()->is($parentMenuUrl . '/' . $treesUrl . '/' . $chiltreeUrl . '/' . $finalChildUrl)) qm-active @endif">
                                                                            <a
                                                                                href="{{ url($parentMenuUrl . '/' . $treesUrl . '/' . $chiltreeUrl . '/' . $finalChildUrl) }}">
                                                                                @if (Session::get('Lang') == 'hi')
                                                                                {{ $finalChild->name_hi ?? '' }}
                                                                                @else
                                                                                {{ $finalChild->name_en ?? '' }}
                                                                                @endif
                                                                            </a>
                                                                        </li>
                                                                        @endforeach
                                                                        <!-- nested layer -->
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li
                                                        class="@if (request()->is($parentMenuUrl . '/' . $treesUrl . '/' . $chiltreeUrl)) qm-active @endif">
                                                        <a href="{{ url($parentMenuUrl . '/' . $treesUrl . '/' . $chiltreeUrl) }}"
                                                            class="">
                                                            @if (Session::get('Lang') == 'hi')
                                                            {{ $childTree->name_hi ?? '' }}
                                                            @else
                                                            {{ $childTree->name_en ?? '' }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif"
                                    role="presentation">
                                    <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}" class="nav-link ">
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
                        @if (isset($quickLink) && count($quickLink) > 0)
                        <ul class="nav-qm nav-tabs mt-3" id="newsTab" role="tablist">
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
                            <li class="nav-item nav-item-qm d-flex align-items-center" role="presentation">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i> <a title="link"
                                    href="{{ url($quickLinksurl) ?? '' }}"
                                    class="nav-link @if (request()->is($quickLinksurl)) active @endif">
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
                    {{-- side menu end --}}
                    <div class="col-md-8 col-lg-8 ">
                        <div class="about">
                            <h1>
                                Governing Body
                            </h1>

                            <div class="row d-flex justify-content-center">
                                <h5 tabindex="0"><span tabindex="0">Director</span></h5>
                                <div class="col-md-4">
                                    <div class="addevent-box top text-center mt-0">
                                        <a href="javascript:void(0)">

                                        </a><a href="javascript:void(0)">
                                            <div class="profile-img">
                                                <img src="https://iimkashipur.ac.in/uploads/organisation/171013985881.jpg"
                                                    alt="SHRI SANDEEP SINGH" title="SHRI SANDEEP SINGH" loading="lazy">
                                            </div>
                                        </a>

                                        <h5 tabindex="0"> SHRI SANDEEP SINGH </h5>
                                        <h6 tabindex="0"> Interim Chairperson, BoG IIM Kashipur </h6>
                                        <h6 tabindex="0"> Author and Independent Director </h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <h5 tabindex="0"><span tabindex="0">Director</span></h5>
                                <div class="col-md-4">
                                    <div class="addevent-box top text-center mt-0">
                                        <a href="javascript:void(0)">

                                        </a><a href="javascript:void(0)">
                                            <div class="profile-img">
                                                <img src="https://iimkashipur.ac.in/uploads/organisation/171013985881.jpg"
                                                    alt="SHRI SANDEEP SINGH" title="SHRI SANDEEP SINGH" loading="lazy">
                                            </div>
                                        </a>

                                        <h5 tabindex="0"> SHRI SANDEEP SINGH </h5>
                                        <h6 tabindex="0"> Interim Chairperson, BoG IIM Kashipur </h6>
                                        <h6 tabindex="0"> Author and Independent Director </h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="addevent-box top text-center mt-0">
                                        <a href="javascript:void(0)">

                                        </a><a href="javascript:void(0)">
                                            <div class="profile-img">
                                                <img src="https://iimkashipur.ac.in/uploads/organisation/171013985881.jpg"
                                                    alt="SHRI SANDEEP SINGH" title="SHRI SANDEEP SINGH" loading="lazy">
                                            </div>
                                        </a>

                                        <h5 tabindex="0"> SHRI SANDEEP SINGH </h5>
                                        <h6 tabindex="0"> Interim Chairperson, BoG IIM Kashipur </h6>
                                        <h6 tabindex="0"> Author and Independent Director </h6>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="addevent-box top text-center mt-0">
                                        <a href="javascript:void(0)">

                                        </a><a href="javascript:void(0)">
                                            <div class="profile-img">
                                                <img src="https://iimkashipur.ac.in/uploads/organisation/171013985881.jpg"
                                                    alt="SHRI SANDEEP SINGH" title="SHRI SANDEEP SINGH" loading="lazy">
                                            </div>
                                        </a>

                                        <h5 tabindex="0"> SHRI SANDEEP SINGH </h5>
                                        <h6 tabindex="0"> Interim Chairperson, BoG IIM Kashipur </h6>
                                        <h6 tabindex="0"> Author and Independent Director </h6>
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