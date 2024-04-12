@extends('layout.master')
@section('title')
    {{ $title_name ?? __('RAV') }}
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
            <h3 class="title">
                {{ isset($organizedData['metatag']->meta_title) ? $organizedData['metatag']->meta_title : $title_name }}
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
                    @if ($title_name == 'Career' || $title_name == 'Vacancy' || $title_name == 'Tenders')
                        <li><a>{{ ucfirst(strtolower($title_name)) ?? '' }}</a></li>
                    @else
                        @if (isset($finalBred))
                           @if ($finalBred != '')
                           <li><a>{{ ucfirst(strtolower($finalBred)) ?? '' }}</a></li>
                           @endif
                        @endif
                        @if (isset($lastBred))
                            @if ($lastBred != '')
                            <li><a>{{ ucfirst(strtolower($lastBred)) ?? '' }}</a></li>
                            @endif
                        @endif
                        @if (isset($middelBred))
                            @if ($middelBred != '')
                                <li><a>{{ ucfirst(strtolower($middelBred)) ?? '' }}</a></li>
                            @endif
                        @endif
                        <li>{{  $title_name ?? $organizedData['metatag']->meta_title }}</li>
                    @endif

                </ul>
            </div>
        </div>
        <section class="master bg-grey" id="main-content">
            <div class="container">
                <div class="news-tab common-tab side-tab1">
                    <div class="row">
                        {{-- side menu start --}}
                        <div class="col-lg-3 col-md-3">
                            {{-- @dd($tree); --}}
                            @if (isset($displayRsbkMenu) && $displayRsbkMenu == 1)
                                <x-rsbk-directory-menu />
                            @elseif (isset($parentMenut) && $parentMenut != '' && !isset($displayRsbkMenu))
                                <div class="main-sidebar" id="main-sidebar">
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
                            @if ($isFooterMenu)
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
                        {{-- side menu end --}}
                        <div class="col-md-8 col-lg-8 ">
                            <div class="about">
                                @if (isset($cabinetMinisterData) && $cabinetMinisterData != '')
                                    <h1>{{ $title_name ?? '' }}</h1>
                                    <div class="message-tab-img">
                                        <a href="#" class="video-wrap">
                                            <div class="video-img common-video-img">
                                                {{-- <img src="../assets/images/sarbanada-sonowal.jpg" alt="video"
                                                    class="img-fluid rounded rounded-4"> --}}


                                                <img src="{{ asset('resources/uploads/empDirectory/' . $cabinetMinisterData->public_url) }}"
                                                    alt=" {{ $cabinetMinisterData->fname_en }} {{ $cabinetMinisterData->mname_en }} {{ $cabinetMinisterData->lname_en }} "
                                                    title=" {{ $cabinetMinisterData->fname_en }} {{ $cabinetMinisterData->mname_en }} {{ $cabinetMinisterData->lname_en }} "
                                                    loading="lazy" class="img-fluid rounded rounded-4">

                                            </div>
                                        </a>
                                    </div>



                                    <h3 class="text-capitalize">{{ $cabinetMinisterData->fname_en }}
                                        {{ $cabinetMinisterData->mname_en }}
                                        {{ $cabinetMinisterData->lname_en }} </h3>
                                    <p class="cabinate-minister">
                                        {{ getEmployeeDepartment($cabinetMinisterData->department_id) }}</p>
                                    <div>
                                        {!! $cabinetMinisterData->description_en !!}
                                    </div>
                                @endif
                                @if (isset($stateMinister) && $stateMinister != '')
                                    <h1>{{ $title_name ?? '' }}</h1>
                                    <div class="message-tab-img">
                                        <a href="#" class="video-wrap">
                                            <div class="video-img common-video-img">
                                                <img src="{{ asset('resources/uploads/empDirectory/' . $stateMinister->public_url) }}"
                                                    alt=" {{ $stateMinister->fname_en }} {{ $stateMinister->mname_en }} {{ $stateMinister->lname_en }} "
                                                    title=" {{ $stateMinister->fname_en }} {{ $stateMinister->mname_en }} {{ $stateMinister->lname_en }} "
                                                    loading="lazy" class="img-fluid rounded rounded-4">

                                            </div>
                                        </a>
                                    </div>



                                    <h3 class="text-capitalize">{{ $stateMinister->fname_en }}
                                        {{ $stateMinister->mname_en }}
                                        {{ $stateMinister->lname_en }} </h3>
                                    <p class="cabinate-minister">
                                        {{ getEmployeeDepartment($stateMinister->department_id) }}</p>
                                    <div>
                                        {!! $stateMinister->description_en !!}
                                    </div>
                                @endif

                                @if (isset($content))
                                    <h1>{{ $formName ?? '' }}</h1>
                                    @if (isset($dynamicFormData))
                                        @if ($dynamicFormData == 1)
                                            <table class="dataTable no-footer table-responsive" id="DataTables_Table_0"
                                                aria-describedby="DataTables_Table_0_info">
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
                                                        @if (
                                                            $title_name == 'Ph. D' ||
                                                                $title_name == 'Ph. D' ||
                                                                $title_name == 'P. G' ||
                                                                $title_name == 'M.D' ||
                                                                $title_name == 'Delhi' ||
                                                                $title_name == 'Goa' ||
                                                                $title_name == 'Gujarat' ||
                                                                $title_name == 'Himachal Pradesh' ||
                                                                $title_name == 'Karnataka' ||
                                                                $title_name == 'Kerala' ||
                                                                $title_name == 'Madhya Pradesh' ||
                                                                $title_name == 'Chhattisgarh' ||
                                                                $title_name == 'Maharashtra' ||
                                                                $title_name == 'Odisha' ||
                                                                $title_name == 'Punjab' ||
                                                                $title_name == 'Rajasthan' ||
                                                                $title_name == ' Uttar Pradesh' ||
                                                                $title_name == 'Uttarakhand' ||
                                                                $title_name == 'RSBK Directory From 1951 to 1960' ||
                                                                $title_name == 'RSBK Directory From 1961 to 1970' ||
                                                                $title_name == 'RSBK Directory From 1971 to 1980' ||
                                                                $title_name == 'RSBK Directory From 1981 to 1990' ||
                                                                $title_name == 'RSBK Directory From 1991 to 2000' ||
                                                                $title_name == 'RSBK Directory From 2001 to 2005' ||
                                                                $title_name == 'RSBK Directory From 2006 to 2010' ||
                                                                $title_name == 'RSBK Directory From 2011 to 2015' ||
                                                                $title_name == 'RSBK Directory From 2016 to 2020' ||
                                                                $title_name == 'RSBK Directory From 2021 to 2023')
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
                                                            <td>
                                                                @if (isset($data['institute-name']))
                                                                    {{ $data['institute-name'] ?? '' }}
                                                                @elseif($data['name_of_college'])
                                                                    {{ $data['name_of_college'] ?? '' }}
                                                                @endif
                                                            </td>
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
                                                                @elseif(isset($data['name_of_qualification']))
                                                                    {{ $data['name_of_qualification'] }}
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
                                                                @elseif(isset($data['title_of_research']))
                                                                    {{ $data['title_of_research'] }}
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
                                                                @elseif(isset($data['name_of_schloar']))
                                                                    {{ $data['name_of_schloar'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['Name-Guide']))
                                                                    {{ $data['Name-Guide'] }}
                                                                @elseif (isset($data['guide-name']))
                                                                    {{ $data['guide-name'] }}
                                                                @elseif (isset($data['Guide-Name']))
                                                                    {{ $data['Guide-Name'] }}
                                                                @elseif (isset($data['name_of_guide']))
                                                                    {{ $data['name_of_guide'] }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if (isset($data['Name-Co-Guide']))
                                                                    {{ $data['Name-Co-Guide'] }}
                                                                @elseif (isset($data['co-guide-name']))
                                                                    {{ $data['co-guide-name'] }}
                                                                @elseif (isset($data['name_of_co_guide']))
                                                                    {{ $data['name_of_co_guide'] }}
                                                                @endif
                                                            </td>
                                                            @if (
                                                                $title_name == 'Ph. D' ||
                                                                    $title_name == 'Ph. D' ||
                                                                    $title_name == 'P. G' ||
                                                                    $title_name == 'M.D' ||
                                                                    $title_name == 'Delhi' ||
                                                                    $title_name == 'Goa' ||
                                                                    $title_name == 'Gujarat' ||
                                                                    $title_name == 'Himachal Pradesh' ||
                                                                    $title_name == 'Karnataka' ||
                                                                    $title_name == 'Kerala' ||
                                                                    $title_name == 'Madhya Pradesh' ||
                                                                    $title_name == 'Chhattisgarh' ||
                                                                    $title_name == 'Maharashtra' ||
                                                                    $title_name == 'Odisha' ||
                                                                    $title_name == 'Punjab' ||
                                                                    $title_name == 'Rajasthan' ||
                                                                    $title_name == ' Uttar Pradesh' ||
                                                                    $title_name == 'Uttarakhand' ||
                                                                    $title_name == 'RSBK Directory From 1951 to 1960' ||
                                                                    $title_name == 'RSBK Directory From 1961 to 1970' ||
                                                                    $title_name == 'RSBK Directory From 1971 to 1980' ||
                                                                    $title_name == 'RSBK Directory From 1981 to 1990' ||
                                                                    $title_name == 'RSBK Directory From 1991 to 2000' ||
                                                                    $title_name == 'RSBK Directory From 2001 to 2005' ||
                                                                    $title_name == 'RSBK Directory From 2006 to 2010' ||
                                                                    $title_name == 'RSBK Directory From 2011 to 2015' ||
                                                                    $title_name == 'RSBK Directory From 2016 to 2020' ||
                                                                    $title_name == 'RSBK Directory From 2021 to 2023')
                                                                <td>
                                                                    @if (isset($data['DiscussionConclusion']))
                                                                        {{ $data['DiscussionConclusion'] }}
                                                                    @elseif(isset($data['discussion_conclusion']))
                                                                        {{ $data['discussion_conclusion'] }}
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if (isset($data['Functional-Pharmacy']))
                                                                        {{ $data['Functional-Pharmacy'] }}
                                                                    @elseif (isset($data['working-pharmacy']))
                                                                        {{ $data['working-pharmacy'] }}
                                                                    @elseif(isset($data['working_functional_pharmacy']))
                                                                        {{ $data['working_functional_pharmacy'] }}
                                                                    @endif
                                                                </td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @elseif (isset($directorData) && $directorData != '')
                                        <h1>{{ $title_name ?? '' }}</h1>
                                        <div class="message-tab-img">
                                            <a href="#" class="video-wrap">
                                                <div class="video-img common-video-img">
                                                    <img src="{{ asset('resources/uploads/empDirectory/' . $directorData->public_url) }}"
                                                        alt=" {{ $directorData->fname_en }} {{ $directorData->mname_en }} {{ $directorData->lname_en }} "
                                                        title=" {{ $directorData->fname_en }} {{ $directorData->mname_en }} {{ $directorData->lname_en }} "
                                                        loading="lazy" class="img-fluid rounded rounded-4">

                                                </div>
                                            </a>
                                        </div>



                                        <h3 class="text-capitalize">{{ $directorData->fname_en }}
                                            {{ $directorData->mname_en }}
                                            {{ $directorData->lname_en }} </h3>
                                        <p class="cabinate-minister">
                                            {{ getEmployeeDepartment($directorData->department_id) }}</p>
                                        <div>
                                            {!! $directorData->description_en !!}
                                        </div>
                                    @elseif (isset($secretaryData) && $secretaryData != '')
                                        <h1>{{ $title_name ?? '' }}</h1>
                                        <div class="message-tab-img">
                                            <a href="#" class="video-wrap">
                                                <div class="video-img common-video-img">
                                                    <img src="{{ asset('resources/uploads/empDirectory/' . $secretaryData->public_url) }}"
                                                        alt=" {{ $secretaryData->fname_en }} {{ $secretaryData->mname_en }} {{ $secretaryData->lname_en }} "
                                                        title=" {{ $secretaryData->fname_en }} {{ $secretaryData->mname_en }} {{ $secretaryData->lname_en }} "
                                                        loading="lazy" class="img-fluid rounded rounded-4">

                                                </div>
                                            </a>
                                        </div>



                                        <h3 class="text-capitalize">{{ $secretaryData->fname_en }}
                                            {{ $secretaryData->mname_en }}
                                            {{ $secretaryData->lname_en }} </h3>
                                        <p class="cabinate-minister">
                                            {{ getEmployeeDepartment($secretaryData->department_id) }}</p>
                                        <div>
                                            {!! $secretaryData->description_en !!}
                                        </div>
                                    @elseif (isset($tenders) && count($tenders) > 0)
                                        <h1>{{ $title_name ?? '' }}</h1>
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
                                                @foreach ($tenders as $tender)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if (Session::get('locale') == 'hi')
                                                                {{ $tender->title_name_hi }}
                                                            @else
                                                                {{ $tender->title_name_en }}
                                                            @endif
                                                        </td>
                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($tender->start_date)->format('d F Y') }}
                                                        </td>
                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($tender->end_date)->format('d F Y') }}
                                                        </td>
                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($tender->opening_date)->format('d F Y') }}
                                                        </td>
                                                        <td>
                                                            <a target="{{ $tender->tab_type == 1 ? '_blank' : '' }}"
                                                                class="link-primary"
                                                                href="{{ asset('resources/uploads/TenderManagement/' . $tender->public_url) }}"
                                                                download>
                                                                View
                                                            </a> <i class="fa fa-file-pdf-o">
                                                            </i>({{ $tender->pdf_size ?? '' }})
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif (isset($careers) && count($careers) > 0)
                                        <h1>{{ $title_name ?? '' }}</h1>
                                        <table class="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No.</th>
                                                    <th> Title</th>
                                                    <th>Published Date</th>
                                                    <th>Submission Date</th>
                                                    <th>View/Download</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($careers as $career)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            @if (Session::get('locale') == 'hi')
                                                                {{ $career->pdf_title }}
                                                            @else
                                                                {{ $career->pdf_title }}
                                                            @endif
                                                        </td>
                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($career->career_start_date)->format('d F Y') }}
                                                        </td>
                                                        <td class="text-nowrap">{{ \Carbon\Carbon::parse($career->career_end_date)->format('d F Y') }}
                                                        </td>
                                                        <td>
                                                            <a class="link-primary"
                                                                href="{{ asset('resources/uploads/CareerManagement/' . $career->public_url) }}"
                                                                download>
                                                                View
                                                            </a> <i class="fa fa-file-pdf-o">
                                                            </i>({{ $career->pdfimage_size ?? '' }})
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        {!! $content !!}
                                    @endif
                                    @if (isset($rsbkDirectoryInstituteWise) && $rsbkDirectoryInstituteWise == 1)
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
                                @if (isset($governingBodyDepartments) && count($governingBodyDepartments) > 0)
                                    @foreach ($governingBodyDepartments as $department)
                                        @if ($department->name_en == 'Director')
                                            @php
                                                $employees = getEmployeeData($department->uid);
                                            @endphp
                                            @if (count($employees))
                                                <div class="row d-flex justify-content-center">
                                                    <h5 tabindex="0"><span
                                                            tabindex="0">{{ $department->name_en ?? '' }}</span>
                                                    </h5>
                                                    @foreach ($employees as $employee)
                                                        <div class="col-md-4">
                                                            <div class="addevent-box top text-center mt-0">
                                                                <a href="javascript:void(0)">

                                                                </a><a href="javascript:void(0)">
                                                                    <div class="profile-img">
                                                                        <img src="{{ asset('resources/uploads/empDirectory/' . $employee->public_url) }}"
                                                                            alt=" {{ $employee->fname_en }} {{ $employee->mname_en }} {{ $employee->lname_en }} "
                                                                            title=" {{ $employee->fname_en }} {{ $employee->mname_en }} {{ $employee->lname_en }} "
                                                                            loading="lazy">
                                                                    </div>
                                                                </a>

                                                                <h5 tabindex="0"> {{ $employee->fname_en }}
                                                                    {{ $employee->mname_en }}
                                                                    {{ $employee->lname_en }}
                                                                </h5>
                                                                <h6 tabindex="0"> {{ $department->name_en }}
                                                                </h6>
                                                                <h6 tabindex="0">
                                                                    {{ getEmployeeDesignation($employee->designation_id) }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                    @foreach ($governingBodyDepartments as $department)
                                        @if ($department->name_en != 'Director')
                                            @php
                                                $employees = getEmployeeData($department->uid);
                                            @endphp


                                            @if (count($employees))
                                                <div class="row d-flex justify-content-center">
                                                    <h5 tabindex="0"><span
                                                            tabindex="0">{{ $department->name_en ?? '' }}</span>
                                                    </h5>
                                                    @foreach ($employees as $employee)
                                                        <div class="col-md-4">
                                                            <div class="addevent-box top text-center mt-0">
                                                                <a href="javascript:void(0)">

                                                                </a><a href="javascript:void(0)">
                                                                    <div class="profile-img">
                                                                        <img src="{{ asset('resources/uploads/empDirectory/' . $employee->public_url) }}"
                                                                            alt=" {{ $employee->fname_en }} {{ $employee->mname_en }} {{ $employee->lname_en }} "
                                                                            title=" {{ $employee->fname_en }} {{ $employee->mname_en }} {{ $employee->lname_en }} "
                                                                            loading="lazy">
                                                                    </div>
                                                                </a>

                                                                <h5 tabindex="0"> {{ $employee->fname_en }}
                                                                    {{ $employee->mname_en }}
                                                                    {{ $employee->lname_en }}
                                                                </h5>
                                                                <h6 tabindex="0"> {{ $department->name_en }}
                                                                </h6>
                                                                <h6 tabindex="0">
                                                                    {{ getEmployeeDesignation($employee->designation_id) }}
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @else
                                    @if (isset($organizedData['content']->page_content_en) && !blank($organizedData['content']->page_content_en))
                                        <p>
                                            @if (Session::get('locale') == 'hi')
                                                {!! $organizedData['content']->page_content_hi ?? '' !!}
                                            @else
                                                {!! $organizedData['content']->page_content_en ?? '' !!}
                                            @endif
                                        </p>
                                    @endif
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
                                                                    title="{{ $data->image_title ?? '' }}" /></a>
                                                        </div>
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
                                                    <td class="text-nowrap">{{ date('d F Y', strtotime($data->start_date ?? '')) }}</td>
                                                    <td><a href="{{ asset('resources/uploads/PageContentPdf/' . $data->public_url) }}"
                                                            download>View</a>
                                                        <i class="fa fa-file-pdf-o text-danger"> </i>
                                                        ({{ $data->pdfimage_size ?? '' }})
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
