<html>

	
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	
    	<script language="javascript">
			if(history.length>0)history.forward()
		</script>
	
	
</head>
<body>
    <div id="frm">
        <form action="process.php" method="POST">
            <table class="form-user">
			<tr><td>
                <label>Username</label>
				</td><td>
                <input type="text" id="user" name="user"/>
            </td></tr>
			<tr><td>
                <label>Password </label>
				</td><td>
                <input type="password" id="password" name="password"/>
			</td></tr>
			<tr><th colspan="2">
			<br>
                <input type="submit" id="btn" name="Login"/>
            </th></tr>
        </table>
        </form>
    
    
    
    </div>
    
    
</body>


</html>