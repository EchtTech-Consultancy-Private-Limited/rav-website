var jsonURL = $('#urlListData').attr('data-info');
var crudUrlTemplate = JSON.parse(jsonURL);
var id = new URLSearchParams(window.location.search).get('id');
var fbEditor = document.getElementById('fb-editor');

var formBuilder = $(fbEditor).formBuilder({
    onSave: function(evt, formData) {
        saveEditForm(formData);
    },
});

$(function() {
    $.ajax({
        type: 'get',
        headers: {
            'Authorization': 'Bearer ' + $("meta[name='csrf-token']").attr("content")
        },
        url: crudUrlTemplate.editForm,
        data: {
            'id': id
        },
        success: function(data) {
            $("#form_name").val(data.form_name);
            formBuilder.actions.setData(data.content);
        }
    });
});


function saveEditForm(form) {
    $.ajax({
        type: 'post',
        headers: {
            'Authorization': 'Bearer ' + $("meta[name='csrf-token']").attr("content")
        },
        url: crudUrlTemplate.update,
        data: {
            'content': form,
            'form_name': $("#form_name").val(),
            "_token": $("meta[name='csrf-token']").attr("content"),
        },
        success: function(data) {
            if(data.status ==200){
                toastr.success(
                    "Update Form successfully!", 
                    "Update Form!", 
                    {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                 );
                 setTimeout(function() {
                    if (history.scrollRestoration) {
                       history.scrollRestoration = 'manual';
                    }
                    location.href = 'formbuilder-edit'; // reload page
                 }, 1500);
                }else{
                    toastr.error(
                        data.message.form_name[0], 
                        "Something went wrong!", 
                        {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                    );
                    
                }
                
        }
    });
}