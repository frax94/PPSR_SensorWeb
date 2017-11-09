<html>
<head>
    <title>Dipendente</title>
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
	

	
	
	//definizione costanti
	define("ZERO", 0);
	define("UNO", 1);
	define("DUE", 2);
	define("TRE", 3);
	
?>
  <!-- inizio titolo -->
   <div id="titolo"><h1>Dipendente</h1></div>
   <!-- fine titolo -->
   
   <!-- INIZIO FUNZIONI-->
   <div id="lista_categorie">
       <ul>
           <li onclick="click_categorie('avventura')">Elenco Impianti</li> <!-- il onclick porta ad una funzione in javascript -->
           <li onclick="click_categorie('azione')">Nuovo Cliente</li>
           <li onclick="click_categorie('giochi_di_guida')">Lista Cliente</li>
           <li onclick="click_categorie('giochi_di_ruolo')">Elimina Cliente</li>
           <li onclick="click_categorie('online')">Nuovo Impianto</li>
           <li onclick="click_categorie('picchiaduro')">Elimina Impianto</li>
          
           <li onclick="click_categorie('sparatutto')">Crea Sensore</li>
           <li onclick="click_categorie('sportivo')">Elimina Sensore</li>
       </ul>
   </div>
   <!-- FINE FUNZIONI -->
   
   <!-- inizio lista dei giochi -->
   <div id="lista_giochi">
          
	 <!--  INIZIO LISTA IMPIANTI -->
	 
       <ul id="avventura" style="display: block">
            <h2>Elenco Impianti</h2>
           <li><table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>ID Impianto</th>
						<th>Nome Impianto</th>
						
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT ID, nome FROM impianti " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars ($row1[0]);?> </td>					 <!--  MODIFICATO -->
						<td>  <?php echo htmlspecialchars ($row1[1]);?> </td>
						
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
			</li>
       </ul>
	   
	    <!--  FINE LISTA IMPIANTI -->
	   
	   
	   <!--  INIZIO NUOVO CLIENTE -->
	   
 <ul id="azione" style="display: none">
            <h2>Nuovo Cliente</h2>
           <li>
		   
				  <div id="frm">
				<form  method="POST">
					<p>
						<label>Nome</label>
						<input type="text" id="nome1" name="nome1"/>
						
					</p>
					<p>
						<label>Cognome </label>
						<input type="text" id="cognome" name="cognome"/>
					</p>
					<p>
						<label>Email </label>
						<input type="text" id="email" name="email"/>
					</p>
					<p>
						<label>Password </label>
						<input type="password" id="password1" name="password1"/>
					</p>
					<p>
						
						<input type="submit" id="btn1" name="Insersci"/>
					</p>
					
	
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
						$query3 = "INSERT INTO `utenti`(`ID`, `Nome`, `Cognome`, `Email`, `Password`, `admin`) VALUES ('','$nome','$cognome','$email','$password2','0')" ;
						$impianti = $connessione->query($query3);
					}
				
		?> 
	  
		   
		   </li>
       </ul>
	   
	   <!--  FINE NUOVO CLIENTE -->
	   
	   
	   <!-- INIZIO LISTA CLIENTI -->
	   
       <ul id="giochi_di_guida" style="display: none">
	   <div id="orizz">
         <h2>Lista Cliente</h2>
           <li> 
		   
			<table class="table1" border="1" cellspacing="10" cellpadding="10" >
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Email</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT nome, cognome, email FROM utenti WHERE admin = 0 " ;
						$utenti = $connessione->query($query1);
						
						
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars ($row1[ZERO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[UNO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[DUE]);?> </td>
				</tr>
					<?php
							}
					?>	
				</tbody>
				
			</table>
		</li>
		</div>
       </ul>
	   
	   <!-- FINE LISTA CLIENTI -->
	   
	   
	   
	   <!-- INIZIO ELIMINA CLIENTE --> 
	   
       <ul id="giochi_di_ruolo" style="display: none">
           <h2>Elimina Cliente</h2>
           <li>	<table class=table1 border="1" cellspacing="10" cellpadding="10">
				
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Email</th>
						<th>ID Cliente</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT nome, cognome, email, id FROM utenti WHERE admin = 0 " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars ($row1[ZERO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[UNO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[DUE]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[TRE]);?> </td>
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
					<table class ="form-user" >
					
					<tr><td>
						<label>ID Cliente da eliminare</label>
						</td><td>
						<input type="text" id="id44" name="id44"/>
						<td></tr>
						<tr><th colspan="2">
						<br>
						<input type="submit" id="btn1" name="Insersci " value="Elimina Cliente"/>
						</th></tr>
					</table>
					
	
         </form>
   
    </div>
			 <?php
					
					
					$id44 = "";
						
				
					if (isset($_POST['id44'])) $id44=$_POST['id44'];
				
					
					if ($id44 == ""){
							echo "Riempire tutti i campi";
					} else{
						$query5 = "DELETE FROM `utenti` WHERE ID = '$id44' " ;
						$impianti = $connessione->query($query5);
					}
				
		?> 
	  
		   
		   </li>
       </ul>
	   
	   <!-- FINE ELIMINA CLIENTE --> 
	   
	   
	   <!-- INIZIO NUOVO IMPIANTO --> 
	   
       <ul id="online" style="display: none">
           <h2>Nuovo Impianto</h2>
           <li>	<table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>Nome</th>
						<th>Cognome</th>
						<th>Email</th>
						<th>ID Cliente</th>
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT nome, cognome, email, id FROM utenti WHERE admin = 0 " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars ($row1[ZERO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[UNO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[DUE]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[TRE]);?> </td>
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
				<table class ="form-user" >
					<tr><td>
						<label>Nome Impianto</label>
						</td><td>
						<input type="text" id="nome2" name="nome2"/>
						</td></tr>
					<tr><td>
						<label>ID Cliente </label>
						</td><td>
						<input type="text" id="id" name="id"/>
						</td></tr>
					<tr><th colspan="2">
					<br>
						<input type="submit" id="btn1" name="Insersci Impianto" value="Inserisci Impianto"/>
					</th></tr>
					</table>
					
	
         </form>
   
    </div>
			 <?php
					
					$nome1 = "";
					$id = "";
						
					if (isset($_POST['nome2'])) $nome1=$_POST['nome2'];
					if (isset($_POST['id'])) $id=$_POST['id'];
					
					
					if ($nome1 == "" or $id == ""){
							echo "Riempire tutti i campi";
					} else{
						$query4 = "INSERT INTO `impianti`(`ID`, `Nome`, `Cliente`) VALUES ('','$nome1','$id')" ;
						$impianti = $connessione->query($query4);
					}
				
		?> 
	  
		   
		   </li>
       </ul>
	   
	    <!-- FINE NUOVO IMPIANTO --> 
		
		
		<!-- INIZIO ELIMINA IMPIANTO --> 
		
       <ul id="picchiaduro" style="display: none">
        <h2>Elimina Impianto</h2>
           <li><table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>ID Impianto</th>
						<th>Nome Impianto</th>
						
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT ID, nome FROM impianti " ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars ($row1[ZERO]);?> </td>
						<td>  <?php echo htmlspecialchars ($row1[UNO]);?> </td>
						
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
				<table class ="form-user" >
					<tr><td>
						<label>ID Impianto da eliminare </label>
						</td><td>
						<input type="text" id="id" name="id"/>
						</td></tr>
					
						<tr><th colspan="2">
						<br>
						<input type="submit" id="btn1" name="Elimina Impianto" value="Elimina Impianto"/>
						</th></tr>
						</table>
					
	
         </form>
   
    </div>
			 <?php
					
			
				
					$id = "";
						
				
					if (isset($_POST['id'])) $id=$_POST['id'];
				
					
					if ($id == "" ){
							echo "Riempire tutti i campi";
					} else{																//VEDERE SE ELIMINARE PURE I SENSORI
						$query5 = "DELETE FROM `impianti` WHERE ID = '$id' " ;
						$impianti = $connessione->query($query5);
					}
				
		?> </li>
       </ul>
	   
	   <!-- FINE ELIMINA IMPIANTO --> 
	   
	   
	       <!-- INIZIA MODIFICA IMPIANTO --> 
		   
       <ul id="platform" style="display: none">
          
       </ul>
	   
	   <!-- FINE MODIFICA IMPIANTO --> 
	   
	   
	      <!-- INIZIA CREA SENSORE --> 
	   
       <ul id="sparatutto" style="display: none">
           <h2>Crea Sensore</h2>
           <li>
		   
				  <div id="frm">
				<form  method="POST">
					<table class ="form-user" >
					<tr><td>
						<label>Codice Sensore</label>
						</td><td>
						<input type="text" id="cod" name="cod"/>
						</td></tr>
						
						
					<fieldset>
				<legend>Tipo Sensore</legend>
					Pressione <input type="radio" id="linguaggio" name="linguaggio" value="Pressione"/>
					
					Umidità  <input type="radio" id="linguaggio" name="linguaggio" value="Umidita"/>
				Temperatura <input type="radio" id="linguaggio"  name="linguaggio" value="Temperatura"/>
			</fieldset>
			
	
		
						
						<tr><td>
						<label>Marca Sensore </label>
						</td><td>					
						<input type="text" id="marca" name="marca"/>
						</td></tr>	
						<tr><th  colspan="2">
						<br>
						<input type="submit" id="btn1" name="Insersci Sensore"	value="Inserisci Sensore"/>
						</th></tr>
					</table>
					
	
         </form>
   
    </div>
			 <?php
					$cod ="";
					$tipo = "";
					$marca= "";
				
						
					if (isset($_POST['cod'])) $cod=$_POST['cod'];
					if (isset($_POST['linguaggio'])) $tipo=$_POST['linguaggio'];
					if (isset($_POST['marca'])) $marca=$_POST['marca'];
						
						
					
					if ($cod == "" or $tipo == "" or $marca == ""){
							echo "Riempire tutti i campi";
					} else{
						$query4 = "INSERT INTO `modellisensori`(`Codice`, `Tipo`, `Marca`) VALUES ('$cod', '$tipo', '$marca')" ;
						$inserisciSensore = $connessione->query($query4);
					}
				
		?> 
	  
		   
		   </li>
       </ul>
	   
	      <!-- FINE CREA SENSORE --> 
		  
		  
		  <!-- INIZIO ElIMINA SENSORE --> 
		  
       <ul id="sportivo" style="display: none">
           <h2>Elimina Sensore</h2>
           <li><table class=table1 border="1" cellspacing="10" cellpadding="10" >
				
				<thead>
					<tr>
						<th>Codice Sensore</th>
						<th>Tipo Sensore</th>
						<th>Marca Sensore</th>
						
					</tr>
				</thead>
				
				<tbody>
					<?php 
						$query1 = "SELECT `Codice`, `Tipo`, `Marca` FROM `modellisensori`" ;
						$utenti = $connessione->query($query1);
						
						while ($row1 = $utenti->fetch_array(MYSQLI_NUM)){
					
						
						?>
					<tr> 
		
						<td>  <?php echo htmlspecialchars($row1[ZERO]);?> </td>
						<td>  <?php echo htmlspecialchars($row1[UNO]);?> </td>
						<td>  <?php echo htmlspecialchars($row1[DUE]);?> </td>
						
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
					<table class ="form-user" >
					<tr><td>
						<label>Codice Sendore da eliminare</label>
						</td><td>
						<input type="text" id="id" name="id"/>
					</td></tr>
					
					
						<tr><th colspan="2">
						<br>
						<input type="submit" id="btn1" name="Elimina Sensore" value="Elimina Sensore"/>
						</th></tr>
						</table>
					
	
         </form>
   
    </div>
			 <?php
					
					$codice = "";
					
						
					if (isset($_POST['id'])) $codice=$_POST['id'];
					
					
					if ($codice == ""  ){
							echo "Riempire tutti i campi";
					} else{																//VEDERE SE ELIMINARE PURE I SENSORI
						$query5 = "DELETE FROM `modellisensori`  WHERE Codice = '$codice' " ;
						$impianti = $connessione->query($query5);
					}
			// chiusura della connessione
			$connessione->close();
		?> </li>
       </ul>
	   
	   <!-- FINE ELIMINA SENSORE --> 
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