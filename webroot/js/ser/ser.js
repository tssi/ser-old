var SER = {};
SER.Recordbook = function(_rc,_elem){
	var measurables = {};
	var components = {};
	var students = {};
	var objctr=0;
	var elem = _elem;
	elem.find('tbody').empty();
	elem.find('tbody').append('<tr class="data-row"></tr>');
	elem.find('thead').empty();
	elem.find('thead').append('<tr class="data-head"></tr>');
	
	elem.on('keyup','.cell',function(e){
		var row = $(this).attr('r');
		var col = $(this).attr('c');
		if(e.which = 13){
			//get students and measurables details
			var mid = $('.header th:nth-child('+(col+1)+')').attr('mid');
			var sid;
			row++;
			$.each($('.classlist').find('li'),function(a,b){
				if(a==row){
					sid = $(b).attr('sid');
				}
			});
			var meas = measurables[mid];
			var stud = students[sid];
			console.log(stud,meas);
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
	function slugify(attr){
		var attrs=[];
		$.each(attr,function(key,value){
			var slug = key+'="'+value+'"';
			attrs.push(slug);
		});
		return attrs.join(' ');
	}
	return{
		recordbook:_rc,
		setMeasurable:function(obj){
			var index = 'm-'+(objctr++);
			measurables[index]=obj;
			return index;
		},
		getMeasurable:function(index){
			return measurables[index];
		},
		setComponent:function(obj){
			var index = 'c-'+(objctr++);
			components[index]=obj;
			return index;
		},
		getComponent:function(index){
			return components[index];
		},
		setStudent:function(obj){
			var index = 's-'+(objctr++);
			students[index]=obj;
			return index;
		},
		getStudent:function(index){
			return students[index];
		},
		addHeader:function(attr){
			var mid = attr.mid;
			var header = attr.header;
			elem.find('thead tr:first').append('<th mid="'+mid+'"><a>'+header+'</a></th>');
		},
		addCell:function(attrs){
			elem.find('tbody tr:first').append('<td><input type="text" class="cell" '+slugify(attrs)+'></td>');
		},
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
};
