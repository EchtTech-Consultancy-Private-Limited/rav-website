var KTAppFAQSave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_faq_add_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                 question_en: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                               regexp: /^[A-Za-z0-9-' ]*$/,
                               message: 'This field can consist of alphabetical characters, spaces, digits only'
                            },
                         },
                   },
                   question_hi: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                         },
                   },
                },
                plugins: {
                   trigger: new FormValidation.plugins.Trigger(),
                   bootstrap: new FormValidation.plugins.Bootstrap5()
                }
             }
       );
       $('.submit-faq-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                   $('#loading').addClass('loading');
                   $('#loading-content').addClass('loading-content');
                  var formData= new FormData(form);
                  formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                  formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.create,
                            formData, {
                   }).then(function (response) {
                   if (response) {
                    $('#loading').removeClass('loading');
                    $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New FAQ added successfully!", 
                         "New FAQ!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'faq-list'; // reload page
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
                               "Sorry, looks like there are some errors detected, please try again K.", 
                               "Something went wrong!", 
                               {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
       // Cancel button handler
       
     
    var demos = function () {
         $('.summernote').summernote({
             placeholder: 'Description...',
             height: 200,
             tabsize: 2
         });
     }
     const cancelButton = document.getElementById('kt_modal_add_faq').querySelector('[data-kt-users-modal-action="cancel"]');
         cancelButton.addEventListener('click', e => {
             e.preventDefault();
 
             Swal.fire({
                 text: "Are you sure you would like to cancel?",
                 icon: "warning",
                 showCancelButton: true,
                 buttonsStyling: false,
                 confirmButtonText: "Yes, cancel it!",
                 cancelButtonText: "No, return",
                 customClass: {
                     confirmButton: "btn btn-primary",
                     cancelButton: "btn btn-active-light"
                 }
             }).then(function (result) {
                 if (result.value) {
                     document.getElementById('kt_faq_add_form').reset(); // Reset form			
                     $('#kt_modal_add_faq').modal('hide');
                 } else if (result.dismiss === 'cancel') {
                     Swal.fire({
                         text: "Your form has not been cancelled!.",
                         icon: "error",
                         buttonsStyling: false,
                         confirmButtonText: "Ok, got it!",
                         customClass: {
                             confirmButton: "btn btn-primary",
                         }
                     });
                 }
             });
         });
 
         // Close button handler
         const closeButton = document.getElementById('kt_modal_add_faq').querySelector('[data-kt-users-modal-action="close"]');
         closeButton.addEventListener('click', e => {
             e.preventDefault();
 
             Swal.fire({
                 text: "Are you sure you would like to cancel?",
                 icon: "warning",
                 showCancelButton: true,
                 buttonsStyling: false,
                 confirmButtonText: "Yes, cancel it!",
                 cancelButtonText: "No, return",
                 customClass: {
                     confirmButton: "btn btn-primary",
                     cancelButton: "btn btn-active-light"
                 }
             }).then(function (result) {
                 if (result.value) {
                     document.getElementById('kt_faq_add_form').reset(); // Reset form			
                     $('#kt_modal_add_faq').modal('hide');
                 } else if (result.dismiss === 'cancel') {
                     Swal.fire({
                         text: "Your form has not been cancelled!.",
                         icon: "error",
                         buttonsStyling: false,
                         confirmButtonText: "Ok, got it!",
                         customClass: {
                             confirmButton: "btn btn-primary",
                         }
                     });
                 }
             });
         });
 return {
         init: function () {
              demos();
             _officeAdd = $('#kt_faq_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_faq_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
     KTAppFAQSave.init();
 });