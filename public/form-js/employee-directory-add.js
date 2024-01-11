var KTAppEmployeeDirectorySave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_EmployeeDirectory_add_form');
       // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
       validation = FormValidation.formValidation(
             form,
             {
                fields: {
                  deprt_id: {
                         validators: {
                            notEmpty: {
                               message: 'This field is required'
                            },
                            // regexp: {
                            //    regexp: /^[A-Za-z0-9-' ]*$/,
                            //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                            // },
                         },
                  },
                  designation_id: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  fename: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[A-Za-z0-9-' ]*[.,]*$/,
                           message: 'This field can consist of alphabetical characters, spaces, characters only'
                        },
                     },
                  },
                  lename: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[A-Za-z0-9-' ]*[.,]*$/,
                           message: 'This field can consist of alphabetical characters, spaces, digits only'
                        },
                     },
                  },
                  fhname: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  lhname: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        // regexp: {
                        //    regexp: /^[A-Za-z0-9-' ]*$/,
                        //    message: 'This field can consist of alphabetical characters, spaces, digits only'
                        // },
                     },
                  },
                  mobileno: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[0-9]{10}$/,
                           message: 'The value is not a valid Number'
                        },
                     },
                  },
                  email: {
                     validators: {
                        notEmpty: {
                           message: 'This field is required'
                        },
                        regexp: {
                           regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                           message: 'The value is not a valid email address',
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
       $('.submit-EmployeeDirectory-btn').click( function(e) {
             e.preventDefault();
             validation.validate().then(function(status) {
                if (status == 'Valid') {
                   submitButton.setAttribute('data-kt-indicator', 'on');
                   submitButton.disabled = true;
                   $('#loading').addClass('loading');
                  $('#loading-content').addClass('loading-content');
                  var formData= new FormData(form);
                  formData.append("description_e", $('#kt_summernote_en').summernote('code'));
                  formData.append("description_h", $('#kt_summernote_hi').summernote('code'));
                axios.post(crudUrlTemplate.create,
                        formData, {
                   }).then(function (response) {
                   if (response.data.status ==200) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "New added successfully!", 
                         "New Entry!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                        location.href = 'employeedirectory-create'; // reload page
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
             _officeAdd = $('#kt_EmployeeDirectory_add_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_add_EmployeeDirectory_submit');
             // Handle forms
         }
     };
 }();
 
 jQuery(document).ready(function() {
    KTAppEmployeeDirectorySave.init();
 });