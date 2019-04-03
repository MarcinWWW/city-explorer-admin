function hide_log(time1, time2, time3){

	//var a = document.getElementsByTagName("article")[0];
	var a = document.getElementById("art");
	var cl = document.createAttribute("class");
	var k = document.getElementsByClassName("krzyzyk")[0];

	var komunikat = document.getElementById("komunikat_log");
	//console.log("a = " + a);
	a.setAttributeNode(cl);
	a.className += " blur-filter";
	
	setTimeout(function(){ 
		k.style.display = "none";
		komunikat.style.height = "0px"; 
		komunikat.style.transition = "height " + time3 ;
		}, time1);
		
	setTimeout(function(){
		komunikat.style.display = "none";
		a.removeAttribute("class");
	}, time2);	
}