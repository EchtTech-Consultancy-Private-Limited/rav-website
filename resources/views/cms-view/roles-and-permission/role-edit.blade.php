@extends('cms-view.layouts.main')
@section('title')
    @parent
    | {{__('Role Edit')}}
@endsection
@section('pageTitle')
 {{ __('Role Management') }}
@endsection
@section('breadcrumbs')
 {{ __('Role Edit') }}
@endsection
@push('post-scripts')
<script src="{{ asset('public/form-js/role-edit.js') }}"></script>
@endpush
@section('content')
<input type="hidden" id="urlListData" data-info="{{ $crudUrlTemplate }}">
<div class="post d-flex flex-column-fluid" id="kt_post">
<div id="kt_content_container" class="container-xxl">
<div class="card card-flush">
   <div class="card-body">
      <div class="tab-content" id="myTabContent">
         <form id="kt_role_edit_form" class="form">
            <div class="d-flex flex-column scroll-y me-n7 pe-7" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
               <div class="row fv-row mb-10">
                 <div class="col-md-12">
                     <label class="fs-5 fw-bold form-label mb-2">
                     <span class="required">Role name</span>
                     </label>
                  </div>
                  <div class="col-md-12">
                  <div class="w-100">
                        <select class="form-select form-select-solid role_name" name="role_name" id="role_name" data-control="select2" data-placeholder="Select an option">
                           <option></option>
                           @foreach($roleType as $roleTypes)
                              @if(request()->get('id') == $roleTypes->uid)
                               <option value="{{ $roleTypes->uid }},{{ $roleTypes->role_type }}" selected>{{ $roleTypes->role_type  }}</option>
                              @else
                              <option value="{{ $roleTypes->uid }},{{ $roleTypes->role_type }}">{{ $roleTypes->role_type  }}</option>
                              @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <!--end::Input-->
               </div>
               <!--end::Input group-->
               <!--begin::Permissions-->
               <div class="fv-row">
                  <!--begin::Label-->
                  <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                  <!--end::Label-->
                  <!--begin::Table wrapper-->
                  <div class="table-responsive">
                     <!--begin::Table-->
                     <table class="table align-middle table-row-dashed fs-6 gy-5">
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-semibold">
                           <!--begin::Table row-->
                           <tr>
                              <td class="text-gray-800">
                                 Administrator Access
                                 <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Allows a full access to the system">
                                    <i class="ki-outline ki-information fs-7"></i>                                                
                                 </span>
                              </td>
                              <td>
                                 <!--begin::Checkbox-->
                                 <label class="form-check form-check-custom form-check-solid me-9">
                                 <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                 <span class="form-check-label" for="kt_roles_select_all">
                                 Select all
                                 </span>
                                 </label>
                              </td>
                           </tr>
                           @foreach($datases as $data)
                           <tr>
                              <td class="text-gray-800"><b>{{ $data->module_name }}</b></td>
                              <td>
                                 <div class="d-flex">
                                 <input class="form-check-input" type="hidden" name="module_name[{{$data->id}}]" value="{{$data->module_name}},{{$data->sort_order}},{{$data->prefix}}" />
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                       <input class="form-check-input" type="checkbox" value="Y" name="read[{{$data->id}}]" <?php if($data->read =='Y'){ echo 'checked'; }else{ echo ''; } ?> />
                                       <span class="form-check-label"> Read | View </span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                       <input class="form-check-input" type="checkbox" value="Y" name="create[{{$data->id}}]"  <?php if($data->create =='Y'){ echo 'checked'; }else{ echo ''; } ?> />
                                       <span class="form-check-label"> Create</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                       <input class="form-check-input" type="checkbox" value="Y" name="update[{{$data->id}}]"  <?php if($data->update =='Y'){ echo 'checked'; }else{ echo ''; } ?>/>
                                       <span class="form-check-label"> Edit | Update </span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                       <input class="form-check-input" type="checkbox" value="Y" name="delete[{{$data->id}}]" <?php if($data->delete =='Y'){ echo 'checked'; }else{ echo ''; } ?>/>
                                       <span class="form-check-label"> Delete</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                       <input class="form-check-input" type="checkbox" value="Y" name="approver[{{$data->id}}]" <?php if($data->approver =='Y'){ echo 'checked'; }else{ echo ''; } ?>/>
                                       <span class="form-check-label"> Approver</span>
                                    </label>
                                    <label class="form-check form-check-sm form-check-custom form-check-solid">
                                       <input class="form-check-input" type="checkbox" value="Y" name="publisher[{{$data->id}}]" <?php if($data->publisher =='Y'){ echo 'checked'; }else{ echo ''; } ?>/>
                                       <span class="form-check-label"> Publisher</span>
                                    </label>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="text-center pt-15">
               <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">
               Discard
               </button>
               <button type="submit" id="kt_update_role_submit" class="btn btn-primary submit-roleEdit-btn" data-kt-roles-modal-action="submit">
               <span class="indicator-label">
               Submit
               </span>
               <span class="indicator-progress">
               Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
               </span>
               </button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection