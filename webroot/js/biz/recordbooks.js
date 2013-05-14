$(document).ready(function(){
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
			$.getJSON('/recordbook/teaching_loads.json?employee_id='+employee+'&group=subject_id&esp='+sy, function(data){
				console.log(data);
				var htm='';
				$.each(data.data,function(i,e){
					htm +='<li><a href="#" data-value='+e.Subject.id+'><i class="icon icon-check-empty"></i> '+e.Subject.nomenclature+'</a></li>';
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
});