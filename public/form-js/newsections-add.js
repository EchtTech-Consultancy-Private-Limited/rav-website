var KTAppNewsSave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_newSection_add_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                    section_name_en: {
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
                    section_name_hi: {
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
                   sort_order: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            regexp: {
                              regexp: /^[0-9]$/,
                              message: 'This field can consist of number characters, spaces, digits only'
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
       $('.submit-newSection-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                  var formData= new FormData(form);
                axios.post(crudUrlTemplate.create,
                            formData, {
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New Section added successfully!", 
                         "New Section!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'newsection-list'; // reload page
                      }, 1500);
                      
                   } else {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.error(
                        response.data.message, 
                         "Something went wrong!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      }
                   })
                   .catch(function (error) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
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
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                         toastr.error(
                               "Sorry, looks like there are some errors detected, please try again K.", 
                               "Something went wrong!", 
                               {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                            );
                      }
                })
             });
       }
       const cancelButton = document.getElementById('kt_modal_add_newsectionAdd').querySelector('[data-kt-users-modal-action="cancel"]');
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
                document.getElementById('kt_newSection_add_form').reset(); // Reset form			
                $('#kt_modal_add_newsectionAdd').modal('hide');
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
    const closeButton = document.getElementById('kt_modal_add_newsectionAdd').querySelector('[data-kt-users-modal-action="close"]');
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
                document.getElementById('kt_newSection_add_form').reset(); // Reset form			
                $('#kt_modal_add_newsectionAdd').modal('hide');
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
    var demos = function () {
         $('.summernote').summernote({
             placeholder: 'Description...',
             height: 200,
             tabsize: 2
         });
     }

 return {
         init: function () {
             demos();
             _officeAdd = $('#kt_newSection_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_newSection_submit');
             // Handle forms
         }
     };
 }();
 // On document ready
 jQuery(document).ready(function() {
    KTAppNewsSave.init();
 });