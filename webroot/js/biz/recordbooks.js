
$(document).ready(function(){
	window.TEACH_LOAD={};
	$(document).on('click','#filter-recordbook',function(){
		setTimeout(function(){
			$('#action-filter').addClass('open');
		},0);
	});
	$(document).on('click','#sy_period li',function(){
		var a ='';
		if($(this).hasClass('sy')){
			a ='sy';
		}else{
			a ='period';
		}
		$('#sy_period li.'+a).find('i').removeClass('icon-check').addClass('icon-check-empty');
		$('#sy_period li.'+a).removeClass('selected');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		$(this).addClass('selected');
		var sy = $('#sy_period li.sy.selected').find('a').attr('data-value');
		var period = $('#sy_period li.period.selected').find('a').attr('data-value');
		var employee = 17;
		console.log(sy+' '+period);
		if(sy!=undefined){
			$.getJSON('/recordbook/teaching_loads.json?employee_id='+employee+'&esp='+sy, function(data){
				//console.log(data);
				TEACH_LOAD={};
				var htm='';
				$.each(data.data,function(i,e){
					if(TEACH_LOAD[e.Subject.id]==null){
						console.log(e.Subject.id);
						TEACH_LOAD[e.Subject.id]={'level':e.Section.level_id,
												  'subject_id':e.Subject.id,
												  'subject_name':e.Subject.nomenclature,
												  'sections':[]
												};
					}
					TEACH_LOAD[e.Subject.id]['sections'].push({'id':e.Section.id,'name':e.Section.name});
				});
				$.each(TEACH_LOAD,function(a,b){
					htm += '<li><a href="#" data-value="'+b.subject_id+'"><i class="icon icon-check-empty"></i>'+b.subject_name+'</a></li>';
				});
				htm +='<li class="divider"></li>';
				htm +='<li><a href="#"><i class="icon icon-plus"></i> Subject</a></li>';
				$('#subjects').html(htm);
			});
		}
	});
	
	$(document).on('click','#subjects li',function(){
		$('#subjects li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
	});
	
	$(document).on('click','#view-loads',function(){
		var sy = $('#sy_period li.sy.selected').find('a').attr('data-value');
		var period = $('#sy_period li.period.selected').find('a').attr('data-value');
		var subject = $('#subjects li').find('i.icon-check').parent().attr('data-value');
		if(sy!=undefined&&period!=undefined&&subject!=undefined){
			$('#RecordbookTable').trigger('preload');
			$('#load_subjects').val(subject);
			$('#load_esp').val(sy+'.'+period+'0');
			$('#RecordbookCanvasForm').trigger('request_content');
		}
		if(sy==undefined||period==undefined||subject==undefined){
			console.log(sy+' '+period+' '+subject);
			if(sy==undefined){
				setTimeout(function(){
					$('#action-filter').addClass('open');
				},0);
			}
			if(subject==undefined){
				setTimeout(function(){
					$('#action-subjects').addClass('open');
				},0);
			}
			if(period==undefined){
				setTimeout(function(){
					$('#action-filter').addClass('open');
				},0);
			}
		}
	});
	$(document).on('click','#intent-create',function(){
		var sy = $('#sy_period li.sy.selected').find('a').attr('data-value');
		var period = $('#sy_period li.period.selected').find('a').attr('data-value');
		var subject = $('#subjects li').find('i.icon-check').parent().attr('data-value');
		console.log(TEACH_LOAD[subject]);
		var htm = '<option value="#">Select section</option>';
		$.each(TEACH_LOAD[subject]['sections'],function(i,sec){
			htm +='<option value="'+sec.id+'">'+sec.name+'</option>';
		});
		$('#subject').val(TEACH_LOAD[subject]['subject_name']);
		$('#recordbook_sy').val(sy);
		$('#section').html(htm);
		$('#sy').val(sy+'.'+period+'0');
		$('#subject_id').val(subject);
		
		
	});
	$(document).on('click','#add-grade-components',function(){
		var sy = $('#recordbook_sy').find('option:selected').val();
		var subject = $('#subject_id').val();
		$('#template-id').val('null');
		$('#TemplateDetailCanvasForm').trigger('request_content');
		$.getJSON('/recordbook/templates.json?fields=id,name&subject_id='+subject+'&esp='+sy, function(data){
			var htm='<option value="#">Select Template</option>';
			
			$.each(data.data,function(i,e){
				console.log(e);
				htm+='<option value="'+e.Template.id+'">'+e.Template.name+'</option>';
			});
			$('#GradeComponentTemplates').html(htm);
		});
		
	});
	//populate grade components
	$(document).on('change','#GradeComponentTemplates',function(){
		var template = $(this).find('option:selected').val();
		console
		$('#template-id').val(template);
		$('#TemplateDetailCanvasForm').trigger('request_content');
	});
	$(document).on('change','#section',function(){
		var section = $(this).find('option:selected').val();
		$('#section_id').val(section);
	});
	$(document).on('click','.view-grade_components,.view-measurables',function(){
		var row =$(this).parents('tr:first');
		var key  = row.attr('id');
		var data = $('.RECORD').trigger('access',{'key':key});
		var record =  window.RECORD.getActive();
		console.log(record);
		$('#section').html('<option value="'+record.Section.id+'">'+record.Section.name+'</option>');
	});
});