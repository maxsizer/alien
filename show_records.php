<?php include("includes/head.php"); ?>							           <!--includes the functional links and header--> 
<?php include("includes/nav.php");  				 		           //includes navigation file
?>			
    
    <div>
		
    <?php
	
	$dbc = mysqli_connect("localhost", "msizer", "wLFpzlUI", "msizer");	//"IP address of mysql server", "username" "password" NOT BEST PRACTICE!
							     
	$sql = 'SELECT * FROM abduction';	//get everything from (a table)
	
	$result = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));	
																		
	if(!$result = mysqli_query($dbc, $sql))				//run the query on this connection/database and test if OK
		echo "ERROR. SQL is not'".$sql."'\n";							//wasn't OK :-( , give up
	else															//was OK :-) , do things with data
	{
		echo "<table>\n<tr>";										//start an html table

echo "<th>Id</th>
 			  <th>first_name</th>
 			  <th>Last Name</th>
 			  <th>Email</th>
 		  	  <th>Job</th>
 			  <th>Date</th>
			  <th>Location</th>
 			  <th>Time</th>";
		echo "</tr>\n";												//end of row of headers
		
		$numberfields = mysqli_num_fields($result);	
		$Row = mysqli_fetch_row($result);							//get a row of the result, as an array
		while($Row) {												//only while there is data in the row
			echo "<tr>";											//html row of data
			for ($i=0; $i<$numberfields ; $i++ )					//for each field
				echo "<td>".$Row[$i]."</td>";						//write out in a table cell
			echo "</tr>\n";											//end of html table row
			$Row = mysqli_fetch_row($result);						//get next row of results
		}
		echo "</table>\n";											//end of table
	}
	
 
	mysqli_close($connection);	
										//don't forget to tidy up & close the dbase conection
?>
	
    </div>
    
