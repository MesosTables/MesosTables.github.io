var start;
var end;
var rxnTime;
var colorB = ["blue","orange","red","green","yellow","gray","violet","indigo"];
var circSq = ["0px", "50px"];

var checkedBox = function (){
	document.getElementById("box").style.display = "none";
	var x = (Math.round(Math.random()*5000)); //time between 0-5 seconds
	var y = (Math.round(Math.random()*950)); //px from the left
	var z = (Math.round(Math.random()*300)); //px from the top
	var u = (Math.round(Math.random()*8)); //pick a random value in color array
	var b = (Math.round(Math.random()*2)); // pick either square or circle
	setTimeout( function() {
	document.getElementById("box").style.left = y+"px";
	document.getElementById("box").style.top = z+"px";
	document.getElementById("box").style.backgroundColor = colorB[u];
	document.getElementById("box").style.borderRadius = circSq[b];
	start = +new Date();
	document.getElementById("box").style.display = "block";
	}, x); //after a random amount of time display the div	
}


checkedBox();

document.getElementById("box").onclick = function (){
	end = +new Date();
	rxnTime = end - start;
	document.getElementById("results").innerHTML = "Results: "+ (rxnTime/1000) + " sec" ;
	this.style.display="none"; //on click disappear the div
	checkedBox();
}