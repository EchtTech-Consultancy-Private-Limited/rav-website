var KTAppNewsSave = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
    var _officeAdd;
    var _handleOfficeAddForm = function(e) {
    var validation;
    var form = document.getElementById('kt_news_update_form');
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
                               regexp: /^[A-Za-z0-9-' ]*$/,
                               message: 'This field can consist of alphabetical characters, spaces, digits only'
                            },
                         },
                   },
                   title_name_hi: {
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
       $('.submit-news-btn').click( function(e) {
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
                  formData.append("tab_type", $("input[type='radio'][name='tabtype']:checked").val());
                axios.post(crudUrlTemplate.update+'?id='+id,
                            formData, {
                   }).then(function (response) {
                   if (response) {
                     $('#loading').removeClass('loading');
                     $('#loading-content').removeClass('loading-content');
                      toastr.success(
                         "Update News Update successfully!", 
                         "Update News!", 
                         {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                        location.href = 'news-edit?id='+id // reload page
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
    var demos = function () {
         $('.summernote').summernote({
             placeholder: 'Description...',
             height: 200,
             tabsize: 2
         });
     }
   
 const initFormRepeater = () => {
         $('#kt_news_add_multiple_options').repeater({
             initEmpty: false,
             // defaultValues: {
             //     'text-input': 'foo'
             // },
             show: function () {
                 $(this).slideDown();
                 // Init select2 on new repeated items
                 initConditionsSelect2();
             },
             hide: function (deleteElement) {
                 $(this).slideUp(deleteElement);
             }
         });
     }
 return {
         init: function () {
             demos();
             initFormRepeater();
             _officeAdd = $('#kt_news_update_form');
             _handleOfficeAddForm();
             submitButton = document.querySelector('#kt_update_news_submit');
             // Handle forms
         }
     };
 }();
 // delete pdf images
 var KTAppdeletePDFIMAGES = function () {
    var jsonURL = $('#urlListData').attr('data-info');
    var crudUrlTemplate = JSON.parse(jsonURL);
    var id = new URLSearchParams(window.location.search).get('id');
 // bind delete link to click event
 $(".delete-single-record").click(function (event) {
             event.preventDefault();
             var rowId = $(this).attr('data-id');
             swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'success',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
             }).then(function (result) {
                if (result.value) {
                   axios.post(crudUrlTemplate.deletepdfimg,{id:rowId})
                   .then(function (response) {
                      // remove record row from DOM
                      // tableObject
                      //    .row(rowId)
                      //    .remove()
                      //    .draw();
                      toastr.success(
                         "Record has been deleted!", 
                         "deleted!", 
                         {timeOut: 0,showProgressbar: true, extendedTimeOut: 0,allow_dismiss: false, closeButton: true, closeDuration: 0}
                      );
                      setTimeout(function() {
                         if (history.scrollRestoration) {
                            history.scrollRestoration = 'manual';
                         }
                         location.href = 'news-edit?id='+id; // reload page
                      }, 1500);
 
                   })
                   .catch(function (error) {
                      var errorMsg = 'Could not delete record. Try later.';
                      
                      if (error.response.status >= 400 && error.response.status <= 499)
                         errorMsg = error.response.data.message;
 
                      swal.fire(
                         'Error!',
                         errorMsg,
                         'error'
                      )
                   });     
                }
             });
          });
       }();
 // On document ready
 jQuery(document).ready(function() {
    KTAppNewsSave.init();
    KTAppdeletePDFIMAGES.init();
 });