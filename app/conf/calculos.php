<?php
session_start();

require_once ('conexao.class.php');
require_once ('controller.php');

if(!isset($_SESSION['email']) OR empty($_SESSION['email'])){
	header("location: logout.php");
}
$id=$_GET["j"];

$query="SELECT *
		FROM tb_produto
		WHERE id_Produto={$id}
		AND empresa={$_SESSION['id_Empresa']}
	";
$GLOBALS['db']->execute($query);
$result = $GLOBALS['db']->fetchAll();	

foreach ($result as $line) {
	
	echo "valor em estoque: R$" . $line["qtdn_Entrada"] *  $line["preco_unitario"] . "<br><br>";
}

?>