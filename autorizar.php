<?php
//Nome do usuário e senha para autenticação
$username = 'administrador';
$password = 'naotemsenha';

if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
//Nome do usuário/senha incorretos, então enviar os cabeçalhos de autenticação
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Basic realm="Diparos de Email"');
exit('<h2>Disparo de Email</h2>Desculpe, veçê deve digitar um usuário e senha válidos para acessar esta página.');
}
?>