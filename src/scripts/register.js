var btnSub = document.getElementById("submit");
var inCheckBox = document.getElementsByName("reg_checkbox_accept")[0];
//var modCheckBox = document.getElementsByName("mod_checkbox")[0];
//var admCheckBox = document.getElementsByName("adm_checkbox")[0];
var txtAkcept = document.getElementById("akcept");
var divOtoczka = []; //document.getElementsByClassName("chk_box_otoczka");
var inRegLogin = document.getElementsByName("inp_login")[0];
var inRegPass = document.getElementsByName("inp_pass")[0];
var inRegPass2 = document.getElementsByName("inp_pass2")[0];
var inRegEmail = document.getElementsByName("inp_email")[0];
var btnSub2 = document.getElementById("submit2");
var powitanie = document.getElementById("powitanie");
var m_logowanie = document.getElementsByClassName("monit_logowanie")[0];
var logowanie_w = document.getElementById("logowanie_wrap");

var failed_logowanie = document.getElementById("failed_login");

getData();
btnSub.addEventListener('click', checkForm, false);
btnSub2.addEventListener('click', checkLog, false);

m_logowanie.addEventListener("keypress", function(e){
	var key = e.which || e.keyCode
	if(key == 13)
		checkLog();
	}
);
logowanie_w.addEventListener("keypress", function(e){
	var key = e.which || e.keyCode
	if(key == 13)
		checkForm();
	}
);
/********/


function getData(){
	//console.log("liczba chk_box_otoczka.length = " + document.getElementsByClassName("chk_box_otoczka").length);
	/*
	for(var i=0; i<document.getElementsByClassName("chk_box_otoczka").length; i++){
		divOtoczka[i] = document.getElementsByClassName("chk_box_otoczka")[i];
	}
	*/
	divOtoczka[0] = document.getElementById("chk_box_otoczka2");
}
function checkLog(){
	var l = document.getElementById("inp_log1");
	var h = document.getElementById("inp_log2");
	var ok = true;
	
	if(l.value == ""){
		l.style.border = "2px solid #900";
		l.style.padding = "8px";
		ok = false;
	}
	if(h.value == ""){
		h.style.border = "2px solid #900";
		h.style.padding = "8px";
		ok = false;
	}
	l.addEventListener('focus', setBack, false);
	h.addEventListener('focus', setBack, false);
	if(ok == true){
		login.style.cursor = "default";
		var frm = document.getElementById("add_logowanie");
		frm.submit();
		console.log("Login OK");
	}
}
function checkForm(){
	var l_or_r;
	var lg = document.getElementById("logowanie_wrap");
	var ready = true;
	(parseInt(lg.style.height) < 191) ? l_or_r = "log" : l_or_r = "reg";
	//console.log("l_or_r = " + l_or_r);
	//console.log(parseInt(lg.style.height))
	if(l_or_r == "log"){
		if(inRegLogin.value == ""){
			inRegLogin.style.border = "2px solid #900";
			inRegLogin.style.padding = "8px";
			ready = false;
		}
		if(inRegPass.value == ""){
			inRegPass.style.border = "2px solid #900";
			inRegPass.style.padding = "8px";
			ready = false;
		}
	}
	else if(l_or_r == "reg"){
		if(!inCheckBox.checked){
			divOtoczka[0].style.background = "#FF0000";
			ready = false;
		}
		if(inRegLogin.value == ""){
			inRegLogin.style.border = "2px solid #900";
			inRegLogin.style.padding = "8px";
			ready = false;
		}
		if(inRegPass.value == ""){
			inRegPass.style.border = "2px solid #900";
			inRegPass.style.padding = "8px";
			ready = false;
		}
		if(inRegPass2.value == "" || inRegPass2.value !== inRegPass.value){
			inRegPass2.style.border = "2px solid #900";
			inRegPass2.style.padding = "8px";
			inRegPass.value = "";
			inRegPass2.value = "";
			ready = false;
		}
		
		let x = inRegEmail.value.lastIndexOf(".");
		let y = parseInt(inRegEmail.value.indexOf("@")) + 1;
		
		if(inRegEmail.value == "" || inRegEmail.value.indexOf("@")<1 || x<y){
			inRegEmail.style.border = "2px solid #900";
			inRegEmail.style.padding = "8px";
			ready = false;
		}
		/*
		if(!modCheckBox.checked && !admCheckBox.checked){
			divOtoczka[0].style.background = "#FF0000";
			divOtoczka[1].style.background = "#FF0000";
			ready = false;
		}
		*/
	}
	inRegLogin.addEventListener('focus', setBack, false);
	inRegPass.addEventListener('focus', setBack, false);
	inRegPass2.addEventListener('focus', setBack, false);
	inRegEmail.addEventListener('focus', setBack, false);
	inCheckBox.addEventListener('change', chkBack, false);
	//modCheckBox.addEventListener('change', chkBack, false);
	//admCheckBox.addEventListener('change', chkBack, false);
	
	if(ready){
		var f = document.getElementById("logowanie");
		var att_action = document.createAttribute("action");		
		if(l_or_r == "log"){
			att_action.value = "pre_login_1.php";
			f.setAttributeNode(att_action);
			f.submit();
			console.log("ready and log");
		}
		else if(l_or_r =="reg"){
			//console.log("inRegEmail.value.indexOf(\"@\") = " + inRegEmail.value.indexOf("@") + "\ninRegEmail.value.lastIndexOf(\".\") = " + inRegEmail.value.lastIndexOf("."));
			//console.log("inRegEmail.value.lastIndexOf(\".\") > inRegEmail.value.indexOf(\"@\") + 1 = " + inRegEmail.value.lastIndexOf(".") + " > " + (inRegEmail.value.indexOf("@") + 1));		
			if(admCheckBox.checked){
				att_action.value = "register_admin.php";
				f.setAttributeNode(att_action);
				f.submit();
				console.log("ready and reg adm");
			}
			else{
				att_action.value = "register_user.php";
				f.setAttributeNode(att_action);
				f.submit();
				console.log("ready and reg usr");
			}
		}
		login.style.cursor = "default";
	}
}

function setBack(){
	var t = window.getComputedStyle(this);
	var padd = t.getPropertyValue('padding-top');
	//console.log("padd = " + padd);
	if(parseInt(padd) == 8 || this.style.padding == "8px"){
		this.style.padding = "10px";
		this.style.border = "none";
		if(this.getAttribute("name") != "inp_email") 
			this.value = "";
	}
}
function chkBack(){
	if(this.checked){
		var parentObj = this.parentNode;
		parentObj.style.background = "transparent";
		//console.log("yes, checked");
	}
}
function resetForm(){
	divOtoczka[0].style.background = "transparent";
	//divOtoczka[1].style.background = "transparent";
	//divOtoczka[2].style.background = "transparent";
	inRegLogin.style.border = "none";
	inRegLogin.style.padding = "10px";
	inRegLogin.value = "";
	inRegPass.style.border = "none";
	inRegPass.style.padding = "10px";
	inRegPass.value = "";
	inRegPass2.style.border = "none";
	inRegPass2.style.padding = "10px";
	inRegPass2.value = "";
	inRegEmail.style.border = "none";
	inRegEmail.style.padding = "10px";	
	inRegEmail.value = "";
	inCheckBox.checked = false;
}
function ValidateEmail(mail){
return (/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/.test(myForm.emailAddr.value));
}