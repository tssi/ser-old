$(document).ready(function(){
	$('.gs,.hs,.ps').slideUp('slow');
	$(document).on('click','#filter-recordbook',function(){
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
		event.stopPropagation;
		return false;
	});
	$(document).on('click','.level',function(){
		var dept = $(this).attr('dept');
		if($('.'+dept).hasClass('open')){
			$('.'+dept).slideUp('slow').removeClass('open');
		}else{
			$('.'+dept).slideDown('slow').addClass('open');
		}
	});
});