var SER = {};
SER.Recordbook = function(_elem,section,subject,sy,period){
	var measurables = {};
	var components = {};
	var students = {};
	var rawscores = {};
	var registry={'M':{},'S':{}};
	var objctr=0;
	var elem = _elem;
	
	function init(rc){
		$.getJSON('/recordbook/recordbooks.json?section_id='+section+'&subject_id='+subject+'&esp='+sy+'.'+period+'0', function(data){
			var hdr='';
			var dtl='';
			_newSheet();
			$.each(data.data[0]['Measurable'],function(i,obj){
				var mid = _setMeasurable({'id':obj.Measurable.id,'obj':obj.Measurable,'col':i});
				_addHeader({'mid':mid,'header':obj.Measurable.header});
				_addCell({'c':i});
			});
			new  SER.Classlist($('.classlist'), rc, section, sy, period);
			new SER.Rawscore(rc, subject, section, sy, period);
		});
	}
	
	elem.on('keyup','.cell',function(e){
		var cell = $(this);
		var row = cell.attr('r');
		var col = cell.attr('c');
		if(e.which == 13){
			//get students and measurables details
			var rid =  $(this).attr('rid');
			var mid = $('.header th:nth-child('+(col+1)+')').attr('mid');
			var sid;
			row++;
			$.each($('.classlist').find('li'),function(a,b){
				if(a==row){
					sid = $(b).attr('sid');
				}
			});
			var meas = _getMeasurable(mid);
			var stud = _getStudent(sid);
			console.log(rawscores);
			raw = _getRawscore(rid)?_getRawscore(rid):{'id':null};
			var score = $(this).val();
			//end
			//add score
			$.ajax({
				'url':'/recordbook/rawscores/add',
				'type':'POST',
				'dataType':'json',
				'data':{data:{'Rawscore':{id:raw.id,'student_id':stud.id,'measurable_id':meas.id,'score':score}}},
				'success':function(data){
					if(data.status){
						if(!raw.id){
							var rid = _setRawscore({'id':data.data.Rawscore.id,'obj':data.data.Rawscore});
							cell.attr('rid',rid);
						}
					}
				}
			});
			//end
			var n_input = elem.find('input[c='+col+'][r='+row+']');
			if(n_input.length==0){
				col++;
				row=0;
				n_input = elem.find('input[c='+col+'][r='+row+']');
				if(n_input.length==0){
					col=0;
					n_input = elem.find('input[c='+col+'][r='+row+']');
				}
			}
			n_input.focus();
		}
	});
	
	function _setMeasurable(obj){
		var index = 'm-'+(objctr++);
		measurables[index]=obj;
		registry['M'][obj.id]=obj.col;
		return index;
	}
	function _getMeasurable(index){
		return measurables[index];
	}
	function _setComponent(obj){
		var index = 'c-'+(objctr++);
		components[index]=obj;
		return index;
	}
	function _getComponent(index){
		return components[index];
	}
	function _setStudent(obj){
		var index = 's-'+(objctr++);
		students[index]=obj;
		registry['S'][obj.id]=obj.row;
		return index;
	}
	function _getStudent(index){
			return students[index];
	}
	function _setRawscore(obj){
		var index = 'r-'+(objctr++);
		rawscores[index]=obj;
		return index;
	}
	function _getRawscore(index){
		return rawscores[index];
	}
	
	function _setCell(rawscore){
		console.log(registry);
		console.log(rawscore.Student.id);
		var c = registry['S'][rawscore.Student.id];
		var r = registry['M'][rawscore.Measurable.id];
		var cell = elem.find('.cell[c="'+c+'"][r="'+r+'"]');
		var obj = {'id':rawscore.Rawscore.id,'obj':rawscore};
		cell.val(rawscore.Rawscore.score);
		cell.attr('rid',_setRawscore(obj));
	}
		
	function slugify(attr){
		var attrs=[];
		$.each(attr,function(key,value){
			var slug = key+'="'+value+'"';
			attrs.push(slug);
		});
		return attrs.join(' ');
	}
	
	//Recordbook UI
	function _newSheet(){
		elem.find('tbody').empty();
		elem.find('tbody').append('<tr class="data-row"></tr>');
		elem.find('thead').empty();
		elem.find('thead').append('<tr class="data-head"></tr>');
	}
	function _addHeader(attr){
			var mid = attr.mid;
			var header = attr.header;
			elem.find('thead tr:first').append('<th mid="'+mid+'"><a>'+header+'</a></th>');
	}
	function _addCell(attrs){
			elem.find('tbody tr:first').append('<td><input disabled="disabled" type="text" class="cell" '+slugify(attrs)+'></td>');
	}
	var recordbook = {
			setStudent:_setStudent,
			getStudent:_getStudent,
			setRawscore:_setRawscore,
			getRawscore:_getRawscore,
			setCell:_setCell,
			addSpacer:function(){
				var spacer = elem.find('tbody tr:last').clone();
				spacer.find('td').html('<span class="cell"></span>');
				spacer.wrap('<tr></tr>');
				$(spacer).insertBefore(elem.find('tbody tr:last'));
			},
			updateCells:function(attrs){
				$.each(attrs,function(key,value){
					elem.find('tbody tr:last td input.cell').attr(key,value);
				});
			},
			cloneCells:function(){
				elem.find('tbody').append(elem.find('tbody tr:last').clone());
			}
		};

	init(recordbook);
	
	return recordbook;
};

SER.Classlist =  function(elem, rc, section, sy, period){
		$.getJSON('/recordbook/classlists.json?section_id='+section+'&esp='+sy+'.'+period+'0', function(data){
			var htm='<li class="nav-header text-center">BOYS</li>';
			var last_gen ='M';
			rc.addSpacer();
			$.each(data,function(i,student){
				var sid = rc.setStudent({'id':student.Student.id,'obj':student.Student,'row':i});
				if(last_gen!=student.Student.gender){
					htm +='<li class="nav-header text-center">GIRLS</li>';
					rc.addSpacer();
				}
				htm+='<li class="student" sid="'+sid+'">'+student.Student.last_name+', '+student.Student.first_name+' '+student.Student.middle_name+'</li>';
				rc.updateCells({'r':i,'g':student.Student.gender});
				if(i<data.length-1){
					rc.cloneCells();
				}
				last_gen = student.Student.gender;
			});
			elem.html(htm);
		});
}
SER.Rawscore = function(rc, subject, section, sy, period){
	$.getJSON('/recordbook/rawscores.json?rawscores='+section+','+subject+','+sy+'.'+period+'0', function(data){
		$.each(data.data,function(i,rawscore){
			rc.setCell(rawscore);
		});
	});
}
