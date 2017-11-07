<html>
<head>
    <title>Amministratore</title>
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
?>
  <!-- inizio titolo -->
   <div id="titolo"><h1>Amministratore</h1></div>
   <!-- fine titolo -->
   
   <!-- INIZIO FUNZIONI -->
   <div id="lista_categorie">
       <ul>
           <li onclick="click_categorie('avventura')">Elenco Dipendenti</li> <!-- il onclick porta ad una funzione in javascript -->
           <li onclick="click_categorie('azione')">Nuovo Dipendente</li>
           <li onclick="click_categorie('giochi_di_guida')">Elimina Dipendente</li>
          
         
       </ul>
   </div>
   <!-- FINE FUNZIONI -->
   
   
   <div id="lista_giochi">
  <!--  INIZIO LISTA DIPENDENTI -->
       <ul id="avventura" style="display: block">
           <h2>Elenco Dipendeti</h2>
		   
		   <li> 
			<table class="table1" border="1" cellspacing="10" cellpadding="10">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Email</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT nome, cognome, email FROM utenti WHERE admin = 1 " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo $row1[0];?> </td>
						<td>  <?php echo $row1[1];?> </td>
						<td>  <?php echo $row1[2];?> </td>
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
		   
		</li>
		   
		   
		   
           </ul>
	   
	   
	   <!--  FINE LISTA DIPENDENTI -->
		
		
		
		<!--  INIZIO NUOVO DIPENTENTE -->
       <ul id="azione" style="display: none">
           <h2>Nuovo Dipendente</h2>
           <li>
		   
				  <div id="frm">
				<form  method="POST">
					<table class ="form-user">
					<tr><td>
						<label>Nome</label>
						</td>
						<td>
						<input type="text" id="nome1" name="nome1"/>
						</td></tr>
						<tr><td>
						<label>Cognome </label>
						</td><td>
						<input type="text" id="cognome" name="cognome"/>
					</td></tr>
					<tr><td>
						<label>Email </label>
						</td><td>
						<input type="text" id="email" name="email"/>
					</td></tr>
					<tr><td>
						<label>Password </label>
						</td><td>
						<input type="password" id="password1" name="password1"/>
					</td></tr>
					<tr><th = colspan="2">
						<input type="submit" id="btn1" name="Insersci"/>
					</th></tr>
					</table>
	
         </form>
   
    </div>
			 <?php
					$email ="";
					$nome = "";
					$cognome= "";
					$password2 ="";
						
					if (isset($_POST['email'])) $email=$_POST['email'];
					if (isset($_POST['nome1'])) $nome=$_POST['nome1'];
					if (isset($_POST['cognome'])) $cognome=$_POST['cognome'];
					if (isset($_POST['password1'])) $password2=$_POST['password1'];
					
					if ($email == "" or $nome == "" or $cognome == "" or $password2==""){
							echo "Riempire tutti i campi";
							
					} else{
						$query3 = "INSERT INTO `utenti`(`ID`, `Nome`, `Cognome`, `Email`, `Password`, `admin`) VALUES ('','$nome','$cognome','$email','$password2','1')" ;
						$impianti = $connessione->query($query3);
					}
					
					
		
		?> 
	  
		   
		   </li>
          
       </ul>
	   
	   
	   <!--  FINE NUOVO DIPENDENTE -->
	   
	    <!-- INIZIO ELIMINA DIPENDENTE -->
       <ul id="giochi_di_guida" style="display: none">
            <h2>Elimina Dipendente</h2>
           <li>	<table class="table1" border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Email</th>
						<th>ID Utente</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query2 = "SELECT nome, cognome, email, id FROM utenti WHERE admin = 1 " ;
						$dipendenti = $connessione->query($query2);
						
						while ($row3 = $dipendenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo $row3[0];?> </td>
						<td>  <?php echo $row3[1];?> </td>
						<td>  <?php echo $row3[2];?> </td>
						<td>  <?php echo $row3[3];?> </td>
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
			</li>
			
			<li>
		   
				  <div id="frm">
				<form  method="POST">
				<table class="form-user">
					
					<tr><td>
						<label>ID Dipendente da eliminare</label>
						</td><td>
						<input type="text" id="id" name="id"/>
						</td></tr>
						<tr><th colspan ="2">
						<input type="submit" id="btn1" name="Insersci Impianto"/>
					</th></tr>
					</table>
					
	
         </form>
   
    </div>
			 <?php
					
					
					$id = "";
						
					if (isset($_POST['nome2'])) $nome2=$_POST['nome2'];if (isset($_POST['id'])) $id=$_POST['id'];
				
					
					if ($id == "" ){
							echo "Riempire tutti i campi";
					} else{
						$query5 = "DELETE FROM `utenti` WHERE ID = '$id' " ;
						$impianti = $connessione->query($query5);
					}
				
				
			// chiusura della connessione
			$connessione->close();
				
		?> 
	  
		   
		   </li>
       </ul>
	  
	  <!-- FINE ELIMINA DIPENDENTE -->
	  
	  
     
   </div>
  
   
   <!-- inizio bottone Logout -->
   <div id="bot_home">
       <ul>
           <li><a href="login.php">Logout</a></li>
       </ul>
   </div>
   <!-- fine bottone Logout -->
   </div>
</body>
    
   
</html>