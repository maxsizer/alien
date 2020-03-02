<?php include("includes/head.php"); ?>
<?php include("includes/nav.php"); ?>

			<div id="main">
				<h2>Abductee Register</h2>

				<form action="record.php" method="get">
					<h3>Abduction data</h3>

					<fieldset>
						<legend>You</legend>
						<dl>
							<dt><label>First Name</label></dt>
								<dd><input type="text" id="first_name" name="first_name" /></dd>
							<dt><label>Last Name</label></dt>
								<!--just required, any value will do -->
								<dd><input type="text" id="last_name" name="last_name" required /></dd>
							<dt><label>Your  Email</label></dt>
								<!-- required and email type -->
								<dd><input type="email" id="email" name="email" placeholder="proper email please!" required/></dd>
							<dt><label>Your Job</label></dt>
								<!-- Onblur hand rolled validation-->
								<dd><input type="text" id="job" name="job" onblur="validateNonEmpty(this, document.getElementById('job_help'))"/></dd>
							<!-- error message ,blank to start with -->
							<span id="job_help" class="help"></span>
						</dl>
					</fieldset>

					<fieldset>
						<legend>Your Abduction</legend>
						<label>Date</label><br/>
							<input type="date" id="date_taken" name="date_taken" /><br/>
						<label>Location</label><br/>
							<input type="text" id="location" name="location" /><br/>
						<label>Time Gone</label><br/>
							<input type="number" min="18" max="99" id="time_gone" name="time_gone" />
						</fieldset>
					<input type="submit" value="Report Abduction" name="submit"/>
				</form>

			</div>
<?php include("includes/foot.php"); ?>
