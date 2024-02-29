"use strict";
var KTDatatablesBasicPaginations = function() {
	var initTable1 = function() {
		var table = $('#kt_datatable_formbuilder');
        var $i=1;
		// var columnList = JSON.parse(table.data('columnListData'));
		var jsonURL = $('#urlListData').attr('data-info');
		var crudUrlTemplate = JSON.parse(jsonURL);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
		// begin first table
		var tableObject = table.DataTable({
			order: [[1, 'asc']],
			responsive: true,
			pagingType: 'full_numbers',
			searchDelay: 500,
			processing: true,
			pageLength: 10,
			ajax: {
				"url": crudUrlTemplate.list,
				"type": "GET",
				"data": {
					"_token": csrfToken
				}
			},
			columns: [
				{ "data": "uid" },
				{ "data": "form_name" },
				{ "data": "status" },
				{ "data": "action" }
			],
			columnDefs: [
				{
					targets: -1,
					title: 'Actions',
					orderable: false,
					searchable: false,
					responsivePriority: -1,
					render: function(data, type, full, meta) {
						// create these links only if corresponding URL is present
						var viewLinkHtml = '';
						var editLinkHtml = '';
						var deleteLinkHtml = '';
						var approvalLinkHtml ='';
						var dropdownHtml = '';

						if (crudUrlTemplate.view !== undefined) {
							viewLinkHtml = '<a href="' + crudUrlTemplate.view.replace("xxxx", full.uid) + 
							'" class="btn btn-sm btn-clean btn-icon mr-2 track-click" data-track-name="datatable-js-employee-view-btn" title="Show The Form">\
								<span class="svg-icon svg-icon-primary svg-icon-2x">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M17.2718029,8.68536757 C16.8932864,8.28319382 16.9124644,7.65031935 17.3146382,7.27180288 C17.7168119,6.89328641 18.3496864,6.91246442 18.7282029,7.31463817 L22.7282029,11.5646382 C23.0906029,11.9496882 23.0906029,12.5503176 22.7282029,12.9353676 L18.7282029,17.1853676 C18.3496864,17.5875413 17.7168119,17.6067193 17.3146382,17.2282029 C16.9124644,16.8496864 16.8932864,16.2168119 17.2718029,15.8146382 L20.6267538,12.2500029 L17.2718029,8.68536757 Z M6.72819712,8.6853647 L3.37324625,12.25 L6.72819712,15.8146353 C7.10671359,16.2168091 7.08753558,16.8496835 6.68536183,17.2282 C6.28318808,17.6067165 5.65031361,17.5875384 5.27179713,17.1853647 L1.27179713,12.9353647 C0.909397125,12.5503147 0.909397125,11.9496853 1.27179713,11.5646353 L5.27179713,7.3146353 C5.65031361,6.91246155 6.28318808,6.89328354 6.68536183,7.27180001 C7.08753558,7.65031648 7.10671359,8.28319095 6.72819712,8.6853647 Z" fill="#000000" fill-rule="nonzero"/>\
											<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-345.000000) translate(-12.000000, -12.000000) " x="11" y="4" width="2" height="16" rx="1"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
						}

						if (crudUrlTemplate.edit !== undefined) {
							editLinkHtml = '<a href="'+ crudUrlTemplate.edit.replace("xxxx", full.uid) +'" class="btn btn-sm btn-clean btn-icon mr-2 track-click"\
							data-track-name="datatable-js-employee-edit-btn" title="Edit">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>\
											<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
						}

						if (crudUrlTemplate.delete !== undefined) {
							deleteLinkHtml = '<a href="'+ crudUrlTemplate.delete.replace("xxxx", full.uid) +'" class="btn btn-sm btn-clean btn-icon delete-single-record track-click"\
							data-track-name="datatable-js-employee-delete-btn" title="Delete">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
                        }
						if (crudUrlTemplate.delete !== undefined) {
							approvalLinkHtml = '<a href="'+ crudUrlTemplate.delete.replace("xxxx", full.uid) +'" class="btn btn-sm btn-clean btn-icon delete-single-record track-click"\
							data-track-name="datatable-js-employee-delete-btn" title="Delete">\
								<span class="svg-icon svg-icon-md">\
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">\
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">\
											<rect x="0" y="0" width="24" height="24"/>\
											<path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"/>\
											<path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>\
										</g>\
									</svg>\
								</span>\
							</a>';
                        }
                        
                        dropdownHtml = '' +
                            viewLinkHtml + ' &nbsp;'+
                            editLinkHtml + '&nbsp;'+
                            deleteLinkHtml + '&nbsp;';
                            approvalLinkHtml + '&nbsp;';
				
						return dropdownHtml;
					},
				},
				{
					targets: 0,
					title: 'ID',
					orderable: true,
					visible: true,
					responsivePriority: -2,
					render: function (data, type, full, meta) {
						return $i++;
					},
				},
				{
					targets: -2,
					orderable: true,
					responsivePriority: -2,
					render: function (data, type, full, meta) {
						if(crudUrlTemplate.publisher != undefined && crudUrlTemplate.publisher != '0')
						{
							var url_publisher = crudUrlTemplate.publisher.replace("xxxx", full.uid)
							var classApproved_publisher = 'approve-single-record';
						}else{
							var url_publisher ='javascript:void(0);'
							var classApproved_publisher ='error';
						}
						if(crudUrlTemplate.approver != undefined && crudUrlTemplate.approver != '0')
						{
							var url_approver = crudUrlTemplate.approver.replace("xxxx", full.uid)
							var classApproved = 'approve-single-record';
						}else{
							var url_approver ='javascript:void(0);'
							var classApproved ='error';
						}
						var status = {
							"0": { 'title': 'Waiting For Approve', 'class': 'badge badge-light-danger fw-bold px-3 py-2 btn btn-danger border-radius-10',
												'classApprove':classApproved,'url':url_approver,'btncustomtext':'Approve','icontext':'ki-cross'},
							"1": { 'title': 'Waiting For Approve', 'class': 'badge badge-light-danger fw-bold px-3 py-2 btn btn-danger border-radius-10',
												'classApprove':classApproved,'url':url_approver,'btncustomtext':'Approve','icontext':'ki-cross' },
							"2": { 'title': 'Waiting For Publisher', 'class': 'badge badge-light-warning fw-bold px-3 py-2 btn btn-warning border-radius-10',
												'classApprove':classApproved_publisher,'btncustomtext':'Waiting For Publisher',
												'icontext':'ki-cross','url':url_publisher, },
							"3": { 'title': 'Published', 'class': 'badge badge-light-success fw-bold px-4 py-3',
							                 'url':'javascript:void(0);','icontext':'ki-check text-success' }
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<a href="'+ status[data].url +'" class="' + status[data].classApprove + '" data-attr="' + status[data].btncustomtext + '"><span style="width: 250px;">\
									<div class="d-flex align-items-center">\
										<div class="symbol symbol-40 symbol-sm flex-shrink-0">\
											<div class="symbol symbol-light-success mr-3">\
												<span class="' + status[data].class + '">' + status[data].title +'   '+'<i class="ki-outline fs-0.5 '+' '+ status[data].icontext + '"></i></span>\
											</div>\
										</div>\
									</div>\
								</span></a>';
					}
				},
			],

			"drawCallback": function (settings) {
				// bind Approve link to click event
				$(".approve-single-record").click(function (event) {
					event.preventDefault();
					var approveUrl = $(this).attr('href');
					var rowId = $(this).data('rowid');
					var textset = $(this).attr('data-attr');
					swal.fire({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'success',
						showCancelButton: true,
						confirmButtonText: 'Yes, '+textset+' it!'
					}).then(function (result) {
						if (result.value) {
							axios.post(approveUrl)
							.then(function (response) {
								// remove record row from DOM
								tableObject
									.row(rowId)
									.remove()
									.draw();
								toastr.success(
									"Record has been "+textset+"!", 
									textset+"!", 
									{timeOut: 0,showProgressbar: true, extendedTimeOut: 0,allow_dismiss: false, closeButton: true, closeDuration: 0}
								);
								setTimeout(function() {
									if (history.scrollRestoration) {
									history.scrollRestoration = 'manual';
									}
									location.href = 'formbuilder-list'; // reload page
								}, 1500);

							})
							.catch(function (error) {
								var errorMsg = 'Could not '+textset+' record. Try later.';
								
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
				// bind delete link to click event
				$(".delete-single-record").click(function (event) {
					event.preventDefault();
					var deleteUrl = $(this).attr('href');
					var rowId = $(this).data('rowid');
					
					swal.fire({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'success',
						showCancelButton: true,
						confirmButtonText: 'Yes, delete it!'
					}).then(function (result) {
						if (result.value) {
							axios.delete(deleteUrl)
							.then(function (response) {
								// remove record row from DOM
								tableObject
									.row(rowId)
									.remove()
									.draw();
								toastr.success(
									"Record has been deleted!", 
									"deleted!", 
									{timeOut: 0,showProgressbar: true, extendedTimeOut: 0,allow_dismiss: false, closeButton: true, closeDuration: 0}
								 );
								 setTimeout(function() {
									if (history.scrollRestoration) {
									   history.scrollRestoration = 'manual';
									}
									location.href = 'formbuilder-list'; // reload page
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
            }
		});
	};
	return {
		//main function to initiate the module
		init: function() {
			initTable1();
		},
	};
}();
jQuery(document).ready(function() {
	KTDatatablesBasicPaginations.init();
	// errors in table will be logged in console
	$.fn.dataTable.ext.errMode = 'throw'; 
});
