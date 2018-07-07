<?php
ini_set( "display_errors", 1);
set_time_limit(0);
ignore_user_abort(true);


/* backup the db OR just a table */

	$host="localhost";
$user="anilfoods";
$pass="@nilf))ds@#";
$name="anilfoods_anil";
$tables = '*';
	$con= mysqli_connect($host,$user,$pass,$name);
	
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($con,"SHOW TABLES");
		
		while($row = mysqli_fetch_array($result))
		{
			$tables[] = $row[0];
		}
		
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysqli_query($con,'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($con,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysqli_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < $num_fields; $j++) 
				{
					
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);

?>