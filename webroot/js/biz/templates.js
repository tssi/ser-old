
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
		form[0].reset();
		$('input[role="foreign-key"]').val(TemplateId);
		$(form).find('[name="data[Template][name]"]').val(TemplateName);
		$(form).find('[name="data[TemplateDetail][template_id]"]').val(TemplateId);
	});
	
	$('#dept').button('toggle');
	//populate subjects
	$(document).on('click','#dept li',function(){
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
	});
	$(document).on('click','#subjects li',function(){
		$('#subjects li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
	});

	$(document).on('click','#view-template',function(){
		var level = $('#dept li').find('i.icon-check').parent().attr('data-value');
		var subject = $('#subjects li').find('i.icon-check').parent().attr('ids');
		$('#TemplateTable').trigger('preload');
		$('#TemplateScope').val('D');
		$('#TemplateLimit').val(level);
		$('#TemplateSubjectId').val(subject);
		$('#TemplateCanvasForm').trigger('request_content');
		/* $.getJSON($.urlEncode('/recordbook/templates.json',{'subject_id':SUBJECT}), function(response){ 
			if(response.data.length == 0){
				$('#TemplateTable').trigger('emptyRecord');
			}else{
				console.log(response.data);
				$('#TemplateTable').trigger('populate',{'data':response.data,'append':false});
				$('#TemplateTable').trigger('showRecord');
			}
		}); */
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
});