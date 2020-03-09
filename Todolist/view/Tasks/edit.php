	<h1>Afspraak bewerken</h1>
	<div class="create">
	    <h1>Bewerk je Afspraak</h1>
	    <form name="edit" method="POST" action="../update">
	        <input type="hidden" name="id" value="<?=$data["ID"] ?>">
	        <p>Naam: <input maxlength="14" class="name" name="Name" value="<?php echo $data["Name"]; ?>" type="text"> <span
	                class="error">* <?php echo $data['NameErr'];?></span>
	        </p>
	        <p>Afspraak: <input maxlength="14" name="Name_Appointment" value="<?php echo $data["Name-Appointment"]; ?>"
	                type="text">
	            <span class="error">*
	                <?php echo $data['Name_AppointmentErr'];?></span></p>
	        <p>Van: <input name="Start" type="time" value="<?php echo $data["StartTime"]; ?>" style="text-align: center;">
	            <span class="error">*
	                <?php echo $data['StartErr'];?></span></p>
	        <p>Tot: <input name="End" type="time" value="<?php echo $data["EndTime"]; ?>" style="text-align: center;">
	            <span class="error">*
	                <?php echo $EndErr;?></span></p>
	        <button class="btn btn-primary" type="submit">toevoegen</button>
	    </form>

	    <!-- <?php
  echo "<h2>Your Input:</h2>";
  echo "Name: ",$Name," <-----";
  echo "<br>";
  echo "Name_Appointment: ",$Name_Appointment," <-----";
?> -->
	</div>
	<style>
.error {
    color: black;
}
	</style>