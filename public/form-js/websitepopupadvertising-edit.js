var KTvalidationCoreWebsiteSetting4= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd4;
    var _handleOfficeAddForm4 = function(e) {
        var validation;
        var form = document.getElementById('kt_popupadvertising_update_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    popupadvertising_title: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            
                        },
                    },
                    // popupadvertising_file: {
                    //     validators: {
                    //         notEmpty: {
                    //             message: 'This field is required'
                    //         },
                    //         regexp: {
                    //             regexp: /[^\s]+(.*?).(jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF)$/,
                    //             message: 'Valid image file, image only'
                    //         },
                    //     },
                    // },
                    popupadvertising_from: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            
                        },
                    },
                    popupadvertising_to: {
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
        $('.update-popupadvertising-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    //$('#examAddModal').modal('hide');
                    $('#loading').addClass('loading');
                    $('#loading-content').addClass('loading-content');
                 axios.post(crudUrlTemplate.update_popupAdvertisings+'?id='+id, new FormData(form),{
                      
                    })
                    .then(function (response) {

                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "Popup Advertising update successfully!", 
                          "Update Popup Advertising!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'advertisingpopup-list'; // reload page
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
                                "All Field Required, please try again.", 
                                "Something went wrong!", 
                                {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                             );
                       }
                 })
              });
        }

    return {
        init: function() {
            _officeAdd4 = $('#kt_popupadvertising_update_form');
        _handleOfficeAddForm4();
        submitButton = document.querySelector('#kt_popupadvertising_update');
        }
    };
}();
jQuery(document).ready(function() {
  KTvalidationCoreWebsiteSetting4.init();
});