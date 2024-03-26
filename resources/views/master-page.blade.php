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
                                                            <div class="list-start"
                                                                id="flush-headingOne_{{ $index }}">
                                                                <a class="nav-link collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne_{{ $index }}"
                                                                    aria-expanded="false" aria-controls="flush-collapseOne"
                                                                    tabindex="0">
                                                                    @if (Session::get('Lang') == 'hi')
                                                                        {{ $trees->name_hi ?? '' }}
                                                                    @else
                                                                        {{ $trees->name_en ?? '' }}
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div id="flush-collapseOne_{{ $index }}"
                                                                class="accordion-collapse collapse"
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
                                                                                        <div class="list-start"
                                                                                            id="fl_flush_headingOne_{{ $k }}">
                                                                                            <a class="nav-link collapsed"
                                                                                                type="button"
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
                                                                                                            $finalChildUrl =
                                                                                                                $finalChild->url ??
                                                                                                                '';
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
                            @if ($isFooterMenu)
                                @if (isset($footerMenu))
                                    <div class="main-sidebar mt-3" id="main-sidebar">
                                        <ul class="" id="newsTab" role="tablist">

                                            <h3 class="heading-txt-styl">
                                                Footer Menu
                                            </h3>

                                            @if (isset($footerMenu) && count($footerMenu) > 0)
                                                @foreach ($footerMenu as $index => $fmenu)
                                                    <li class="nav-item " role="presentation">
                                                        <a href="{{ url($fmenu->url) }}" class="nav-link ">
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
                                    <h1>{{ $formName ?? '' }}</h1>
                                    @if (isset($dynamicFormData))
                                        @if ($dynamicFormData == 1)
                                            <table style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.No.</th>
                                                        <th>Name</th>
                                                        <th>Designation</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($content as $item)
                                                        @php
                                                            $data = json_decode($item->content, true);
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $data['name'] }}</td>
                                                            <td>{{ $data['designation'] }}</td>
                                                            <td>{{ $data['email'] }}</td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    @elseif(isset($allFormData) && count($allFormData) > 0)
                                        {{-- @dd($title_name) --}}
                                        <h1>{{ $title_name ?? '' }}</h1>
                                        @php
                                            $formContentData = [];
                                        @endphp

                                        @foreach ($allFormData as $formData)
                                            @php
                                                $decodedContent = json_decode($formData->content, true);
                                                if ($decodedContent) {
                                                    $formContentData[] = $decodedContent;
                                                }
                                            @endphp
                                        @endforeach
                                        {{-- @dd( $formContentData) --}}
                                        <div class="table-responsive">
                                            <table class="dataTable no-footer table-responsive" id="DataTables_Table_0"
                                                aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                    <tr>
                                                        <!-- Define your table headers here -->
                                                        <th>Sr.No.</th>
                                                        <th>Institute Name</th>
                                                        <th>City</th>
                                                        <th>State</th>
                                                        <th>Qualification</th>
                                                        <th>Year</th>
                                                        <th>Title of Research</th>
                                                        <th>Scholar Name</th>
                                                        <th>Guide Name</th>
                                                        <th>Co-Guide Name</th>
                                                        @if ($title_name == 'Ph. D' || $title_name == 'Ph. D' || $title_name == 'P. G' || $title_name == 'M.D')
                                                            <th>
                                                                Discussion/Conclusion
                                                            </th>
                                                            <th>
                                                                Functional Pharmacy
                                                            </th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($formContentData as $data)
                                                        <tr>
                                                            <td>
                                                                {{ $loop->iteration }}
                                                            </td>
                                                            <td>{{ $data['institute-name'] ?? '' }}</td>
                                                            <td>
                                                                @if (isset($data['city']))
                                                                {{ $data['city'] ?? '' }}
                                                                @elseif(isset($data['City']))
                                                                    {{ $data['City'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['state']))
                                                                    {{ $data['state'] }}
                                                                @elseif(isset($data['State']))
                                                                    {{ $data['State'] }}
                                                                @endif
                                                                </td>
                                                            <td>
                                                                @if (isset($data['text-1710910855287-0']))
                                                                    {{ $data['text-1710910855287-0'] ?? '' }}
                                                                @elseif (isset($data['qualification-name']))
                                                                    {{ $data['qualification-name'] }}
                                                                @elseif(isset($data['qualificcation-name']))
                                                                    {{ $data['qualificcation-name'] }}
                                                                @elseif(isset($data['Name-Qualification']))
                                                                    {{ $data['Name-Qualification'] }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $data['year'] ?? $data['Year'] }}</td>
                                                            <td>
                                                                @if (isset($data['title-of-research']))
                                                                    {{ $data['title-of-research'] }}
                                                                @elseif(isset($data['Title-Research']))
                                                                    {{ $data['Title-Research'] }}
                                                                @elseif(isset($data['research-title']))
                                                                    {{ $data['research-title'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['schloar-name']))
                                                                    {{ $data['schloar-name'] ?? '' }}
                                                                @elseif(isset($data['text-1710931082891-0']))
                                                                    {{ $data['text-1710931082891-0'] }}
                                                                @elseif(isset($data['Schloar-Name']))
                                                                    {{ $data['Schloar-Name'] }}
                                                                @elseif(isset($data['Name-Schloar']))
                                                                    {{ $data['Name-Schloar'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['Name-Guide']))
                                                                    {{ $data['Name-Guide'] }}
                                                                @elseif (isset($data['guide-name']))
                                                                    {{ $data['guide-name'] }}
                                                                @elseif (isset($data['Guide-Name']))
                                                                    {{ $data['Guide-Name'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['Name-Co-Guide']))
                                                                    {{ $data['Name-Co-Guide'] }}
                                                                @elseif (isset($data['co-guide-name']))
                                                                    {{ $data['co-guide-name'] }}
                                                                @endif
                                                            </td>
                                                            @if ($title_name == 'Ph. D' || $title_name == 'Ph. D' || $title_name == 'P. G' || $title_name == 'M.D')
                                                                <td>{{ $data['DiscussionConclusion'] ?? '' }}</td>
                                                                <td>
                                                                    @if (isset($data['Functional-Pharmacy']))
                                                                        {{ $data['Functional-Pharmacy'] }}
                                                                    @elseif (isset($data['working-pharmacy']))
                                                                        {{ $data['working-pharmacy'] }}
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        {!! $content !!}
                                    @endif
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
                                            @foreach ($organizedData['pdf'] as $data)
                                                <tr>
                                                    <td>{{ $data->pdf_title ?? '' }}</td>
                                                    <td>{{ date('d F Y', strtotime($data->start_date ?? '')) }}</td>
                                                    <td><a href="{{ asset('resources/uploads/PageContentPdf/' . $data->public_url) }}"
                                                            download>View</a> <i class="fa fa-file-pdf-o">
                                                            ({{ $data->pdfimage_size ?? '' }})
                                                        </i>
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
