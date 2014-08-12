<html>
<head>
	<title>Sistema Disparo de email</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="admin" >
	<a href="admin.php">Voltar</a>
</div>
<h2>Enviar Email</h2>

<?php 
$link = mysqli_connect('localhost','root','','disparoemail');


if(isset($_POST['submit'])){
	$from = 'disparoemail@gmail.com';
	$assunto = mysqli_real_escape_string($link, trim($_POST['assunto']));
	$mensagem = mysqli_real_escape_string($link, trim($_POST['mensagem']));
	if(!empty($assunto) && !empty($mensagem)){
		$query = "SELECT * FROM email";
		$busca = mysqli_query($link, $query);
		while($row = mysqli_fetch_array($busca)){
			$to = $row['email'];
			$subject = $assunto;
			$nome = $row['nome'];
			$msg = "Sr(a).$nome,\n$mensagem";
			@mail($to, $subject, $msg, $from);// @ pois servidor local não manda email
			echo 'Email enviado para: ' . $to . '<br/>';
		}
	}else {
		echo '<p>Você deve preencher todos os campos.</p>';
	}
}

?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
		<fieldset>
			<legend>Enviar Email</legend>
				<label>Assunto:</label><br/>
					<input type="text" id="assunto" name="assunto" value="<?php if(!empty($assunto)) echo $assunto; ?>" /><br/>
				<label>Mensagem:</label><br/>
					<textarea rows="4" cols="40" id="mensagem" name="mensagem" value="<?php if(!empty($mensagem)) echo $mensagem; ?>"></textarea><br/>
					<input type="submit" name="submit" value="Enviar" />
		</fieldset>
</form>

	
<hr/>
<div class="footer" >
	<p>Copyright &copy;2014 Disparo de Email</p>
</div>
</body>
</html>