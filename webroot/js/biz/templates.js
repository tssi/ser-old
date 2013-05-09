var SUBJECT;
$(document).ready(function(){
	window.databank = [];//initialize data bank
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
		var dept = $('#dept li').find('i.icon-check');
		SUBJECT = $('#subjects li').find('i.icon-check').parent().attr('ids');
		$('#TemplateTable').trigger('preload');
		$.getJSON($.urlEncode('/recordbook/templates.json',{'subject_id':SUBJECT}), function(response){ 
			if(response.data.length == 0){
				$('#TemplateTable').trigger('emptyRecord');
			}else{
				console.log(response.data);
				$('#TemplateTable').trigger('populate',{'data':response.data,'append':false});
				$('#TemplateTable').trigger('showRecord');
			}
		});
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
	
	/****************************************UPDATE TABLE**********************************************/
	$(document).bind('UpdateTable', function(e){
		$.getJSON('/recordbook/templates.json?subject_id='+SUBJECT, function(data){
			$.each(data.data,function(i,o){
				var a = $('#TemplateTable').dataTable().fnAddData([
					//o.Template.id,
					o.Subject.id,
					o.Template.name,
					o.Template.limit,
					o.Template.esp,
					o.Template.created_by,
					'<div class="btn-group">'+
						'<div class="btn-group btn-center">'+
							'<button class="btn dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i><span class="caret"></span></button>'+
							'<ul class="dropdown-menu">'+
								'<li><a href="#intent-modal" data-toggle="modal"  class="action-view view-subjects"><i class="icon-eye-open"></i> Subjects</a></li>'+
								'<li><a href="#intent-modal" data-toggle="modal"  class="action-view view-template_details"><i class="icon-eye-open"></i> Template Details</a></li>'+
								' <li><a href="#" class="action-delete"><i class="icon-remove"></i> Delete</a></li>'+
							'</ul>'+
						'</div>'+
					'</div>'
				]);
				var nTr = $('#TemplateTable').dataTable().fnSettings().aoData[ a[0] ].nTr;
				$('td', nTr)[0].setAttribute( 'class', 'id text-center' );
			});			
		}); 
	});

});