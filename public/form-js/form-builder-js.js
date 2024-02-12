jQuery(function($) {
    $(document.getElementById('fb-editor')).formBuilder({
        onSave: function(evt, formData) {
            saveForm(formData);
        },
    });
});
var jsonURL = $('#urlListData').attr('data-info');
var crudUrlTemplate = JSON.parse(jsonURL);
function saveForm(form) {
    $.ajax({
        type: 'post',
        headers: {
            'Authorization': 'Bearer ' + $("meta[name='csrf-token']").attr("content")
        },
        url: crudUrlTemplate.create,
        data: {
            'content': form,
            'form_name': $("#form_name").val(),
            "_token": $("meta[name='csrf-token']").attr("content"),
        },
        success: function(data) {
            if(data.status ==200){
                toastr.success(
                    "New Form added successfully!", 
                    "New Form!", 
                    {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                 );
                 setTimeout(function() {
                    if (history.scrollRestoration) {
                       history.scrollRestoration = 'manual';
                    }
                    location.href = 'formbuilder-create'; // reload page
                 }, 1500);
                }else{
                    toastr.error(
                        data.message.form_name[0], 
                        "Something went wrong!", 
                        {timeOut: 0, extendedTimeOut: 0, closeButton: true, closeDuration: 0}
                    );
                    
                }
                
            //location.href = "formbuilder-create";
            //console.log(data);
        }
    });
}

