@extends('layout.master')

@section('title')
    {{ __('RAV') }}
@endsection
@section('content')
    <section class="breadcrumb">

        {{-- banner start --}}
        @if (isset($organizedData['banner']) && $organizedData['banner'] != '')
            <div class="breadcrumb-img">
                <img src="{{ asset('resources/uploads/pagebanner/' . $organizedData['banner']->public_url) ??"" }}"
                    alt="{{ $organizedData['banner']->image_title ?? '' }}" title="{{ $organizedData['banner']->image_title ?? '' }}" />
            </div>
        @else
            <div class="breadcrumb-img">
                <img src="{{ asset('assets/images/bredcrumb.jpg') ??'' }}" alt="" />
            </div>
        @endif
        {{-- banner end --}}
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
                    <li>{{ $title_name ?? '' }}</li>
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
                                <ul class="nav nav-tabs" id="newsTab" role="tablist">
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
                                                <p>Child Menu Design Pendind</p>
                                            @else
                                                <li class="nav-item" role="presentation">
                                                    <a href="{{ url($parentMenuUrl . '/' . $treesUrl) }}"
                                                        class="nav-link @if (request()->is($parentMenuUrl . '/' . $treesUrl)) active @endif">
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

                                @if (isset($content))
                                    <h1>{{ $content }}</h1>
                                @endif

                                <h1>
                                    @if (isset($organizedData['metatag']->page_title_en) && !blank($organizedData['metatag']->page_title_en))
                                        @if (Session::get('locale') == 'hi')
                                            {{ $organizedData['metatag']->page_title_hi ?? '' }}
                                        @else
                                            {{ $organizedData['metatag']->page_title_en ?? '' }}
                                        @endif
                                    @endif
                                </h1>

                                @if (isset($organizedData['content']->page_content_en) && !blank($organizedData['content']->page_content_en))
                                    <p>
                                        @if (Session::get('locale') == 'hi')
                                            {!! $organizedData['content']->page_content_hi ?? '' !!}
                                        @else
                                            {!! $organizedData['content']->page_content_en ?? '' !!}
                                        @endif
                                    </p>
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


                                {{-- pdf content start --}}
                                @if (isset($organizedData['pdf']) && count($organizedData['pdf']) > 0)
                                    <table class="dataTable">
                                        <thead>
                                            <tr>
                                                <th> Title</th>
                                                <th> Date</th>
                                                <th> View/Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($organizedData['pdf']  as  $data)
                                            <tr>
                                                <td>{{ $data->pdf_title  ??'' }}</td>
                                                <td>{{ date('d F Y', strtotime($data->start_date ??'')) }}</td>
                                                <td><a href="{{ asset('resources/uploads/PageContentPdf/'.$data->public_url) }}" download>View</a> <i class="fa fa-file-pdf-o"> ({{ $data->pdfimage_size  ??"" }})</i>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        </thead>
                                    </table>
                                @endif
                                {{-- pdf content end --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
