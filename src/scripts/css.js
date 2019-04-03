var wybrany = document.getElementById('cssselect');
wybrany.addEventListener('change', changeCss);

function changeCss(){
	var sheet = wybrany.options[wybrany.selectedIndex].value;
	document.getElementById('pagestyle').setAttribute('href', sheet);
	alert("css zmieniony na " + sheet);
}
