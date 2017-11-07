
<?php

// Prendo i dati inseriti nelle text
$username = $_POST['user'];
$password1 = $_POST['password'];



/*

    creazione di un database con MySQLi.
  La prima operazione richiesta sarà quella relativa alla definizione
  del blocco dei parametri per la connessione
*/

// nome di host
$host = "localhost";
// username dell'utente in connessione
$user = "root";
// password dell'utente
$password = "";
// nome del database
$db = "test";

// stringa di connessione al DBMS
$connessione = new mysqli($host, $user, $password, $db);

// verifica su eventuali errori di connessione
if ($connessione->connect_errno) {
    echo "Connessione fallita: ". $connessione->connect_error . ".";
    exit();
}


/* esecuzione della query per la creazione del database
if (!$connessione->query("INSERT INTO `users`(`id`, `username`, `password`) VALUES ('','$username','$password1')")) {
    echo "Errore della query: " . $connessione->error . ".";
}else{
    echo "Databese creato correttamente.";
} 


if ($connessione->query("SELECT * FROM `users` WHERE username= '$username' ")) {
    echo "Errore della query: " . $connessione->error . ".";
}else{
    echo "ottimo";
}

$sql="SELECT * FROM `users` WHERE username= '$username' ";
$sql1="SELECT * FROM `users` WHERE password= '$password' ";


 $userDB= mysqli_query($connessione, $sql);
 mysqli_query($connessione, $sql1);

echo "ottimo".$userDB;
echo "ottimo".$passDB;
*/

/*Il metodo num_rows(), sempre applicabile alla classe mysqli_result, restituisce il numero di righe ottenute dalla select e avremo quindi un risultato superiore a 0 solo nel caso in cui le credenziali siano valide.*/
//variabile = select id from utenti where email=utente connesso;
//$sql= "SELECT email FROM utenti WHERE email = '$username' AND password = '$password1'"
 //mysqli_query($connessione, $sql);
//echo "ottimo".$id;



$query = $connessione->query("SELECT * FROM utenti WHERE email = '$username' AND password = '$password1'");
if($query->num_rows) {  
    //echo "Accesso consentito...benvenuto " .$username ;	//eliminare
		
		$queryAdmin= "SELECT admin FROM utenti WHERE email = '$username' AND password = '$password1'";
		$admin = $connessione->query($queryAdmin);
		while ($row1 = $admin->fetch_array(MYSQLI_NUM)){
		echo $row1[0];
		
		
		if($row1[0] == 0){
			
			//per passare l'id della tabella
			$id = "SELECT id FROM utenti WHERE email = '$username' AND password = '$password1'";
			$result = $connessione->query($id);
			while($row = $result->fetch_array(MYSQLI_NUM)){
				//echo $row[0];									//eliminare
				session_start();
				$_SESSION['lol'] = $row[0];
				echo '<a href="table.php">porta in automatico alla panina seguente grazie al comando sotto</a>';
				}
				
				header("location: cliente.php");	//chiama lista 
				
			echo "Cliente";					//eliminare
		} else if ($row1[0] == 1){
			
			header("location: dipendente.php");
			echo "Dipendente";				//eliminare
		} else if ($row1[0] == 2){
			
			header("location: amministratore.php");
			echo "Amministratore";			//eliminare
		}
	}
	
	
	//$id = "SELECT id FROM utenti WHERE email = '$username' AND password = '$password1'";
	//$result = $connessione->query($id);
	//while($row = $result->fetch_array(MYSQLI_NUM)){
    //echo $row[0];									//eliminare
	
	//session_start();
	//$_SESSION['lol'] = $row[0];
	//echo '<a href="table.php">porta in automatico alla panina seguente grazie al comando sotto</a>'; 
	
	//}
	
	//header("location: table.php");
    
    
   
} else {
    
	header("location: accesso_negato.html");
}



//STAMPA TABELLE

/*
$query1 = "SELECT username FROM users ";
$query2 = "SELECT password FROM users ";

$result = $connessione->query($query1);
$result1 = $connessione->query($query2);


// controllo sul numero dei record coinvolti
if(@$result->num_rows > 0)
{
  // risultato sotto forma di array numerico
  while($row = $result->fetch_array(MYSQLI_NUM))
  {
      $row1 = $result1->fetch_array(MYSQLI_NUM);
  
            echo $row[0] . " ";
            echo $row1[0] . "<br>";
      
  }
    

}

*/




// chiusura della connessione
$connessione->close();
?>