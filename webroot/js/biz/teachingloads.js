$(document).ready(function(){
	var SECTIONS = $.parseJSON($('#all_sections').val());
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
			var seccode;
			var htm='';
			$.each(SECTIONS,function(i,sec){
				if(sec.SectionAffiliation.length != 0){
					if(sec.SectionAffiliation[0]['esp']==sy+'.00'&&sec.Section['level_id']==dept){
						htm += '<li><a href="#" data-value="'+sec.Section.id+'"><i class="icon icon-check-empty"></i>'+sec.Section.name+'</a></li>';
						sections.push(sec);
					}
				}
			});
			htm +='<li class="divider"></li>';
			htm +='<li><a href="#"><i class="icon icon-plus"></i> Section</a></li>';
			$('#sections').html(htm);
			$('#action-filter').removeClass('open');
			$('#sec_dropdown').addClass('open');
		}
		event.stopPropagation;
		return false;
	});
	$(document).on('click','#sections li',function(event){
		$('#sections li').find('i').not('.icon-plus').removeClass('icon-check').addClass('icon-check-empty');
		$(this).find('i').removeClass('icon-check-empty').addClass('icon-check');
		event.stopPropagation;
		return false;
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