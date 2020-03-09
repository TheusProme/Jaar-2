<?php
require(ROOT . "model/TodoModel.php");

/*-------------------------------------------------------Lists----------------------------------------------------------------*/

function index()
{
    //1. Haal alle medewerkers op uit de database (via de model) en sla deze op in een variable
    $Appointments = getAllAppointments();
    echo $id;
    //2. Geef een view weer en geef de variable met medewerkers hieraan mee
    render('employee/index', $Appointments);
}

function createList() {
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    // $TaskID = GetTaskID($id);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
	render('employee/create');
}

function storeList() {
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    $checkName = $checkAsign = $checkStatus = false;

	$NameErr = $AsignErr = $StatusErr = "";
	$Name = $Asign = $Status = "";

    // echo "StoreList-Begin";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  
		// die("test");               
		if (empty($_POST["Name"])) {                              
			$NameErr = "Name is required";                          
		} else {                                                  
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST["Name"])) {
				$NameErr = "Only letters and white space allowed"; 
			} else {
				$checkName = true;
			}
		}

		if (empty($_POST["Asign"])) {                              
			$AsignErr = "Asign is required";                          
		} else {                                                  
			$checkAsign = true;
        }
        
        if (empty($_POST["Status"])) { 
            // die("test");                             
			$StatusErr = "Status is required";                          
		} else {                                                  
			$checkStatus = true;	
        }
        
	}

	function input($data) {                                 
		$data = trim($data);                                 
		$data = stripslashes($data);                        
		$data = htmlspecialchars($data);                    
		return $data;                                       
    }
    
	if ($checkName && $checkAsign && $checkStatus == true) {
        // echo '<script> alert("hallo"); </script>';
        // die("einde"); 
		$Name = input($_POST["Name"]); 
        $Asign = input($_POST["Asign"]); 
        $Status = input($_POST["Status"]); 

        // echo "End ->>", $Name, " ", $Asign, " ", $Status; 
        listcreate($Name, $Asign, $Status);
        header("Location: ../index.php?");
	} else {
        // var_dump(['Name' =>$Name, 'NameErr' =>$NameErr, 'Asign' =>$Asign, 'AsignErr' =>$AsignErr]);
        render('Tasks/create', ['Name' =>$Name, 'NameErr' =>$NameErr, 'Asign' =>$Asign, 'AsignErr' =>$AsignErr, 'Status' =>$Status, 'StatusErr' =>$StatusErr,]);
    }
    //2. Bouw een url op en redirect hierheen
	
}

function editList($id){
	//1. Haal een medewerker op met een specifiek id en sla deze op in een variable
	$List = getList($id);
	// var_dump($employee);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
	render('employee/edit', $List);
}

function updateList(){
//1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
$checkName = $checkAsign = $checkStatus = false;

$NameErr = $AsignErr = $StatusErr = "";
$Name = $Asign = $Status = "";

$Id = $_POST["id"];
//echo "StoreList-Begin";
//echo " ", $_POST["Name"], " ", $_POST["Asign"], " ", $_POST["Status"]; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // die("test");               
    if (empty($_POST["Name"])) {                              
        $NameErr = "Name is required";                          
    } else {                                                  
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST["Name"])) {
            $NameErr = "Only letters and white space allowed"; 
        } else {
            $checkName = true;
        }
    }

    if (empty($_POST["Asign"])) {                              
        $AsignErr = "Asign is required";                          
    } else {                                                  
        $checkAsign = true;
    }
    
    if (empty($_POST["Status"])) { 
        // die("test");                             
        $StatusErr = "Status is required";                          
    } else {                                                  
        $checkStatus = true;	
    }
    
}

function input($data) {                                 
    $data = trim($data);                                 
    $data = stripslashes($data);                        
    $data = htmlspecialchars($data);                    
    return $data;                                       
}

if ($checkName && $checkAsign && $checkStatus == true) {
    // echo '<script> alert("hallo"); </script>';
    // die("einde"); 
    $Name = input($_POST["Name"]); 
    $Asign = input($_POST["Asign"]); 
    $Status = input($_POST["Status"]); 

    echo "End ->>", $Name, " ", $Asign, " ", $Status; 
    listupdate($Id, $Name, $Asign, $Status);
    header("Location: ../index.php?");
} else {
    // echo "End ->>", $Name, " ", $Asign, " ", $Status; 
    // var_dump(['Name' =>$Name, 'NameErr' =>$NameErr, 'Asign' =>$Asign, 'AsignErr' =>$AsignErr]);
    render('employee/edit', ['Name' =>$Name, 'NameErr' =>$NameErr, 'Asign' =>$Asign, 'AsignErr' =>$AsignErr, 'Status' =>$Status, 'StatusErr' =>$StatusErr,]);
}
//2. Bouw een url op en redirect hierheen
    
}

function deleteList($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
	$List = getList($id);
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
	render('employee/delete', $List);
}

function destroyList(){
	//1. Delete een medewerker uit de database
	$Id = $_POST["id"];
	// echo $Id. "<-----";
	listdelete($Id);
	//2. Bouw een url en redirect hierheen
    header("Location: ../index.php?");
}

/*-------------------------------------------------------Tasks----------------------------------------------------------------*/

function Tasks($id){
	//1. Haal een medewerker op met een specifiek id en sla deze op in een variable
    $Tasks = getTasks($id);
    // print_r($Tasks);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
	render('Tasks/index', $Tasks, $id);
}

function create($id) {
    //1. Geef een view weer waarin een formulier staat voor het aanmaken van een medewerker
    $TaskID = GetTaskID($id);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
	render('Tasks/create', $TaskID);
}

function store() {
    //1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
    $Id = $_POST["id"];
    $checkName = $checkName_Appointment = $checkStart = $checkEnd = false;

	$NameErr = $Name_AppointmentErr = $StartErr = $EndErr = "";
	$Name = $Name_Appointment = $Start = $End = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {  
		// die("test");               
		if (empty($_POST["Name"])) {                              
			$NameErr = "Name is required";                          
		} else {                                                  
			if (!preg_match("/^[a-zA-Z ]*$/",$_POST["Name"])) {
				$NameErr = "Only letters and white space allowed"; 
			} else {
				$checkName = true;
			}
		}

		if (empty($_POST["Name_Appointment"])) {                              
			$Name_AppointmentErr = "Name_Appointment is required";                          
		} else {                                                  
			$checkName_Appointment = true;
        }
        
        if (empty($_POST["Start"])) { 
            // die("test");                             
			$StartErr = "StartTime is required";                          
		} else {                                                  
            $checkStart = true;   	
        }
        
        if (empty($_POST["End"])) { 
            // die("test");                             
			$EndErr = "EndTime is required";                          
		} else {                                                  
			$checkEnd = true;	
        }
        
	}

	function input($data) {                                 
		$data = trim($data);                                 
		$data = stripslashes($data);                        
		$data = htmlspecialchars($data);                    
		return $data;                                       
    }
    
	if ($checkName && $checkName_Appointment && $checkStart && $checkEnd == true) {
        // echo '<script> alert("hallo"); </script>';
        // die("einde"); 
		$Name = input($_POST["Name"]); 
        $Name_Appointment = input($_POST["Name_Appointment"]);
        $Start = input($_POST["Start"]); 
        $End = input($_POST["End"]); 

        // echo $Name, $Name_Appointment, $Start, $End; 
        createAppointment($Id, $Name, $Name_Appointment, $Start, $End);
        header("Location: ../index.php?");
	} else {
        // var_dump(['Name' =>$Name, 'NameErr' =>$NameErr, 'Name_Appointment' =>$Name_Appointment, 'Name_AppointmentErr' =>$Name_AppointmentErr]);
        render('Tasks/create', ['Name' =>$Name, 'NameErr' =>$NameErr, 'Name_Appointment' =>$Name_Appointment, 'Name_AppointmentErr' =>$Name_AppointmentErr, 'Start' =>$Start, 'StartErr' =>$StartErr, 'End' =>$End, 'EndErr' =>$EndErr,]);
    }
    //2. Bouw een url op en redirect hierheen
	
}

function edit($id){
	//1. Haal een medewerker op met een specifiek id en sla deze op in een variable
	$employee = getAppointment($id);
	// var_dump($employee);
    //2. Geef een view weer voor het updaten en geef de variable met medewerker hieraan mee
	render('Tasks/edit', $employee);
}

function update(){
//1. Maak een nieuwe medewerker aan met de data uit het formulier en sla deze op in de database
$checkName = $checkName_Appointment = $checkStart = $checkEnd = false;
$Id = $_POST["id"];

$NameErr = $Name_AppointmentErr = $StartErr = $EndErr = "";
$Name = $Name_Appointment = $Start = $End = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // die("test");               
    if (empty($_POST["Name"])) {                              
        $NameErr = "Name is required";                          
    } else {                                                  
        if (!preg_match("/^[a-zA-Z ]*$/",$_POST["Name"])) {
            $NameErr = "Only letters and white space allowed"; 
        } else {
            $checkName = true;
        }
    }

    if (empty($_POST["Name_Appointment"])) {                              
        $Name_AppointmentErr = "Name_Appointment is required";                          
    } else {                                                  
        $checkName_Appointment = true;
    }
    
    if (empty($_POST["Start"])) { 
        // die("test");                             
        $StartErr = "StartTime is required";                          
    } else {                                                  
        $checkStart = true;   	
    }
    
    if (empty($_POST["End"])) { 
        // die("test");                             
        $EndErr = "EndTime is required";                          
    } else {                                                  
        $checkEnd = true;	
    }
    
}

function input($data) {                                 
    $data = trim($data);                                 
    $data = stripslashes($data);                        
    $data = htmlspecialchars($data);                    
    return $data;                                       
}

if ($checkName && $checkName_Appointment && $checkStart && $checkEnd == true) {
    // echo '<script> alert("hallo"); </script>';
    // die("einde"); 
    $Name = input($_POST["Name"]); 
    $Name_Appointment = input($_POST["Name_Appointment"]);
    $Start = input($_POST["Start"]); 
    $End = input($_POST["End"]); 

    // echo $Id, $Name, $Name_Appointment, $Start, $End; 
    updateAppointment($Id, $Name, $Name_Appointment, $Start, $End);
    header("Location: ../index.php?");
} else {
    // var_dump(['Name' =>$Name, 'NameErr' =>$NameErr, 'Name_Appointment' =>$Name_Appointment, 'Name_AppointmentErr' =>$Name_AppointmentErr]);
    render('Tasks/edit', ['Name' =>$Name, 'NameErr' =>$NameErr, 'Name_Appointment' =>$Name_Appointment, 'Name_AppointmentErr' =>$Name_AppointmentErr, 'Start' =>$Start, 'StartErr' =>$StartErr, 'End' =>$End, 'EndErr' =>$EndErr,]);
}
//2. Bouw een url op en redirect hierheen
    
}

function delete($id){
    //1. Haal een medewerker op met een specifiek id en sla deze op in een variable
	$Appointment = getAppointment($id);
    //2. Geef een view weer voor het verwijderen en geef de variable met medewerker hieraan mee
	render('Tasks/delete', $Appointment);
}

function destroy(){
	//1. Delete een medewerker uit de database
	$Id = $_POST["id"];
	// echo $Id. "<-----";
	deleteAppointment($Id);
	//2. Bouw een url en redirect hierheen
    header("Location: ../index.php?");
}
?>