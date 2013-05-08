$(document).ready(function(){
	window.databank = [];//initialize data bank
	$('#dept').button('toggle');
	//$('#intent-create').click();
	//populate subjects
	$(document).on('click','#dept li',function(){
		//row.find('i').removeClass("icon-check").addClass("icon-check-empty");
		//$(this).find('i').removeClass("icon-check-empty").addClass("icon-check"); 
		$('#dept li').find('i').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		//INSERT var level = $(this).find('a').attr('data-value');
		$.getJSON('/recordbook/courses.json?subjects=G1', function(data) {
			console.log(data);
			var htm='';
			$.each(data.data,function(i,e){
				htm +='<li><a href="#">'+e.Subject.nomenclature+'</a></li>';
			});
			htm +='<li class="divider"></li>';
			htm +='<li><a href="#"><i class="icon icon-plus"></i> Subject</a></li>';
			$('#subjects').html(htm);
		});
		/* $.getJSON('/recordbook/courses.json?deptcode='+dept+'&fields=nomenclature,id&group=nomenclature', function(data) {
			var subjects = [];
			var htm = '<option value="#">Select subject</option>';
			$.each(data.data,function(i,e){
				htm += '<option value='+databank.length+'>'+e.Subject.nomenclature+'</option>';
				databank.push({'ids':e[0].ids.split(','),'levels':e[0].levels.split(',')});
			});
			console.log(databank);
			$('#TemplateSubjectId').html(htm);
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