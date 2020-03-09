<?php
// maak een bevestig pagina voor het verwijderen van een mededwerker
?>
<div class="container">
        <h1>Afspraak verwijderen</h1>
        <div class="create">
        <form name="delete" method="POST" action="../destroy">
            <input value="<?php echo $data["ID"]; ?>" name="id" style="visibility: hidden; height: 0px;">
            <h4>Weet u zeker dat u de afspraak van " <span><?php echo $data["Name"]; ?></span> " ---> " <span><?php echo $data["Name-Appointment"]; ?></span> " wilt verwijderen???</h4>
            <button type="submit" class="btn btn-primary">Verwijderen</button>
        </form>
    </div>
