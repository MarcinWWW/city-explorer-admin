	//interfejs

	// formularz dodawanie
	var _dodaj = document.getElementById("add_materialy_dodaj");

	// formularz usuwanie
	var _usun = document.getElementById("add_materialy_usun");
	var _iksy = document.getElementsByClassName("iksUsun");
	for(var i=0; i<_iksy.length; i++){
		_iksy[i].addEventListener('click', function(){
			console.log("usuwam " + this.parentNode.parentNode.firstChild.innerHTML); 
			deleteBeacon(this.parentNode.parentNode);}, false);
	}
	// formularz dodawanie obrazka
	var filename = '';
	var _btn_ob = document.getElementById("obrazek");
	var _lbl_ob = document.getElementById("labelObrazek");
	var _form_ob = document.getElementById("add_materialy_img");
	_btn_ob.addEventListener('change', function(e){
		var input = e.srcElement;
		var att_action = _form_ob.getAttribute("action");
		filename = input.files[0].name;
		if(filename != ''){
			_lbl_ob.innerHTML = filename;
			att_action.value = "send_img.php";
			_form_ob.submit();
		}
		else
			_lbl_ob.innerHTML = "Wybierz obraz";
	}, false);
	
	// SUBMIT kolorowanie
	var sbmt_dodaj = document.getElementById('submit_dodaj');
	sbmt_dodaj.addEventListener('mouseover', function(){ colorBoxes(sbmt_dodaj, 700, 900); }, false);
	sbmt_dodaj.addEventListener('mouseout', function(){ colorBoxes(sbmt_dodaj, 350, 650); }, false);
	colorBoxes(sbmt_dodaj, 350, 650);
	var obrazek = document.getElementById("labelObrazek");
	obrazek.addEventListener('mouseover', function(){ colorBoxes(obrazek, 700, 900); }, false);
	obrazek.addEventListener('mouseout', function(){ colorBoxes(obrazek, 350, 650); }, false);
	colorBoxes(obrazek, 350, 650);

	// dodawanie
	var _bID = document.getElementById("beacon_id");
	var _bID_minor = document.getElementById("beacon_id_minor");
	var _bNazwa = document.getElementById("beacon_nazwa");
	var _bGrupa = document.getElementById("beacon_grupa");
	var _bLocation = document.getElementById("beacon_location");
	var _bAddress = document.getElementById("beacon_address");
	//var _bCoord = document.getElementById("beacon_coordinates");
	//dodawanie arr
	var _arr = [_bID, _bID_minor, _bNazwa, _bGrupa, _bLocation, _bAddress];
	//dodawanie submit
	var _sbmt_dodaj = document.getElementById("submit_dodaj");


	_sbmt_dodaj.addEventListener('click', validateDodaj, false);

	function validateDodaj(){
		var ready = true;
		for(var i=0; i<_arr.length; i++){
			if(_arr[i].value == ''){
				_arr[i].style.border = "2px solid #900";
				_arr[i].style.padding = "8px";
				ready = false;
			}
		}
		_bID.addEventListener('focus', setBack, false);		
		_bID_minor.addEventListener('focus', setBack, false);		
		_bNazwa.addEventListener('focus', setBack, false);
		_bGrupa.addEventListener('focus', setBack, false);
		_bLocation.addEventListener('focus', setBack, false);
		_bAddress.addEventListener('focus', setBack, false);
		//_bCoord.addEventListener('focus', setBack, false);
		
		if(ready){
			var att_action = document.createAttribute("action");
			att_action.value = "add_beacon.php";
			_dodaj.setAttributeNode(att_action);
			_dodaj.submit();
			console.log("submit add_beacon");
			/*
			var att_action_ob = _form_ob.getAttribute("action");
			att_action.value = "send_img_server.php";
			_form_ob.submit();
			*/
		}
	}
	
	//usuwanie

	function deleteBeacon(x){
		var child = x.firstChild.innerHTML;
		var input_del = document.getElementById("beacon_delete");
		if(window.confirm("Czy usunąć Beacon?")){
			input_del.value = child;
			_usun.submit();
			console.log("delete beacon id = " + child);
		}
		else{
			// nic
		}
	}
