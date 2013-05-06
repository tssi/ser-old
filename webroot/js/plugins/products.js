var UNITS_NAME = [];
var UNITS_ALIAS = [];
var PRODUCTS = [];
var PRODUCTS_DESC = [];

$(document).ready(function(){
	$('input').attr('autocomplete','off');
	$('#ProductsTable').dataTable({
		"bPaginate": true,
		"bLengthChange": false,
		"bFilter": true,
		"bSort": true,
		"bInfo": true,
		"bScrollCollapse": true,
		"iDisplayLength": 12,
	});

	$('#ProductUnit').append('<option class="create" value="CreateNewUnit">Create New</option>');
	$(document).on('change','#ProductUnit',function(){
		var unit = $(this).val();
		if(unit=="CreateNewUnit"){
			$("#add-unit,#intent-modal").modal('toggle');
		}
	});
	
	//Refresh Unit (Use when the user added new unit)
 	$(document).on('click','.btn-save',function(e){
		e.preventDefault();	
		$('#UnitAddForm').ajaxSubmit();
		$("#add-unit,#intent-modal").modal('toggle');
		$.ajax({
			url:'/accounting/inventory/products/getUnits.json',
			method:'post',
			dataType:'json',
			success:function(json){
				$('#ProductUnit option').remove();
				$('#ProductUnit').append('<option value="">Select</option>');
				$.each(json.data,function(ctr,obj){
					$('#ProductUnit').append('<option value="'+obj.Unit.id+'">'+obj.Unit.name+'</option>');
				});
				$('#ProductUnit').append('<option class="create" value="CreateNewUnit">Create New</option>'); 
				$('#ProductUnit').val($('#ProductUnit option:not(.create):last').val());
			}
		});
	});

	//Get units for typeahead
	$.ajax({
		url:'/accounting/inventory/products/getUnits.json',
		method:'post',
		dataType:'json',
		success:function(json){
			UNITS_NAME = UNITS_ALIAS = []; // Reset datasource
			$.each(json.data,function(ctr,obj){ 
				UNITS_NAME.push(obj.Unit.name);
				UNITS_ALIAS.push(obj.Unit.alias);
			});
			$("#UnitName").typeahead({source: UNITS_NAME});
			$("#UnitAlias").typeahead({source: UNITS_ALIAS});
		}
	});
	
	$(document).bind('DeleteModalTemplate', function(){
		$('.modal-header h3').text('Delete this item??');
		$('.intent-save ').replaceWith('<button class="btn btn-primary action-delete-product intent-delete" type="button">Delete</button>');
	});
	$(document).bind('EditModalTemplate', function(){
		$('.modal-header h3').text('Edit Item');
	});
	$(document).bind('DefaultModalTemplate', function(){
		$('.modal-header h3').text('Add Item');
		$('#ProductItemCode').removeAttr('readonly','readonly').removeAttr('onfocus','blur()');
		$('.intent-delete').replaceWith('<button class="btn btn-primary intent-save save-product" type="button">Save</button>');
	});
	
	//Delete Product
	$(document).on('click','.action-delete',function(){
		$('#intent-create').click();
		$(document).trigger('DeleteModalTemplate');
		var row =$(this).parents('tr:first');
		var id  = $.trim(row.find('.id').text());
		$('#ProductItemCode').val($.trim(row.find('.item_code').text()));
		$('#ProductName').val($.trim(row.find('.name').text()));
		$('#ProductQty').val($.trim(row.find('.qty').text()));
		$('#ProductAvgPrice').val($.trim(row.find('.avg_price').text()));
		$('#ProductUnit').val(row.find('.unit').attr('unit-id'));
		$('#ProductMax').val($.trim(row.find('.max').text()));
		$('#ProductMin').val($.trim(row.find('.min').text()));
		$('#ProductId').val(id);
		
		//on delete
		$(document).on('click','.action-delete-product',function(){	
			var model =  'inventory/products';
			$.ajax({
				url:'../'+model+'/delete/'+id,
				method:'POST',
				dataType:'json',
				success:function(data){
					$(document).trigger('UpdateProductsTable');
					$(document).trigger('DefaultModalTemplate');
					$(".modal").modal('hide');
					
				}
			});
		});
		//on cancel
		$(document).on('click','.intent-cancel',function(){	
			$(document).trigger('DefaultModalTemplate');
		});
	});
	
	//Edit Product
	$(document).on('click','.action-edit',function(){
		$('#intent-create').click();
		$(document).trigger('EditModalTemplate');
		var row = $(this).parents('tr:first');
		$('#ProductItemCode').val($.trim(row.find('.item_code').text())).attr({'readonly':'readonly','onfocus':'blur()'});
		$('#ProductName').val($.trim(row.find('.name').text()));
		$('#ProductQty').val($.trim(row.find('.qty').text()));
		$('#ProductAvgPrice').val($.trim(row.find('.avg_price').text()));
		$('#ProductUnit').val(row.find('.unit').attr('unit-id'));	
		$('#ProductId').val($.trim(row.find('.id').text()));
		$('#ProductMax').val($.trim(row.find('.max').text()));
		$('#ProductMin').val($.trim(row.find('.min').text()));
		//on cancel
		$(document).on('click','.intent-cancel',function(){		
			$(document).trigger('DefaultModalTemplate');
		});
	});

		
	//Get Products
	$(document).bind('getProductItems',function(){
		$.ajax({
			url:'../../accounting/inventory/products.json',
			method:'post',
			dataType:'json',
			success:function(json){
				PRODUCTS = json;
				$.each(json.data,function(ctr,obj){
					PRODUCTS_DESC.push(obj.Product.name);
				});
				$(".desc").typeahead({source: PRODUCTS_DESC});	
			}
		});
	}).trigger('getProductItems');
	
	//Desc Blur
	$(document).on('blur','.desc',function(){
		var name = $('#ProductName').val();
		//$('#ProductItemCode').val('').removeAttr('readonly','readonly').removeAttr('onfocus','blur()').attr('placeholder','(Generate Auto Code)');
		if($('#ProductAddForm').attr('action'=="../inventory/products/add")){
			$('#ProductId').val('');
			$('#ProductUnit').val('');
			$('#ProductQty').val('');
			$('#ProductAvgPrice').val('');
			$.each(PRODUCTS.data,function(ctr,obj){
				if(name == obj.Product.name){
					$("#warning").modal('toggle');//warning modal			
					$("#warning .modal-body").html('<span>Item already existed! </span>');
					$('#intent-modal').find('input,select').val('');
					$('#ProductItemCode').removeAttr({'readonly':'readonly','onfocus':'blur()'});
					$("#warning").modal('hide');
				}
			}); 
		}
		
		
	});
	
	//Cancel
	$(document).on('click','.intent-cancel',function(){	
		$(document).trigger('DefaultModalTemplate');
	});
	
	//Generate Item Code
	$(document).on('keydown','#ProductItemCode',function(e){	
		if(e.altKey && e.which == 65){
			$(this).val('(Auto Generate)');
		}
	});
	
	//Compare Max/Min
	$('.save-product').hover(function(){
		var max = parseInt($('#ProductMax').val());
		var min = parseInt($('#ProductMin').val());
		if(max != '' && min != '' && max < min){
			$("#warning").modal('toggle');//warning modal
			$("#warning .modal-body").html('<span>Stock level max should be greater than min! </span>');
			$(this).attr('disabled','disabled');
		}
	});
	
	/****************************************UPDATE TABLE**********************************************/
	$(document).bind('UpdateProductsTable', function(e){
		
		$.get( '../inventory/products/getAllproducts', function( data){
			$('#ProductsTable').dataTable().fnClearTable();
			var json = $.parseJSON(data);
			$.each(json,function(i,o){
				var a = $('#ProductsTable').dataTable().fnAddData( [
					o.Product.id,
					'&nbsp'+o.Product.item_code+'&nbsp',
					'&nbsp'+o.Product.name+'&nbsp',
					'&nbsp'+o.Product.qty+'&nbsp',
					'&nbsp'+o.Unit.alias+'&nbsp',
					'&nbsp'+o.Product.max+'&nbsp',
					'&nbsp'+o.Product.min+'&nbsp',
					'&nbsp'+o.Product.avg_price+'&nbsp',
					'<div class="btn-group ">'+
						'<button class="btn btn-center dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>'+
						'<ul class="dropdown-menu pull-right">'+
							'<li><a href="#" class="action-edit"><i class="icon-edit"></i> Edit</a></li>'+
							'<li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>'+
						'</ul>'+
					'</div>'
				]);
				var nTr = $('#ProductsTable').dataTable().fnSettings().aoData[ a[0] ].nTr;
				$('td', nTr)[0].setAttribute( 'class', 'id text-center hide' );
				$('td', nTr)[1].setAttribute( 'class', 'item_code' );
				$('td', nTr)[2].setAttribute( 'class', 'name' );
				$('td', nTr)[3].setAttribute( 'class', 'qty text-center');
				$('td', nTr)[4].setAttribute( 'class', 'unit text-center');
				$('td', nTr)[4].setAttribute( 'unit-id',o.Product.unit_id );
				$('td', nTr)[5].setAttribute( 'class', 'max' );
				$('td', nTr)[6].setAttribute( 'class', 'min' );
				$('td', nTr)[7].setAttribute( 'class', 'avg_price text-right' );
			});	
		}); 
	}).trigger('UpdateProductsTable');

	//Request content
	$(document).bind('request_content',function(){
		$(document).trigger('getProductItems');
		$(document).trigger('UpdateProductsTable');
		$(document).trigger('DefaultModalTemplate');
	});
	
	//Avg Cost Two decimal places on blur
	$('#ProductAvgPrice').blur(function(){
		if($(this).val() != ''){
		$(this).val(parseFloat($(this).val()).toFixed(2));
		}
	});
});