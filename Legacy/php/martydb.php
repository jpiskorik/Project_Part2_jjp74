<?php
		
        $db = new mysqli('127.0.0.1', 'root', '');
        
        //create connection
    
        if ($db->connect_error):
           die ("Could not connect to db " . $db->connect_error);
        endif;
        
        $drop=$db->query("DROP TABLE MartyStories");
        if($drop)
        {
        	echo "SUCCCESS DROP";
        }
        
        //create database
        $sqll = "CREATE DATABASE martyDB";
        if ($db->query($sqll) === TRUE) 
        {
   			 echo "Database created successfully";
		} 
		else 
		{
   		 	echo "Error creating database: " . $db->error;
		}
        
        
        // sql to create table
		$create_table = "CREATE TABLE IF NOT EXISTS MartyStories 
		(
			name VARCHAR(30) NOT NULL, 
			relation VARCHAR(30) NOT NULL,
			memory VARCHAR(100) NOT NULL,PRIMARY KEY
		)";
		
		$sql_query1=$db->query($create_table);
		if($sql_query1)
		{
			echo "SUCCESS";
		}
		else
		{
			echo "ERROR CREATING TABLE";
		}
		
		
		$name="";
		$relation="";
		$memory="";
		if( isset( $_POST['NameofPerson'] ) ) 
		{
   			 $name = $_POST['NameofPerson'];
		} 		
		else 
		{
    		$name = "";
		}
		
		if( isset( $_POST['Relation'] ) ) 
		{
   			 $relation = $_POST['Relation'];
		} 		
		else 
		{
    		$relation = "";
		}
		
		if( isset( $_POST['memory'] ) ) 
		{
   			 $memory = $_POST['memory'];
		} 		
		else 
		{
    		$memory = "";
		}
		
		echo " name is ". $name . " relation is " . $relation . " and memory is " . $memory;
		
		$query="INSERT INTO MartyStories VALUES ('$name', '$relation', '$memory')";
		$sql_query=$db->query($query);
		if($sql_query)
		{
			echo "SUCCESS";
		}
		
		 $query="SHOW ALL TABLES";
        if($result=mysqli_query($db,$query))
        {
        	echo "HERE I AM";
        	while($fieldinfo =mysqli_fetch_field($result))
        	{
        		echo $fieldinfo->name;
        	}
        }	
		
	
		$sql2 = "SELECT name, relation, memory FROM MartyStories";
		$r = $db->query($sql2);
		
		echo "<table>";
		echo "<tr><th>name</th><th>relation</th><th>message</th></tr>";

while($row = mysqli_fetch_array($r)) {
    $date = $row["name"];
    $comment = $row["relation"];
    $amount = $row["amount"];
    echo "<tr><td style='width: 200px;'>".$date."</td><td style='width: 600px;'>".$comment."</td><td>".$amount."</td></tr>";
} 

echo "</table>";

$db->close();

	
	
			
?>