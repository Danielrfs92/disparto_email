<?php require_once('autorizar.php'); ?>
<html>
<head>
	<title>Sistema Disparo de Email</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<div id="admin" >
	<a href="admin.php">Voltar</a>
</div>
<h2>Deletar Contato</h2>

<?php 
$link = mysqli_connect('localhost','root','','disparoemail');
$query = "SELECT * FROM email";
$res = mysqli_query($link, $query);
while($row = mysqli_fetch_array($res)){
	echo '<table border="1">';
	echo '<tr>';
	echo '<td>Nome: ' . $row['nome']. ' </td>';
	echo '<td>Sobrenome: ' . $row['sobrenome']. ' </td>';
	echo '<td>Email: ' . $row['email']. ' </td>';
	echo "<td><a href='apagar.php?&id=".$row['id']."'>Deletar</a></td>"; 
	echo '</tr>';
	echo '</table><br/>';
}
mysqli_close($link);
?>