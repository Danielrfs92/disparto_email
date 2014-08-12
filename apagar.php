<?php require_once('autorizar.php'); ?>
<?php 
$id = $_GET['id'];
$link = mysqli_connect('localhost','root','','disparoemail');

$query = "DELETE FROM email WHERE id = '$id'";
if(mysqli_query($link,$query)){
	echo '<p>Deletado com sucesso!</p>';
	echo '<p><a href="deletar.php">Voltar</a></p>';
}else {
	echo mysqli_error();
}
?>