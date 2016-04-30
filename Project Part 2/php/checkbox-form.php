<html>
<head>
<title>Getting the most popular answers</title>
</head>
<body>
<?php
	session_start();
	
	$array = ['Checkbox1','Checkbox2','Checkbox3','Checkbox4','Checkbox5','Checkbox6'
	,'Checkbox7','Checkbox8','Checkbox9','Checkbox10','Checkbox11','Checkbox12'
	,'Checkbox13'];
	
	
	if(!isset($_SESSION['Checkbox1']))
	{
		$_SESSION['Checkbox1']="0";
	}
	if(!isset($_SESSION['Checkbox2']))
	{
		$_SESSION['Checkbox2']="0";
	}
	if(!isset($_SESSION['Checkbox3']))
	{
		$_SESSION['Checkbox3']="0";
	}
	if(!isset($_SESSION['Checkbox4']))
	{
		$_SESSION['Checkbox4']="0";
	}
	if(!isset($_SESSION['Checkbox5']))
	{
		$_SESSION['Checkbox5']="0";
	}
	if(!isset($_SESSION['Checkbox6']))
	{
		$_SESSION['Checkbox6']="0";
	}
	if(!isset($_SESSION['Checkbox7']))
	{
		$_SESSION['Checkbox7']="0";
	}
	if(!isset($_SESSION['Checkbox8']))
	{
		$_SESSION['Checkbox8']="0";
	}
	if(!isset($_SESSION['Checkbox9']))
	{
		$_SESSION['Checkbox9']="0";
	}
	if(!isset($_SESSION['Checkbox10']))
	{
		$_SESSION['Checkbox10']="0";
	}
	if(!isset($_SESSION['Checkbox11']))
	{
		$_SESSION['Checkbox11']="0";
	}
	if(!isset($_SESSION['Checkbox12']))
	{
		$_SESSION['Checkbox12']="0";
	}
	if(!isset($_SESSION['Checkbox13']))
	{
		$_SESSION['Checkbox13']="0";
	}
	
	foreach($array as $a)
	{
		checkPOST($a);
	}
	
	
	function checkPOST($value)
	{
		if(isset($_POST[$value]))
		{
			$_SESSION[$value]++;
		}
	}
	
	 
	echo "Marty on Halloween = ". $_SESSION['Checkbox1']. "<br>";
	echo "Marty & Tara 1 = ". $_SESSION['Checkbox2']. "<br>";
	echo "Marty & Tara 2 = ". $_SESSION['Checkbox3']. "<br>";
	echo "Marty & Tara 3 = ". $_SESSION['Checkbox4']. "<br>";
	echo "Marty & Friends = ". $_SESSION['Checkbox5']. "<br>";
	echo "Marty & Tara 4 = ". $_SESSION['Checkbox6']. "<br>";
	echo "Marty at Concert = ". $_SESSION['Checkbox7']. "<br>";
	echo "Marty with co-worker = ". $_SESSION['Checkbox8']. "<br>";
	echo "Marty Collage = ". $_SESSION['Checkbox8']. "<br>";
	echo "Marty & Tara 5 = ". $_SESSION['Checkbox10']. "<br>";
	echo "Marty & Tara at a ball game = ". $_SESSION['Checkbox11']. "<br>";
	echo "Marty & Tara at a cabin = ". $_SESSION['Checkbox12']. "<br>";
	echo "Marty & Tara 6 = ". $_SESSION['Checkbox13']. "<br>";
	echo "<br>";
	echo "Press Go Back to Return to Previous Page"

      
?>


<form id="results" method="get" action="../html/Tribute.html">
    <input type="submit" value="Go Back">
</form>  
</body>
</html>