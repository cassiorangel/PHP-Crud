<?php
	require 'db/config.php';
	require 'db/conexao.php';
	require 'db/database.php';


	/* Exemplo 1 utilizando funcao
	$usuarios = DBRead('usuarios', "where id = 13", 'email');

	var_dump($usuarios);
fim */	

	/*Exemplo 2 utilizando funcao
	$usuarios = DBRead('usuarios', "where nome = 'Ev Fernandes'", 'nome');

	var_dump($usuarios);
	fim*/

	/*
	$users = DBRead('usuarios', "where id > 0 or idade > 0");

	var_dump($users);
*/

/* Pesquisa por nome no banco

	$pesquisa = 'Arthur';

	$usuarios = DBRead('usuarios', "WHERE nome LIKE '$pesquisa'");

	var_dump($usuarios);
fim*/

/* Pesquisa % % por nome no banco comecam e termina com junior
$pesquisa = 'junior';

	$usuarios = DBRead('usuarios', "WHERE nome like '%$pesquisa%'");

	var_dump($usuarios);


	*/

/* limitando resultados

	$dados = DBRead('usuarios', "LIMIT 4");

	var_dump($dados);	 
*/

/* limitando resultados onde comeca e termina 

	$dados = DBRead('usuarios', "LIMIT 3, 6");

	var_dump($dados);



/* ordenar id descendente ou ASC ordem padrao

	$dados = DBRead('usuarios', "ORDER BY id DESC");

	var_dump($dados);
*/

/* Model trazer apenas campo nome

$dados = DBRead('usuarios', null, 'nome, email');

	var_dump($dados);
*/

/* Exibir dados do array melhor forma utilizar foreach

$registros = DBRead('usuarios', null, 'id, nome');

	foreach ($registros as $key) {
		echo $key['id'].'<br/>';
		echo $key['nome'].'<br/><hr>';
	}

*/
/*
	$meuArray = array('nome' => 'Limão amarelo', 
		'idade' => 30

		);


	$registros = DBUpDate('usuarios', $meuArray, 'id = 21');

	var_dump($registros);
*/

/*	Deletando registro= posso passar 2 parametros exemplo id = 1 or name = 'ana' 

	$DropUsuario = DBDelete('usuarios', "id = 1");
	
	if($DropUsuario)
		echo "ok";
	else
		echo "Errado";

*/


		$AdicionarUser = array(
						'nome' => 'rosa poderosa',
						'email' => 'rosa@hotmail.com',
						'idade' => 17


			);

		$resultado = DBCreate('usuarios', $AdicionarUser);


	var_dump($resultado);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trabalhando com ajax</title>
	<link rel="stylesheet" href="css/stylo.css" type="text/css"	>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>

<div class="container">
	
	<h1>Trabalhando com ajax</h1>

	
	<div class="formulario">
	<form action="" name="usuarios" method="post">
		<label for="">Nome:</label><br>
		<input type="text" id="nome" placeholder="Nome usuário"><br/>
		
		<label for="">Email:</label><br>
		<input type="text" id="email" placeholder="Email"><br/>
		<input type="submit" id="enviar" value="registrar"><br/>
		<div id="alerta"><img src="img/load.gif" alt=""><span id="mensagem">Processando...</span></div>
	
	</form>

	</div>
</div>

</body>
</html>