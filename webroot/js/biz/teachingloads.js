$(document).ready(function(){
	var SECTIONS = $.parseJSON($('#all_sections').val());
	var LOAD_SECTIONS=[];
	$('#all_sections').val('');
	
	$('.gs,.hs,.ps').slideUp('slow');
	$(document).on('click','#filter-load',function(){
		setTimeout(function(){
			$('#action-filter').addClass('open');
		},0);
	});
	$(document).on('click','#sy_dept li',function(event){
		var a ='';
		if($(this).hasClass('sy')){
			a ='sy';
		}else{
			a ='dept';
		}
		if(!($(this).hasClass('nav-header'))){
			$('#sy_dept li.'+a).find('i').removeClass('icon-check').addClass('icon-check-empty');
			$('#sy_dept li.'+a).removeClass('selected');
			$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
			$(this).addClass('selected');
		}
		var sy = $('#sy_dept li.sy.selected').find('a').attr('data-value');
		var dept = $('#sy_dept li.dept.selected').find('a').attr('data-value');
		var employee = user.id;
		var sections = [];
		if(sy!=undefined&&dept!=undefined){
			//console.log(SECTIONS);
			var esp;
			var htm='';
			LOAD_SECTIONS=[];
			$.each(SECTIONS,function(i,sec){
				if(sec.SectionAffiliation.length != 0){
					if(sec.SectionAffiliation[0]['esp']==sy+'.00'&&sec.Section['level_id']==dept){
						htm += '<li><a href="#" data-value="'+sec.Section.id+'"><i class="icon icon-check-empty"></i>'+sec.Section.name+'</a></li>';
						LOAD_SECTIONS.push(sec);
					}
				}
			});
			htm +='<li class="divider"></li>';
			htm +='<li><a href="#"><i class="icon icon-plus"></i> Section</a></li>';
			$('#sections').html(htm);
			$('#action-filter').removeClass('open');
			$('#sec_dropdown').addClass('open');
		}
		//to stop the propagation
		event.stopPropagation;
		return false;
	});
	$(document).on('click','#sections li',function(event){
		$('#sections li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		
		//populate subjects
		var curri_id = LOAD_SECTIONS[0]['SectionAffiliation'][0]['curriculum_id'];
		var level_id = LOAD_SECTIONS[0]['Section']['level_id'];
		$.getJSON('/recordbook/courses.json?curriculum_id='+curri_id+'&subjects='+level_id, function(data){
			console.log(data);
			var htm='<option value="#">Select</option>';
			$.each(data.data,function(i,e){
				htm +='<option value="'+e['Subject']['id']+'">'+e['Subject']['nomenclature']+'</option>';
			});
			$('#TeachingLoadSubjectId').html(htm);
		}); 
		//to stop the propagation
		event.stopPropagation;
		return false;
	});
	$(document).on('click','.validation',function(){
		var section = $('#TeachingLoadSectionId').val();
		var sy = $('#TeachingLoadEsp').val();
		var subject = $('#TeachingLoadSubjectId').val();
		$.getJSON('/recordbook/teaching_loads.json?section_id='+section+'&esp='+sy+'&subject_id='+subject, function(data){
			if(data.data.length>0){
				alert('Subject already loaded');
			}else{
				alert('Subject Loaded');
				$('.validation').removeClass('validation').addClass('intent-save').attr('type','submit').click();//remove class for validation
			}
		});
	});
	$(document).on('click','.intent-cancel',function(){
		$('.btn-primary').removeClass('validation').attr('type','button');//remove class if cancel click
	});
	$(document).on('click','.action-edit',function(){
		$('.btn-primary').addClass('intent-save').attr('type','submit');//add class for validation
	});
	$(document).on('click','#view-loads',function(){
		var sy = $('#sy_dept li.sy.selected').find('a').attr('data-value');
		var dept = $('#sy_dept li.dept.selected').find('a').attr('data-value');
		var section = $('#sections li').find('i.icon-check').parent().attr('data-value');
		if(sy!=undefined&&section!=undefined){
			$('#TeachingLoadTable').trigger('preload');
			$('#load_sec').val(section);
			$('#load_esp').val(sy);
			$('#TeachingLoadCanvasForm').trigger('request_content');
		}
		if(sy==undefined||section==undefined){
			if(sy==undefined){
				setTimeout(function(){
					$('#action-filter').addClass('open');
				},0);
			}
			if(section==undefined){
				setTimeout(function(){
					$('#sec_dropdown').addClass('open');
				},0);
			}
		}
	}); 
	$(document).on('click','.action-delete',function(){
		var row =$(this).parents('tr:first');
		var key  = row.attr('id');
		var data = $('.RECORD').trigger('access',{'key':key});
		var record =  window.RECORD.getActive();
		//console.log(record);
		var id = record.TeachingLoad.id;
		var col_count =  $('#TeachingLoadTable.RECORD tbody td').length;
		var model =  'teaching_loads';
		$.ajax({
			url:'/recordbook/'+model+'/delete/'+id,
			method:'POST',
			dataType:'json',
			success:function(data){
				var row_count = row.parent().find('tr').length;
				console.log(row_count);
				if(row_count  == 1){
					$('#TeachingLoadTable.RECORD tbody').hide();
					$('#TeachingLoadTable.RECORD tbody td span').empty();
					$('#TeachingLoadTable.RECORD tfoot').fadeIn().html('<tr><td colspan="'+col_count+'" class="text-center"><div class="well text-center"><button class="btn  btn-medium" id="filter-load"><i class="icon icon-filter"></i> Teaching Loads</button><div class="muted">No Teaching Loads found, click to filter.</div></div></td></tr>');	
				}else{
					row.remove();
				}
			}
		});
	});
	$(document).on('click','#intent-create',function(){
		var sy = $('#sy_dept li.sy.selected').find('a').attr('data-value');
		var section = $('#sections li').find('i.icon-check').parent().attr('data-value');
		var section_name = $('#sections li').find('i.icon-check').parent().text();
		$('#TeachingLoadSectionId').val(section);
		$('#TeachingLoadEsp').val(sy+'.00');
		$('#SectionName').val(section_name);
		$('.btn-primary').addClass('validation').removeClass('intent-save').removeAttr('type','submit');//add class to button save for validate
	});
	$(document).on('click','.action-edit',function(){
		var section = $('#sections li').find('i.icon-check').parent().attr('data-value');
		$('#TeachingLoadSectionId').val(section);
	});
	$(document).on('click','.level',function(){
		var dept = $(this).attr('dept');
		var selector='';
		switch(dept){
			case 'ps':
				selector = '.gs,.hs';
			break;
			case 'gs':
				selector = '.ps,.hs';
			break;
			case 'hs':
				selector = '.ps,.gs';
			break;
		}
		if($('.'+dept).hasClass('open')){
			$('.'+dept).slideUp('slow').removeClass('open');
		}else{
			$('.'+dept).slideDown('slow').addClass('open');
		}
		$(selector).slideUp('slow').removeClass('open');
	});
});