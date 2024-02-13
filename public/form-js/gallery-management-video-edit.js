  var KTAppVideoEditSave = function () {
     var jsonURL = $('#urlListData').attr('data-info');
     var crudUrlTemplate = JSON.parse(jsonURL);
     var id = new URLSearchParams(window.location.search).get('id');
     var _officeAdd1;
     var _handleOfficeAddForm1 = function(e) {
     var validation;
     var form = document.getElementById('kt_video_edit_information_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
              form,
              {
                 fields: {
                     title_name_en1: {
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
                //     Video: {
                //       validators: {
                //          notEmpty: {
                //             message: 'This field is required'
                //          },
                //          regexp: {
                //             regexp: /^(http|https):\/\//,
                //             message: 'This field can consist of http or https url only'
                //          },
                //       },
                // },
                    // page_title_hi: {
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
       $('.submit-edit-video-btn').click( function(e) {
              e.preventDefault();
              validation.validate().then(function(status) {
                 if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                   var formData= new FormData(form);
                   formData.append("type", '1');
                 axios.post(crudUrlTemplate.update_video+'?id='+id,formData, {
                    }).then(function (response) {
                    if (response) {
                      $('#loading').removeClass('loading');
                      $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "New Video added successfully!", 
                          "New Video Information!", 
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
                                "Sorry, looks like there are some errors detected, please try again K.", 
                                "Something went wrong!", 
                                {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                             );
                       }
                 })
              });
        }
  const initFormRepeater2 = () => {
     $('#kt_video_add_multiple_options').repeater({
        initEmpty: false,
        // defaultValues: {
        //     'text-input': 'foo'
        // },
        show: function () {
              $(this).slideDown();
              // Init select2 on new repeated items
             // initConditionsSelect2();
        },
        hide: function (deleteElement) {
              $(this).slideUp(deleteElement);
        }
     });
  }
  return {
          init: function () {
              initFormRepeater2();
              _officeAdd1 = $('#kt_video_edit_information_form');
              _handleOfficeAddForm1();
              submitButton = document.querySelector('#kt_edit_video_submit');
              // Handle forms
          }
      };
  }();
  
  // On document ready
  jQuery(document).ready(function() {
    KTAppVideoEditSave.init();
  });