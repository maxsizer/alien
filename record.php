<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>


    <div id="main">


      <h2>Record</h2>

      <?php

	  $first = htmlentities($_GET['first_name']); //retrieve the first item from the $_GET array and put it into a variable
	  $last = trim($_GET['last_name']);		// retrieve the second item from the $_GET array and put it into a variable
	  $email = htmlentities(trim($_GET['email'])); 		// third item
	  $job = ($_GET['job']); 				//Get the idea...
	  $date = $_GET['date_taken'];
	  $location = $_GET['location'];
	  $time = $_GET['time_gone'];

	  //all values retrieved from the $_GET array using sensibly named variables

	  ?>



      <?php
	  //Now we need to write them out on screen!
	  	echo "<h3>Your Details </h3>";
		echo  "<p>Your first name is  <strong>" . $first . "</strong></p>" ;
	  	echo  "<p>Your last name is <strong> " . $last . "</strong></p>"  ;
		echo  "<p>Your job is  <strong>" . $job . "</strong></p>"  ;
		echo  "<p>You were taken on the <strong> " . $date  . "</strong></p>" ;
		echo  "<p>You were taken from  <strong>" . $location . "</strong></p>"  ;
		echo  "<p>You were gone for  <strong>" . $time . " mins </strong></p>"  ;
	  ?>

 		<h3>Looped out version</h3>

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
