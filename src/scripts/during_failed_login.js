function during_failed_login(){
	
	window.addEventListener("keypress", function(e){
		var key = e.which || e.keyCode
		if(key == 13)
			hide_log(200,700,'0.5s');
		}
	);
}