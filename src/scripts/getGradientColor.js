function getColor(colorX, colorY, margin){
	var r1 = colorX[0].toString() + colorX[1].toString();
	var g1 = colorX[2].toString() + colorX[3].toString();
	var b1 = colorX[4].toString() + colorX[5].toString();
	
	r1 = parseInt(r1, 16);
	g1 = parseInt(g1, 16);
	b1 = parseInt(b1, 16);
	
	var r2 = parseInt(colorY[0].toString() + colorY[1].toString(), 16);
	var g2 = parseInt(colorY[2].toString() + colorY[3].toString(), 16);
	var b2 = parseInt(colorY[4].toString() + colorY[5].toString(), 16);

	var col1 = [r1,g1,b1];
	var col2 = [r2,g2,b2];
	var w = window.innerWidth;
	if(parseInt(w)>1100)
		w = 1100;
	if(parseInt(w)<900)
		w = 900;

	var wMargin = (parseInt(margin))/w;
	
	function pickHex(color1, color2, weight) {
		var w1 = weight;
		var w2 = 1 - w1;
		var rgb = [Math.round(color1[0] * w1 + color2[0] * w2),
			Math.round(color1[1] * w1 + color2[1] * w2),
			Math.round(color1[2] * w1 + color2[2] * w2)];
		var s = 'rgb(' + rgb.toString() + ')';
		return s;
	}
	return pickHex(col1, col2, wMargin);
}