@extends('layout.master')
@section('title')
{{ $title_name ?? __('RAV | '.$breadcum1??'RAV') }}
@endsection
@section('content')
<section class="breadcrumb">
    <div class="page-breadcrumb">
        <div class="breadcrumb-img">
            <img src="{{ asset('assets/images/bredcrumb.jpg') ?? '' }}" alt="master" title="master" />
        </div>
        <div class="breadcrumb-title">
            <h3 class="title">{{$breadcum1 ??''}}</h3>
        </div>
    </div>
</section>
<div class="main-body">
    <div class="container breadcrumbs-link">
        <div class="breadcrumbs-link-text">
            <ul>
                <li>
                    <a class="active" href="" tabindex="0"> @if(Session::get('locale') == 'hi') {{ 'होम पेज' }} @else
                        {{ 'Home' }} @endif </a>
                </li>
                <li>
                    {{$breadcum1 ??''}}
                </li>
                @if(isset($breadcum2) && $breadcum2 !='')
                <li>
                    {{$breadcum2??''}}
                </li>
                @endif
                @if(isset($breadcum3) && $breadcum3 !='')
                <li>
                    {{$breadcum3??''}}
                </li>
                @endif
            </ul>
        </div>
    </div>
    <section class="master bg-grey" id="main-content">
        <div class="container">
            <div class="news-tab common-tab side-tab1">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="main-sidebar" id="main-sidebar">
                            <ul>
                                <h3 class="heading-txt-styl">
                                    @if(Session::get('locale') == 'hi') {{ $sideMenu->main_menu->name_hi??'' }} @else
                                    {{ $sideMenu->main_menu->name_en??'' }} @endif
                                </h3>
                                @php if(Session::get('locale') == 'hi'){ $alrt ="return confirm('यह लिंक आपको एक बाहरी
                                वेब साइट पर ले जाएगा।')"; } else { $alrt ="return confirm('This link will take you to an
                                external web site.')"; } @endphp
                                @if(isset($sideMenu->main_menu->sub_menu) && count($sideMenu->main_menu->sub_menu)>0)
                                @foreach($sideMenu->main_menu->sub_menu as $key=>$subMenu)
                                <li class="@php if(isset($subMenu->sub_sub_menu) &&  count($subMenu->sub_sub_menu)>0){ echo 'accordion accordion-flush position-relative sl-accordion menu-active'; }elseif(isset($slug) && $subMenu->url ==$slug){ echo 'nav-item active';  }else{ echo ''; } @endphp"
                                    id="sidebarDropdown_{{$key}}">
                                    <div class="accordion-item border-0">
                                        <div class="list-start" id="flush-headingOne_0">
                                            <a href="@php if(isset($subMenu->sub_sub_menu) && count($subMenu->sub_sub_menu)>0){ echo 'javascript:void(0)'; }else{ 
                                                if(isset($subMenu->tab_type) && $subMenu->tab_type ==1){echo $subMenu->url; }else{ echo url($sideMenu->main_menu->url.'/'.$subMenu->url);
                                                } }
                                                @endphp"
                                                onclick="@php if($subMenu->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp"
                                                target="@php if(isset($subMenu->tab_type) && $subMenu->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp"
                                                class="nav-link @php if(isset($subMenu->sub_sub_menu) && count($subMenu->sub_sub_menu)>0){ echo'collapsed'; }else{ echo ''; } @endphp"
                                                data-bs-toggle="@php if(isset($subMenu->sub_sub_menu) && count($subMenu->sub_sub_menu)>0){ echo'collapse'; }else{ echo 'collapsed'; } @endphp"
                                                data-bs-target="#flush-collapseOne_{{$key}}" aria-expanded="false"
                                                aria-controls="flush-collapseOne" tabindex="0">
                                                @if(Session::get('locale') == 'hi') {{ $subMenu->name_hi??'' }} @else
                                                {{ $subMenu->name_en??'' }} @endif
                                            </a>
                                        </div>
                                        <div id="flush-collapseOne_{{$key}}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne_0"
                                            data-bs-parent="#sidebarDropdown_{{$key}}">
                                            <div class="accordion-body p-0">
                                                <ul class="p-0 m-0 mt-3">
                                                    @if(isset($subMenu->sub_sub_menu) &&
                                                    count($subMenu->sub_sub_menu)>0)
                                                    @foreach($subMenu->sub_sub_menu as $key=>$subsubMenu)
                                                    <li
                                                        class="@php if(isset($slug) && $subsubMenu->url ==$slug){ echo 'qm-active'; }else{ echo ''; } @endphp">
                                                        <a href="
                                                                @php if(isset($subsubMenu->tab_type) && $subsubMenu->tab_type ==1){echo $subsubMenu->url; }else{ echo url($sideMenu->main_menu->url.'/'.$subMenu->url.'/'.$subsubMenu->url ); } @endphp
                                                                "
                                                            onclick="@php if($subsubMenu->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp"
                                                            target="@php if(isset($subsubMenu->tab_type) && $subsubMenu->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp">
                                                            @if(Session::get('locale') == 'hi')
                                                            {{ $subsubMenu->name_hi??'' }} @else
                                                            {{ $subsubMenu->name_en??'' }} @endif
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <ul class="nav-qm nav-tabs" id="newsTab" role="tablist">
                            <h3 class=" quick-menu-head-stl text-center mt-1">
                                Quick Menu
                            </h3>
                            @if(isset($quickLink))
                            @foreach($quickLink as $quickLinks)
                            <li class="nav-item nav-item-qm d-flex align-items-center @php if(isset($slug) && $quickLinks->url ==$slug){ echo 'active'; }else{ echo ''; } @endphp"
                                role="presentation">
                                <a href="{{ url($quickLinks->url) }}"
                                    target="@php if(isset($quickLinks->tab_type) && $quickLinks->tab_type ==1){ echo'_blank'; }else{ echo ''; } @endphp"
                                    onclick="@php if($quickLinks->tab_type ==1){ echo $alrt; }else{ echo ''; } @endphp"
                                    class="nav-link ">
                                    @if(Session::get('locale') == 'hi') {{ $quickLinks->name_en??'' }} @else
                                    {{ $quickLinks->name_en??'' }} @endif
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    @if(isset($pageData->metaDatas) && $pageData->metaDatas !='' || $pageData->metaDatas != null || isset($pageData->formbuilderdata) && count($pageData->formbuilderdata)>0)
                    <div class="col-md-8 col-lg-8">
                        <div class="about">
                            <h2 class="subheading">
                            @if(Session::get('locale') == 'hi') {{ $pageData->metaDatas->page_title_hi??'' }} @else {{ $pageData->metaDatas->page_title_en??'' }} @endif
                            </h2>
                            <p>
                                @if(isset($pageData->pageContents))
                                    @if(Session::get('locale') == 'hi') {!! $pageData->pageContents->page_content_hi??'' !!} @else {!! $pageData->pageContents->page_content_en??'' !!} @endif
                                @endif
                            </p>

                            {{-- employee governing list --}}
                            @if (isset($departmentEmployees) && $departmentEmployees != '')
                            @foreach($departmentEmployees as $departmentEmployee)
                            {{-- @dd($departmentEmployee['data']->short_order); --}}
                                @if(!is_null($departmentEmployee['data']->short_order))
                                    <div class="row d-flex justify-content-center">
                                        <h5 tabindex="0"><span tabindex="0">{{ @$departmentEmployee['department'] }}</span>
                                        </h5>
                                        <div class="col-md-4">
                                            <div class="addevent-box top text-center mt-0">
                                                <a href="javascript:void(0)">
        
                                                </a><a href="javascript:void(0)">
                                                    <div class="profile-img">
                                                        <img src="{{ asset('resources/uploads/empDirectory/' . @$departmentEmployee['data']->public_url) }}"
                                                        alt=" {{ @$departmentEmployee['data']->fname_en }} {{ @$departmentEmployee['data']->mname_en }} {{ @$departmentEmployee['data']->lname_en }} "
                                                        title=" {{ @$departmentEmployee['data']->fname_en }} {{ @$departmentEmployee['data']->mname_en }} {{ @$departmentEmployee['data']->lname_en }} "
                                                        loading="lazy" class="img-fluid rounded rounded-4">
                                                    </div>
                                                </a>
        
                                                <h5 tabindex="0">
                                                    {{ $departmentEmployee['data']->fname_en }}
                                                    {{ $departmentEmployee['data']->mname_en }}
                                                    {{ $departmentEmployee['data']->lname_en }}</h5>
                                                <h6 tabindex="0"> {{ @$departmentEmployee['department'] }}</h6>
                                                <h6 tabindex="0"> {{ @$departmentEmployee['designation'] }}</h6>
                                                <h6 tabindex="0">
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                                <div class="row d-flex justify-content-center">
                                    <h5 tabindex="0"><span tabindex="0">{{ @$departmentEmployee['department'] }}</span>
                                    </h5>
                                @foreach($departmentEmployees as $departmentEmployee)
                                @if(is_null($departmentEmployee['data']->short_order))
                                    
                                        <div class="col-md-4">
                                            <div class="addevent-box top text-center mt-0">
                                                <a href="javascript:void(0)">
        
                                                </a><a href="javascript:void(0)">
                                                    <div class="profile-img">
                                                        <img src="{{ asset('resources/uploads/empDirectory/' . @$departmentEmployee['data']->public_url) }}"
                                                        alt=" {{ @$departmentEmployee['data']->fname_en }} {{ @$departmentEmployee['data']->mname_en }} {{ @$departmentEmployee['data']->lname_en }} "
                                                        title=" {{ @$departmentEmployee['data']->fname_en }} {{ @$departmentEmployee['data']->mname_en }} {{ @$departmentEmployee['data']->lname_en }} "
                                                        loading="lazy" class="img-fluid rounded rounded-4">
                                                    </div>
                                                </a>
        
                                                <h5 tabindex="0">
                                                    {{ $departmentEmployee['data']->fname_en }}
                                                    {{ $departmentEmployee['data']->mname_en }}
                                                    {{ $departmentEmployee['data']->lname_en }}</h5>
                                                <h6 tabindex="0"> {{ @$departmentEmployee['department'] }}</h6>
                                                <h6 tabindex="0"> {{ @$departmentEmployee['designation'] }}</h6>
                                                <h6 tabindex="0">
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
	                        @endif
                            {{-- END employee governing list --}}
                            @if(isset($pageData->pagePdfs) && count($pageData->pagePdfs)>0)
                            <table class="dataTable d-table" id="DataTables_Table_0"
                                aria-describedby="DataTables_Table_0_info" style="display: block;">
                                <thead>
                                    <tr>
                                    @if(isset($pageData->pagePdfs[0]->table_head) && $pageData->pagePdfs[0]->table_head !=0)
                                       @foreach(json_decode($pageData->pagePdfs[0]->table_head) as $head)
                                          <th>{{$head->tablehead}}</th>
                                       @endforeach
                                    @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($pageData->pagePdfs) && count($pageData->pagePdfs)>0)
                                        @foreach($pageData->pagePdfs as $key=>$pdfdata)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td>{{$pdfdata->pdf_title}}</td>
                                                <td class="views-field views-field-field-amount-rs- download" data-label="
                                                Request Doc">
                                                <a href="{{ asset('resources/uploads/PageContentPdf/'.$pdfdata->public_url) }}" download="" tabindex="0" target="_blank">
                                                    Download
                                                </a> <i class="fa fa-file-pdf-o text-danger ms-2"></i>  <span class="size">({{$pdfdata->pdfimage_size}})</span>
                                                </td>
                                                <td class="text-center">{{\Carbon\Carbon::parse($pdfdata->start_date)->format('d-M-Y')}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @endif

                            @if(isset($pageData->formbuilderdata) && count($pageData->formbuilderdata)>0)
                                <div class="">
                                    <table id="" class="dataTable display common-table d-block table-responsive" style="width:100%">
                                    <thead>
                                            <tr>
                                                @if(isset($pageData->formDataTableHead) && count($pageData->formDataTableHead)>0)
                                                    @foreach($pageData->formDataTableHead as $head)
                                                        <th>
                                                            {{  $head->label }}
                                                        </th>
                                                    @endforeach
                                                @endif
                                                
                                            </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($pageData->formbuilderdata) && count($pageData->formbuilderdata) > 0)
                                            @foreach($pageData->formbuilderdata as $formbuilderdatas)
                                                <tr>
                                                    @foreach($pageData->formDataTableHead as $head)
                                                        <td>
                                                            @if(isset($formbuilderdatas[$head->key]) && $formbuilderdatas[$head->key] !== null && $formbuilderdatas[$head->key] !== '')
                                                                {{ $formbuilderdatas[$head->key] }}
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                        @if(isset($pageData->pageGallerys) && count($pageData->pageGallerys)>0)
                        <div class="about rs-blog main-home master">
                            <h1>@if(Session::get('locale') == 'hi') {{ 'फोटो गैलरी' }} @else {{ 'Photo Gallery' }} @endif</h1>
                            <div class="row">
                            @foreach($pageData->pageGallerys as $key=>$pageGallery)
                                <div class="col-md-4">
                                    <div class="blog-item">
                                        <a href="https://www.ravdelhi.nic.in/photo-gallery-details/19fa693d-2dec-4282-ad87-e798f0dc4633"
                                            title="Rashtriya Ayurveda Vidyapeeth" tabindex="0">
                                            <div class="image-part">
                                                <img src="{{ asset('resources/uploads/PageContentGallery/'.$pageGallery->public_url) }}" alt="{{ $pageGallery->image_title??'' }}">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="col-md-8 col-lg-8">
                        <div class="about">
                            <h3 class="heading-red">
                                @if(Session::get('locale') == 'hi') {{ 'जल्द ही आ रहा हूँ' }} @else {{ 'Coming Soon' }} @endif
                            </h3>
                            <p class="desc-black">
                                @if(Session::get('locale') == 'hi') {{ 'जल्द ही आ रहा हूँ' }} @else {{ 'Coming Soon' }} @endif
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endsection