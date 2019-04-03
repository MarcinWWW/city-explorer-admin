var color1 = "f1da36";
var color2 = "fefcea";

var log_wrap = document.getElementById("logowanie_wrap");
var reg = document.getElementById('rejestracja');
var log = document.getElementById('logowanie');
var login = document.getElementById('login');
var login_child = document.getElementsByClassName("login_tekst")[0].innerHTML;
var sbmt = document.getElementById('submit');
var sbmt2 = document.getElementById('submit2');

//	object: the element or window object
//	type: resize, scroll (event type)
//	callback: the function reference
var addEvent = function(object, type, callback){
	if(object == null || typeof(object) == 'undefined') return;
	if(object.addEventListener){
		object.addEventListener(type, callback, false);
	} else if(object.attachEvent){
		object.attachEvent("on" + type, callback);
	} else {
		object["on"+type] = callback;
	}
};

addEvent(window, "resize", colorBoxes);
addEvent(window, "mouseup", function(e){closeLogin(e.target)});

//console.log(login_child);
if(login_child.indexOf("rejestracja")>0){
	login.addEventListener('click', open_login, false);
}
reg.addEventListener('click', open_reg, false);
sbmt2.addEventListener('mouseover', colorSbmt2click, false);
sbmt2.addEventListener('mouseout', colorSbmt2, false);
colorSbmt2();

log_wrap.style.height = '0px';

function open_login(){	
	colorBoxes(log_wrap, 50, 400);
	if(log_wrap.style.height === '190px'){
		//resetForm();
		/*
		setTimeout(function(){
			var log_wrap = document.getElementById('logowanie_wrap');
			log_wrap.style.height = '0px';
			}, 400);
		*/
		log_wrap.style.height = '0px';
	}
	else{
		if(log_wrap.style.height === '0px'){
			reg.style.display = "inline-block";
			sbmt.style.display = "inline-block";
			sbmt.style.position = "relative";
			sbmt.style.top = "-5px";
			log_wrap.style.height = '190px';
		}
		else{
			log_wrap.style.height = '0px';
		}
	}
}
function open_reg(){
	if(log_wrap.style.height === '190px'){
		//console.log(rej_wrap.style.height); 
		reg.style.display = "none";
		sbmt.style.position = "absolute";
		sbmt.style.top = "455px";
		log_wrap.style.height = '550px';
	}
}
function colorBoxes(obj, margin1, margin2){
	var colorA = getColor(color1, color2, margin1);
	var colorB = getColor(color1, color2, margin2);
	var gradient = "linear-gradient(to left, " + colorA.toString() + " 0%, " + colorB.toString() + " 100%)";
	obj.style.background = gradient;
}
function closeLogin(obj){
	var ol = logowanie.getElementsByTagName('ol')[0];
	var dl = [];
	var chk = [];
	dl[0] = logowanie.getElementsByClassName('dologowania')[0];
	dl[1] = logowanie.getElementsByClassName('dologowania')[1];
	dl[2] = logowanie.getElementsByClassName('dologowania')[2];
	chk[0] = logowanie.getElementsByClassName('chk_box_otoczka')[0];
	chk[1] = logowanie.getElementsByClassName('chk_box_otoczka')[1];
	chk[2] = logowanie.getElementsByClassName('chk_box_otoczka')[2];
	if(obj != login && obj.parentNode != login && obj != log && obj.parentNode != log && obj != log_wrap){
		if(obj != ol && obj.parentNode != ol){
			if(obj != dl[0] && obj.parentNode != dl[0]){
				if(obj != dl[1] && obj.parentNode != dl[1]){
					if(obj != dl[2] && obj.parentNode != dl[2]){
						if(obj != chk[0] && obj.parentNode != chk[0]){
							if(obj != chk[1] && obj.parentNode != chk[1]){
								if(obj != chk[2] && obj.parentNode != chk[2]){
									if(log_wrap.style.height === '190px' || log_wrap.style.height === '550px'){
										log_wrap.style.height = '0px';
										//console.log("closeLogin + obj = " + obj);
									}
								}					
							}				
						}
					}
				}
			}
		}
	}
}
function colorSbmt2(){
	//var len = parseInt(sbmt2.style.width);
	colorBoxes(sbmt2, 450, 650);
}
function colorSbmt2click(){
	colorBoxes(sbmt2, 700, 900);
}