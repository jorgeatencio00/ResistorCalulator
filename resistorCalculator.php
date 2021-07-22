<?php

if(isset($_POST["save"]))
{
  include("dbConnect.php");
  $un=$_SESSION['username'];
  $addPoints="UPDATE Users SET Points= Points+3 where Username='$un'";
  mysqli_query($conn,$addPoints);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#styleDiv {
  font-family: helvetica;
  font-size: 13px;
}

#wrapper {
  padding: 0 1%;
  width: 98%;
}


#resistorDiv {
  border: 1px solid #ececec;
  padding: 10px;
  height: 110px;
  background-color: #fff;
  border-radius: 2px;

  border-radius: 2px;
  box-shadow: 0px 0px 2px #333333;
  text-align: center;
}

.resistorLines {
  font-size: 90px;
  font-weight: bold;
  cursor: default;
}

.resistorLines:hover {
  text-shadow: 0px -1px 4px rgba(0, 0, 0, 0.8);
}

#resistorImage {
  background-color: #eeeeee;
  border-top: 6px solid #e5e5e5;
  line-height: 3em;
  height: 72px;
  width: 40%;

  box-shadow: 1px 1px 2px #333333;
}


.calculate {
  background-color: #15a;
  border-radius: 2px;
  outline: none;
  padding: 2px 5px;

  cursor: pointer;

  border: 1px solid #ffefbb;
  box-shadow: inset 0px 0px 0px 1px rgba(255, 115, 100, 0.4), 0 0px 1px #333333;
  text-decoration: none;
  color: #fff;
  font: bold 0.9em garamond;
  text-align: center;
  text-shadow: 0px -1px 1px rgba(0, 0, 0, 0.8);
}

#result {
  font-weight: bold;
  color: red;
  font-size: 16px;
}

#result2 {
  font-weight: bold;
  font-size: 16px;
}

#bandSelect {
  height: 110px;
  box-shadow: 0px 0px 3px #333333;
  padding: 10px;
  border-radius: 2px;
  background-color: #fff;
}

.selects {
  width: 19%;
}

#separator4:hover,
#separator5:hover,
#seperator6:hover {
  text-shadow: 0px -1px 1px transparent;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<div class="topnav">
  <a class="active" href="users.php">Me</a>
  <a href="leaderboard.php">Leaderboard</a>
  <a href="reviews.php">Reviews</a>
  <a href="logout.php">Log Out</a>
  <br><br>
  <br>

 <br>
</div>
	<label >
		<input type="checkbox" >
		<span class="check"></span>
	</label>

<div id="wrapper">
  <div id="styleDiv">
    <h2>
      <center><b>Resistance Value Calculator</b></center>
    </h2>

    <div id="bandSelect">
      <span>Change Band Type/Values from the dropdown menus</span><br>
      <select id="bandNumber" title="" onchange="bandType(this.value)">
        <option value="#">Select Band Type</option>
        <option value="4">4 Band</option>
        <option value="5">5 Band</option>
        <!-- <option value="6">6 Band</option> -->
      </select><br><br>

      <div id="bandDiv" style="display: none;">
        <select id="band1" value="0" class="selects" onchange="bandColor('color1',this.value); calculate()">
          <option value="#" style="color: black; background: white;">Band Color 1</option>
          <option value="black : 0" style="color: white; background: black;">Black 0</option>
          <option value="brown" style="color: white; background: brown;">Brown 1</option>
          <option value="red" style="color: white; background: red;">Red 2</option>
          <option value="orange" style="color: black; background: orange;">Orange 3</option>
          <option value="yellow" style="color: black; background: yellow">Yellow 4</option>
          <option value="green" style="color: white; background: green">Green 5</option>
          <option value="blue" style="color: white; background: blue;">Blue 6</option>
          <option value="violet" style="color: white; background: purple;">Violet 7</option>
          <option value="grey" style="color: white; background: gray">Grey 8</option>
          <option value="white" style="color: black; background: white;">White 9</option>
        </select>

        <select id="band2" value="0" class="selects" onchange="bandColor('color2',this.value); calculate()">
          <option value="#">Band Color 2</option>
          <option value="black" style="color: white; background: black;">Black 0</option>
          <option value="brown" style="color: white; background: brown;">Brown 1</option>
          <option value="red" style="color: white; background: red;">Red 2</option>
          <option value="orange" style="color: black; background: orange;">Orange 3</option>
          <option value="yellow" style="color: black; background: yellow">Yellow 4</option>
          <option value="green" style="color: white; background: green">Green 5</option>
          <option value="blue" style="color: white; background: blue;">Blue 6</option>
          <option value="violet" style="color: white; background: purple;">Violet 7</option>
          <option value="grey" style="color: white; background: gray">Grey 8</option>
          <option value="white" style="color: black; background: white;">White 9</option>
        </select>

        <select id="band3" value="0" class="selects" onchange="bandColor('color3',this.value); calculate()">
          <option value="#">Select Color 3</option>
          <option value="black" style="color: white; background: black;">Black</option>
          <option value="brown" style="color: white; background: brown;">Brown</option>
          <option value="red" style="color: white; background: red;">Red</option>
          <option value="orange" style="color: black; background: orange;">Orange</option>
          <option value="yellow" style="color: black; background: yellow">Yellow</option>
          <option value="green" style="color: white; background: green">Green</option>
          <option value="blue" style="color: white; background: blue;">Blue</option>
          <option value="violet" style="color: white; background: purple;">Violet</option>
          <option value="grey" style="color: white; background: gray">Grey</option>
          <option value="white" style="color: black; background: white;">White</option>
          <option disabled id="value1" value="gold" style="color: black; background: gold;">Gold</option>
          <option disabled id="value2" value="silver" style="color: black; background: silver;">Silver</option>
        </select>

        <select id="band4" value="0" class="selects" onchange="bandColor('color4',this.value); calculate()">
          <option value="#">Select Color 4</option>
          <option value="black" style="color: white; background: black;">Black</option>
          <option value="brown" style="color: white; background: brown;">Brown</option>
          <option value="red" style="color: white; background: red;">Red</option>
          <option disabled id="tolerance1" value="orange" style="color: black; background: orange;">Orange</option>
          <option disabled id="tolerance2" value="yellow" style="color: black; background: yellow;">Yellow</option>
          <option value="green" style="color: white; background: green">Green</option>
          <option value="blue" style="color: white; background: blue;">Blue</option>
          <option value="violet" style="color: white; background: purple;">Violet</option>
          <option value="grey" style="color: white; background: gray">Grey</option>
          <option disabled id="tolerance3" value="white" style="color: black; background: white;">White</option>
          <option value="gold" style="color: black; background: gold;">Gold</option>
          <option value="silver" style="color: black; background: silver;">Silver</option>
          <option disabled id="value3" value="transparent">None</option>
        </select>

        <select id="band5" value="0" class="selects" onchange="bandColor('color5',this.value); calculate()" style="display: none;">
          <option value="#">Select Color 5</option>
          <option value="black" style="color: white; background: black;">Black</option>
          <option value="brown" style="color: white; background: brown;">Brown</option>
          <option value="red" style="color: white; background: red;">Red</option>
          <option value="green" style="color: white; background: green">Green</option>
          <option value="blue" style="color: white; background: blue;">Blue</option>
          <option value="violet" style="color: white; background: purple;">Violet</option>
          <option value="grey" style="color: white; background: gray">Grey</option>
          <option value="gold" style="color: black; background: gold;">Gold</option>
          <option value="silver" style="color: black; background: silver;">Silver</option>

        </select>



      </div>
      <span>Resistance Value will change once all values are selected</span><br>
    </div>


    <div id="tempHolder">
      <span class="tempHolder"></span>
      <select id="bandValue" title="" style="display:none;">
      </select>
      <div id="inputs" style="display: none;">
      </div>
    </div><!-- end inputDiv -->
  </div>
  <br>

  <div id="resistorDiv" title="">
    <center>
      <div id="resistorImage" title="Your virtual resistor">
        <span id="color1" title="" class="resistorLines"></span>
        <span id="color2" title="" class="resistorLines"></span>
        <span id="color3" title="" class="resistorLines"></span>
        <span id="separator4" style="display: none;" class="resistorLines"></span>
        <span id="color4" title="" class="resistorLines"></span>

        <span id="separator5" style="display: none;" class="resistorLines"></span>
        <span id="color5" title="" class="resistorLines"></span>
      </div>
    </center>
    <span>Resistance Value: </span><br>
    <span id="result">0 &ohm;</span>
    <span id="result2">&plusmn; 0%</span>
    <br>
  </div>
  <br>
  <form class="" align="right" ation="resistor-calculator.php" method="post">
    <label for="">save calcul to get 3points</label>
    <button type="submit" name="save" clas="btn btn-primary">save calcul</button>
  </form>


</div>
<center><img src="https://www.electronics-tutorials.ws/wp-content/uploads/2018/05/resistor-res5.gif"></center>



<script>
  var band1 = document.getElementById("band1");
  var band2 = document.getElementById("band2");
  var band3 = document.getElementById("band3");
  var band4 = document.getElementById("band4");
  var band5 = document.getElementById("band5");
  var sep4 = document.getElementById("separator4");
  var sep5 = document.getElementById("separator5");
  var sep6 = document.getElementById("seperator6");
  var bandNumber = document.getElementById("bandNumber");

  function bandColor(band, value) { //filling and coloring the bands
    document.getElementById(band).style.display = "";
    document.getElementById(band).innerHTML = "|";
    document.getElementById(band).title = value;
    document.getElementById(band).style.color = value;

    var bg;
    switch (band) {
      case 'color1':
        bg = 'band1';
        break;
      case 'color2':
        bg = 'band2';
        break;
      case 'color3':
        bg = 'band3';
        break;
      case 'color4':
        bg = 'band4';
        break;
      case 'color5':
        bg = 'band5';
        break;
    }
    document.getElementById(bg).style.backgroundColor = value;
  }
  //

  function bandType(value) { //selecting 4band or 4band
    document.getElementById("result").innerHTML = "0 \u2126";
    document.getElementById("result2").innerHTML = "\u00B1 0%";
    document.getElementById("bandDiv").style.display = "block";

    document.getElementById("inputs").style.display = "none";
    document.getElementById("bandValue").value = "#";


    var lines = document.getElementsByClassName("resistorLines"),
      i;
    i = lines.length;
    while (i--) {
      lines[i].style.display = "none";
    }

    for (var i = 1; i <= 5; i++) {
      document.getElementById("band" + i).value = "#";
      document.getElementById("band" + i).style.backgroundColor = "";
    }
    if (value == "6") {
      for (var i = 1; i <= 3; i++) {
        document.getElementById("tolerance" + i).disabled = false;
        docuement.getElementById("value" + i).disabled = true;
      }
      sep4.style.display = "none";
      band6.style.display = "";

      var color6 = document.getElementById("color6");
      color6.style.display = "";
      color6.innerHTML = "";

      sep6.style.display = "";
      sep6.innerHTML = "||";
      sep6.style.color = "transparent";
    }

    if (value == "5") { //a five band color code
      for (var i = 1; i <= 3; i++) {
        document.getElementById("tolerance" + i).disabled = false;
        document.getElementById("value" + i).disabled = true;
      }


      sep4.style.display = "none";
      band5.style.display = "";

      var color5 = document.getElementById("color5");
      color5.style.display = "";
      color5.innerHTML = "";

      sep5.style.display = "";
      sep5.innerHTML = "||";
      sep5.style.color = "transparent";
    } else { //a four band color code
      for (var i = 1; i <= 3; i++) {
        document.getElementById("tolerance" + i).disabled = true;
        document.getElementById("value" + i).disabled = false;
      }

      band5.style.display = "none";
      band5.value = "#";
      sep5.style.display = "none";
      document.getElementById("color5").style.display = "none";
      document.getElementById("band4").title = "";

      sep4.style.display = "";
      sep4.innerHTML = "||";
      sep4.style.color = "transparent";
    }
  }

  function bandValue(value) {
    var lines = document.getElementsByClassName("resistorLines"),
      i;
    i = lines.length;
    while (i--) {
      lines[i].style.display = "none";
    }
    document.getElementById("result").innerHTML = "0 \u2126";
    document.getElementById("result2").innerHTML = "\u00B1 0%";
    document.getElementById("inputs").style.display = "block";

    document.getElementById("bandNumber").value = "#";
    document.getElementById("bandDiv").style.display = "none";


    if (value == "5") {
      sep4.style.display = "none";

      sep5.style.display = "";
      sep5.innerHTML = "||";
      sep5.style.color = "transparent";
    } else {
      document.getElementById("color5").style.display = "none";
      sep5.style.display = "none";

      sep4.style.display = "";
      sep4.innerHTML = "||";
      sep4.style.color = "transparent";
    }
  }


  function calculate() { //converting to digit
    var values = {
      "black": 0,
      "brown": 1,
      "red": 2,
      "orange": 3,
      "yellow": 4,
      "green": 5,
      "blue": 6,
      "violet": 7,
      "grey": 8,
      "white": 9,
    }
    var tolerance = {
      "transparent": 20,
      "silver": 10,
      "gold": 5,
      "red": 2,
      "brown": 1,
      "green": 0.5,
      "violet": 0.1,
      "blue": 0.25,
      "grey": 0.05,
      "black": 0,
    }

    if (bandNumber.value == "4") {


      var multiplier = 1;
      for (var i = 0; i < values[band3.value]; i++) {
        multiplier *= 10;
      }
      if (band3.value == "gold") {
        multiplier = 0.1;
      }
      if (band3.value == "silver") {
        multiplier = 0.01;
      }

      var total = (((values[band1.value] * 10) + values[band2.value]) * multiplier);

      document.getElementById("result").innerHTML = total + " \u2126";
      document.getElementById("result2").innerHTML = "\u00B1 " + tolerance[band4.value] + "%";

    } else if (bandNumber.value == "5") {

      var multiplier = 1;
      for (var i = 0; i < values[band4.value]; i++) {
        multiplier *= 10;
      }
      if (band4.value == "gold") {
        multiplier = 0.1;
      }
      if (band4.value == "silver") {
        multiplier = 0.01;
      }

      var total = (((values[band1.value] * 100) + (values[band2.value] * 10) + values[band3.value]) * multiplier);
      var resistorVal = total;
      document.getElementById("result").innerHTML = total + " \u2126";
      document.getElementById("result2").innerHTML = "\u00B1 " + tolerance[band5.value] + " %";
    }

  }

</script>
</body>
