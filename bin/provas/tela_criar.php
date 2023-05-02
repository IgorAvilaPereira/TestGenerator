<?php
	require_once "../../lib/conexao.php";	
	require_once "../../lib/Template.php";
	use raelgc\view\Template;
	
	$template = new Template("../../view/provas/tela_criar.html");
	$template->show();
?>