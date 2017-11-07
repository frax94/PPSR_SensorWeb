<html>
<head>
    <title>Benvenuto in PPSR_Sensor</title>
     <link rel="stylesheet" href="categorie1_style.css" type="text/css">
    <script type="text/javascript" src="categorie_js.js"></script>
	


</head>
<body>
<div id="cont">
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
	
	// verifica su eventuali errori di connessione
if ($connessione->connect_errno) {
    echo "Connessione fallita: ". $connessione->connect_error . ".";
    exit();
	}
	
	
session_start();
$id=  $_SESSION['lol'];
echo $id;

$query3 = "SELECT `nome`, `cognome` FROM `utenti` WHERE ID='$id'" ;
$risultato = $connessione->query($query3);
while ($row1 = $risultato->fetch_array(MYSQLI_NUM)){
	$name=$row1[0];
	$surname=$row1[1];
					
}
?>
  <!-- inizio titolo -->
   <div id="titolo"><h1>Benvenuto <?php echo $name; echo " " .$surname;  ?></h1></div>
   <!-- fine titolo -->
   
   <!-- INIZIO FUNZIONI-->
   <div id="lista_categorie">
       <ul>
           <li onclick="click_categorie('avventura')">Visualizza Dati</li> <!-- il onclick porta ad una funzione in javascript -->
           <li onclick="click_categorie('azione')">Visualizza info altro cliente</li>
           <li onclick="click_categorie('giochi_di_guida')">Visualizza COD personale</li>
           
       </ul>
   </div>
   <!-- FINE FUNZIONI -->
   
   
   <!-- inizio lista dei giochi -->
   <div id="lista_giochi">
          
	 <!--  INIZIO VISUALIZZA DATI -->
	 
       <ul id="avventura" style="display: block">
            <h2>Visualizza Dati</h2>
           <li><table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>Nome Impianto</th>
						<th>ID Impianto</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
					// al posto di 6 mettere variabile presa da login SELECT ID FROM `impianti` WHERE Cliente=6
					$query1 = "SELECT DISTINCT impianti.Nome, ID FROM impianti WHERE impianti.Cliente= '$id'";
					$result = $connessione->query($query1);
						
						while ($row1 = $result->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo $row1[0];?> </td>
						<td>  <?php echo $row1[1];?> </td>
						
						
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
			
			<div id="frm">
					<form  method="POST">
						<table class ="form-user" >
					<tr><td>
						<label>Immettere ID dell'impianto per vedere sensore</label>
						</td>
						<td>
						<input type="text" id="ID" name="ID" size="5"/>
						</td>
					</tr>
					
						<tr><th colspan="2">
					<br>
						<input type="submit" id="btn1" name="Inserisci" value="Visualizza Sensore"/>
					</th></tr>
					
					</table>
					</form>
			</div>
		

		
		<table class=table1 border="1" cellspacing="10" cellpadding="10" >
		<thead>
					<tr>
						<th>Modello Sensore</th>
						<th>Rilevazione</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
				$ID ="";
					
					if (isset($_POST['ID'])) $ID=$_POST['ID'];

					
					if ($ID == "" ){
							echo "Riempire tutti i campi";
					} else{
						$query3 = "SELECT modello, rilevazione FROM `sensori` WHERE Impianto= '$ID'" ;
						$sensori = $connessione->query($query3);
						while ($row1 = $sensori->fetch_array(MYSQLI_NUM)){
					
						?>
					<tr> 
		
						<td>  <?php 
									
										echo $row1[0];
									
							
						
						?> </td>
						<td>  <?php 
										echo $row1[1];
									
						?></td>
				
				</tr>
					<?php
							}
					}
					?>	
				</tbody>
				
			</table>
			
			
			
			</li>
			
			
			
		
			
			
       </ul>
	   
	<!--  FINE VISUALIZZA DATI -->
	   
	   
	<!--  INIZIO VISUALIZZA INFO ALTRO CLIENTE -->
	   
 <ul id="azione" style="display: none">
           <h2>Visualizza info altro cliente</h2>
           <li>
		   
				  <div id="frm">
					<form  method="POST">
						<table class ="form-user" >
					<tr><td>
						<label>Codice Cliente</label>
						</td>
						<td>
						<input type="text" id="nome1" name="nome1" size="10"/>
						</td>
					</tr>
				
				
				
					<tr><th colspan="2">
					<br>
						<input type="submit" id="btn1" name="Inserisci" value="Cerca Cliente"/>
					</th></tr>
					
					</table>
					</form>
				  
    </div>
			 <?php
					
					$nome = "";
					$ID1=0;
					
						
			
					if (isset($_POST['nome1'])) $nome=$_POST['nome1'];
				
					
					if ($nome == "" ){
							echo "Riempire tutti i campi";
					} else{
						$query3 = "SELECT `ID` `Codice` FROM `utenti` WHERE codice='$nome'" ;
						$risultato = $connessione->query($query3);
						while ($row1 = $risultato->fetch_array(MYSQLI_NUM)){
							
							$ID1= $row1[0];
						
						}
					
					}
				
		?> 
	  
		   
		   </li>
		   
		   
		   <li><table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>Nome Impianto</th>
						<th>ID Impianto</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
					// al posto di 6 mettere variabile presa da login SELECT ID FROM `impianti` WHERE Cliente=6
					$query1 = "SELECT DISTINCT impianti.Nome, ID FROM impianti WHERE impianti.Cliente= '$ID1'";
					$result = $connessione->query($query1);
						
						while ($row1 = $result->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo $row1[0];?> </td>
						<td>  <?php echo $row1[1];?> </td>
						
						
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
			
			<div id="frm">
					<form  method="POST">
						<table class ="form-user" >
					<tr><td>
						<label>Immettere ID dell'impianto per vedere sensore</label>
						</td>
						<td>
						<input type="text" id="ID3" name="ID3" size="5"/>
						</td>
					</tr>
					
						<tr><th colspan="2">
					<br>
						<input type="submit" id="btn1" name="Inserisci" value="Visualizza Sensore"/>
					</th></tr>
					
					</table>
					</form>
			</div>
			
			
			<table class=table1 border="1" cellspacing="10" cellpadding="10" >
		<thead>
					<tr>
						<th>Modello Sensore</th>
						<th>Rilevazione</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
				$ID ="";
					
					if (isset($_POST['ID3'])) $ID=$_POST['ID3'];

					
					if ($ID == "" ){
							echo "Riempire tutti i campi";
					} else{
						$query3 = "SELECT modello, rilevazione FROM `sensori` WHERE Impianto= '$ID'" ;
						$sensori = $connessione->query($query3);
						while ($row1 = $sensori->fetch_array(MYSQLI_NUM)){
					
						?>
					<tr> 
		
						<td>  <?php echo $row1[0];?> </td>
						<td>  <?php echo $row1[1];?> </td>
				
				</tr>
					<?php
							}
					}
					?>	
				</tbody>
				
			</table>
			
          
       </ul>
	   
	   <!--  FINE VISUALIZZA INFO ALTRO CLIENTE -->
	   
	   
	   <!-- INIZIO VISUALIZZA COD PERSONALE -->
	   
       <ul id="giochi_di_guida" style="display: none">
	   <div id="orizz">
         <h2>Visualizza COD personale</h2>
           <li> 
		   
			<table class="table1" border="1" cellspacing="10" cellpadding="10" >
				
				
				<tbody>
					<?php 
						$query1 = "SELECT codice FROM utenti WHERE ID = '$id' " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo $row1[0];?> </td>
					
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
		</li>
		</div>
       </ul>
	   
	   <!-- FINE VISUALIZZA COD PERSONALE -->
	   
	   
	   
	   
   </div>
   <!-- fine lista dei giochi -->
   
   <!-- inizio bottone home -->
   <div id="bot_home">
       <ul>
           <li><a  href="login.php">Logout</a></li>
       </ul>
   </div>
   <!-- fine bottone home -->
   
   </div>
</body>
    
   
</html>