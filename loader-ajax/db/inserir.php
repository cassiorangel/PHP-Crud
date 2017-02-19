
<?php

require_once('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];




$sql = "INSERT INTO usuarios (nome, email) VALUES ('$nome', '$email')";
$inserir = $conectar->query($sql) or die(mysqli_error());



?>
