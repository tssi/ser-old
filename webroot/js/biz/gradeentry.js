$(document).ready(function(){
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
		if(sy!=undefined&period!=undefined){
			$.getJSON('/recordbook/teaching_loads.json?employee_id='+employee+'&esp='+sy, function(data){
				TEACH_LOAD={};
				var htm='';
				$.each(data.data,function(i,e){
					if(TEACH_LOAD[e.Subject.id]==null){
						TEACH_LOAD[e.Subject.id]={'level':e.Section.Level.name,
												  'subject_id':e.Subject.id,
												  'subject_name':e.Subject.nomenclature,
												  'sections':[]
												};
					}
					TEACH_LOAD[e.Subject.id]['sections'].push({'id':e.Section.id,'name':e.Section.name});
				});
				$.each(TEACH_LOAD,function(a,b){
					htm +='<li class="nav-header">'+b.level+' '+b.subject_name+'</li>';
					$.each(b.sections,function(i,section){
						htm += '<li><a href="#" subject="'+b.subject_id+'" data-value="'+section.id+'"><i class="icon icon-check-empty"></i>'+section.name+'</a></li>';
					});
					htm +='<li class="divider"></li>';
				});
				htm +='<li><a href="#"><i class="icon icon-plus"></i> Subject</a></li>';
				$('#subjects').html(htm);
			});
		}
	});
	$(document).on('click','#subjects li',function(){
		$('#subjects li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		var sy = $('#sy_period li.sy.selected').find('a').attr('data-value');
		var section = $(this).find('a').attr('data-value');
		var subject = $(this).find('a').attr('subject');
		var period = $('#sy_period li.period.selected').find('a').attr('data-value');
		console.log(section,subject);
		
		$.getJSON('/recordbook/recordbooks.json?section_id='+section+'&subject_id='+subject+'&esp='+sy+'.'+period+'0', function(data){
			console.log(data);
			var htm='<tr>';
			$.each(data.data[0]['Measurable'],function(i,obj){
				htm +='<th class="text-center"><a>'+obj.Measurable.header+'</a></th>';
			});
			htm +='</tr>';
			$('.header').html(htm); //populate header
			
			var htm2 ='';
			for(var x=1;x<=25;x++){
				htm2 +='<tr>';
				$.each(data.data[0]['Measurable'],function(a,b){
					htm2 +='<td>&nbsp</td>';
				});
				htm2 +='</tr>';
			}
			$('#recordbook_tbody').html(htm2);
		});
	});
});