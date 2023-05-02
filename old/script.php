<?php
	require_once "lib/conexao.php";

	

	echo "
	DROP DATABASE IF EXISTS test_generator; \n
	
	CREATE DATABASE test_generator; \n
	
	\c test_generator; \n


	CREATE TABLE provas ( 	

		id serial primary key, 	

		exercicios text,
		gabarito text,
		data_hora timestamp default current_timestamp,

	); 

	CREATE TABLE tags ( 	\n
		id serial primary key, 	\n
		tag text 	\n
	); 

	\n 

	CREATE TABLE questoes ( 	\n
		id serial primary key, 	\n
		questao text, 	\n
		resposta text 	\n
	);	
	
	\n
	
	CREATE TABLE questoes_tags ( 	\n
		id serial primary key, 	\n
		questao_id integer references questoes (id), 	\n
		tag_id integer references tags (id) 	\n
	);\n";

	$result = pg_query_params($conexao, "select * from tags", array());
	while ($tag = pg_fetch_array($result)) {		
		echo "INSERT INTO tags (id, tag) values (".$tag['id'],", '".$tag['tag']."'); \n\n";
	}

	echo "\n\n";

	$query = "select * from questoes";
	$result = pg_query_params($conexao, $query, array()) or die ($query);	
	while ($questao = pg_fetch_array($result)) {
		echo "INSERT INTO questoes (id, questao, resposta) values (".$questao['id'].", '".trim($questao['questao'])."','".trim($questao['resposta'])."'); \n\n";		
		echo "\n\n";

		$query = "select * from questoes_tags where questao_id = ".$questao['id'];
		$resultX = pg_query_params($conexao, $query, array()) or die ($query);	
		while ($questao_tag = pg_fetch_array($resultX)) {
			echo "INSERT INTO questoes_tags (questao_id, tag_id) values (".$questao_tag['questao_id'].", ".$questao_tag['tag_id']."); \n\n";
		}
	}
	echo "\n\n";

	$result = pg_query_params($conexao, "select max(id) as max_id from questoes", array());
	$max_id = pg_fetch_array($result)['max_id'];
	$max_id++;
	
	$result = pg_query_params($conexao, "select * from avaliacoes where LENGTH(trim(descricao)) > 5", array());
	while ($questao = pg_fetch_array($result)) {		
		echo "INSERT INTO questoes (id, questao) values (".$max_id.",'".trim($questao['descricao'])."'); \n\n";
		$max_id++;
	}

?>