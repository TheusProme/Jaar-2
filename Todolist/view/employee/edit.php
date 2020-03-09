	<h1>Lijst bewerken</h1>
	<div class="create">
	    <h1>Bewerk je Lijst</h1>
	    <form name="edit" method="POST" action="../updateList">
	        <input type="hidden" name="id" value="<?=$data["ID"] ?>">
	        <p>Naam: <input maxlength="14" class="name" name="Name" value="<?php echo $data["Name"]; ?>" type="text"> <span
	                class="error">* <?php echo $data['NameErr'];?></span>
	        </p>
	        <p>Verandwoorde: <input maxlength="14" name="Asign" value="<?php echo $data["Assingees"]; ?>" type="text">
	            <span class="error">*
	                <?php echo $data['AsignErr'];?></span></p>
	        <p>Status: <input name="Status" type="text" value="<?php echo $data["Priority"]; ?>" style="">
	            <span class="error">*
	                <?php echo $data['StatusErr'];?></span></p>
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