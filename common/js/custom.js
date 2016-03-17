$(function() {

	$('#locations').DataTable();

	$('#example').DataTable();
	
	$('#productTable').DataTable();

	/* These are the modules for CRUD of category */

	// click edit button for every category.
	$("body").on('click', ".edit-cat-button", function(e) {

		e.preventDefault();
		var obj = $(this);
		processCategory("edit", obj);

	});

	// click delete button.
	$("body").on('click', ".delete-button", function(e) {

		console.log($(this));

		e.preventDefault();
		var obj = $(this);

		var cat_name = processCategory("del", obj);

		swal({
		  title: "Are you sure?",
		  text: 'You will not be able to recover ' + '"' + cat_name + '".' ,
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){

		  	if (isConfirm) {

			  	var cat_id = $("#selected-cat-id").val();
				console.log("cat_id" + cat_id);

				$.ajax ({
					url: '/pocketmenu/category/delete',
					type: 'POST',
					data: {cat_id: cat_id},
					dataType: 'json',
					success: function(res) {

						console.log(res);
						
						if(res == "success") {
							
							swal("Deleted!", "Selected category has been deleted.", "success");

							// window.location.reload();

						} else if (res == "fail") {

							swal("Deleted fail", "Selected category is safe :)", "error");
						}
					},
					error: function(err_res) {

						swal("Deleted fail", "Selected category is safe :)", "error");
						console.log(err_res);
					}
				});
	  		} else {
			    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  	}
		});
	});

	// click save button.
	$("#cat-save-btn").click(function(e) {

		$("#cat-edit-spinner").css("display", "block");

		var cat_id = $("#selected-cat-id").val();
		var cat_name = $("#cat-name").val();
		var cat_published = 0;
		if ($("#cat-published").is(":checked")){
			cat_published = 1;
		} else {
			cat_published = 0;
		}

		$.ajax({
			url: '/pocketmenu/category/edit',
			data: {
				cat_id: cat_id,
				cat_name: cat_name,
				cat_published: cat_published
			},
			type: 'POST',
			dataType: 'json',
			success: function(res) {
				
				console.log(res);

				if (res == "success") {
					$("#cat-edit-spinner").css("display", "none");
					$("#editCatModal").modal('hide');

					var category_id = "cat_" + cat_id;

					$("tr#cat_" + cat_id + " .category-name").text(cat_name);

					swal("Saved Successfully!", "You clicked the button!", "success");

					if (cat_published == 1) {

						$("tr#cat_" + cat_id + " .published").text("published");

					} else {
						$("tr#cat_" + cat_id + " .published").text("unpublished");
					}
				}
			},
			error: function(err_res) {
				console.log(err_res);
			}
		});
	});	

	// click add button.
	$("#add-cat-btn").click(function(e) {

		console.log("add button clicked!");

		e.preventDefault();

		swal({
		  	title: "New category",
		  	text: "Please add a new category",
		  	type: "input",
		  	showCancelButton: true,
		  	closeOnConfirm: false,
		  	animation: "slide-from-top",
		  	inputPlaceholder: "Category name"
		},
		function(inputValue){

	  		if (inputValue) {
	  			var cat_name = inputValue;

	  			$.ajax({
	  				url: '/pocketmenu/category/add',
	  				dataType: 'json',
	  				method: 'POST',
	  				data: {cat_name: cat_name},
	  				success: function(res) {
	  					console.log(res);
	  					if(res == "success") {
	  						swal("Success!", "Category created: " + inputValue, "success");	
	  						// window.location.reload();
	  					} else {
	  						swal.showInputError("Category saved failure!");
	  						return false;	
	  					}
	  				},
	  				error: function(err_res) {
	  					console.log(err_res);
	  				}
	  			});

	  		} else {
	  			swal.showInputError("You need to write something!");
		    	return false;
	  		}
		});
	});


	/* These are the modules for CRUD of products */

	// click edit button for each product.
	$("body").on("click", ".edit-prod-button", function(e) {

		e.preventDefault();
		var anc_id = $(this).attr("id");
		var product_name = $("#prod_" + anc_id + "_1").text();
		$("#prod-name").val(product_name);

		var product_price = $("#prod_" + anc_id + "_2").text();
		$("#prod-price").val(product_price);

		var product_description = $("#prod_" + anc_id + "_4").text();
		$("#prod-description").val(product_description);

		$("#prod-id").val(anc_id);
	});	

	
	// click delete button for each product.
	$("body").on("click", ".delete-prod-button", function(e) {

		e.preventDefault();
		var anc_id = $(this).attr('pid');
		var product_name = $("#prod_" + anc_id + "_1").text();

		swal({
		  	title: "Are you sure?",
		  	text: 'You will not be able to recover ' + '"' + product_name + '".' ,
		  	type: "warning",
		  	showCancelButton: true,
		  	confirmButtonColor: "#DD6B55",
		  	confirmButtonText: "Yes, delete it!",
		  	cancelButtonText: "No, cancel plx!",
		  	closeOnConfirm: false,
		  	closeOnCancel: false
		},
		function(isConfirm){

		  	if (isConfirm) {

			  	console.log("product id " + anc_id);

				$.ajax ({
					url: '/pocketmenu/product/delete',
					type: 'POST',
					data: {prod_id: anc_id},
					dataType: 'json',
					success: function(res) {

						console.log(res);
						
						if(res == "success") {
							
							swal("Deleted!", "Selected category has been deleted.", "success");

						} else if (res == "fail") {

							swal("Deleted fail", "Selected category is safe :)", "error");
						}
					},
					error: function(err_res) {

						swal("Deleted fail", "Selected category is safe :)", "error");
						console.log(err_res);
					}
				});
	  		} else {
			    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  	}
		});
	});

	// click save button when editing for production.
	$("#prod-save-btn").click(function () {

		var prod_id = parseInt($("#prod-id").val());
		console.log(prod_id);
		var prod_name = $("#prod-name").val();
		console.log(prod_name);
		var prod_price = $("#prod-price").val();
		console.log(prod_price);
		var prod_description = $("#prod-description").val();
		console.log(prod_description);

		$.ajax({
			url: '/pocketmenu/product/edit',
			method: 'POST',
			dataType: 'json',
			data: {
				prod_id: prod_id,
				prod_name: prod_name,
				prod_price: prod_price,
				prod_description: prod_description
			},
			success: function (res) {
				console.log(res);
				if (res == "success") {
					$("#prod_" + prod_id + "_1").text(prod_name);
					$("#prod_" + prod_id + "_2").text(prod_price);
					$("#prod_" + prod_id + "_4").text(prod_description);
					$("#prod-edit-spinner").css("display", "none");
					$("#editProdModal").modal('hide');

					swal("Saved Successfully!", "You clicked the button!", "success");

				} else {
					swal("Warning", "Edit fail!");
				}
			}, 
			error: function (err_res) {
				swal("Warning", "Edit fail!");
			}
		});
	});

	$("#add_loc_btn").click(function (e) {
		e.preventDefault();

	});

	$("#loc-save-btn").click(function(e) {
		var loc_name = $("#loc-name").val();
		var loc_address = $("#loc-address").val();
		var loc_city = $("#loc-city").val();
		var loc_state = $("#loc-state").val();
		var loc_zip_code = $("#loc-zip-code").val();
		var loc_phone = $("#loc-phone").val();
		var loc_lon = $("#loc-lon").val();
		var loc_lat = $("#loc-lat").val();

		if (loc_name == "") {
			$("span#error-message").text("Location name is missed");
			$("span#error-message").css("display","block");
			setTimeout(cssOperation, 3000);
			return;
		} else if(loc_address == "") {
			$("span#error-message").text("Location Address is missed");
			$("span#error-message").css("display","block");
			setTimeout(cssOperation, 3000);
			return;
		}

		$.ajax({
			url: '/pocketmenu/location/add',
			method: 'POST',
			data: {
				loc_name: loc_name,
				loc_address: loc_address,
				loc_state: loc_state,
				loc_city: loc_city,
				loc_zip_code: loc_zip_code,
				loc_phone: loc_phone,
				loc_lon: loc_lon,
				loc_lat: loc_lat
			}, 
			dataType: 'json',
			success: function(res) {
				if (res == "success") {
					$("#createLocModal").modal('hide');
					swal("Saved Successfully!", "You clicked the button!", "success");	
				} else {
					$("span#error-message").text("Add location fail!");
					$("span#error-message").css("display","block");
					setTimeout(cssOperation, 3000);
					return;
				}
				
			},
			error: function(err_res) {
				$("span#error-message").text("Add location fail!");
				$("span#error-message").css("display","block");
				setTimeout(cssOperation, 3000);
				return;
			}
		}) 
	});

	$("body").on("click", ".edit-loc-button", function(e) {

		e.preventDefault();

		var id = $(this).attr("id");

		console.log("edit button's id is " + id);
		
		var loc_name = $("#loc_" + id + "_1").text();
		console.log("location name is " + loc_name);
		$("#edit-loc-name").val(loc_name);

		var loc_address = $("#loc_" + id + "_2").text();
		$("#edit-loc-address").val(loc_address);

		var loc_city = $("#loc_" + id + "_3").text();
		$("#edit-loc-city").val(loc_city);

		var loc_state = $("#loc_" + id + "_4").text();
		$("#edit-loc-state").val(loc_state);

		var loc_zip_code = $("#loc_" + id + "_5").text();
		$("#edit-loc-zip-code").val(loc_zip_code);

		var loc_phone = $("#loc_" + id + "_6").text();
		$("#edit-loc-phone").val(loc_phone);

		var loc_lat = $("#loc_" + id + "_7").text();
		$("#edit-loc-lat").val(loc_phone);

		var loc_phone = $("#loc_" + id + "_8").text();
		$("#edit-loc-lon").val(loc_phone);

		$("#loc-id").val(id);
	});

	$("#loc-edit-btn").click(function() {
		var loc_name = $("#edit-loc-name").val();
		var loc_address = $("#edit-loc-address").val();
		var loc_city = $("#edit-loc-city").val();
		var loc_state = $("#edit-loc-state").val();
		var loc_zip_code = $("#edit-loc-zip-code").val();
		var loc_phone = $("#edit-loc-phone").val();
		var loc_lon = $("#edit-loc-lon").val();
		var loc_lat = $("#edit-loc-lat").val();
		var loc_id = $("#loc-id").val();

		$.ajax({
			url: '/location/edit',
			method: 'POST',
			data: {
				loc_id: loc_id,
				loc_name: loc_name,
				loc_address: loc_address,
				loc_state: loc_state,
				loc_city: loc_city,
				loc_zip_code: loc_zip_code,
				loc_phone: loc_phone,
				loc_lon: loc_lon,
				loc_lat: loc_lat
			}, 
			dataType: 'json',
			success: function(res) {
				if (res == "success") {
					$("#editLocModal").modal('hide');
					swal("Saved Successfully!", "You clicked the button!", "success");	
				} else {
					$("span#error-message").text("Add location fail!");
					$("span#error-message").css("display","block");
					setTimeout(cssOperation, 3000);
					return;
				}
			},
			error: function(err_res) {
				$("span#error-message").text("Add location fail!");
				$("span#error-message").css("display","block");
				setTimeout(cssOperation, 3000);
				return;
			}
		}) 
	});

	$("body").on("click", ".del-loc-btn", function(e) {
		
		e.preventDefault();

		var loc_id = $(this).attr("lid");

		var location_name = $("#loc_" + loc_id + "_1").text();

		swal({
		  	title: "Are you sure?",
		  	text: 'You will not be able to recover ' + '"' + location_name + '".' ,
		  	type: "warning",
		  	showCancelButton: true,
		  	confirmButtonColor: "#DD6B55",
		  	confirmButtonText: "Yes, delete it!",
		  	cancelButtonText: "No, cancel plx!",
		  	closeOnConfirm: false,
		  	closeOnCancel: false
		},
		function(isConfirm){

		  	if (isConfirm) {

			  	console.log("location id " + loc_id);
			  	$.ajax ({
					url: '/pocketmenu/location/delete_production',
					type: 'POST',
					data: {loc_id: loc_id},
					dataType: 'json',
					success: function(res) {

						console.log(res);
						
						if(res == "success") {
							$.ajax ({
								url: '/pocketmenu/location/delete_relation',
								type: 'POST',
								data: {loc_id: loc_id},
								dataType: 'json',
								success: function(res) {

									console.log(res);
									
									if(res == "success") {
										
										$.ajax ({
											url: '/pocketmenu/location/delete',
											type: 'POST',
											data: {loc_id: loc_id},
											dataType: 'json',
											success: function(res) {

												console.log(res);
												
												if(res == "success") {
													
													swal("Deleted!", "Selected category has been deleted.", "success");

												} else if (res == "fail") {

													swal("Deleted fail", "Selected category is safe :)", "error");
												}
											},
											error: function(err_res) {

												swal("Deleted fail", "Selected category is safe :)", "error");
												console.log(err_res);
											}
										});

									} else if (res == "fail") {

										swal("Deleted fail", "Selected category is safe :)", "error");
									}
								},
								error: function(err_res) {

									swal("Deleted fail", "Selected category is safe :)", "error");
									console.log(err_res);
								}
							});
						} else if (res == "fail") {

							swal("Deleted fail", "Selected category is safe :)", "error");
						}
					},
					error: function(err_res) {

						swal("Deleted fail", "Selected category is safe :)", "error");
						console.log(err_res);
					}
				});
				
	  		} else {
			    swal("Cancelled", "Your imaginary file is safe :)", "error");
		  	}
		});

	});

})


function cssOperation() {
	$("span#error-message").css("display","none");
}
 
function processCategory(type, obj) {

	var td_element = obj.parent();

	var tr_element = td_element.parent();

	var tr_id = tr_element.attr('id');

	var cat_id = tr_id.split("_");

	var cat_id_int = parseInt(cat_id[1]);

	console.log(cat_id_int);

	$("#selected-cat-id").val(cat_id_int);

	var cat_name = $("tr#" + tr_id + " .category-name").text();

	if (type == "edit") {

		console.log(cat_name);

		$("#cat-name").val(cat_name);

		var published = $("tr#" + tr_id + " .published").html();

		if (published == "published") {

			$("#cat-published").prop("checked", true);

		} else {

			$("#cat-published").prop("checked", false);
		}

	} else if (type == "del") {

		return cat_name;
	}
}