<?php
	require_once "lib/conexao.php";
	// if (!isset($_SESSION['dump'])){
		// $_SESSION['dump'] = 1;
		// gera o dump do dia
    	dump();
    // }
	header("Location: bin/questoes/index.php");
?>
