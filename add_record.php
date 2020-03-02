<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>


    <div id="main">


      <h2>Add a Record</h2>

      <form action="#" method="get">

		<h3>Abduction data</h3>

        <fieldset>
           <legend>You</legend>

           <dl>
                <dt><label>First Name</label></dt>
                	<dd><input type="text" id="first_name" name="first_name" required /></dd>
                <dt><label>Last Name</label></dt>
                	<dd><input type="text" id="last_name" name="last_name" required /></dd><!--just required, any value will do -->
                <dt><label>Your  Email</label></dt>
                	<dd><input type="email" id="email" name="email" placeholder="proper email please!" required/></dd><!-- required and email type -->
                 <dt><label>Your Job</label></dt>
                	<dd><input type="text" id="job" name="job"
                    onblur="validateNonEmpty(this, document.getElementById('job_help'))"/></dd><!-- Onblur hand rolled validation-->
        			<span id="job_help" class="help"></span><!-- error message ,blank to start with -->
        	</dl>
        </fieldset>

        <fieldset>
        	<legend>Your Abduction</legend>
             <label>Date</label><br/>
            <input type="date" id="date_taken" name="date_taken" /><br/>
            <label>Location</label><br/>
            <input type="text" id="location" name="location" /><br/>
            <label>Time Gone</label><br/>
            <input type="number"  min="18" max="99" id="time_gone" name="time_gone" />
        </fieldset>

        <input type="submit" value="Report Abduction" name="submit"/>

        </form>


      <?php

	  $first_name = htmlentities($_GET['first_name']); //retrieve the first item from the $_GET array and put it into a variable
	  $last_name = htmlentities(trim($_GET['last_name']));		// retrieve the second item from the $_GET array and put it into a variable
	  $email = $_GET['email']; 		// third item
	  $job = $_GET['job'];			//Get the idea...
	  $date_taken = $_GET['date_taken'];
	  $location = $_GET['location'];
	  $time_gone = $_GET['time_gone'];

	  //all values retrieved from the $_GET array using sensibly named variables
	  $dbc = mysqli_connect("localhost", "msizer", "wLFpzlUI", "msizer");


	  $query = "INSERT INTO abduction (first_name, last_name,email,job,date_taken, location , time_gone)
   				VALUES ('$first_name', '$last_name', '$email', '$job','$date_taken', '$location', '$time_gone')";

	  $result = mysqli_query($dbc, $query)
      or die('Error querying database.');


	  ?>


 		<h3>Values inserted</h3>

		<?php

		//loops through each item in the array and assigns the key i.e. form field to $key variable and
		// stores the matching value in the $value variable
	  	foreach ($_GET as $key => $value) {
		//loops through each form field and outputs the form name and its corresponding value
			echo "<p>The form field  <em>" .  $key .  " </em>contained  <strong>" . $value . "</strong></p>";
	  }


	  ?>


	  </div>

<?php include("includes/foot.php"); ?>
