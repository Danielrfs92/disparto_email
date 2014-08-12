<html>
<head>
	<title>Sistema Disparo de email</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="admin" >
	<a href="admin.php">Login Admin</a>
</div>
<h2>Cadastre seu email</h2>
<?php 
$link = mysqli_connect('localhost','root','','disparoemail');
$nome = mysqli_real_escape_string($link, trim($_POST['nome']));
$sobrenome = mysqli_real_escape_string($link, trim($_POST['sobrenome']));
$email = mysqli_real_escape_string($link, trim($_POST['email']));

if(isset($_POST['submit'])){ //Se o formulario for submitido
	if(!empty($nome) && !empty($email)){ //Verifica se os campos não estão vazios
		$busca = "SELECT * FROM email WHERE email = '$email'";
		$busca1 = mysqli_query($link, $busca);
		if(mysqli_num_rows($busca1) == 0){//Se não retorna linha do banco
			$gravar = "INSERT INTO email (nome, sobrenome, email) VALUES ('$nome','$sobrenome','$email')";
			mysqli_query($link, $gravar);
			$link ="";
			$nome="";
			$email="";
			echo '<p>Cadastro realizado com sucesso!</p>';
		} else{
			echo '<p>Desculpe, mas ja existe esse email cadastrado, por favor tente outro</p>';
		}
	} else {
		echo '<p>Desculpe, mas os campos Nome e Email são obrigatórios.</p>';
	}
	
}
?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" />
		<fieldset>
			<legend>Informações de Cadastro</legend>
				<label>Nome: 
					<input type="text" id="nome" name="nome" value="<?php if(!empty($nome)) echo $nome; ?>"/>
				</label>
				<label>Sobrenome: 
					<input type="text" id="sobrenome" name="sobrenome" value="<?php if(!empty($sobrenome)) echo $sobrenome; ?>" />
				</label>
				<label>Email: 
					<input type="email" id="email" name="email" value="<?php  if(!empty($email)) echo $email; ?>"/>
				</label>
					<input type="submit" name="submit" value="Cadastrar" />
		</fieldset>
	</form>
<hr/>
<div class="footer" >
	<p>Copyright &copy;2014 Disparo de Email</p>
</div>
</body>
</html>
