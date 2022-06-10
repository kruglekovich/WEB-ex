function go(){
	var test = document.getElementById('test');
	var value = test.value;
	if (!isNaN(value)){
		var result = document.getElementById('result');
		result.value = value*value;
	} else {
		alert('Введено не число!')
	}
}