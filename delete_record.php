<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>


    <div id="main">

		<h2>Delete A Record</h2>

    <?php

 	$dbc = mysqli_connect("localhost", "msizer", "wLFpzlUI", "msizer");

//-----------------------------Delete routine------------------------------------------------------------------------

	if($_GET[Remove] == "Delete")
	{
	$sql = "DELETE FROM abduction WHERE ID=".$_GET[id];
		echo "<p>$sql</p>\n";
		if(!mysqli_query($dbc, $sql))
			echo "ERROR. SQL is '".$sql."'\n";
		else
			echo "<h3>Row deleted</h3>\n";
	}

//----------------------------Listing database table routine----------------------------------------------------------

	$sql = 'SELECT * FROM abduction';

	$result = mysqli_query($dbc, $sql) or die(mysqli_error($dbc));								//get everything from (a table)

	if(!mysqli_query($dbc, $sql))					//run the query on this connection/database and test if OK
		echo "ERROR. SQL is '".$sql."'\n";							//wasn't OK :-( , give up
	else															//was OK :-) , do things with data
	{
		echo "<table>\n<tr>";										//start an html table
		echo "<th>Id</th>  <th>First Name</th> <th>Last Name</th> <th>Email</th> <th>Job</th> <th>Date</th> <th>Location</th> <th>Time Gone</th>";
		echo "</tr>\n";												//end of row of headers

		$Row = mysqli_fetch_row($result);							//get a row of the result, as an array
		$numF = mysqli_num_fields($result);
		while($Row) {												//only while there is data in the row
			echo "<tr>";											//html row of data
			for ($i=0; $i<$numF ; $i++ )								//for each field
				echo "<td>".$Row[$i]."</td>";
				echo "<td><form action='delete_record.php' method='get'>";
				echo "<span><input type='submit' name='Remove' value='Delete' />";
				echo "<input type='hidden' name='id' value='".$Row[0]."'/></span></form></td>"; //get the id of each row from the array
				echo "</tr>\n";											//end of html table row
			$Row = mysqli_fetch_row($result);						//get next row of results
		}
		echo "</table>\n";				//end of table
	}

	mysqli_close();							//don't forget to tidy up & close the dbase conection
?>

     </div>
	<?php include("includes/foot.php"); 							//includes the footer html
?>
