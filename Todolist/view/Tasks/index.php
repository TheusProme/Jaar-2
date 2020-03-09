<h1>Overzicht van afspraken in de lijst</h1>
</nav>
<hr>
<div id="container">
    <div class="head">
        <div>Naam</div>
        <div>Afspraak</div>
        <div>Van</div>
        <div>Tot</div>
    </div>
    <?php
		// maak een overzicht lijst van ALLE afspraken:
        // print_r("index --->".$data);
        
        $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parts = explode("/", $url);
        

		foreach ($data as $key => $Appointments) {
	?>

    <ul>
        <li>

            <span><?php echo $Appointments["Name"]; ?></span>
            <span><?php echo $Appointments["Name-Appointment"]; ?></span>
            <span><?php echo $Appointments["StartTime"]; ?></span> <span><?php echo $Appointments["EndTime"]; ?></span>

            <a class="edit" href="/Jaar-2/Todolist//Todo/edit/<?php echo $Appointments["ID"]; ?>"><i
                    class="fas fa-pencil-alt"></i> Wijzigen</a>
            <a class="delete" href="/Jaar-2/Todolist//Todo/delete/<?php echo $Appointments["ID"]; ?>"><i
                    class="fas fa-eraser"></i> Verwijderen</a>
        </li>
    </ul>
	
    <?php } ?>
	<a href="/Jaar-2/Todolist//Todo/create/<?php echo $parts[count($parts) - 1];?>">Add Task</i></a>