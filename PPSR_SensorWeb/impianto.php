<html>

<?php
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
?>


<head>
<title>Impianto</title>
<link rel ="stylesheet" href="table_style.css"> 
</head>



<body>

<table class="impianto" border="1" cellspacing="10" cellpadding="10">
<thead>

<tr>

	<th>Modello</th>
	<th>Rilevazione</th>
</tr>
</thead>

<?php

	session_start();
	$id=  $_SESSION['lol'];
	echo htmlspecialchars($id);
	
	/*
$numeri =array();
for($i=1; $i<4;){
$numeri[$i]= $_SESSION['$i'];
echo $numeri[$i];
$i=$i+1;
}*/


//numeri da caricare
$query3 ="SELECT DISTINCT ID FROM impianti WHERE impianti.Cliente= '$id'";
$result1 = $connessione->query($query3);
while($row4 = $result1->fetch_array(MYSQLI_NUM )){
	echo $row4[0];
	
}



// al posto di 1 mettere variabile ricevuta da table
$query1 = "SELECT modello, rilevazione FROM `sensori` WHERE Impianto=1";

$result = $connessione->query($query1);
while($row = $result->fetch_array(MYSQLI_NUM )){
?>

	<tbody>
		<tr> 
			<td> <?php echo $row[0];?> </td>
			<td> <?php echo $row[1];?> </td>
			
		</tr>
		
<?php
	}
?>

	</tbody>
</table>
</body>

</html>