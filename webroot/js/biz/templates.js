$(document).ready(function(){
	window.databank = [];//initialize data bank
	$('#dept').button('toggle');
	$('#intent-create').click();
	//populate subjects
	$(document).on('click','#dept',function(){
		var dept = $(this).find('button.active').val();
		$.getJSON('/recordbook/courses.json?deptcode='+dept+'&fields=nomenclature,id&group=nomenclature', function(data) {
			var subjects = [];
			var htm = '<option value="#">Select subject</option>';
			$.each(data.data,function(i,e){
				htm += '<option value='+databank.length+'>'+e.Subject.nomenclature+'</option>';
				databank.push({'ids':e[0].ids.split(','),'levels':e[0].levels.split(',')});
			});
			console.log(databank);
			$('#TemplateSubjectId').html(htm);
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
});