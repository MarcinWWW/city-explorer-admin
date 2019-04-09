var add = document.getElementById("add");
var places = document.getElementById("places");
var rank = document.getElementById("ranking");

var bAdd = document.getElementById("btnAdd");
var bPlaces = document.getElementById("btnPlaces");
var bRank = document.getElementById("btnRank");
var footer_miejsca = document.getElementById("footer_miejsca");

bAdd.addEventListener('click', function(){show("add");}, false);
bPlaces.addEventListener('click', function(){show("places");}, false);
bRank.addEventListener('click', function(){show("rank");}, false);
footer_miejsca.addEventListener('click', function(){show("places");}, false);

show("add");

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

