<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		body
		{
			font-family: verdana;
		}

		.slidecontainer
		{
			width: 100%;
		}
		.slider
		{
			-webkit-appearance: none;
			width: 80%;
			height: 15px;
			border-radius: 5px;
			background: #d3d3d3;
			outline: none;
			opacity: 0.7;
			-webkit-transition: .2s;
			transition: opacity .2s;
			position:relative;
			left:10%;
		}
		.slider:hover
		{
			opacity: 1;
		}
		.slider::-webkit-slider-thumb
		{
			-webkit-appearance: none;
			appearance: none;
			width: 25px;
			height: 25px;
			border-radius: 50%;
			background: #4CAF50;
			cursor: pointer;
		}
		.slider::-moz-range-thumb
		{
			width: 25px;
			height: 25px;
			border-radius: 50%;
			background: #4CAF50;
			cursor: pointer;
		}
		.button
		{
			display: inline-block;
			border-radius: 4px;
			background-color: #f4511e;
			border: none;
			color: #FFFFFF;
			text-align: center;
			font-size: 28px;
			padding: 20px;
			width: 200px;
			transition: all 0.5s;
			cursor: pointer;
			margin: 5px;
		}
		.button span
		{
			cursor: pointer;
			display: inline-block;
			position: relative;
			transition: 0.5s;
		}
		.button span:after
		{
			content: '\00bb';
			position: absolute;
			opacity: 0;
			top: 0;
			right: -20px;
			transition: 0.5s;
		}
		.button:hover span
		{
			padding-right: 25px;
		}
		.button:hover span:after
		{
			opacity: 1;
			right: 0;
		}
	</style>

<script>
function changePerct()
{
    var slider1 = document.getElementById("ormarS");
    var output1 = document.getElementById("demo1");
    output1.innerHTML = slider1.value;
    var slider2 = document.getElementById("ormarR");
    var output2 = document.getElementById("demo2");
    output2.innerHTML = slider2.value;
    var slider3 = document.getElementById("ormarG");
    var output3 = document.getElementById("demo3");
    output3.innerHTML = slider3.value;
    var slider4 = document.getElementById("ormarB");
    var output4 = document.getElementById("demo4");
    output4.innerHTML = slider4.value;
    var slider5 = document.getElementById("krevetS");
    var output5 = document.getElementById("demo5");
    output5.innerHTML = slider5.value;
    var slider6 = document.getElementById("krevetR");
    var output6 = document.getElementById("demo6");
    output6.innerHTML = slider6.value;
    var slider7 = document.getElementById("krevetG");
    var output7 = document.getElementById("demo7");
    output7.innerHTML = slider7.value;
    var slider8 = document.getElementById("krevetB");
    var output8 = document.getElementById("demo8");
    output8.innerHTML = slider8.value;
    var slider9 = document.getElementById("stolS");
    var output9 = document.getElementById("demo9");
    output9.innerHTML = slider9.value;
    var slider10 = document.getElementById("stolR");
    var output10 = document.getElementById("demo10");
    output10.innerHTML = slider10.value;
    var slider11 = document.getElementById("stolG");
    var output11 = document.getElementById("demo11");
    output11.innerHTML = slider11.value;
    var slider12 = document.getElementById("stolB");
    var output12 = document.getElementById("demo12");
    output12.innerHTML = slider12.value;
}
</script>

<script>
function changeOrmar()
{
	var rd = parseInt(document.getElementById('ormarR').value*document.getElementById('ormarS').value*0.0255);
	var gn = parseInt(document.getElementById('ormarG').value*document.getElementById('ormarS').value*0.0255);
	var bl = parseInt(document.getElementById('ormarB').value*document.getElementById('ormarS').value*0.0255);

	// convert the decimal values into hexadecimal
	var rdhex = (rd < 16) ? "0" + rd.toString(16) : rd.toString(16);
	var gnhex = (gn < 16) ? "0" + gn.toString(16) : gn.toString(16);
	var blhex = (bl < 16) ? "0" + bl.toString(16) : bl.toString(16);

	// create a variable that concatenates all the parts
	var hexcode = "#" + rdhex + gnhex + blhex;

	document.getElementById("myOrmar").style.backgroundColor = hexcode;
	changePerct();
}
</script>

<script>
function changeKrevet()
{
	var rd = parseInt(document.getElementById('krevetR').value*document.getElementById('krevetS').value*0.0255);
	var gn = parseInt(document.getElementById('krevetG').value*document.getElementById('krevetS').value*0.0255);
	var bl = parseInt(document.getElementById('krevetB').value*document.getElementById('krevetS').value*0.0255);

	// convert the decimal values into hexadecimal
	var rdhex = (rd < 16) ? "0" + rd.toString(16) : rd.toString(16);
	var gnhex = (gn < 16) ? "0" + gn.toString(16) : gn.toString(16);
	var blhex = (bl < 16) ? "0" + bl.toString(16) : bl.toString(16);

	// create a variable that concatenates all the parts
	var hexcode = "#" + rdhex + gnhex + blhex;

	document.getElementById("myKrevet").style.backgroundColor = hexcode;
	changePerct();
}
</script>

<script>
function changeStol()
{
	var rd = parseInt(document.getElementById('stolR').value*document.getElementById('stolS').value*0.0255);
	var gn = parseInt(document.getElementById('stolG').value*document.getElementById('stolS').value*0.0255);
	var bl = parseInt(document.getElementById('stolB').value*document.getElementById('stolS').value*0.0255);

	// convert the decimal values into hexadecimal
	var rdhex = (rd < 16) ? "0" + rd.toString(16) : rd.toString(16);
	var gnhex = (gn < 16) ? "0" + gn.toString(16) : gn.toString(16);
	var blhex = (bl < 16) ? "0" + bl.toString(16) : bl.toString(16);

	// create a variable that concatenates all the parts
	var hexcode = "#" + rdhex + gnhex + blhex;

	document.getElementById("myStol").style.backgroundColor = hexcode;
	changePerct();
}
</script>

    <title>
      Izbornik
    </title>
  </head>
<body onload="changePerct()">

<?php print '<h1>Odredite vrijednosti boja</h1>'; ?>

<br><br>

<form action="/ubacivanje_u_bazu.php" target="_blank" method="post">
    <h2 id="myOrmar">
        Ormar-svjetlina: <span id="demo1"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="ormarS" name="ormarS" onchange="changeOrmar()">
        <br>
        Ormar-crvena: <span id="demo2"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="ormarR" name="ormarR" onchange="changeOrmar()">
        <br>
        Ormar-zelena: <span id="demo3"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="ormarG" name="ormarG" onchange="changeOrmar()">
        <br>
        Ormar-plava: <span id="demo4"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="ormarB" name="ormarB" onchange="changeOrmar()">
    </h2>
	<br><br>
	<h2 id="myKrevet">
        Krevet-svjetlina: <span id="demo5"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="krevetS" name="krevetS" onchange="changeKrevet()">
        <br>
        Krevet-crvena: <span id="demo6"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="krevetR" name="krevetR" onchange="changeKrevet()">
        <br>
        Krevet-zelena: <span id="demo7"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="krevetG" name="krevetG" onchange="changeKrevet()">
        <br>
        Krevet-plava: <span id="demo8"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="krevetB" name="krevetB" onchange="changeKrevet()">
    </h2>
	<br><br>
    <h2 id="myStol">
        Stol-svjetlina: <span id="demo9"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="stolS" name="stolS" onchange="changeStol()">
        <br>
        Stol-crvena: <span id="demo10"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="stolR" name="stolR" onchange="changeStol()">
        <br>
        Stol-zelena: <span id="demo11"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="stolG" name="stolG" onchange="changeStol()">
        <br>
        Stol-plava: <span id="demo12"></span>%<br>
        <input type="range" min="0" max="100" value="100" class="slider" id="stolB" name="stolB" onchange="changeStol()">
    </h2>
	<br><br>
    <button class="button" type="submit" style="vertical-align:middle"><span>Primjeni </span></button><br>
</form>

</body>
</html>
