var add = document.getElementById("add");
var places = document.getElementById("places");
var rank = document.getElementById("ranking");
var demo = document.getElementById("demo");
var demo_vertical = document.getElementsByClassName("demo_li_vertical")[0];
var demo_li_1 = document.getElementsByClassName("demo_li_1");
var demo_li_2 = document.getElementsByClassName("demo_li_2");
var demo_clicked = false;
var demo_li_1_clicked;

var bAdd = document.getElementById("btnAdd");
var bPlaces = document.getElementById("btnPlaces");
var bRank = document.getElementById("btnRank");
var footer_miejsca = document.getElementById("footer_miejsca");

bAdd.addEventListener('click', function(){show("add");}, false);
bPlaces.addEventListener('click', function(){show("places");}, false);
bRank.addEventListener('click', function(){show("rank");}, false);
footer_miejsca.addEventListener('click', function(){show("places");}, false);

demo_li_2[0].addEventListener('mouseover', function(){demofunk("ov1");}, false);
demo_li_2[1].addEventListener('mouseover', function(){demofunk("ov2");}, false);
demo_li_2[0].addEventListener('mouseout', function(){demofunk("ou1");}, false);
demo_li_2[1].addEventListener('mouseout', function(){demofunk("ou2");}, false);
demo_li_2[0].addEventListener('click', function(){demofunkset("c1");}, false);
demo_li_2[1].addEventListener('click', function(){demofunkset("c2");}, false);
demo_vertical.addEventListener('click', function(){if(demo_clicked){hidedemo(0,10,12);}else{showdemo(-180, 10, 12);}}, false);

show("add");
demofunkset("nothing");

function show(tekst)
{
	
	switch(tekst)
	{
		case "add":
		{
			add.style.display = "block";
			places.style.display = "none";
			rank.style.display = "none";
			
			bAdd.style.backgroundColor = "#ccc";
			bAdd.style.color = "#fff";
			bAdd.style.cursor = "default";
			
			bPlaces.style.backgroundColor = "#ddd";
			bPlaces.style.color = "#888";
			bPlaces.style.cursor = "pointer";
			
			bRank.style.backgroundColor = "#ddd";
			bRank.style.color = "#888";
			bRank.style.cursor = "pointer";
			break;
		}
		case "places":
		{
			add.style.display = "none";
			places.style.display = "block";
			rank.style.display = "none";
			
			bPlaces.style.backgroundColor = "#ccc";
			bPlaces.style.color = "#fff";
			bPlaces.style.cursor = "default";
			
			bAdd.style.backgroundColor = "#ddd";
			bAdd.style.color = "#888";
			bAdd.style.cursor = "pointer";
			
			bRank.style.backgroundColor = "#ddd";
			bRank.style.color = "#888";
			bRank.style.cursor = "pointer";			
			break;
		}
		case "rank":
		{
			add.style.display = "none";
			places.style.display = "none";
			rank.style.display = "block";
			
			bRank.style.backgroundColor = "#ccc";
			bRank.style.color = "#fff";
			bRank.style.cursor = "default";
			
			bAdd.style.backgroundColor = "#ddd";
			bAdd.style.color = "#888";
			bAdd.style.cursor = "pointer";
			
			bPlaces.style.backgroundColor = "#ddd";
			bPlaces.style.color = "#888";
			bPlaces.style.cursor = "pointer";			
			break;
		}		
		default:
		{
			alert("default");
			break;
		}
	}
}

function demofunk(e){
	if(demo_li_1_clicked){
		switch(e){
			case "ov1":{
				break;
			}
			case "ov2":{
				demo_li_2[1].style.textDecoration = "underline";
				demo_li_2[1].style.cursor = "pointer";
				break;
			}
			case "ou1":{
				break;
			}
			case "ou2":{
				demo_li_2[1].style.textDecoration = "none";
				demo_li_2[1].style.cursor = "default";
				break;
			}
		}
	}
	else{
		switch(e){
			case "ov1":{
				demo_li_2[0].style.textDecoration = "underline";
				demo_li_2[0].style.cursor = "pointer";
				break;
			}
			case "ov2":{
				break;
			}
			case "ou1":{
				demo_li_2[0].style.textDecoration = "none";
				demo_li_2[0].style.cursor = "default";
				break;
			}
			case "ou2":{
				break;
			}
		}
	}
}

function demofunkset(e){
	var loc = window.location.toString();
	(loc.indexOf("curl") > -1) ? (demo_li_1_clicked = false) : (demo_li_1_clicked = true);
	if(demo_li_1_clicked){
		switch(e){
			case "c1":{
				break;
			}
			case "c2":{
				demo_li_1[0].innerHTML = "";
				demo_li_1[1].innerHTML = "<img alt='włączone' src='img/chkbox.png'>";
				demo_li_1_clicked = false;
				demofunkset("nothing");
				//window.location.href = "http://localhost/cityexplorer/curl/index.php";
				window.location.href = "https://cityexplorer.000webhostapp.com/curl/index.php";
				break;
			}
			default:{
				demo_li_1[0].innerHTML = "<img alt='włączone' src='img/chkbox.png'>";
				demo_li_1[1].innerHTML = "";
				demo_li_2[0].style.fontWeight = "bold";
				demo_li_2[0].style.cursor = "default";
				demo_li_2[0].style.textDecoration = "none";
				demo_li_2[1].style.fontWeight = "normal";
				demo_li_2[1].style.cursor = "default";
				break;
			}
		}
	}
	else{
		switch(e){
			case "c1":{
				demo_li_1[0].innerHTML = "<img alt='włączone' src='img/chkbox.png'>";
				demo_li_1[1].innerHTML = "";
				demo_li_1_clicked = true;
				demofunkset("nothing");
				//window.location.href = "http://localhost/cityexplorer/index.php";
				window.location.href = "https://cityexplorer.000webhostapp.com/";
				break;
			}
			case "c2":{
				break;
			}
			default:{
				demo_li_2[1].style.fontWeight = "bold";
				demo_li_2[1].style.cursor = "default";
				demo_li_2[1].style.textDecoration = "none";
				demo_li_2[0].style.fontWeight = "normal";
				demo_li_2[0].style.cursor = "default";
				demo_li_1[0].innerHTML = "";
				demo_li_1[1].innerHTML = "<img alt='włączone' src='img/chkbox.png'>";
				break;
			}
		}
	}
}

function showdemo(left, czas, px){
	//console.log("left = " + left);
	if(left < 0){
		left = left + parseInt(px);
		demo.style.left = left + "px";
		if(left%4==-3 && px>0)
			px = px - 1;
		if(left > - 50 && px>0)
			px = px - 1;
		setTimeout(function(){showdemo(left, 10, px)},10);
		demo_clicked=true;
	}
}
function hidedemo(left, czas, px){
	var d = demo.getBoundingClientRect();
	//console.log("d.left = " + d.left);
	if(parseInt(d.left)>-191){
		if(left > -190){
			left = left - parseInt(px);
			demo.style.left = left + "px";
			if(left%4==-3 && px>0)
				px = px - 1;
			if(left < - 150 && px>0)
				px = px - 1;
			setTimeout(function(){hidedemo(left, 10, px)},10);
		}
	}
	demo_clicked=false;
}