var KTvalidationCoreWebsiteSetting2= function() {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd2;
    var _handleOfficeAddForm2 = function(e) {
        var validation;
        var form = document.getElementById('kt_footer_content_update_form');
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
            form,
            {
                fields: {
                    locate_map_link: {
                        validators: {
                            notEmpty: {
                                message: 'This field is required'
                            },
                            // regexp: {
                            //     regexp: /^[A-Za-z0-9-' ]*$/,
                            //     message: 'This field can consist of alphabetical characters, spaces, digits only'
                            // },
                        },
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5()
                }
            }
        );
        $('.submit-coreWebsiteSetting-btn2').click( function(e) {
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
                    formData.append("locate_map_links", $('#locate_map_link').val());
                 axios.post(crudUrlTemplate.update_footerContent+'?id='+id, formData, {
                    })
                    .then(function (response) {
                    if (response.data.status ==200) {
                        $('#loading').removeClass('loading');
                        $('#loading-content').removeClass('loading-content');
                       toastr.success(
                          "Update Footer Update successfully!", 
                          "Update Footer!", 
                          {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                       );
                       setTimeout(function() {
                          if (history.scrollRestoration) {
                             history.scrollRestoration = 'manual';
                          }
                          location.href = 'footercontent-list'; // reload page
                       }, 1500);
                      
                    } else {
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
        init: function() {
            demos();
            _officeAdd2 = $('#kt_footer_content_update_form');
        _handleOfficeAddForm2();
        submitButton = document.querySelector('#kt_coreWebsiteSetting_submit2');
        }
    };
}();
jQuery(document).ready(function() {
  KTvalidationCoreWebsiteSetting2.init();
});