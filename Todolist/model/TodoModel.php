<?php

function getAllAppointments(){
  // Met het try statement kunnen we code proberen uit te voeren. Wanneer deze
  // mislukt kunnen we de foutmelding afvangen en eventueel de gebruiker een
  // nette foutmelding laten zien. In het catch statement wordt de fout afgevangen
   try {
       // Open de verbinding met de database
       $conn=openDatabaseConnection();
   
       // Zet de query klaar door middel van de prepare method
       $stmt = $conn->prepare("SELECT * FROM Lists");

       // Voer de query uit
       $stmt->execute();

       // Haal alle resultaten op en maak deze op in een array
       // In dit geval is het mogelijk dat we meedere medewerkers ophalen, daarom gebruiken we
       // hier de fetchAll functie.
       $result = $stmt->fetchAll();

   }
   // Vang de foutmelding af
   catch(PDOException $e){
       // Zet de foutmelding op het scherm
       echo "Connection failed: " . $e->getMessage();
   }

   // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
   // van de server opgeschoond blijft
   $conn = null;

   // Geef het resultaat terug aan de controller
   return $result;
}

function getTasks($id){
    // echo $id;
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM Appointments WHERE List = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        
        // Voer de query uit
        $stmt->execute();
        
        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetchAll();
        // print_r($result);

    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
    // print_r($result);
    // Geef het resultaat terug aan de controller
    return $result;
}

function GetTaskID($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM Lists WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
}

function getAppointment($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM Appointments WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
}

function getList($id){
    try {
        // Open de verbinding met de database
        $conn=openDatabaseConnection();
 
        // Zet de query klaar door midel van de prepare method. Voeg hierbij een
        // WHERE clause toe (WHERE id = :id. Deze vullen we later in de code
        $stmt = $conn->prepare("SELECT * FROM Lists WHERE id = :id");
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":id", $id);

        // Voer de query uit
        $stmt->execute();

        // Haal alle resultaten op en maak deze op in een array
        // In dit geval weten we zeker dat we maar 1 medewerker op halen (de where clause), 
        //daarom gebruiken we hier de fetch functie.
        $result = $stmt->fetch();
 
    }
    catch(PDOException $e){

        echo "Connection failed: " . $e->getMessage();
    }
    // Maak de database verbinding leeg. Dit zorgt ervoor dat het geheugen
    // van de server opgeschoond blijft
    $conn = null;
 
    // Geef het resultaat terug aan de controller
    return $result;
}

function createAppointment($dataId ,$dataName ,$dataAppointment, $dataStart ,$dataEnd){
    // Maak hier de code om een medewerker aan te maken
    $Id = $dataId;
    $Name = $dataName;
    $Appointment = $dataAppointment;
    $Start = $dataStart;
    $End = $dataEnd;

    echo $Id, '<br>', $Name, '<br>', $Appointment, '<br>', $Start, '<br>', $End, '<br>';

    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("INSERT INTO `Appointments`(`List`, `Name`, `Name-Appointment`, `StartTime`, `EndTime`) VALUES (:Id, :Name, :Appointment, :Start, :End )");
        //echo "INSERT INTO `Appointments`(`Name`, `Name-Appointment`, `StartTime`, `EndTime`) VALUES ('". $Name ."', '". $Appointment ."', '". $Start ."', '". $End ."')";
        
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":Id", $Id );
        $stmt->bindParam(":Name", $Name );
        $stmt->bindParam(":Appointment", $Appointment );
        $stmt->bindParam(":Start", $Start );
        $stmt->bindParam(":End", $End );

        // execute a query
        $stmt->execute();

        // fetch the data
        // $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;

}

function listcreate($dataName ,$dataAsign, $dataStatus){
    // Maak hier de code om een medewerker aan te maken
    $Name = $dataName;
    $Asign = $dataAsign;
    $Status = $dataStatus;

    echo $Name, '<br>', $Asign, '<br>', $Status, '<br>';

    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("INSERT INTO `Lists`(`Name`, `Assingees`, `Priority`) VALUES (:Name, :Asign, :Status)");
        //echo "INSERT INTO `Appointments`(`Name`, `Name-Asign`, `Priority`) VALUES ('". $Name ."', '". $Asign ."')";
        
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":Name", $Name );
        $stmt->bindParam(":Asign", $Asign );
        $stmt->bindParam(":Status", $Status );

        // execute a query
        $stmt->execute();

        // fetch the data
        // $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;

}

function updateAppointment($dataId, $dataName ,$dataAppointment, $dataStart ,$dataEnd){
    // Maak hier de code om een medewerker aan te maken
    $Id = $dataId;
    $Name = $dataName;
    $Appointment = $dataAppointment;
    $Start = $dataStart;
    $End = $dataEnd;

    // echo $Id, " ", $Name, " ", $Appointment, " ", $Start, " ", $End, "<br>";

    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("UPDATE `Appointments` SET `Name`= :Name,`Name-Appointment`= :Appointment,`StartTime`= :Start, `EndTime`= :End WHERE `id` = :Id");
                        //echo "UPDATE `Appointments` SET `Name`='". $Name. "',`Name-Appointment`='". $Appointment. "',`StartTime`='". $Start. "',`EndTime`='". $End. "' WHERE `id` = '". $Id."'"; 
        
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":Id", $Id );
        $stmt->bindParam(":Name", $Name );
        $stmt->bindParam(":Appointment", $Appointment );
        $stmt->bindParam(":Start", $Start );
        $stmt->bindParam(":End", $End );
                        // execute a query
        $stmt->execute();
        // fetch the data
        $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;

}

function listupdate($dataId ,$dataName ,$dataAsign ,$dataStatus){
    // Maak hier de code om een medewerker aan te maken
    $Id = $dataId;
    $Name = $dataName;
    $Asign = $dataAsign;
    $Status = $dataStatus;

    //echo '<br>', $Id, '<br>', $Name, '<br>', $Asign, '<br>', $Status, '<br>';

    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("UPDATE `Lists` SET `Name`= :Name,`Assingees`= :Asign,`Priority`= :Status WHERE `id` = :Id");
        //echo "INSERT INTO `Appointments`(`Name`, `Name-Asign`, `Priority`) VALUES ('". $Name ."', '". $Asign ."')";
        
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":Id", $Id );
        $stmt->bindParam(":Name", $Name );
        $stmt->bindParam(":Asign", $Asign );
        $stmt->bindParam(":Status", $Status );

        // execute a query
        $stmt->execute();

        // fetch the data
        // $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;

}

function deleteAppointment($dataId){
     // Maak hier de code om een medewerker te verwijderen
     $Id = $dataId;

    //  echo $Id, "<br>";
 
     try {
         //open de connectie met de database
         $conn=openDatabaseConnection();
         $result;
  
         // set the PDO error mode to exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         // prepare a statement (query)
         $stmt = $conn->prepare("DELETE FROM `Appointments` WHERE `id` = :Id");
                            // echo "DELETE FROM `Appointments` WHERE `id` = '". $Id."'";
        // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
        // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
        $stmt->bindParam(":Id", $Id);
        // execute a query
         $stmt->execute();
         // fetch the data
         $result = $stmt->fetch();
 
     }
     catch(PDOException $e){
         // error message
         echo "Connection failed: " . $e->getMessage();
     }
     // close the connection
     $conn = null;
     // return the result
     return $result;
}

function tasksdelete($dataId){
    // Maak hier de code om een medewerker te verwijderen
    $Id = $dataId;

    echo $Id, " <-------------- <br>";

    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("DELETE FROM `Appointments` WHERE `List` = :Id");
                           // echo "DELETE FROM `Appointments` WHERE `id` = '". $Id."'";
       // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
       // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
       $stmt->bindParam(":Id", $Id);
       // execute a query
        $stmt->execute();
        // fetch the data
        // $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;
}

function listdelete($dataId){
    // Maak hier de code om een medewerker te verwijderen
    $Id = $dataId;

   //  echo $Id, "<br>";
   tasksdelete($Id);
    try {
        //open de connectie met de database
        $conn=openDatabaseConnection();
        $result;
 
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // prepare a statement (query)
        $stmt = $conn->prepare("DELETE FROM `Lists` WHERE `id` = :Id");
                           // echo "DELETE FROM `Appointments` WHERE `id` = '". $Id."'";
       // Met bindParam kunnen we een parameter binden. Dit vult de waarde op de plaats in
       // We vervangen :id in de query voor het id wat de functie binnen is gekomen.
       $stmt->bindParam(":Id", $Id);
       // execute a query
        $stmt->execute();
        // fetch the data
        // $result = $stmt->fetch();

    }
    catch(PDOException $e){
        // error message
        echo "Connection failed: " . $e->getMessage();
    }
    // close the connection
    $conn = null;
    // return the result
    return $result;
}
?>