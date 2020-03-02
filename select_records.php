<?php include("includes/head.php"); ?>							           <!--includes the functional links and header-->
<?php include("includes/nav.php");  				 		           //includes navigation file
?>


    <div>

    <?php

	$dbc = mysqli_connect("localhost", "msizer", "wLFpzlUI", "msizer");					//select a database on this connection (there is only one) - different method from another page!!! (deliberate)

	$sql = 'SELECT * FROM abduction';									//get everything from (a table)



	if($_GET[days] != "")
		$sql = $sql.' WHERE time_gone > '.$_GET[days]; //comparison operators are very useful in SQL searches

	if($_GET[town] != "")
		$sql = $sql." WHERE location LIKE '".$_GET[town]."%'";

	if($_GET[person] != "" && $_GET[job] !="")
		$sql = $sql." WHERE first_name LIKE '".$_GET[person]."%' AND job LIKE '".$_GET[job]."%'" ;
	//the LIKE query uses % as a search wildcard

	echo "<p>$sql</p>\n";

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


	mysqli_close($connection);										//don't forget to tidy up & close the dbase conection
?>
	<form action="<?php echo $_SERVER['../../2888/PHP_SELF']; ?>" method="get">
		<fieldset>
        	<legend>Days gone</legend>
            <p>I want to see records of people who were <br />abducted for longer than...</p>
			<p><input type="text" name="days" /></p>
            <p> days</p>
            <input type="submit" value="Show Records" />
		</fieldset>
        <fieldset>
        	<legend>Location</legend>
            <p>I want to see records of people who were <br />abducted near</p>
			<p><input type="text" name="town" /></p>
            <input type="submit" value="Show Records" />
		</fieldset>
        <fieldset>
        	<legend>Called</legend>
            <p>I want to see records of people who's first name is</p>
			<p><input type="text" name="person" /></p>
            <p>and who's job is</p>
			<p><input type="text" name="job" /></p>
            <input type="submit" value="Show Records" />
		</fieldset>
</form>

    </div>

	<?php include("includes/foot.php"); 							//includes the footer html
?>
