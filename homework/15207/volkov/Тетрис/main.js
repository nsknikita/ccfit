var GAME = 0;

var area = document.getElementById("area"), 
	size = Math.round(area.clientHeight/22),
	height = 20, width = 10, i, j, interval = 300, score = 0, level = 1, begin = 0;

var color, pos, start, x, y, obj, koord = [0,0], globalPos;

var Q = {
	color: '#F7F373',
	pos: 1,
	start: 0,
	x: [[0, 1, 0, 1]],
	y: [[0, 0, 1, 1]]
}

var I = {
	color: '#43BFC7',
	pos: 2,
	start: 0,
	x: [[-1, 0, 1, 2], [0, 0, 0, 0]],
	y: [[-2, -2, -2, -2], [0, -1, -2, -3]]
}

var T = {
	color: '#AD64C5',
	pos: 4,
	start: -1,
	x: [[0, 1, 1, 2], [1, 1, 2, 1], [2, 1, 1, 0], [1, 1, 0, 1]],
	y: [[0, 0, -1, 0], [-1, 0, 0, 1], [0, 0, 1, 0], [1, 0, 0, -1]]
}

var Z = {
	color: '#EF2F2A',
	pos: 2,
	start: -1,
	x: [[0, 1, 1, 2], [2, 2, 1, 1]],
	y: [[-1, -1, 0, 0], [-2, -1, -1, 0]]
}

var S = {
	color: '#94DD4D',
	pos: 2,
	start: -1,
	x: [[0, 1, 1, 2], [2, 2, 1, 1]],
	y: [[0, 0, -1, -1], [0, -1, -1, -2]]
}

var J = {
	color: '#36A3EB',
	pos: 4,
	start: -1,
	x: [[0, 0, 1, 2], [2, 1, 1, 1], [2, 2, 1, 0], [0, 1, 1, 1]],
	y: [[-2, -1, -1, -1], [-2, -2, -1, 0], [0, -1, -1, -1], [0, 0, -1, -2]]
}

var L = {
	color: '#FFCB3C',
	pos: 4,
	start: -1,
	x: [[2, 2, 1, 0], [2, 1, 1, 1], [0, 0, 1, 2], [0, 1, 1, 1]],
	y: [[-2, -1, -1, -1], [0, 0, -1, -2], [0, -1, -1, -1], [-2, -2, -1, 0]]
}

for (i = 0; i <= height+3; i++) {
	for (j = 0; j <= width+1; j++) {
		if (i < 4) {
			area.innerHTML += "<div id='"+j+"."+i+"' data-build='0' class='empty' style='opacity: 0;'></div>";
		} else {
			if (j == 0 || j == width+1) {
				area.innerHTML += "<div id='"+j+"."+i+"' data-build='0' class='empty' style='opacity: 0;'></div>";
			} else {
				area.innerHTML += "<div id='"+j+"."+i+"' data-build='0' class='empty'></div>";
			}
		}
	}
	document.getElementById("area").innerHTML += "<br>";
}
area.style.top = -size*3+'px';
document.getElementById("tetris").style.width = (size*12)*1.5+'px';

var storage = localStorage.getItem("bestScore");
if (!storage) {
	localStorage.setItem("bestScore", 0);
} else {
	document.getElementById("bestScore").innerHTML = "The best score: "+storage;	
}

var sqr = document.getElementsByClassName("empty");

for (i = 0; i < sqr.length; i++) {
	sqr[i].style.width = sqr[i].style.height = size+"px";
}

//area.style.left = (document.getElementById("tetris").clientWidth-area.clientWidth)/2 + 'px';



var help = 2;
var timer;

choiceShape();

//timer = setInterval(down, interval);

function down() {
	//console.log("l;")
	for (i = 0; i < 4; i++) {
		if (koord[1]+y[globalPos][i]+1 > height+3 || document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i]+1)).dataset.build == "1")  {
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).dataset.build = "1";
				if (koord[1]+y[globalPos][i] < 5) {
					help = 0;
					GAME = 0;
					var storage = localStorage.getItem("bestScore");
					if (!storage) {
						localStorage.setItem("bestScore", score);
					} else {
						if (score > storage) {
							localStorage.setItem("bestScore", score);
							document.getElementById("bestScore").innerHTML = "The best score: "+score;
						} 
					}
					console.log("Finish")
					go.innerHTML = "Go";
					GAME = 0;
					begin = 0;
					clearInterval(timer);
					break;
				} 
			}
			if (!help) break;
			help = 1;
			score += 10;
			document.getElementById("score").innerHTML = "Score: "+score;
			if (score >= level*500) {
				level++;
				document.getElementById("level").innerHTML = "Level: "+level;
				interval -= intreval/5;
				clearInterval(timer);
				console.log(interval);
				timer = setInterval(down, interval);
			}
			break;
		}
	}	
	if (!help) return;
	if (help == 1) {
		help = 2;
		analiz();
		choiceShape();
	} else {
		for (i = 0; i < 4; i++) {
			document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "empty";
			document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = '#474744';
		}
		koord[1]++;
		for (i = 0; i < 4; i++) {
			document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "full";
			document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = color;
		}
	}
}

function choiceShape() {
	var shape = Math.floor(Math.random()*7);
	
	switch (shape) {
		case 0:
			obj = Q;
			break;
		case 1:
			obj = I;
			break
		case 2:
			obj = T;
			break
		case 3:
			obj = Z;
			break
		case 4:
			obj = S;
			break
		case 5:
			obj = J;
			break
		case 6:
			obj = L;
			break
	}
	color = obj.color;
	pos = obj.pos;
	globalPos = 0;
	start = obj.start;
	x = obj.x;
	y = obj.y;
	
	koord[0] = 5;
	koord[1] = 4;
	
	if (!GAME) return;
	for (i = 0; i < 4; i++) {
		document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "full";
		document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = color;
	}
}

document.body.onkeydown = function(e) {
	var key = e.keyCode;
	var p;
	//console.log(key)
	if (!GAME) return
	switch (key) {
		case 37:
			for (i = 0; i < 4; i++) {
				if (koord[0]+start+x[globalPos][i]-1 < 1 || document.getElementById((koord[0]+start+x[globalPos][i]-1)+"."+(koord[1]+y[globalPos][i])).dataset.build == "1")  return;
			}	
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "empty";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = '#474744';
			}
			koord[0]--;
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "full";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = color;
			}
			break;
		case 39:
			for (i = 0; i < 4; i++) {
				if (koord[0]+start+x[globalPos][i]+1 > width || document.getElementById((koord[0]+start+x[globalPos][i]+1)+"."+(koord[1]+y[globalPos][i])).dataset.build == "1")  return;
			}	
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "empty";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = '#474744';
			}
			koord[0]++;
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "full";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = color;
			}
			break;
		case 38:
			if (pos == 1) return;
			globalPos++;
			if (globalPos == pos) globalPos = 0;
			for (i = 0; i < 4; i++) {
				 if (koord[1]+y[globalPos][i]+1 > height+3 ||
				 koord[0]+start+x[globalPos][i] > width ||
				 koord[0]+start+x[globalPos][i] < 1 ||
				 document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).dataset.build =="1") {
				 	globalPos--;
				 	if (globalPos < 0) globalPos = pos - 1;
				 	return;
				 }
			}
			globalPos--;
			if (globalPos < 0) globalPos = pos - 1;
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "empty";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = '#474744';
			}
			globalPos++;
			if (globalPos == pos) globalPos = 0;
			for (i = 0; i < 4; i++) {
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).className = "full";
				document.getElementById((koord[0]+start+x[globalPos][i])+"."+(koord[1]+y[globalPos][i])).style.backgroundColor = color;
			}
			break;
		case 40:
			down();
			break;
	}
}

function analiz() {
	var h = 0;
	for (var i = height+3; i > 3; i--) {
		for (var j = 1; j <= width; j++) {
			if (document.getElementById(j+"."+i).dataset.build == '1') h++;
		}
		if (!h) return;
		if (h == width) {
			for (var m = i; m > 3; m--) {
				for (j = 1; j <= width; j++) {
					document.getElementById(j+"."+m).dataset.build = document.getElementById(j+"."+(m-1)).dataset.build;
					document.getElementById(j+"."+m).className = document.getElementById(j+"."+(m-1)).className;
					document.getElementById(j+"."+m).style.backgroundColor = document.getElementById(j+"."+(m-1)).style.backgroundColor;
				}
			}
			score += 90;
			document.getElementById("score").innerHTML = "Score: "+score;
			if (score >= level*500) {
				level++;
				document.getElementById("level").innerHTML = "Level: "+level;
				interval -= interval/4;
				clearInterval(timer);
				console.log(interval);
				timer = setInterval(down, interval);
			}
			i++;
		}
		h = 0;
	}
}

var go = document.getElementById("start");
go.onclick = function() {
	if (go.innerHTML == "Go") {
		if (!begin && score) {
			for (var i = 0; i < height + 4; i++) {
				for (var j = 1; j <= width; j++) {
					document.getElementById(j+"."+i).dataset.build = "0";
					document.getElementById(j+"."+i).className = "empty";
					document.getElementById(j+"."+i).style.backgroundColor = '#474744';
				}
			}
			interval = 300;
			score = 0;
			level = 1;
			help = 2;
			document.getElementById("score").innerHTML = "Score: "+score;
			document.getElementById("level").innerHTML = "Level: "+level;
			choiceShape();
		}
		begin = 1;
		go.innerHTML = "Pause";
		GAME = 1;
		timer = setInterval(down, interval);
	} else {
		go.innerHTML = "Go";
		GAME = 0;
		clearInterval(timer);
	}
}