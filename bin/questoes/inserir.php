<?php
	require_once "../../lib/conexao.php";	
	
	$query = "INSERT INTO questoes (questao, resposta) values ('".$_POST['questao']."','".$_POST['resposta']."') RETURNING id";
	$result = pg_query_params($conexao, $query, array()) or die ($query);
	
	if (pg_affected_rows($result) > 0) {
		$registro = pg_fetch_array($result);
		$id = $registro['id'];
	} else {
		$id = 0;
	}

	$sql = "";	
	$vetTag = ((isset($_POST['vetTag'])) ? $_POST['vetTag'] : array());

	if (count($vetTag) > 0 && $id > 0){
		foreach ($vetTag as $chave => $tag_id) {
			$sql = "
			INSERT INTO questoes_tags (questao_id, tag_id) values (".$id.",".$tag_id.");";	
			$result = pg_query_params($conexao, $sql, array()) or die ($sql);
		}
	}
	header("Location: ./../../view/questoes/pagination.html");
?>