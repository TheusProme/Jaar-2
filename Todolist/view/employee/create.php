<h1>Lijst toevoegen</h1>
<div class="create" > 
<h1>Voeg een Lijst toe</h1>
<form name="create" method="POST" action="../storeList">
    <p>Naam: <input class="name" maxlength="14" name="Name" type="text"> <span class="error">* <?php echo $data['NameErr'];?></span></p>
    <p>Verantwoordelijk: <input name="Asign" type="text" style=""> <span class="error">* <?php echo $data['AsignErr'];?></span></p>
    <p>Status: <input name="Status" type="text" style=""> <span class="error">* <?php echo $data['StatusErr'];?></span></p>
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