<?php 
require_once ('app/conf/conexao.class.php');
date_default_timezone_set('America/Sao_Paulo');

if (isset($_POST["op"]) AND $_POST["op"] == "insert") {
	
	if(isset($_POST["email"]) AND !empty($_POST["email"])){
		$email = $_POST["email"];
		$date = date('Y-m-d H:i');
	}else{
		echo "erro";
	}

	$query="INSERT INTO 
	tb_experimente (id, data_hora, email) 
	VALUES ('','".$date."','".$email."')
	";

	$GLOBALS['db']->execute($query);
	$result = $GLOBALS['db']->fetchAll();

	session_start();
	$_SESSION["email"] = $_POST["email"];

	if($result){	
		echo "erro";
	}else{
		echo "ok";
	}
}else if(isset($_POST["op"]) AND $_POST["op"] == "update"){
	session_start();
	$query="UPDATE tb_experimente
	SET comentario='{$_POST["comentario"]}'
	WHERE email='{$_SESSION["email"]}'
	";
	var_dump($query);
	$GLOBALS['db']->execute($query);
	$result = $GLOBALS['db']->fetchAll();
}

?>

