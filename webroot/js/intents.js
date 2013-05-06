$('document').ready(function(){
	var COMMIT = 13;
	$('#intent-create').click(function(e){	
			e.preventDefault();
			$('#intent-modal').modal('show');
			var form = $('#intent-modal').parents('form:first');
			var model = form.attr('model');
			form.attr('action','../'+model+'/add');
			$('#intent-modal').find('input[name*="id"]').val(null); // Reset to id to null
			form[0].reset();
	});
	
	$('.intent-save').bind('click', function(e){
		e.preventDefault();
		var form = $(this).parents('form:first');
		var formName = form.attr('name');
		var canvasForm =  form.attr('canvas');
		var self =  $(this);
		if(document[formName+''].checkValidity()){
			form.ajaxSubmit({
				dataType:'json',
				beforeSend:function(){
					self.attr("disabled","disabled");
				},
				success:function(formReturn){
					console.log(formReturn);
					var actionIs = form.attr('action');
					form.trigger('ajaxFinish',{data:formReturn.data, action:actionIs});
					if(formReturn.status==1){
						document[formName+''].reset();
						self.parents('.modal:first').modal('hide');
						self.removeAttr("disabled");
						$(document).trigger('request_tree',{'refresh':true});
						$(document).trigger('request_content');
						$(canvasForm).trigger('request_content',{data:formReturn.data, action:actionIs});
						
					}else{
						$('#warning').trigger('pop',{msg:formReturn.msg});	
					}
					
				}
			});
		}

	});	
	
	$('.intent-cancel').bind('click', function(){
		var form = $(this).parents('form:first');
		form[0].reset();
	});
	
	
	//Date Picker
	$('.datepicker').datepicker();
	
	//TypeAhead on Table
	var intentAutoBox;
	$('.intent-autobox').focus(function(){
		intentAutoBox = $(this);
	}).typeahead({
		minLength: 2,
		source:function(query, process){ //PUTTING CONTENT
			var fieldTable = [];
			var fieldIs = $(intentAutoBox).parents('span:first').attr('data-field');
			
			$.each($('table td span[data-field="'+fieldIs+'"]'), function(ctrx, objx){
				fieldTable.push($(objx).text());
			});
			$.each(TREE.getPath(), function(ctrx, objx){
				fieldTable.push(objx.name);
			});
			process(fieldTable);
		},
		updater:function(item){
			$('#warning').trigger('pop',{itemMatch:item,msg:$(intentAutoBox).parent().prev().text()+' already taken'});
		}
	});
	
	
	//General Type Ahead
	$('.typeahead').focus(function(){
		var test = '&quot;Type&quot;';
		var data = [test];
		$(this).attr('data-source',data);
	
	});	
	
	$('.intent-avoid_conflict').on(		
		'blur', function(e){
			var input =  this;
			var afieldTable = [];
			var afieldIs = $(input).parents('span:first').attr('data-field');
			var valueIs=$(input).val();
			if(valueIs){
				$.each(	$('.RECORD td span[data-field="'+afieldIs+'"]'), function(ctrx, objx){
					afieldTable.push($(objx).text()+'');
				});
				$.each(	TREE.getPath(), function(ctrx, objx){
					afieldTable.push(objx.name);
				});
				if(afieldTable.indexOf(valueIs) != -1){
					$('#warning').trigger('pop',{msg:$(input).parents('span:first').find('label').text()+'  already taken!'});
					$(input).val('').focus();
				}
			}
		});
	
	$('#intent-modal input, #intent-modal select').on('focus', function(){
			$('#intent-modal .intent-save').attr('disabled','disabled');
	}).on('blur', function(){
			$('#intent-modal .intent-save').removeAttr('disabled');
	});
	
	$('#warning').bind('pop', function(e, args){
		$('#warning').find('.context').html(args.msg);
		$('#warning').modal('show');
	});

	$('#warning .warning-yes').click(function(){
		$('#warning').modal('hide');
		$('#warnig').trigger('yes');
	})
	

	$('#warning .warning-no').click(function(){
		$('#warning').modal('hide');
		$('#warnig').trigger('no');
	})

	
	
});
			
