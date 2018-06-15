<?php
 $user="f74062010";
 $pass="a43235167";
 $name=$_POST['name'];
 $score=$_POST['score'];
 $mode=$_POST['mode'];
 $target="rank";
 if($mode=="easy"){
	 $target="rank";
 }
 else{
	 $target="rankh";
 }
 $link=new MySQLi($_SERVER['SERVER_NAME'],$GLOBALS['user'],$GLOBALS['pass'],"f74062010");
 if($link->connect_error){ echo "error!";}
 
 $old=$link->query('SELECT * from '."$target".' where name="'."$name".'"');
 $past=$old->fetch_row();
 if($past[1]<$score){
 $s="REPLACE INTO "."$target"."(name,score) VALUES('"."$name"."','"."$score"."')";
 $link->query("set names utf8");
 $link->query($s);
 }


 $result=$link->query("SELECT * from "."$target"." ORDER BY score DESC"); 
 $r1=$result->fetch_row();
 $r2=$result->fetch_row();
 $r3=$result->fetch_row();
 $r4=$result->fetch_row();
 $r5=$result->fetch_row();
 echo '<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<style>
	body{background-color: black;min-width: 1000px;max-width: 1300px}
	div{margin: 1%;width: 40%;height: 50px;left:40%;
		position: relative;
	}
	div:hover{ margin: 1%;height: 55px;}
	@keyframes k1 {
    0%   {left:40%; top:500px;}
    100% {left:40%; top:10px;}
    }
	@keyframes k2 {
    0%   {left:40%; top:400px;}
    100% {left:40%; top:20px;}
    }
	@keyframes k3 {
    0%   {left:40%; top:300px;}
    100% {left:40%; top:30px;}
    }
	@keyframes k4 {
    0%   {left:40%; top:200px;}
    100% {left:40%; top:40px;}
    }
	@keyframes k5 {
    0%   {left:40%; top:100px;}
    100% {left:40%; top:50px;}
    }
	</style>
</head>
<body>
    <h1 style="position: relative;color: white;left:0%;height:1000px;float:left">Your Score:<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$score.'<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspin level '.$mode.'</h1>
	<h1 id="rank" style="position: relative;color: white;left:28%;">Rank:</h1>
	<div id="1" style="background-color: white ; animation: k1 2s linear  "><h1 style="color: darkblue;"><span>1</span>&nbsp&nbsp&nbsp&nbsp&nbsp'.$r1[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$r1[1].'</h1></div>
	<div id="2" style="background-color: white ; animation: k2 2s linear  "><h1 style="color: darkblue"><span>2</span>&nbsp&nbsp&nbsp&nbsp&nbsp '.$r2[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$r2[1].'</h1></div>
	<div id="3" style="background-color: white ; animation: k3 2s linear  "><h1 style="color: darkblue"><span>3</span>&nbsp&nbsp&nbsp&nbsp&nbsp '.$r3[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$r3[1].'</h1></div>
	<div id="4" style="background-color: white ; animation: k4 2s linear  "><h1 style="color: darkblue"><span>4</span>&nbsp&nbsp&nbsp&nbsp&nbsp '.$r4[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$r4[1].'</h1></div>
	<div id="5" style="background-color: white ; animation: k5 2s linear  "><h1 style="color: darkblue"><span>5</span>&nbsp&nbsp&nbsp&nbsp&nbsp '.$r5[0].'&nbsp&nbsp&nbsp&nbsp&nbsp'.$r5[1].'</h1></div>
	<audio src="13. すっごく嬉しい！.mp3" hidden="true" autoplay></audio>
	<audio src="02. 本好きのメガネっ娘.mp3" hidden="true" autoplay loop></audio>
	<input type="button" value="play again" id="b" style="position:relative;top:55%;left:40%;width:10%;height:50px" hidden="true">
</body>
  <script>
   document.getElementById("b").addEventListener("click",function(){
     window.location="index.html";
   });
   setTimeout(function(){
    document.getElementById("b").hidden=false;
   },2000);
  </script>
</html>';
?>