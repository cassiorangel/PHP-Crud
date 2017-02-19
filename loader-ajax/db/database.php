<?php
	
	//Deleta registros

	function DBDelete($nomeTabela, $where = null){
		
		$where = ($where) ? " WHERE {$where}" : null;

		$query = "DELETE FROM {$nomeTabela}{$where}";

		return DBExecute($query);

	}


	//Alterar registros

	function DBUpDate($nTable, array $data, $where = null){

		foreach ($data as $key => $value) {
			$fields[] = "{$key} = '{$value}'";
		}

		$fields = implode(', ', $fields);

		$where = ($where) ? " WHERE {$where}" : null;

		$query = "UPDATE {$nTable} SET {$fields}{$where}";


		return DBExecute($query);
	

	}

	//ler Registros

	function DBRead($nomeTable, $params = null, $fields = '*'){
		
		$params = ($params) ? " {$params}" :null;

		$query = "SELECT {$fields} FROM {$nomeTable}{$params}";

		$result = DBExecute($query);

		if(!mysqli_num_rows($result)){
			return false;
		}
		else{
			while ($resposta = mysqli_fetch_assoc($result)) {
				$data[] = $resposta;
			}
			return $data;
		}

	}

	// Grava registro

	function DBCreate($nomeTable, array $dados){
		$dados = DBEscape($dados);

		$fields  = implode(', ', array_keys($dados));
		$valores = "'".implode("', '", $dados)."'";

		$query = "INSERT INTO {$nomeTable} ( {$fields} ) VALUES ( {$valores} )";

		return DBExecute($query);
	}


	//executa quers

	function DBExecute($query){

		$link = DBConnect();

		$result = @mysqli_query($link, $query) or die(mysqli_error($link));



		DBClose($link);

		return $result;
	}
		

?>