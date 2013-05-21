var SER = {};
var SER.Recordbook = function(_id){
	var measurables = {};
	var components = {};
	var students = {};
	var objctr=0;
	return{
		id:_id,
		addMeasurable:function(obj){
			var index = 'm-'+(objctr++);
			measurables[index]=obj;
			return index;
		},
		addComponent:function(obj){
			var index = 'c-'+(objctr++);
			components[index]=obj;
			return index;
		},
		addStudent:function(obj){
			var index = 'c-'+(objctr++);
			students[index]=obj;
			return index;
		}
	};
}