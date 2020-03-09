<h1>Afspraak toevoegen</h1>
<div class="create"> 
<h1>Voeg een Afspraak toe</h1>
<form name="create" method="POST" action="../store">
<input type="hidden" name="id" value="<?=$data["ID"] ?>">
    <p>Naam: <input class="name" maxlength="14" name="Name" type="text"> <span class="error">* <?php echo $data['NameErr'];?></span></p>
    <p>Afspraak: <input maxlength="14" name="Name_Appointment" type="text"> <span class="error">* <?php echo $data['Name_AppointmentErr'];?></span></p>
    <p>Van: <input name="Start" type="time" style="text-align: center;"> <span class="error">* <?php echo $data['StartErr'];?></span></p>
    <p>Tot: <input name="End" type="time" style="text-align: center;"> <span class="error">* <?php echo $data['EndErr'];?></span></p>
    <button class="btn btn-primary" type="submit">toevoegen</button>
</form>

<?php
  // echo "<h2>Your Input:</h2>";
  // echo "Name: ",$Name," <-----";
  // echo "<br>";
  // echo "Name_Appointment: ",$Name_Appointment," <-----";
  // var_dump($data);
?>
</div>
<style>
.error {
    color: black;
}
</style>