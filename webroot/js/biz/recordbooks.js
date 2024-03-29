$(document).ready(function(){
	window.TEACH_LOAD={};
	window.ACTIVE_ERB={};
	$(document).on('click','#filter-recordbook',function(){
		setTimeout(function(){
			$('#action-filter').addClass('open');
		},0);
	});
	$(document).on('click','#sy_period li',function(event){
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
		var employee = user.id;
		if(sy!=undefined){
			$.getJSON('/recordbook/teaching_loads.json?employee_id='+employee+'&esp='+sy, function(data){
				console.log(data.data);
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
				console.log(TEACH_LOAD);
				$.each(TEACH_LOAD,function(a,b){
					htm +='<li class="nav-header">'+b.level+' '+b.subject_name+'</li>';
					$.each(b.sections,function(i,section){
						htm += '<li><a href="#" data-value="'+b.subject_id+'"><i class="icon icon-check-empty"></i>'+section.name+'</a></li>';
					});
				});
				htm +='<li class="divider"></li>';
				htm +='<li><a href="#"><i class="icon icon-plus"></i> Subject</a></li>';
				$('#subjects').html(htm);
			});
		}
		event.stopPropagation;
		return false;
	});
	$(document).on('click','#subjects li',function(event){
		$('#subjects li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		event.stopPropagation;
		return false;
	});
	
	$(document).on('click','#view-loads',function(){
		var sy = $('#sy_period li.sy.selected').find('a').attr('data-value');
		var period = $('#sy_period li.period.selected').find('a').attr('data-value');
		var subject = $('#subjects li').find('i.icon-check').parent().attr('data-value');
		console.log(subject,'asdsad');
		if(sy!=undefined&&period!=undefined&&subject!=undefined){
			$('#RecordbookTable').trigger('preload');
			$('#load_subjects').val(subject);
			$('#load_esp').val(sy+'.'+period+'0');
			console.log(TEACH_LOAD[subject]['sections'][0]['id']);
			var sections =[];
			$.each(TEACH_LOAD[subject]['sections'],function(i,e){
				sections.push(e.id);
			});
			console.log(sections);
			$('#load_section').val(sections);
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
		$('#load_recordbook').val(0);
		$('#MeasurableCanvasForm').trigger('request_content');
		
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
		console.log(template);
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
		ACTIVE_ERB = record;
		$('#section').html('<option value="'+record.Section.id+'">'+record.Section.name+'</option>');
		$('#load_recordbook').val(record.Recordbook.id);
		$('#MeasurableCanvasForm').trigger('request_content');
	});
	$(document).on('click','.action-add',function(){
		console.log(ACTIVE_ERB);
		var modal =  $(this).attr('href');
		var form = $(modal).parents('form:first');
		form[0].reset();
		var htm = '<option value="#">Select Component</option>';
		$.each(ACTIVE_ERB.GradeComponent,function(i,e){
			htm +='<option value="'+e.GeneralComponent.id+'">'+e.GeneralComponent.description+'</option>';
		});
		$('#MeasurableId').val('');
		$('#MeasurableGeneralComponentId').html(htm);
		$('#MeasurableRecordbookId,#load_recordbook').val(ACTIVE_ERB.Recordbook.id);
	});
	$('.validate-save').hover(function(){
		var gradecomps=[];
		var measurables=[];
		
		$.each($('#MeasurableTable').find('[data-field="Measurable.general_component_id"]'),function(a,b){
			measurables.push($(b).text());
		});	
		$.each($('#GradeComponentTable').find('[data-field="GradeComponent.general_component_id"]'),function(i,e){
			console.log($(e).text(),measurables,$.inArray($(e).text(),measurables));
			if(($.inArray($(e).text(),measurables)==-1)){
				alert('Warning! all grade components required atleast one measurable.');
				return;
			}
		});
	});
	$(document).on('click','.action-edit',function(){	
		//populate general components
		var htm = '<option value="#">Select Component</option>';
		$.each(ACTIVE_ERB.GradeComponent,function(i,e){
			htm +='<option value="'+e.GeneralComponent.id+'">'+e.GeneralComponent.description+'</option>';
		});
		$('#MeasurableGeneralComponentId').html(htm);
		//end
		var row =$(this).parents('tr:first');
		var key  = row.attr('id');
		var data = $('.RECORD').trigger('access',{'key':key});
		var record =  window.RECORD.getActive();
		$('#MeasurableGeneralComponentId').val(record.GeneralComponent.id);
	});
	//Populate measurables
	$('#GradeComponentTable').bind('afterPOPU',function(evt,args){
		if($('#GradeComponentTable tbody tr').length){
			$('#add-measurables').removeAttr('disabled');
			var htm='';
			$.each($('#GradeComponentTable tbody tr'),function(i,e){
				var gc_id = $(e).find('td span[data-field="GradeComponent.general_component_id"]').text();
				var gc_desc = $(e).find('td span[data-field="GeneralComponent.description"]').text();
				htm +='<option value="'+gc_id+'">'+gc_desc+'</option>';
			});
			$('#MeasurableGeneralComponentId').html(htm);
		}else{
			$('#add-measurables').attr('disabled','disabled');
		}
	});
});