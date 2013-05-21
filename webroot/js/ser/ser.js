var SER = {};
SER.Recordbook = function(_rc){
	var measurables = {};
	var components = {};
	var students = {};
	var objctr=0;
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
		}
	};
};
