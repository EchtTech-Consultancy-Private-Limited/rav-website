@extends('cms-view.layouts.main')
@section('title')
    {{__('News')}}
@endsection
@section('pageTitle')
 {{ __('News') }}
@endsection
@section('breadcrumbs')
 {{ __('News Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/news-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
   <!--begin::Form-->
   <form id="kt_news_update_form" class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
      <!--begin::Main column-->
      <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
         <!--end:::Tabs-->
         <!--begin::Tab content-->
         <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
               <div class="d-flex flex-column gap-7 gap-lg-10">
                  <!--begin::General options-->
                  <div class="card card-flush py-4">
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                     <div class="fv-row mb-10">
                           <!--begin::Label-->
                           <label class="fs-6 fw-semibold mb-2">
                              Tab Type
                              <span class="ms-1"  data-bs-toggle="tooltip" title="Select a discount type that will be applied to this product" >
                              <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i></span>            
                           </label>
                           <!--End::Label-->
                           <!--begin::Row-->
                           <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                              <!--begin::Col-->
                              <div class="col">
                                 <!--begin::Option-->
                                 <label class="btn btn-outline btn-outline-dashed btn-active-light-primary active d-flex text-start p-6" data-kt-button="true">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                    <input class="form-check-input" type="radio" name="tabtype" value="0"  <?php if($data->tab_type =='0'){ echo 'checked'; }else{ echo ''; } ?>/>
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Info-->
                                    <span class="ms-5">
                                    <span class="fs-4 fw-bold text-gray-800 d-block">Open Internal Tab
                                    <div class="text-muted fs-7">Page Will Be Open Same Tab.</div>
                                    </span>
                                    </span>
                                    <!--end::Info-->
                                 </label>
                                 <!--end::Option-->
                              </div>
                              <!--end::Col-->
                              <!--begin::Col-->
                              <div class="col">
                                 <!--begin::Option-->
                                 <label class="btn btn-outline btn-outline-dashed btn-active-light-primary d-flex text-start p-6" data-kt-button="true">
                                    <!--begin::Radio-->
                                    <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                                    <input class="form-check-input" type="radio" name="tabtype" value="1"  <?php if($data->tab_type =='1'){ echo 'checked'; }else{ echo ''; } ?>/>
                                    </span>
                                    <!--end::Radio-->
                                    <!--begin::Info-->
                                    <span class="ms-5">
                                       <span class="fs-4 fw-bold text-gray-800 d-block">Open External Tab
                                          <div class="text-muted fs-7">Page Will Be Open Next Tab.</div>
                                       </span>
                                    </span>
                                    <!--end::Info-->
                                 </label>
                                 <!--end::Option-->
                              </div>
                              <!--end::Col-->
                           </div>
                           <!--end::Row-->
                        </div>
                        <div class="fv-row mb-10">
                        <div class="row g-9 mb-7">
                           <!--begin::Col-->
                           <div class="col-md-3 fv-row">
                              <!--begin::Label-->
                              <label class="required fs-6 fw-semibold mb-2">Start Date</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input class="form-control form-control-solid" type="date" placeholder="" name="startdate" value="{{ $data->start_date }}" />
                              <!--end::Input-->
                           </div>
                           <!--end::Col-->
                           <!--begin::Col-->
                           <div class="col-md-3 fv-row">
                              <!--begin::Label-->
                              <label class="required fs-6 fw-semibold mb-2">End Date</label>
                              <!--end::Label-->
                              <!--begin::Input-->
                              <input class="form-control form-control-solid" type="date" placeholder="" name="enddate" value="{{ $data->end_date }}" />
                              <!--end::Input-->
                           </div>
                           <!--end::Col-->
                        </div>
                        </div>
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row">
                           <!--begin::Label-->
                           <div class="col-md-12">
                              <label class="required form-label">Title Name (In English)</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-12">
                              <input type="text" name="title_name_en" id="title_name_en" class="form-control mb-2 title_name_en" id="title_name_en" placeholder="{{config('FormField.placeholder_title_en')}}" value="{{ $data->title_name_en }}" />
                           </div>
                           <!--end::Input-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                           <!--end::Description-->
                        </div>
                        <div class="mb-10 fv-row mt-2">
                           <!--begin::Label-->
                           <div class="col-md-12">
                           <label class="required form-label">शीर्षक नाम (हिन्दी में)</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-12">
                           <input type="text" name="title_name_hi" id="title_name_hi" class="form-control mb-2 title_name_hi" placeholder="{{config('FormField.placeholder_title_hi')}}" value="{{ $data->title_name_hi }}" />
                           </div>
                           <!--end::Input-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">A title name is required and recommended to be unique.</div>
                           <!--end::Description-->
                        </div>
                        <div class="mb-10 fv-row mt-2">
                           <!--begin::Label-->
                           <div class="col-md-12">
                           <label class="required form-label">External Link</label>
                           </div>
                           <!--end::Label-->
                           <!--begin::Input-->
                           <div class="col-md-12">
                              <input type="text" name="url" id="url" class="form-control mb-2 url" placeholder="link name" value="{{ $data->public_url }}" />
                           </div>
                           <!--end::Input-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">A Link name is required and recommended to be unique.</div>
                           <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div>
                           <!--begin::Label-->
                           <label class="form-label required">Description (English)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_en" id="kt_summernote_en">{!! $data->description_en !!}</div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                         <!--begin::Input group-->
                         <div>
                           <!--begin::Label-->
                           <label class="form-label mt-8">विवरण (हिन्दी में)</label>
                           <!--end::Label-->
                           <!--begin::Editor-->
                              <div class="min-h-200px mb-2 summernote kt_summernote_hi" id="kt_summernote_hi">{!! $data->description_hi !!}</div>
                           <!--end::Editor-->
                           <!--begin::Description-->
                           <div class="text-muted fs-7">Set a description to the news for better visibility.</div>
                           <!--end::Description-->
                        </div>
                        <!--end::Input group-->
                     </div>
                     
                     <!--end::Card header-->
                  </div>
                  <!--end::General options-->
                  <!--begin::Pricing-->
                  <div class="card card-flush py-4">
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                     <!--begin::News-->
                     <div class="card-header">
                        <div class="card-title">
                           <h2>Add New News</h2>
                        </div>
                     </div>
                     <!--end::Card header-->
                     <!--begin::Card body-->
                     <div class="card-body pt-0">
                        <!--begin::Input group-->
                        <div class="" data-kt-ecommerce-catalog-add-product="auto-options">
                           <!--begin::Repeater-->
                           <div id="kt_news_add_multiple_options">
                              <!--begin::Form group-->
                              <div class="form-group">
                                 <label class="required form-label mw-100 w-200px">Image Title</label>
                                 <label class="required form-label mw-100 w-200px">Image Format</label>
                                 <div data-repeater-list="kt_news_add_multiple_options" class="d-flex flex-column gap-3">
                                 @if(isset($pdfData))
                                    @foreach($pdfData as $pdfDatas)
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <input type="hidden" class="form-control mw-100 w-200px" name="uid" value="{{$pdfDatas->uid}}" />
                                       <input type="text" class="form-control mw-100 w-200px" name="imagetitle" value="{{$pdfDatas->title}}" />
                                       <input type="file" class="form-control mw-100 w-200px" name="image" />
                                       <!--end::Input-->
                                       <button type="button" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i> 
                                       </button>
                                       <img src="{{ asset('resources/uploads/NewsManagement/'. $pdfDatas->public_url)  }}" width="50px" />
                                          <button type="button" data-id="{{ $pdfDatas->uid }}" class="btn btn-sm btn-icon btn-light-danger delete-single-record" title="Data Delete">
                                          <i class="ki-outline ki-trash fs-1"></i>
                                        </button>
                                    </div>
                                    @endforeach
                                    @else
                                    <div data-repeater-item class="form-group d-flex flex-wrap align-items-center gap-5">
                                       <!--begin::Input-->
                                       <input type="text" class="form-control mw-100 w-200px" name="imagetitle" placeholder="image title Name" />
                                       <input type="file" class="form-control mw-100 w-200px checkmime" name="image" accept="image/*" />
                                       <!--end::Input-->
                                       <button type="button" id="removeRow" data-repeater-delete class="btn btn-sm btn-icon btn-light-danger">
                                          <i class="ki-outline ki-cross fs-1"></i> 
                                       </button>
                                    </div>
                                    @endif
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
               </div>
            </div>
            <!--end::Tab pane-->
         </div>
         <!--end::Tab content-->
         <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
            {{config('FormField.cancel_button')}}
            </a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_update_news_submit" class="btn btn-primary submit-news-btn">
            <span class="indicator-label">
            {{config('FormField.save_button')}}
            </span>
            <span class="indicator-progress">
               Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            </button>
            <!--end::Button-->
         </div>
      </div>
      <!--end::Main column-->
   </form>
   <!--end::Form-->
@endsection