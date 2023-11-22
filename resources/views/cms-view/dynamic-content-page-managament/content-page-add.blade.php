@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Dashboard')}}
@endsection
@section('pageTitle')
 {{ __('Setting') }}
@endsection
@section('breadcrumbs')
 {{ __('Content Page Add') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/content-page-add.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
@if($textMessage =='')
   <!--begin::Card body-->
   <div class="card-body">
      <!--begin:::Tabs-->
      <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-transparent fs-4 fw-semibold mb-15">
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5 active" data-bs-toggle="tab" href="#kt_settings_basicInformation">
            <i class="ki-outline ki-home fs-2 me-2"></i> Basic Information
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageContent">
            <i class="ki-outline ki-shop fs-2 me-2"></i> Page Content
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageGallery">
            <i class="ki-outline ki-compass fs-2 me-2"></i> Page Gallery
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pagePdf">
            <i class="ki-outline ki-package fs-2 me-2"></i> Page PDF
            </a>
         </li>
         <!--end:::Tab item-->
         <!--begin:::Tab item-->
         <li class="nav-item">
            <a class="nav-link text-active-primary d-flex align-items-center pb-5" data-bs-toggle="tab" href="#kt_settings_pageBanner">
            <i class="ki-outline ki-package fs-2 me-2"></i> Page Banner
            </a>
         </li>
         <!--end:::Tab item-->
      </ul>
      <!--end:::Tabs-->
      <!--begin:::Tab content-->
      <div class="tab-content" id="myTabContent">
         <!--begin:::Tab pane-->
         <div class="tab-pane fade show active" id="kt_settings_basicInformation" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_basic_information_form" class="form">
               <!--begin::Heading-->
               <div class="row mb-7">
                  <div class="col-md-9 offset-md-3">
                     <h2>Basic Information</h2>
                  </div>
               </div>
               <!--end::Heading-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Select Menu</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <select class="form-select form-select-solid menu_id" name="menu_id" id="menu_id" data-control="select2" data-placeholder="Select an page title">
                           <option></option>
                           @foreach($menuName as $menuDt)
                               <option value="{{ $menuDt->uid }},{{$menuDt->url }}">{{ $menuDt->name_en  }} ({{ $menuDt->name_hi   }})</option>
                           @endforeach
                        </select>
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Page Title (English)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid page_title_en" id="page_title_en" name="page_title_en" value="" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">पृष्ठ का शीर्षक (हिन्दी में)</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid page_title_hi" id="page_title_hi" name="page_title_hi" value="" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Title</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid meta_title" id="meta_title" name="meta_title" value="" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Tag</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the title of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid meta_tag" id="meta_tag" name="meta_tag" value="" />
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Tag Description</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set the description of the store for SEO." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>     
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <textarea class="form-control form-control-solid" name="meta_description"></textarea>
                     <!--end::Input-->
                  </div>
               </div>
               <!--end::Input group-->
               <!--begin::Input group-->
               <div class="row fv-row mb-7">
                  <div class="col-md-3 text-md-end">
                     <!--begin::Label-->
                     <label class="fs-6 fw-semibold form-label mt-3">
                        <span class="required">Meta Keywords</span>
                        <span class="ms-1"  data-bs-toggle="tooltip" title="Set keywords for the store separated by a comma." >
                        <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>           
                     </label>
                     <!--end::Label-->
                  </div>
                  <div class="col-md-9">
                     <!--begin::Input-->
                     <input type="text" class="form-control form-control-solid" name="meta_keywords" value="" data-kt-ecommerce-settings-type="tagify" />
                     <!--end::Input-->
                  </div>
               </div>
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_basicInformation_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-basicInfo-btn">
                        <span class="indicator-label">
                        Save
                        </span>
                        <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pageContent" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_content_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id" name="pageTitle_id" id="pageTitle_id" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})  ({{ (ucwords(str_replace('-', ' ', $pageTitles->menu_slug))) }})</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Content</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                     <div>
                           <!--begin::Label-->
                           <label class="form-label required">Description (English)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en"></div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                        <div>
                           <!--begin::Label-->
                           <label class="form-label mt-8">विवरण (हिन्दी में)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi"></div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                     </div>
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagecontent_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-contentpage-btn">
                        <span class="indicator-label">
                        Save
                        </span>
                        <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pageGallery" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_gallery_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id1" name="pageTitle_id1" id="pageTitle_id1" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }})  ({{ (ucwords(str_replace('-', ' ', $pageTitles->menu_slug))) }})</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
                <!--begin::Pricing-->
                  <div class="card card-flush py-4">
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Gallery</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_Pagegallery_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <label class="required form-label mw-100 w-200px">Image Title</label>
                                 <label class="required form-label mw-100 w-200px" style="margin-left: 12px;">Start Date</label>
                                 <label class="required form-label mw-100 w-200px" style="margin-left: 12px;">End Start</label>
                                 <label class="required form-label mw-100 w-200px">Image Format</label>
                                 <div data-repeater-list="kt_Pagegallery_add_multiple_options" class="d-flex flex-column gap-3">
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <input type="text" class="form-control mw-100 w-200px" name="imagetitle" placeholder="image title Name" />
                                       <input type="date" class="form-control mw-100 w-200px" name="startdate" placeholder="" />
                                       <input type="date" class="form-control mw-100 w-200px" name="enddate" placeholder="" />
                                       <input type="file" class="form-control mw-100 w-200px checkmime" name="image" accept="image/*" />
                                       <!--end::Input-->
                                       <button type="button"id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                        </button>
                                    </div>
                                 </div>
                              </div>
                              <!--end::Form group-->
                              <!--begin::Form group-->
                              <div class="form-group mt-5">
                                 <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add More
                                 </button>
                              </div>
                              <!--end::Form group-->
                           </div>
                           <!--end::Repeater-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagegallery_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-gallerypage-btn">
                        <span class="indicator-label">
                        Save
                        </span>
                        <span class="indicator-progress">
                           Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pagePdf" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_pdf_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id2" name="pageTitle_id2" id="pageTitle_id2" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }}) ({{ (ucwords(str_replace('-', ' ', $pageTitles->menu_slug))) }})</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page PDF</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_PagePdf_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <label class="required form-label mw-100 w-200px">Pdf Title</label>
                                 <label class="required form-label mw-100 w-200px" style="margin-left: 12px;">Start Date</label>
                                 <label class="required form-label mw-100 w-200px" style="margin-left: 12px;">End Start</label>
                                 <label class="required form-label mw-100 w-200px">Pdf Format</label>
                                 <div data-repeater-list="kt_PagePdf_add_multiple_options" class="d-flex flex-column gap-3">
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <input type="text" class="form-control mw-100 w-200px" name="pdftitle" placeholder="pdf title Name" />
                                       <input type="date" class="form-control mw-100 w-200px" name="startdate" placeholder="" />
                                       <input type="date" class="form-control mw-100 w-200px" name="enddate" placeholder="" />
                                       <input type="file" class="form-control mw-100 w-200px checkmimepdf" name="image" accept=".pdf" />
                                       <!--end::Input-->
                                       <button type="button"id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                        </button>
                                    </div>
                                 </div>
                              </div>
                              <!--end::Form group-->
                              <!--begin::Form group-->
                              <div class="form-group mt-5">
                                 <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add More
                                 </button>
                              </div>
                              <!--end::Form group-->
                           </div>
                           <!--end::Repeater-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagepdf_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-pdfpage-btn">
                        <span class="indicator-label">
                        Save
                        </span>
                        <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
         <!--begin:::Tab pane-->
         <div class="tab-pane fade" id="kt_settings_pageBanner" role="tabpanel">
            <!--begin::Form-->
            <form id="kt_page_pdf_form" class="form">
               <!--begin::Input group-->
               <div class="card card-flush py-4">
                  <div class="card-body pt-0">
                     <div class="card-body pt-0">
                        <div class="col-md-12">
                           <label class="required form-label">Select Page TItle</label>
                           <select class="form-select form-select-solid pageTitle_id3" name="pageTitle_id3" id="pageTitle_id3" data-control="select2" data-placeholder="Select an page title">
                              <option></option>
                              @foreach($pageTitle as $pageTitles)
                                 <option value="{{ $pageTitles->uid }}">{{ $pageTitles->page_title_en }} ({{ $pageTitles->page_title_hi  }}) ({{ (ucwords(str_replace('-', ' ', $pageTitles->menu_slug))) }})</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add Page Banner</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_PagePdf_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <label class="required form-label mw-100 w-200px">Banner Title</label>
                                 <label class="required form-label mw-100 w-200px" style="margin-left: 13px;">Banner image Format</label>
                                 <div data-repeater-list="kt_PagePdf_add_multiple_options" class="d-flex flex-column gap-3">
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <input type="text" class="form-control mw-100 w-200px" name="pdftitle" placeholder="Banner title Name" />
                                       <input type="file" class="form-control mw-100 w-200px checkmimepdf" name="image" accept="image/*" />
                                       <!--end::Input-->
                                       <!-- <button type="button"id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i>
                                        </button> -->
                                    </div>
                                 </div>
                              </div>
                              <!--end::Form group-->
                              <!--begin::Form group-->
                              <!-- <div class="form-group mt-5">
                                 <button type="button" data-repeater-create class="btn btn-sm btn-light-primary">
                                    <i class="ki-outline ki-plus fs-2"></i> Add More
                                 </button>
                              </div> -->
                              <!--end::Form group-->
                           </div>
                           <!--end::Repeater-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     <!--end::Card header-->
                  
                     <!--end::Variations-->
                     </div>
                     <!--end::Card header-->
                  </div>
                  <!--end::Pricing-->
               <!--end::Input group-->
               <!--begin::Action buttons-->
               <div class="row py-5">
                  <div class="col-md-9 offset-md-3">
                     <div class="d-flex">
                        <!--begin::Button-->
                        <button type="reset" data-kt-ecommerce-settings-type="cancel" class="btn btn-light me-3">
                        Cancel
                        </button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="submit" id="kt_add_pagepdf_submit" data-kt-ecommerce-settings-type="submit" class="btn btn-primary submit-pdfpage-btn">
                        <span class="indicator-label">
                        Save
                        </span>
                        <span class="indicator-progress">
                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        </button>
                        <!--end::Button-->
                     </div>
                  </div>
               </div>
               <!--end::Action buttons-->
            </form>
            <!--end::Form-->            
         </div>
         <!--end:::Tab pane-->
      </div>
      <!--end:::Tab content-->
   </div>
   <!--end::Card body-->
   @else
      {!! $textMessage !!}
     <div class="symbol symbol-100px text-center"> <img class="" src='{{ asset("assets-cms/media/auth/404-error.png") }}' /></div>
   @endif
</div>

@endsection