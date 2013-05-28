var SER = {};
SER.Recordbook = function(_elem,section,subject,sy,period){
	var measurables = {};
	var components = {};
	var students = {};
	var rawscores = {};
	var registry={'M':{},'S':{},'RS':{},'SI':{}};
	var objctr=0;
	var elem = _elem;
	
	function init(section,subject,sy,period){
		var cl =  new  SER.Classlist(section, sy, period);
		var ms;
		var rs;
		
		cl.bind('success',function(){
			ms =  new  SER.Measurable(section,subject,sy,period);
			ms.bind('success',function(){
				var records = [];
				var students =cl.getClasslist();
				var row_hdr=[];
				var col_hdr=[];
				var readonly=[];
				rs =  new  SER.Rawscore(subject,section,sy,period);
				var maxed =false;
				var $window =$(window);
				var calculateSize = function () {
					  var offset = elem.offset();
					  availableWidth = $window.width() - offset.left + $window.scrollLeft();
					  availableHeight = $window.height() - offset.top + $window.scrollTop();
				};
				$window.on('resize', calculateSize);
				
				rs.bind('success',function(){
					$.each(rs.getRawscore(),function(i,score){
						if(!registry['RS'][score.student_id]){
							registry['RS'][score.student_id]={};
						}
						registry['RS'][score.student_id][score.measurable_id]={'id':score.id,'score':score.score};
					});	
					
					for(var r=0;r<(students.length);r++){
						var record ={};
						var sid = students[r]['id'];
						registry['S'][sid]=r;
						registry['SI'][r]=sid; // StudendId index
						row_hdr.push(students[r]['fullname']);
						$.each(ms.getMeasurable(),function(c,meas){
							record[meas.id]={'id':null,'score':null};
							if(!registry['RS'][sid]){
								registry['RS'][sid]={};
							}
							if(registry['RS'][sid][meas.id]){
								record[meas.id]=registry['RS'][sid][meas.id];
							}
							if(r==0){
								registry['M'][meas.id]=c;
								col_hdr.push(meas.header);
							}
						});
						if(students[r]['readonly']){
							readonly.push(r);
						}
						records.push({'sid':sid, 'scores':record});
					}
					var _schema={'sid':null, 'scores':{}};
					var _columns=[];
					$.each(records[0]['scores'],function(key,value){
						_schema['scores'][key]={'id':null,'score':null};
						_columns.push({data:'scores.'+key+'.score'});
					});
				
					$(elem).handsontable({
						rowHeaders:row_hdr,
						colHeaders:col_hdr,
						dataSchema: _schema,
						columns: _columns,
						cells: function (row, col, prop) {
							var cellProperties = {}
							$.each(readonly,function(i,r){
								if(row === r) {
									cellProperties.readOnly = true;
								}
							});
							return cellProperties;
						},
						data:records,
						afterChange: function (change, source) {
							if (source === 'loadData') {
								return; //don't save this change
							}
							var _row =  change[0][0];
							var _col =  change[0][1];
							var _score =  change[0][3];
							var _mid = _col.split('.')[1];
							var _sid = registry['SI'][_row];
							var _cell = registry['RS'][_sid][_mid];
							if(_cell==undefined){
								_cell = registry['RS'][_sid][_mid]={'id':null,'score':null}
							}
							//ajax
							rs.save(_cell.id,_sid,_mid,_score);
							
						},
						width: function () {
							if (maxed && availableWidth === void 0) {
							  calculateSize();
							}
							return maxed ? availableWidth : $window.width();
						},
						height: function () {
							if (maxed && availableHeight === void 0) {
							  calculateSize();
							}
							return maxed ? availableHeight : $window.height()-90;
						}
					});
					//$(elem).handsontable('alter','insert_row',index:1);
					rs.bind('saved',function(evt,args){
						registry['RS'][args.data.sid][args.data.mid]={'id':args.data.id,'score':args.data.score}
					});
				});
				
				
			});
		});
		
	}
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
		var r = registry['S'][rawscore.Student.id];
		var c = registry['M'][rawscore.Measurable.id];
		var cell = elem.find('.cell[c="'+c+'"][r="'+r+'"]');
		var obj = {'id':rawscore.Rawscore.id,'obj':rawscore};
		console.log(obj);
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
			elem.find('tbody tr:first').append('<td><input type="text" class="cell" '+slugify(attrs)+'></td>');
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

	init(section,subject,sy,period);
	
	return recordbook;
};

SER.Classlist =  function(section, sy, period){
		var _classlists;
		var self = $(this);
		$.getJSON('/recordbook/classlists.json?section_id='+section+'&esp='+sy+'.'+period+'0', function(data){
			_classlists = [];
			var last_gen = 'M';
			_classlists.push({'id':null,'fullname':'BOYS','readonly':true});
			$.each(data,function(i,student){
				if(last_gen!=student.Student.gender){
					_classlists.push({'id':null,'fullname':'GIRLS','readonly':true});
				} 
				last_gen=student.Student.gender;
				_classlists.push({'id':student.Student.id,'fullname':student.Student.last_name+', '+student.Student.first_name+' '+student.Student.middle_name,'readonly':false});
			});
			self.trigger('success');
		});
		self.getClasslist=function(){  
			return _classlists;
		}
		return self;
		
}
SER.Measurable =  function(section,subject,sy,period){
		var _measurables;
		var self = $(this);
		$.getJSON('/recordbook/recordbooks.json?section_id='+section+'&subject_id='+subject+'&esp='+sy+'.'+period+'0', function(data){
			_measurables = [];
			$.each(data.data[0]['Measurable'],function(i,obj){
				_measurables.push({'id':obj.Measurable.id,'gid':obj.Measurable.general_component_id,'header':obj.Measurable.header});
			});
			self.trigger('success');
		});
		self.getMeasurable=function(){  
			return _measurables;
		}
		return self;
}
SER.Rawscore = function(subject, section, sy, period){
	var _rawscores;
	var self = $(this);
	$.getJSON('/recordbook/rawscores.json?rawscores='+section+','+subject+','+sy+'.'+period+'0', function(data){
		_rawscores =[];	
		$.each(data.data,function(i,obj){
			_rawscores.push(obj.Rawscore);
		});
		self.trigger('success');
	});
	self.getRawscore=function(){  
		return _rawscores;
	}
	self.save =function(raw,stud,meas,score){
		$.ajax({
      'url':'/recordbook/rawscores/add',
      'type':'POST',
      'dataType':'json',
      'data':{data:{'Rawscore':{'id':raw,'student_id':stud,'measurable_id':meas,'score':score}}},
      'success':function(data){
        if(data.status){
		 var raw_obj =  {'id':data.data.Rawscore.id,'sid':data.data.Rawscore.student_id,'mid':data.data.Rawscore.measurable_id,'score':data.data.Rawscore.score};
		 self.trigger('saved',{'data':raw_obj});
        }
      }
    });
	
	}
	return self;
}
