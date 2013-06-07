$(document).ready(function(){
	window.databank = [];//initialize data bank
	$(document).on('click','#filter-template',function(){
		setTimeout(function(){
			$('#action-filter').addClass('open');
		},0);
	});
	$(document).on('click','.action-add',function(){
		var TemplateId =  $('#TemplateId').val();
		var TemplateName =  $('#TemplateName').val();
		var modal =  $(this).attr('href');
		var form = $(modal).parents('form:first');
		var percentage=0;
		form[0].reset();
		$('#load_tmplt').val('');
		$('input[role="foreign-key"]').val(TemplateId);
		$(form).find('[name="data[Template][name]"]').val(TemplateName);
		$(form).find('[name="data[TemplateDetail][template_id]"]').val(TemplateId);
		var percent_spans = $('#TemplateDetailTable').find('[data-field="TemplateDetail.percentage"]');
		$.each(percent_spans,function(i,e){
			console.log(e);
			percentage += parseFloat($(e).text());
		});
		if(percentage >= 100){
			$('.alert').show();
		}
	});
	
	$(document).on('click','.validate-save',function(){
		var percentage=0;
		var percent_spans = $('#TemplateDetailTable').find('[data-field="TemplateDetail.percentage"]');
		var id = $('#load_tmplt').val();
		
		var row;
		var key;
		var data;
		var record;
		
		$.each(percent_spans,function(i,e){
			console.log(e);
			row =$(this).parents('tr:first');
			key  = row.attr('id');
			data = $('.RECORD').trigger('access',{'key':key});
			record =  window.RECORD.getActive();
			console.log(record);
			if(id!=record.TemplateDetail.id){
				percentage += parseFloat($(e).text());
			}
		});
		console.log(percentage);
		percentage +=parseFloat($('#TemplateDetailPercentage').val());
		console.log(percentage);
		if(percentage > 100){
			alert('Warning! You exceed the maximum percentage.');
		}else{
			$(this).removeClass('validate-save').addClass('intent-save').attr('type','submit').click();
		}
	});
	$(document).on('click','.intent-cancel',function(){
		$('.btn-primary').addClass('intent-save').removeClass('validate-save').attr('type','button');//remove class if cancel click
	});
	$(document).on('click','.intent-remove',function(){
		$('.btn-primary').removeClass('validate-save').addClass('intent-save').attr('type','submit');//remove class if cancel click
	});
	$(document).on('click','.action-edit,.action-add',function(){
		$('.btn-primary').removeClass('intent-save').addClass('validate-save').attr('type','button');//add class for validation
	});
	$(document).on('click','.intent-save,.intent-cancel',function(){
		$('.alert').hide();
	});
	$(document).on('click','.intent-remove',function(){
		$('.intent-save').text('delete');
	});
	$('#dept').button('toggle');
	//populate subjects
	$(document).on('click','#dept li',function(event){
		/* if($(this).find('i').hasClass('icon-check')){
			$(this).find('i').removeClass('icon-check').addClass('icon-check-empty');
		}else{
			$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		} */ // multi selection of grade level
		$('#dept li').find('i').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		var level = $(this).find('a').attr('data-value');
		console.log(level);
		$.getJSON('/recordbook/courses.json?subjects='+level+'&group=nomenclature', function(data) {
			var htm='';
			$.each(data.data,function(i,e){
				htm +='<li><a href="#" ids='+e[0].ids+'><i class="icon icon-check-empty"></i> '+e.Subject.nomenclature+'</a></li>';
			});
			htm +='<li class="divider"></li>';
			htm +='<li><a href="#"><i class="icon icon-plus"></i> Subject</a></li>';
			$('#subjects').html(htm);
		}); 
		event.stopPropagation;
		return false;
	});
	
	$(document).on('click','#subjects li',function(event){
		$('#subjects li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		event.stopPropagation;
		return false;
	});

	$(document).on('click','#view-template',function(){
		var level = $('#dept li').find('i.icon-check').parent().attr('data-value');
		var subject = $('#subjects li').find('i.icon-check').parent().attr('ids');
		$('#TemplateTable').trigger('preload');
		$('#TemplateScope').val('D');
		$('#TemplateLimit').val(level);
		$('#TemplateSubjectId').val(subject);
		$('#TemplateCanvasForm').trigger('request_content');
	});
	
	$(document).on('change','#TemplateSubjectId',function(){
		var subject = $(this).find('option:selected').val();
		var levels = databank[subject]['levels'];
		console.log(levels);
		
		var htm = '<div class="btn-group" data-toggle="buttons-checkbox">';
		$.each(levels,function(i,e){	
			htm +='<button type="button" class="btn btn-primary">'+e+'</button>';
		});
		htm +='</div>';
		$('#levels').html(htm);
	});
	
	$(document).on('click','#intent-create',function(){
		var level = $('#dept li').find('i.icon-check').parent().text();
		var level_id = $('#dept li').find('i.icon-check').parent().attr('data-value')
		var subject_id = $('#subjects li').find('i.icon-check').parent().attr('ids');
		var subject = $('#subjects li').find('i.icon-check').parent().text();
		var sy = $('#template_sy').find('option:selected').val();
		$('#yrlvl').val(level);
		$('#subject_name').val(subject);
		$('#subject_id').val(subject_id);
		$('#subject_limit').val(level_id);
		$('#subject_status').val('S');
		$('#sy').val(sy);
		$('#user').val(user.full_name);
	});
	
	$(document).on('change','#template_sy',function(){
		var sy = $(this).find('option:selected').val();
		console.log(sy);
		$('#sy').val(sy);
	});
	
});