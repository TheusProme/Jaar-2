<h1>Overzicht van afspraken</h1>
</nav>
<hr>
<div id="container">
    <div class="head">
        <div>Naam lijst</div>
        <div>Voor</div>
        <div>Status</div>
    </div>
    <?php
		// maak een overzicht lijst van ALLE afspraken:
		// echo $data;
		
		foreach ($data as $key => $Appointments) {
	?>

    <ul>
        <li>

            <a href="/Jaar-2/Todolist//Todo/Tasks/<?php echo $Appointments["ID"]; ?>">
				<span><?php echo $Appointments["Name"]; ?></span>
                <span><?php echo $Appointments["Assingees"]; ?></span>
                <span><?php echo $Appointments["Priority"]; ?></span>
			</a>

            <a class="edit" href="/Jaar-2/Todolist//Todo/editList/<?php echo $Appointments["ID"]; ?>"><i
                    class="fas fa-pencil-alt"></i> Wijzigen</a>
            <a class="delete" href="/Jaar-2/Todolist//Todo/deleteList/<?php echo $Appointments["ID"]; ?>"><i
                    class="fas fa-eraser"></i> Verwijderen</a>
        </li>
    </ul>
    <?php } ?>
    <a href="/Jaar-2/Todolist//Todo/createList/<?php echo $parts[count($parts) - 1];?>">Add List</i></a>