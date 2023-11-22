var KTAppRoleUpdate = function () {
   var jsonURL = $('#urlListData').attr('data-info');
   var crudUrlTemplate = JSON.parse(jsonURL);
   var _officeAdd;
   var _handleOfficeAddForm = function(e) {
   var validation;
   var form = document.getElementById('kt_role_edit_form');
      // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
      validation = FormValidation.formValidation(
            form,
            {
               fields: {
                  role_name: {
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
               },
               plugins: {
                  trigger: new FormValidation.plugins.Trigger(),
                  bootstrap: new FormValidation.plugins.Bootstrap5()
               }
            }
      );
      $('.submit-roleEdit-btn').click( function(e) {
            e.preventDefault();
            validation.validate().then(function(status) {
               if (status == 'Valid') {
                  submitButton.setAttribute('data-kt-indicator', 'on');
                  submitButton.disabled = true;
                  //$('#examAddModal').modal('hide');
                 //var formData= new FormData(form);
                 //formData.append("kt_description_en", $('#kt_summernote_en').summernote('code'));
                // formData.append("kt_description_hi", $('#kt_summernote_hi').summernote('code'));
               axios.post(crudUrlTemplate.update,
                           new FormData(form), {
                  }).then(function (response) {
                  if (response.data.status ==200) {
                     toastr.success(
                        "Role Update successfully!", 
                        "Update Role!", 
                        {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                     );
                     setTimeout(function() {
                        if (history.scrollRestoration) {
                           history.scrollRestoration = 'manual';
                        }
                        location.href = 'role-list'; // reload page
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
   // Select all handler
   var handleSelectAll = function (){
      // Define variables
      const selectAll = document.getElementById('kt_role_edit_form').querySelector('#kt_roles_select_all');
      const allCheckboxes = document.getElementById('kt_role_edit_form').querySelectorAll('[type="checkbox"]');
      // Handle check state
      selectAll.addEventListener('change', e => {
         // Apply check state to all checkboxes
         allCheckboxes.forEach(c => {
               c.checked = e.target.checked;
         });
      });
   }
return {
        init: function () {
            handleSelectAll();
            _officeAdd = $('#kt_role_edit_form');
            _handleOfficeAddForm();
            submitButton = document.querySelector('#kt_update_role_submit');
            // Handle forms
        }
    };
}();

jQuery(document).ready(function() {
   KTAppRoleUpdate.init();
});