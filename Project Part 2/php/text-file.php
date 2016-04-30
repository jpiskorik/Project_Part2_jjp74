<html>
<head>
<title>Getting the name of the user </title>
</head>
<body>
<?php

      $name=$_POST["NameofPerson"];
      $relation=$_POST["Relation"];
      $message=$_POST["memory"];
      $alltogether = $name ."-". $relation ."-". $message;
    
  	  $match=false;
  	  $file= "message.txt";
  	  if(!file_exists($file))
  	  {
  	  		$myfile = fopen("messages.txt", "x+");
  	  		fclose($myfile);
  	  		
  	  }

      $myfile = fopen("message.txt", "r+") or die("Unable to open file!");

	  $compare= trim(fgets($myfile));
	  while (! feof($myfile))
	  {	  		

	  		if(strcmp($alltogether,$compare)==0)
	  		{
        		$match=true;
        		break;
        	}
        	$compare= trim(fgets($myfile));
       }
       if($match==false)
       {
    		fwrite($myfile,$alltogether. "\n");
       }
	   fclose($myfile);
      
      if($match == true)
      {
      		echo  $name. ", " .
      		   '<p style = "color:blue ;"> you have </p>' .
      		   '<p style = "color:aqua ;"> already </p>' .
      		   '<p style = "color:lime ;"> sent this</p>' .
               '<p style = "color:fuchsia ;">Message! </p>';     
      }
      else
      {
      		echo '<p style= "color:maroon;"> Here is a list of the messages people sent</p>';
      		$newfile= fopen("message.txt", "r") or die("Unable to open file!");
      		while(!feof($newfile))
      		{
      			$compare= fgets($newfile);
      			$pieces= explode("-", $compare);
      			if(isset($pieces))
      			{
      				error_reporting(E_ALL ^ E_NOTICE);
      				echo 
      				"<p style = 'color: green;'>". $pieces[0] . " ". $pieces[1]. " ". $pieces[2]."</p>";
      			}
      			
      		}
      		fclose($newfile);
      }
      
      echo "Press Go Back to Return to Previous Page"
      
?>
<form id="results" method="get" action="home.html">
    <input type="submit" value="Go Back">
</form>  
</body>
</html>
