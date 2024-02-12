var KTAppPhotoEditSave = function () {
   var _officeAdd;
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_photo_information_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                   title_name_en: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                               regexp: /^[-+.,)@:\/&?''=""( A-Za-z0-9]*$/,
                               message: 'This field can consist of alphabetical characters, spaces, digits only'
                            },
                         },
                   },
                   // title_name_en: {
                   //       validators: {
                   //          notEmpty: {
                   //             message: 'This field is required'
                   //          },
                   //       },
                   // },
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-photo-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                   var formData= new FormData(form);
                  formData.append("type", '0');
                axios.post(crudUrlTemplate.update_photo+'?id='+id,formData, {
                   }).then(function (response) {
                   if (response) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Photo added successfully!", 
                         "New Photo Information!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'gallerymanagement-list'; // reload page
                      }, 1500);
                      
                   } else {
                      toastr.error(
                         "Sorry, the information is incorrect, please try again.", 
                         "Something went wrong!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      }
                   })
                   .catch(function (error) {
                         toastr.error(
                            "Sorry, looks like there are some errors detected, please try again B.", 
                            "Something went wrong!", 
                            {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                         );
                      }).then(() => {
                            // Hide loading indication
                            submitButton.removeAttribute('data-kt-indicator');
                            // Enable button
                            submitButton.disabled = false;
                      });
                   } else {
                         toastr.error(
                               "Sorry, All Field Are Require!, please try again.", 
                               "Something went wrong!", 
                               {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
 const initFormRepeater1 = () => {
    $('#kt_photo_add_multiple_options').repeater({
       initEmpty: false,
       // defaultValues: {
       //     'text-input': 'foo'
       // },
       show: function () {
             $(this).slideDown();
             // Init select2 on new repeated items
             //initConditionsSelect2();
       },
       hide: function (deleteElement) {
             $(this).slideUp(deleteElement);
       }
    });
 }
 return {
         init: function () {
             initFormRepeater1();
             _officeAdd = $('#kt_photo_information_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_edit_photo_submit');
             // Handle forms
         }
     };
 }();
 
 // On document ready
 jQuery(document).ready(function() {
   KTAppPhotoEditSave.init();
 });